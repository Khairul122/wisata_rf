<?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 'login';

switch ($page) {
  case 'login':
    include 'view/login.php';
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

  // Controller
  case 'auth':
    include 'Controller/auth.php';
    break;

  default:
    include 'view/login.php';
    break;
}
