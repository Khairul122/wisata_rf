<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = $conn->query("SELECT * FROM kriteria WHERE id_kriteria = '$id'");
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
          <div class="row justify-content-center">
            <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Kriteria</h4>
                  <form method="POST" action="controller/kriteria.php?aksi=update">
                    <input type="hidden" name="id_kriteria" value="<?= $data['id_kriteria'] ?>">
                    <div class="form-group">
                      <label>Nama Kriteria</label>
                      <input type="text" name="nama_kriteria" class="form-control" value="<?= $data['nama_kriteria'] ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Penjelasan</label>
                      <textarea name="penjelasan" class="form-control" rows="3" required><?= $data['penjelasan'] ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Arah Potensi</label>
                      <select name="arah_potensi" class="form-control" required>
                        <option value="tinggi" <?= $data['arah_potensi'] == 'tinggi' ? 'selected' : '' ?>>Tinggi jika nilai rendah</option>
                        <option value="rendah" <?= $data['arah_potensi'] == 'rendah' ? 'selected' : '' ?>>Tinggi jika nilai tinggi</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <input type="text" name="satuan" class="form-control" value="<?= $data['satuan'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Bobot</label>
                      <input type="number" name="bobot" class="form-control" step="0.1" min="0" value="<?= $data['bobot'] ?>" required>
                    </div>
                    <div class="d-flex justify-content-between">
                      <a href="index.php?page=kriteria" class="btn btn-secondary">Batal</a>
                      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
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
