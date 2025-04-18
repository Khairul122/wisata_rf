import pandas as pd
import joblib
import json
import os
import sys

try:
    sys.stdout.reconfigure(encoding='utf-8')

    if not os.path.exists("model/data_input.csv"):
        print("❌ File input tidak ditemukan.")
        sys.exit()

    model = joblib.load("model/model.pkl")
    with open("model/model.json", "r") as f:
        metadata = json.load(f)

    df_input = pd.read_csv("model/data_input.csv", header=None)

    if df_input.shape[1] != len(metadata["fitur"]):
        print("❌ Jumlah fitur tidak sesuai dengan model.")
        sys.exit()

    df_input.columns = [col.lower().strip() for col in metadata["fitur"]]

    # Tidak perlu konversi string di sini karena sudah dikonversi di PHP
    if df_input.isnull().any().any():
        print("❌ Data input mengandung nilai tidak valid atau kosong.")
        print(df_input)
        sys.exit()

    hasil = model.predict(df_input)[0]
    print(hasil)

except Exception as e:
    print(f"❌ Terjadi error: {str(e)}")
