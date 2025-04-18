<?php
include 'koneksi.php';

$username = $_POST['username'];
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
    echo "<script>alert('Login gagal'); window.location.href = 'index.php?page=login';</script>";
    exit;
}
?>
