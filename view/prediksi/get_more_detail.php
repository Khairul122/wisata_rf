<?php
require_once 'config.php';

if (isset($_GET['id'])) {
    $modelId = (int)$_GET['id'];
    
    $query = "SELECT * FROM log_model WHERE id_model = $modelId";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        header('Content-Type: application/json');
        echo json_encode(null);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(null);
}
?>