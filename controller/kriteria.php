<?php
include __DIR__ . '/../koneksi.php';

if (isset($_GET['aksi']) && $_GET['aksi'] == 'update') {
    include '../koneksi.php';
    $id = $_POST['id_kriteria'];
    $nama = $_POST['nama_kriteria'];
    $penjelasan = $_POST['penjelasan'];
    $arah = $_POST['arah_potensi'];
    $satuan = $_POST['satuan'];
    $bobot = $_POST['bobot'];

    $query = "UPDATE kriteria SET 
              nama_kriteria = '$nama', 
              penjelasan = '$penjelasan', 
              arah_potensi = '$arah', 
              satuan = '$satuan', 
              bobot = '$bobot' 
              WHERE id_kriteria = '$id'";
    $conn->query($query);

    echo "<script>alert('Data berhasil diperbarui'); window.location.href = '../index.php?page=kriteria';</script>";
    exit;
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    include '../koneksi.php';
    $id = $_GET['id'];
    $conn->query("DELETE FROM kriteria WHERE id_kriteria = '$id'");
    echo "<script>alert('Data berhasil dihapus'); window.location.href = '../index.php?page=kriteria';</script>";
    exit;
}


if (isset($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
    include '../koneksi.php';
    $nama = $_POST['nama_kriteria'];
    $penjelasan = $_POST['penjelasan'];
    $arah = $_POST['arah_potensi'];
    $satuan = $_POST['satuan'];
    $bobot = $_POST['bobot'];

    $query = "INSERT INTO kriteria (nama_kriteria, penjelasan, arah_potensi, satuan, bobot)
              VALUES ('$nama', '$penjelasan', '$arah', '$satuan', '$bobot')";
    $conn->query($query);

    echo "<script>alert('Kriteria berhasil ditambahkan'); window.location.href = '../index.php?page=kriteria';</script>";
    exit;
}


$data_kriteria = [];
$result = $conn->query("SELECT * FROM kriteria ORDER BY id_kriteria ASC");

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data_kriteria[] = $row;
  }
}
