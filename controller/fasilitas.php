<?php
include __DIR__ . '/../koneksi.php';

function getAllObjekWisata($conn) {
    $objek_list = [];
    $query = "SELECT id_objek, nama_objek FROM objek_wisata ORDER BY nama_objek ASC";
    $result = $conn->query($query);
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $objek_list[] = $row;
        }
    }
    return $objek_list;
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'update') {
    include '../koneksi.php';
    
    $id = mysqli_real_escape_string($conn, $_POST['id_fasilitas']);
    $id_objek = mysqli_real_escape_string($conn, $_POST['id_objek']);
    $nama_fasilitas = mysqli_real_escape_string($conn, $_POST['nama_fasilitas']);
    
    $query = "UPDATE fasilitas 
              SET id_objek = ?, nama_fasilitas = ? 
              WHERE id_fasilitas = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isi", $id_objek, $nama_fasilitas, $id);
    $result = $stmt->execute();
    $stmt->close();
    
    $message = $result 
              ? "Data fasilitas berhasil diperbarui" 
              : "Gagal memperbarui data: " . $conn->error;
    
    echo "<script>alert('$message'); window.location.href = '../index.php?page=fasilitas';</script>";
    exit;
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
    include '../koneksi.php';
    
    $id_objek = mysqli_real_escape_string($conn, $_POST['id_objek']);
    $nama_fasilitas = mysqli_real_escape_string($conn, $_POST['nama_fasilitas']);
    
    $query = "INSERT INTO fasilitas (id_objek, nama_fasilitas) VALUES (?, ?)";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $id_objek, $nama_fasilitas);
    $result = $stmt->execute();
    $stmt->close();
    
    $message = $result 
              ? "Fasilitas berhasil ditambahkan" 
              : "Gagal menambahkan fasilitas: " . $conn->error;
    
    echo "<script>alert('$message'); window.location.href = '../index.php?page=fasilitas';</script>";
    exit;
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $stmt = $conn->prepare("DELETE FROM fasilitas WHERE id_fasilitas = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    
    $message = $result 
              ? "Data berhasil dihapus" 
              : "Gagal menghapus data: " . $conn->error;
    
    echo "<script>alert('$message'); window.location.href = '../index.php?page=fasilitas';</script>";
    exit;
}


$limit = 10;
$page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
$offset = ($page - 1) * $limit;


$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, trim($_GET['search'])) : '';
$filter_objek = isset($_GET['filter_objek']) ? mysqli_real_escape_string($conn, $_GET['filter_objek']) : '';


$where = [];
if ($search) {
    $where[] = "f.nama_fasilitas LIKE '%$search%'";
}
if ($filter_objek) {
    $where[] = "f.id_objek = '$filter_objek'";
}

$whereClause = count($where) > 0 ? "WHERE " . implode(" AND ", $where) : "";

$totalQuery = $conn->query("SELECT COUNT(*) AS total 
                            FROM fasilitas f 
                            JOIN objek_wisata o ON f.id_objek = o.id_objek
                            $whereClause");
$totalRow = $totalQuery->fetch_assoc()['total'];
$total_pages = ceil($totalRow / $limit);

$query = "SELECT f.id_fasilitas, f.nama_fasilitas, f.id_objek, o.nama_objek
          FROM fasilitas f
          JOIN objek_wisata o ON f.id_objek = o.id_objek
          $whereClause
          ORDER BY o.nama_objek ASC, f.nama_fasilitas ASC
          LIMIT $limit OFFSET $offset";

$result = $conn->query($query);

$data_fasilitas = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data_fasilitas[] = $row;
    }
}