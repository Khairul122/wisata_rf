<?php
include __DIR__ . '/../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_objek = $_POST['id_objek'];
    $input = $_POST['kriteria'];

    ksort($input);
    $csvLine = implode(',', $input) . "\n";
    file_put_contents('../model/data_input.csv', $csvLine);

    $predictPath = realpath(__DIR__ . '/../controller/predict.py');
    $projectDir = realpath(__DIR__ . '/../');
    $batchFile = $projectDir . '/model/predict_run.bat';

    $batch_content = "";
    $batch_content .= "cd /d \"$projectDir\"\r\n";
    $batch_content .= "call .venv\\Scripts\\activate.bat\r\n";
    $batch_content .= "python \"$predictPath\"\r\n";
    $batch_content .= "call deactivate\r\n";

    if (!file_put_contents($batchFile, $batch_content)) {
        echo "<script>alert('❌ Gagal membuat file batch.'); window.location.href = '../index.php?page=prediksi';</script>";
        exit;
    }

    $output = shell_exec("cmd /c \"$batchFile\" 2>&1");
    file_put_contents($projectDir . '/model/debug_output.txt', $output);
    @unlink($batchFile);

    $baris = explode("\n", trim($output));
    $hasil = trim(end($baris));

    if (!empty($hasil) && strpos($hasil, '❌') === false) {
        $stmt = mysqli_prepare($conn, "INSERT INTO hasil_prediksi (id_objek, hasil) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, 'is', $id_objek, $hasil);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $query = mysqli_query($conn, "SELECT nama_objek FROM objek_wisata WHERE id_objek = '$id_objek'");
        $row = mysqli_fetch_assoc($query);
        $nama_objek = $row ? $row['nama_objek'] : 'Objek Tidak Dikenal';

        echo "<script>alert('Hasil Prediksi untuk $nama_objek: $hasil'); window.location.href = '../index.php?page=hasil_prediksi';</script>";
    } else {
        echo "<script>alert('❌ Prediksi gagal! Cek debug_output.txt untuk detail kesalahan.'); window.location.href = '../index.php?page=prediksi';</script>";
    }
}
?>
