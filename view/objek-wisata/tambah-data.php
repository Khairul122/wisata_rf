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
          <div class="col-sm-12">

              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Data Objek Wisata</h4>
                  <form action="controller/objek-wisata.php?aksi=tambah" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Nama Objek</label>
                      <input type="text" class="form-control" name="nama_objek" required>
                    </div>
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <input type="text" class="form-control" name="kecamatan">
                    </div>
                    <div class="form-group">
                      <label>Latitude</label>
                      <input type="text" class="form-control" name="latitude">
                    </div>
                    <div class="form-group">
                      <label>Longitude</label>
                      <input type="text" class="form-control" name="longitude">
                    </div>
                    <div class="form-group">
                      <label>Foto</label>
                      <input type="file" class="form-control" name="foto">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
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
