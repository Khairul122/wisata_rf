import pandas as pd
import os
import json
import joblib
import random
import traceback
from datetime import date
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score, precision_score, recall_score, f1_score, confusion_matrix
import mysql.connector
from mysql.connector import Error

try:
    # Koneksi ke database
    db = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="db_rf"
    )
    cursor = db.cursor(dictionary=True)

    # Ambil data nilai kriteria
    cursor.execute("SELECT * FROM data_kriteria")
    rows = cursor.fetchall()
    df = pd.DataFrame(rows)

    # Ambil nama kriteria
    cursor.execute("SELECT id_kriteria, nama_kriteria FROM kriteria")
    kriteria_rows = cursor.fetchall()
    kriteria_map = {row['id_kriteria']: row['nama_kriteria'] for row in kriteria_rows}

    # Bersihkan nilai
    df['nilai'] = pd.to_numeric(df['nilai'], errors='coerce')
    df = df.dropna(subset=['nilai'])

    # Pivot
    pivot_df = df.pivot_table(index='id_objek', columns='id_kriteria', values='nilai')
    pivot_df.rename(columns={k: kriteria_map.get(k, f'kriteria_{k}') for k in pivot_df.columns}, inplace=True)
    pivot_df.reset_index(inplace=True)

    # Tambahkan label dummy
    label_dummy = ['Baik', 'Buruk', 'Sangat Baik']
    pivot_df['label'] = [random.choice(label_dummy) for _ in range(len(pivot_df))]

    # Siapkan data
    X = pivot_df.drop(columns=['id_objek', 'label'])
    y = pivot_df['label']
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

    # Latih model
    model = RandomForestClassifier(n_estimators=100, random_state=42)
    model.fit(X_train, y_train)

    # Evaluasi
    y_pred = model.predict(X_test)
    akurasi = float(accuracy_score(y_test, y_pred))
    presisi = float(precision_score(y_test, y_pred, average='macro', zero_division=0))
    recal = float(recall_score(y_test, y_pred, average='macro', zero_division=0))
    f1 = float(f1_score(y_test, y_pred, average='macro', zero_division=0))
    jumlah_pohon = int(len(model.estimators_))
    fitur_terpenting = json.dumps(dict(zip(X.columns, model.feature_importances_.tolist())))
    conf_matrix = confusion_matrix(y_test, y_pred).tolist()
    conf_matrix_json = json.dumps(conf_matrix)
    parameter_model = json.dumps({k: str(v) for k, v in model.get_params().items()})

    # Simpan model dan dataset
    os.makedirs("model", exist_ok=True)
    train_df = X_train.copy(); train_df['label'] = y_train
    test_df = X_test.copy(); test_df['label'] = y_test
    train_df.to_csv("model/data_latih.csv", index=False)
    test_df.to_csv("model/data_uji.csv", index=False)
    joblib.dump(model, "model/model.pkl")
    with open("model/model.json", "w") as f:
        json.dump({
            "fitur": list(X.columns),
            "jumlah_data_latih": len(X_train),
            "jumlah_data_uji": len(X_test),
            "label_unik": list(y.unique())
        }, f, indent=2)

    # Cek struktur tabel log_model
    try:
        cursor.execute("DESCRIBE log_model")
        table_structure = cursor.fetchall()
        
        # Buat tabel jika belum ada
        if not table_structure:
            raise Error("Table does not exist")
            
    except Error:
        # Buat tabel jika tabel belum ada
        cursor.execute("""
        CREATE TABLE log_model (
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
        print("Tabel log_model berhasil dibuat")

    # Simpan ke log_model dengan error handling
    try:
        # Print nilai untuk debugging
        print(f"Nilai untuk disisipkan: tanggal={date.today()}, akurasi={akurasi}, presisi={presisi}, recal={recal}, f1={f1}")
        
        insert_query = """
        INSERT INTO log_model (
            tanggal_latih, akurasi, presisi, recal, f1_score,
            jumlah_pohon, fitur_terpenting, conf_matrix_json, parameter_model
        ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)
        """
        
        cursor.execute(insert_query, (
            date.today(), akurasi, presisi, recal, f1,
            jumlah_pohon, fitur_terpenting, conf_matrix_json, parameter_model
        ))
        db.commit()
        print("Data berhasil disimpan ke tabel log_model")
    except Error as e:
        print(f"Error saat menyimpan ke log_model: {e}")
        # Cek struktur tabel untuk debugging
        cursor.execute("DESCRIBE log_model")
        columns = cursor.fetchall()
        print("Struktur tabel log_model:")
        for col in columns:
            print(f"  {col['Field']}: {col['Type']}")

    print("Model berhasil dilatih, dievaluasi, dan disimpan.")

except Exception as e:
    # Tampilkan error lengkap
    print(f"Error: {e}")
    traceback.print_exc()
    
finally:
    # Tutup koneksi
    if 'db' in locals() and db.is_connected():
        cursor.close()
        db.close()