<?php
include '../koneksi.php';

if ($_GET['aksi'] == 'insert') {
  include '../koneksi.php';

  $id_objek = $_POST['id_objek'];
  $nilai_total_fasilitas = $_POST['total_fasilitas'];
  $nilai_total_pengunjung = $_POST['total_pengunjung'];
  $nilai_akses_jalan = $_POST['akses_jalan'];
  $nilai_rating = $_POST['rating_pengunjung'];
  $nilai_jarak = $_POST['jarak_ke_kota'];


  $data = [
    ['id_kriteria' => 1, 'nilai' => $nilai_total_fasilitas],   
    ['id_kriteria' => 4, 'nilai' => $nilai_total_pengunjung],  
    ['id_kriteria' => 2, 'nilai' => $nilai_akses_jalan],      
    ['id_kriteria' => 3, 'nilai' => $nilai_rating],           
    ['id_kriteria' => 6, 'nilai' => $nilai_jarak],            
  ];

  $sukses = true;

  foreach ($data as $item) {
    $id_kriteria = $item['id_kriteria'];
    $nilai = mysqli_real_escape_string($conn, $item['nilai']);

    $query = "INSERT INTO data_kriteria (id_objek, id_kriteria, nilai) VALUES ('$id_objek', '$id_kriteria', '$nilai')";
    if (!mysqli_query($conn, $query)) {
      $sukses = false;
      $error_msg = mysqli_error($conn);
      break;
    }
  }

  if ($sukses) {
    echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='../index.php?page=data_kriteria';</script>";
  } else {
    echo "<script>alert('Gagal menambahkan data: $error_msg'); window.location.href='../index.php?page=data_kriteria';</script>";
  }
} elseif ($aksi == 'update_all') {
  $id_objek = $_POST['id_objek'];
  $id_data_kriteria = isset($_POST['id_data_kriteria']) ? $_POST['id_data_kriteria'] : [];
  $nilai = isset($_POST['nilai']) ? $_POST['nilai'] : [];

  $success = true;
  $error_msg = "";

  mysqli_begin_transaction($conn);

  try {
    foreach ($nilai as $id_kriteria => $nilai_kriteria) {
      if ($nilai_kriteria !== '') {
        if (!empty($id_data_kriteria[$id_kriteria])) {
          $id = $id_data_kriteria[$id_kriteria];
          $query = "UPDATE data_kriteria SET nilai='$nilai_kriteria' WHERE id_data_kriteria='$id'";
          if (!mysqli_query($conn, $query)) {
            throw new Exception("Gagal memperbarui data kriteria " . $id_kriteria);
          }
        } else {
          $query = "INSERT INTO data_kriteria (id_objek, id_kriteria, nilai) VALUES ('$id_objek', '$id_kriteria', '$nilai_kriteria')";
          if (!mysqli_query($conn, $query)) {
            throw new Exception("Gagal menambahkan data kriteria " . $id_kriteria);
          }
        }
      }
    }

    mysqli_commit($conn);
    echo "<script>alert('Data berhasil diperbarui!'); window.location.href='../index.php?page=data_kriteria';</script>";
  } catch (Exception $e) {
    mysqli_rollback($conn);
    echo "<script>alert('Gagal memperbarui data: " . $e->getMessage() . "'); window.location.href='../index.php?page=data_kriteria_edit&id_objek=$id_objek';</script>";
  }
} elseif ($aksi == 'update') {
  $id = $_POST['id'];
  $id_objek = $_POST['id_objek'];
  $id_kriteria = $_POST['id_kriteria'];
  $nilai = $_POST['nilai'];

  $query = "UPDATE data_kriteria SET id_objek='$id_objek', id_kriteria='$id_kriteria', nilai='$nilai' WHERE id_data_kriteria='$id'";
  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Data berhasil diperbarui!'); window.location.href='../index.php?page=data_kriteria';</script>";
  } else {
    echo "<script>alert('Gagal memperbarui data!'); window.location.href='../index.php?page=data_kriteria';</script>";
  }
} elseif ($aksi == 'delete') {
  $id = $_GET['id'];

  $query = "DELETE FROM data_kriteria WHERE id_data_kriteria='$id'";
  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href='../index.php?page=data_kriteria';</script>";
  } else {
    echo "<script>alert('Gagal menghapus data!'); window.location.href='../index.php?page=data_kriteria';</script>";
  }
}
