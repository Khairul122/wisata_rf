import pandas as pd
import joblib
import json
import os
import sys

try:
    # Cek keberadaan file input
    if not os.path.exists("model/data_input.csv"):
        print("❌ File input tidak ditemukan.")
        sys.exit()

    # Load model
    model = joblib.load("model/model.pkl")

    # Load metadata
    with open("model/model.json", "r") as f:
        metadata = json.load(f)

    # Baca file input
    df_input = pd.read_csv("model/data_input.csv", header=None)

    # Validasi jumlah kolom
    if df_input.shape[1] != len(metadata["fitur"]):
        print("❌ Jumlah fitur tidak sesuai dengan model.")
        sys.exit()

    # Set nama kolom
    df_input.columns = metadata["fitur"]

    # Lakukan prediksi
    hasil = model.predict(df_input)[0]
    print(hasil)

except Exception as e:
    print(f"❌ Terjadi error: {str(e)}")
