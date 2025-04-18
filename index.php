<?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 'login';

switch ($page) {
  case 'login':
    include 'view/login.php';
    break;
  case 'register':
    include 'view/registrasi.php';
    break;
  case 'home':
    include 'view/home.php';
    break;

  // Objek Wisata
  case 'objek_wisata':
    include 'view/objek-wisata/index.php';
    break;
  case 'objek_wisata_tambah':
    include 'view/objek-wisata/tambah-data.php';
    break;
  case 'objek_wisata_edit':
    include 'view/objek-wisata/edit-data.php';
    break;

  // Fasilitas
  case 'fasilitas':
    include 'view/fasilitas/index.php';
    break;
  case 'fasilitas_tambah':
    include 'view/fasilitas/tambah-data.php';
    break;
  case 'fasilitas_edit':
    include 'view/fasilitas/edit-data.php';
    break;

  // Kunjungan
  case 'kunjungan':
    include 'view/kunjungan/index.php';
    break;
  case 'kunjungan_tambah':
    include 'view/kunjungan/tambah-data.php';
    break;
  case 'kunjungan_edit':
    include 'view/kunjungan/edit-data.php';
    break;


  // Kriteria
  case 'kriteria':
    include 'view/kriteria/index.php';
    break;
  case 'kriteria_tambah':
    include 'view/kriteria/tambah-data.php';
    break;
  case 'kriteria_edit':
    include 'view/kriteria/edit-data.php';
    break;

  // Data Kriteria
  case 'data_kriteria':
    include 'view/data-kriteria/index.php';
    break;
  case 'data_kriteria_tambah':
    include 'view/data-kriteria/tambah-data.php';
    break;
  case 'data_kriteria_edit':
    include 'view/data-kriteria/edit-data.php';
    break;

  // Latih Data
  case 'latih_data':
    include 'view/latih-data/index.php';
    break;

  // Prediksi 
  case 'prediksi':
    include 'view/prediksi/index.php';
    break;
  case 'prediksi_tambah':
    include 'view/prediksi/tambah-data.php';
    break;
  case 'hasil_prediksi':
    include 'view/latih-data/hasil-data.php';
    break;

  // Controller
  case 'auth':
    include 'controller/auth.php';
    break;
  case 'Cobjek-wisata':
    include 'controller/objek-wisata.php';
    break;
  case 'Cfasilitas':
    include 'controller/fasilitas.php';
    break;
  case 'Ckunjungan':
    include 'controller/kunjungan.php';
    break;
  case 'Cprediksi':
    include 'controller/prediksi.php';
    break;
  case 'Ctraining':
    include 'controller/training.php';
    break;
  case 'Ckriteria':
    include 'controller/kriteria.php';
    break;
  default:
    include 'view/login.php';
    break;
}
