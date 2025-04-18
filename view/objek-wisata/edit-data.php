<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = $conn->query("SELECT * FROM objek_wisata WHERE id_objek = '$id'");
$data = $query->fetch_assoc();
?>

<?php include('view/template/header.php'); ?>

<body class="with-welcome-text">
  <div class="container-scroller">
    <?php include 'view/template/navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'view/template/setting_panel.php'; ?>
      <?php include 'view/template/sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Data Objek Wisata</h4>
                  <form action="controller/objek-wisata.php?aksi=update" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_objek" value="<?= $data['id_objek'] ?>">
                    <div class="form-group">
                      <label>Nama Objek</label>
                      <input type="text" class="form-control" name="nama_objek" value="<?= $data['nama_objek'] ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea class="form-control" name="deskripsi" rows="3"><?= $data['deskripsi'] ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <input type="text" class="form-control" name="kecamatan" value="<?= $data['kecamatan'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Latitude</label>
                      <input type="text" class="form-control" name="latitude" value="<?= $data['latitude'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Longitude</label>
                      <input type="text" class="form-control" name="longitude" value="<?= $data['longitude'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Foto Lama</label><br>
                      <?php if (!empty($data['foto'])): ?>
                        <img src="uploads/<?= $data['foto'] ?>" width="120">
                      <?php else: ?> Tidak ada <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label>Ganti Foto (opsional)</label>
                      <input type="file" class="form-control" name="foto">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="index.php?page=objek_wisata" class="btn btn-secondary">Kembali</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
  <?php include 'view/template/script.php'; ?>
</body>

</html>
