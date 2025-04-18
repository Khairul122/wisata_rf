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
                  <h4 class="card-title">Tambah Kunjungan Wisata</h4>
                  <form action="controller/kunjungan.php?aksi=tambah" method="POST">
                    <div class="form-group">
                      <label>Objek Wisata</label>
                      <select name="id_objek" class="form-control" required>
                        <option value="">-- Pilih Objek Wisata --</option>
                        <?php
                        include 'koneksi.php';
                        $result = $conn->query("SELECT id_objek, nama_objek FROM objek_wisata ORDER BY nama_objek ASC");
                        while ($row = $result->fetch_assoc()) {
                          echo "<option value='{$row['id_objek']}'>{$row['nama_objek']}</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tahun</label>
                      <input type="number" name="tahun" class="form-control" min="2000" max="2100" required>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Pengunjung</label>
                      <input type="number" name="jumlah_pengunjung" class="form-control" min="0" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
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
