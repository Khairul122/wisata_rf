<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $input = $_POST['kriteria'];

  // Urutkan input sesuai id_kriteria ASC
  ksort($input);
  $csvLine = implode(',', $input) . "\n";
  file_put_contents('../model/data_input.csv', $csvLine);

  // Path absolut
  $predictPath = realpath(__DIR__ . '/../controller/predict.py');
  $projectDir = realpath(__DIR__ . '/../');
  $batchFile = $projectDir . '/model/predict_run.bat';

  // Isi file batch
  $batch_content = "";
  $batch_content .= "cd /d \"$projectDir\"\r\n";
  $batch_content .= "call .venv\\Scripts\\activate.bat\r\n";
  $batch_content .= "python \"$predictPath\"\r\n";
  $batch_content .= "call deactivate\r\n";

  // Buat file .bat
  if (!file_put_contents($batchFile, $batch_content)) {
    echo "<script>alert('❌ Gagal membuat file batch.'); window.location.href = '../index.php?page=prediksi';</script>";
    exit;
  }

  // Jalankan batch file dan tangkap output
  $output = shell_exec("cmd /c \"$batchFile\" 2>&1");
  file_put_contents($projectDir . '/model/debug_output.txt', $output); // log semua output
  @unlink($batchFile); // hapus file batch

  // Ambil baris terakhir sebagai hasil prediksi
  $baris = explode("\n", trim($output));
  $hasil = trim(end($baris));

  // Validasi hasil
  if (!empty($hasil) && strpos($hasil, '❌') === false) {
    $stmt = mysqli_prepare($conn, "INSERT INTO hasil_prediksi (hasil) VALUES (?)");
    mysqli_stmt_bind_param($stmt, 's', $hasil);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<script>alert('Hasil Prediksi: $hasil'); window.location.href = '../index.php?page=prediksi';</script>";
  } else {
    echo "<script>alert('❌ Prediksi gagal! Cek debug_output.txt untuk melihat detail error.'); window.location.href = '../index.php?page=prediksi';</script>";
  }
}
?>
