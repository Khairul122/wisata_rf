<?php
include '../koneksi.php';

$id_objek = intval($_GET['id_objek']);
$response = [
    'total_fasilitas' => 0,
    'total_pengunjung' => 0
];

if ($id_objek > 0) {
    // Hitung jumlah fasilitas
    $res1 = $conn->query("SELECT COUNT(*) AS total FROM fasilitas WHERE id_objek = $id_objek");
    if ($row1 = $res1->fetch_assoc()) {
        $response['total_fasilitas'] = $row1['total'];
    }

    // Hitung jumlah pengunjung
    $res2 = $conn->query("SELECT SUM(jumlah_pengunjung) AS total FROM kunjungan_wisata WHERE id_objek = $id_objek");
    if ($row2 = $res2->fetch_assoc()) {
        $response['total_pengunjung'] = $row2['total'] ?? 0;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
