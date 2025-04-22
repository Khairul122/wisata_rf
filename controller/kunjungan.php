<?php
include __DIR__ . '/../koneksi.php';

if (isset($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
    include '../koneksi.php';

    $id_objek = mysqli_real_escape_string($conn, $_POST['id_objek']);
    $tahun_list = $_POST['tahun'];
    $pengunjung_list = $_POST['jumlah_pengunjung'];

    $error = false;
    $error_message = '';

    $check_query = "SELECT COUNT(*) as total FROM kunjungan_wisata WHERE id_objek = ? AND tahun = ?";
    $insert_query = "INSERT INTO kunjungan_wisata (id_objek, tahun, jumlah_pengunjung) VALUES (?, ?, ?)";

    $check_stmt = $conn->prepare($check_query);
    $insert_stmt = $conn->prepare($insert_query);

    for ($i = 0; $i < count($tahun_list); $i++) {
        $tahun = mysqli_real_escape_string($conn, $tahun_list[$i]);
        $jumlah = mysqli_real_escape_string($conn, $pengunjung_list[$i]);

        $check_stmt->bind_param("is", $id_objek, $tahun);
        $check_stmt->execute();
        $result = $check_stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['total'] > 0) {
            $error = true;
            $error_message = "Data kunjungan untuk tahun $tahun sudah ada.";
            break;
        }

        $insert_stmt->bind_param("isi", $id_objek, $tahun, $jumlah);
        if (!$insert_stmt->execute()) {
            $error = true;
            $error_message = "Gagal menyimpan data untuk tahun $tahun: " . $conn->error;
            break;
        }
    }

    $check_stmt->close();
    $insert_stmt->close();

    if ($error) {
        echo "<script>alert('$error_message'); window.history.back();</script>";
    } else {
        echo "<script>alert('Semua data kunjungan berhasil ditambahkan'); window.location.href = '../index.php?page=kunjungan';</script>";
    }

    exit;
}


if (isset($_GET['aksi']) && $_GET['aksi'] == 'update') {
    include '../koneksi.php';

    $id = mysqli_real_escape_string($conn, $_POST['id_kunjungan']);
    $id_objek = mysqli_real_escape_string($conn, $_POST['id_objek']);
    $tahun = mysqli_real_escape_string($conn, $_POST['tahun']);
    $jumlah_pengunjung = mysqli_real_escape_string($conn, $_POST['jumlah_pengunjung']);

    $check_query = "SELECT COUNT(*) as total FROM kunjungan_wisata 
                    WHERE id_objek = ? AND tahun = ? AND id_kunjungan != ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("isi", $id_objek, $tahun, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['total'] > 0) {
        echo "<script>alert('Data kunjungan untuk objek wisata dan tahun ini sudah ada.'); window.history.back();</script>";
        exit;
    }

    $query = "UPDATE kunjungan_wisata 
              SET id_objek = ?, tahun = ?, jumlah_pengunjung = ? 
              WHERE id_kunjungan = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("isii", $id_objek, $tahun, $jumlah_pengunjung, $id);
    $result = $stmt->execute();

    $message = $result
        ? "Data kunjungan berhasil diperbarui"
        : "Gagal memperbarui data: " . $conn->error;

    echo "<script>alert('$message'); window.location.href = '../index.php?page=kunjungan';</script>";
    exit;
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    include '../koneksi.php';

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "DELETE FROM kunjungan_wisata WHERE id_kunjungan = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    $message = $result
        ? "Data kunjungan berhasil dihapus"
        : "Gagal menghapus data: " . $conn->error;

    echo "<script>alert('$message'); window.location.href = '../index.php?page=kunjungan';</script>";
    exit;
}

$limit = 10;
$page = isset($_GET['page_no']) ? (int)$_GET['page_no'] : 1;
$offset = ($page - 1) * $limit;


$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, trim($_GET['search'])) : '';
$filter_tahun = isset($_GET['filter_tahun']) ? mysqli_real_escape_string($conn, $_GET['filter_tahun']) : '';


$where = [];
if ($search) {
    $where[] = "o.nama_objek LIKE '%$search%'";
}
if ($filter_tahun) {
    $where[] = "k.tahun = '$filter_tahun'";
}

$whereClause = count($where) > 0 ? "WHERE " . implode(" AND ", $where) : "";

$totalQuery = $conn->query("SELECT COUNT(*) AS total 
                            FROM kunjungan_wisata k 
                            JOIN objek_wisata o ON k.id_objek = o.id_objek
                            $whereClause");
$totalRow = $totalQuery->fetch_assoc()['total'];
$total_pages = ceil($totalRow / $limit);


$query = "SELECT k.id_kunjungan, k.tahun, k.jumlah_pengunjung, o.nama_objek 
          FROM kunjungan_wisata k 
          JOIN objek_wisata o ON k.id_objek = o.id_objek 
          $whereClause
          ORDER BY k.tahun DESC, o.nama_objek ASC";

if ($total_pages > 1) {
    $query .= " LIMIT $limit OFFSET $offset";
}

$result = $conn->query($query);

$data_kunjungan = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data_kunjungan[] = $row;
    }
}


function getAllObjekWisata($conn)
{
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
