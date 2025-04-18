<?php
include 'koneksi.php';

$query = "SELECT * FROM objek_wisata";
$result = $conn->query($query);

$data_wisata = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data_wisata[] = $row;
    }
}
?>
