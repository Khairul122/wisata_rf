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
                  <h4 class="card-title">Tambah Kriteria Penilaian</h4>
                  <form method="POST" action="controller/kriteria.php?aksi=tambah">
                    <div class="form-group">
                      <label>Nama Kriteria</label>
                      <input type="text" name="nama_kriteria" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Penjelasan</label>
                      <textarea name="penjelasan" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>Arah Potensi</label>
                      <select name="arah_potensi" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="tinggi">Tinggi jika nilai rendah</option>
                        <option value="rendah">Tinggi jika nilai tinggi</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <input type="text" name="satuan" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Bobot</label>
                      <input type="number" name="bobot" class="form-control" step="0.1" min="0" value="1.0" required>
                    </div>
                    <div class="d-flex justify-content-between">
                      <a href="index.php?page=kriteria" class="btn btn-secondary">Kembali</a>
                      <button type="submit" class="btn btn-success">Simpan</button>
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
