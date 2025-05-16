<?php
require_once 'config.php';

$query = "SELECT * FROM log_model ORDER BY tanggal_latih DESC";
$result = $conn->query($query);

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data);
?>