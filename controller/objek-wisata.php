<?php
include __DIR__ . '/../koneksi.php';


if (isset($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
    $nama_objek = $_POST['nama_objek'];
    $deskripsi = $_POST['deskripsi'];
    $kecamatan = $_POST['kecamatan'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if (!empty($foto)) {
        move_uploaded_file($tmp, "../uploads/$foto");
    }

    $query = "INSERT INTO objek_wisata (nama_objek, deskripsi, kecamatan, latitude, longitude, foto)
              VALUES ('$nama_objek', '$deskripsi', '$kecamatan', '$latitude', '$longitude', '$foto')";
    $conn->query($query);

    echo "<script>alert('Data berhasil ditambahkan'); window.location.href = '../index.php?page=objek_wisata';</script>";
    exit;
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'update') {
    $id = $_POST['id_objek'];
    $nama_objek = $_POST['nama_objek'];
    $deskripsi = $_POST['deskripsi'];
    $kecamatan = $_POST['kecamatan'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if (!empty($foto)) {
        $resultOld = $conn->query("SELECT foto FROM objek_wisata WHERE id_objek = '$id'");
        $old = $resultOld->fetch_assoc();
        if (!empty($old['foto']) && file_exists("../uploads/" . $old['foto'])) {
            unlink("../uploads/" . $old['foto']);
        }

        move_uploaded_file($tmp, "../uploads/$foto");
        $query = "UPDATE objek_wisata SET nama_objek='$nama_objek', deskripsi='$deskripsi', kecamatan='$kecamatan', latitude='$latitude', longitude='$longitude', foto='$foto' WHERE id_objek='$id'";
    } else {
        $query = "UPDATE objek_wisata SET nama_objek='$nama_objek', deskripsi='$deskripsi', kecamatan='$kecamatan', latitude='$latitude', longitude='$longitude' WHERE id_objek='$id'";
    }

    $conn->query($query);
    echo "<script>alert('Data berhasil diupdate'); window.location.href = '../index.php?page=objek_wisata';</script>";
    exit;
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];

    $result = $conn->query("SELECT foto FROM objek_wisata WHERE id_objek = '$id'");
    $data = $result->fetch_assoc();

    if (!empty($data['foto']) && file_exists("../uploads/" . $data['foto'])) {
        unlink("../uploads/" . $data['foto']);
    }

    $conn->query("DELETE FROM objek_wisata WHERE id_objek = '$id'");
    echo "<script>alert('Data berhasil dihapus'); window.location.href = '../index.php?page=objek_wisata';</script>";
    exit;
}


if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    $conn->query("DELETE FROM objek_wisata WHERE id_objek='$id'");
    echo "<script>alert('Data berhasil dihapus'); window.location.href = '../index.php?page=objek_wisata';</script>";
    exit;
}


$limit = 5;
$page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$where = $search ? "WHERE nama_objek LIKE '%$search%'" : '';

$totalQuery = $conn->query("SELECT COUNT(*) AS total FROM objek_wisata $where");
$totalRow = $totalQuery->fetch_assoc()['total'];
$totalPage = ceil($totalRow / $limit);

$query = "SELECT * FROM objek_wisata $where ORDER BY id_objek DESC LIMIT $limit OFFSET $offset";
$result = $conn->query($query);

$data_wisata = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data_wisata[] = $row;
    }
}

