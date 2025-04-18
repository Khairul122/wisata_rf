<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();
include __DIR__ . '/../koneksi.php';

if (isset($_GET['aksi']) && $_GET['aksi'] === 'logout') {
    session_unset();
    session_destroy();
    echo "<script>alert('Anda berhasil logout'); window.location.href = '../index.php?page=login';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['konfirmasi_password'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $konfirmasi = trim($_POST['konfirmasi_password']);

    if ($password !== $konfirmasi) {
        echo "<script>alert('Konfirmasi password tidak cocok'); window.location.href = '../index.php?page=register';</script>";
        exit;
    }

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Username atau email sudah digunakan'); window.location.href = '../index.php?page=register';</script>";
        exit;
    }

    $insert = mysqli_query($conn, "INSERT INTO users (username, email, password, level) VALUES ('$username', '$email', '$password', 'user')");

    if ($insert) {
        echo "<script>alert('Registrasi berhasil, silakan login'); window.location.href = '../index.php?page=login';</script>";
    } else {
        echo "<script>alert('Registrasi gagal'); window.location.href = '../index.php?page=register';</script>";
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($query);
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['level'] = $user['level'];
        echo "<script>alert('Login berhasil'); window.location.href = 'index.php?page=home';</script>";
        exit;
    } else {
        echo "<script>alert('Login gagal');history.back();</script>";
        exit;
    }
}
?>
