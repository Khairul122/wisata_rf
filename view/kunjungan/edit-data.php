<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = $conn->query("SELECT * FROM kunjungan_wisata WHERE id_kunjungan = '$id'");
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
                  <h4 class="card-title">Edit Data Kunjungan</h4>
                  <form action="controller/kunjungan.php?aksi=update" method="POST">
                    <input type="hidden" name="id_kunjungan" value="<?= $data['id_kunjungan'] ?>">
                    <div class="form-group">
                      <label>Objek Wisata</label>
                      <select name="id_objek" class="form-control" required>
                        <option value="">-- Pilih Objek Wisata --</option>
                        <?php
                        $objek = $conn->query("SELECT id_objek, nama_objek FROM objek_wisata ORDER BY nama_objek ASC");
                        while ($row = $objek->fetch_assoc()) {
                          $selected = $row['id_objek'] == $data['id_objek'] ? 'selected' : '';
                          echo "<option value='{$row['id_objek']}' $selected>{$row['nama_objek']}</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tahun</label>
                      <input type="number" name="tahun" class="form-control" value="<?= $data['tahun'] ?>" min="2000" max="2100" required>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Pengunjung</label>
                      <input type="number" name="jumlah_pengunjung" class="form-control" value="<?= $data['jumlah_pengunjung'] ?>" min="0" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="index.php?page=kunjungan" class="btn btn-secondary">Kembali</a>
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
