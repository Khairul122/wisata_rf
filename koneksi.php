<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_rf";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal");
}
?>
