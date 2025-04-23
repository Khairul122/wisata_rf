import pandas as pd
import os
import json
import joblib
from datetime import date
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score, precision_score, recall_score, f1_score, confusion_matrix
import mysql.connector
from mysql.connector import Error

db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="db_rf"
)
cursor = db.cursor(dictionary=True)

cursor.execute("SELECT * FROM data_kriteria")
rows = cursor.fetchall()
df = pd.DataFrame(rows)

cursor.execute("SELECT id_kriteria, nama_kriteria FROM kriteria")
kriteria_map = {row['id_kriteria']: row['nama_kriteria'].lower().replace(' ', '_') for row in cursor.fetchall()}

cursor.execute("SELECT id_objek, nama_objek FROM objek_wisata")
objek_map = {row['id_objek']: row['nama_objek'] for row in cursor.fetchall()}

df['nilai'] = pd.to_numeric(df['nilai'], errors='coerce')
df = df.dropna(subset=['nilai'])

pivot_df = df.pivot_table(index='id_objek', columns='id_kriteria', values='nilai')
pivot_df.rename(columns={k: kriteria_map.get(k, f'kriteria_{k}') for k in pivot_df.columns}, inplace=True)
pivot_df.reset_index(inplace=True)
pivot_df['objek_wisata'] = pivot_df['id_objek'].map(objek_map)

nilai_rata2 = pivot_df.drop(columns=['id_objek', 'objek_wisata']).mean(axis=1)
Q1 = nilai_rata2.quantile(0.25)
Q3 = nilai_rata2.quantile(0.75)

def kategorikan(nilai):
    if nilai <= Q1:
        return 'Rendah'
    elif nilai <= Q3:
        return 'Sedang'
    else:
        return 'Tinggi'

pivot_df['label'] = nilai_rata2.apply(kategorikan)

X = pivot_df.drop(columns=['id_objek', 'objek_wisata', 'label'])
y = pivot_df['label']
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

X_train_full = pivot_df.loc[X_train.index, ['objek_wisata'] + list(X.columns)]
X_train_full['label'] = y_train.values
X_test_full = pivot_df.loc[X_test.index, ['objek_wisata'] + list(X.columns)]
X_test_full['label'] = y_test.values

model = RandomForestClassifier(n_estimators=100, random_state=42)
model.fit(X_train, y_train)

full_X = pivot_df[list(X.columns)]
full_pred = model.predict(full_X)
result_df = pivot_df[['objek_wisata'] + list(X.columns)].copy()
result_df['label'] = full_pred

ordered_columns = ['objek_wisata', 'fasilitas', 'akses_jalan', 'rating_pengunjung', 'jumlah_pengunjung', 'jarak_ke_kota', 'label']
result_df = result_df[[col for col in ordered_columns if col in result_df.columns]]
os.makedirs("model", exist_ok=True)
result_df.to_csv("model/data_random_forest.csv", index=False)

label_list = ['Rendah', 'Sedang', 'Tinggi']
y_pred = model.predict(X_test)
akurasi = float(accuracy_score(y_test, y_pred))
presisi = float(precision_score(y_test, y_pred, average='macro', zero_division=0))
recal = float(recall_score(y_test, y_pred, average='macro', zero_division=0))
f1 = float(f1_score(y_test, y_pred, average='macro', zero_division=0))
conf_matrix = confusion_matrix(y_test, y_pred, labels=label_list).tolist()
conf_matrix_json = json.dumps(conf_matrix)
jumlah_pohon = int(len(model.estimators_))
fitur_terpenting = json.dumps(dict(zip(X.columns, model.feature_importances_.tolist())))
parameter_model = json.dumps({k: str(v) for k, v in model.get_params().items()})

X_train_full.to_csv("model/data_latih.csv", index=False)
X_test_full.to_csv("model/data_uji.csv", index=False)
joblib.dump(model, "model/model.pkl")

with open("model/model.json", "w") as f:
    json.dump({
        "fitur": list(X.columns),
        "jumlah_data_latih": len(X_train),
        "jumlah_data_uji": len(X_test),
        "label_unik": list(y.unique())
    }, f, indent=2)

try:
    cursor.execute("""
        CREATE TABLE IF NOT EXISTS log_model (
            id_log INT AUTO_INCREMENT PRIMARY KEY,
            tanggal_latih DATE,
            akurasi FLOAT,
            presisi FLOAT,
            recal FLOAT,
            f1_score FLOAT,
            jumlah_pohon INT,
            fitur_terpenting TEXT,
            conf_matrix_json TEXT,
            parameter_model TEXT
        )
    """)
    db.commit()
except Error as e:
    print("Gagal membuat tabel log_model:", e)

try:
    insert_query = """
        INSERT INTO log_model (
            tanggal_latih, akurasi, presisi, recal, f1_score,
            jumlah_pohon, fitur_terpenting, conf_matrix_json, parameter_model
        ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)
    """
    values = (
        date.today(), akurasi, presisi, recal, f1,
        jumlah_pohon, fitur_terpenting, conf_matrix_json, parameter_model
    )
    cursor.execute(insert_query, values)
    db.commit()
except Error as e:
    print("Gagal menyimpan log_model:", e)

cursor.close()
db.close()
