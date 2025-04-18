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
            <div class="col-md-8 mx-auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Data Nilai Kriteria</h4>
                  <form action="controller/data-kriteria.php?aksi=insert" method="POST">
                    <div class="form-group">
                      <label for="id_objek">Objek Wisata</label>
                      <select name="id_objek" id="id_objek" class="form-control" required>
                        <option value="">-- Pilih Objek Wisata --</option>
                        <?php
                          include('koneksi.php');
                          $objek = mysqli_query($conn, "SELECT * FROM objek_wisata");
                          while ($row = mysqli_fetch_assoc($objek)) {
                            echo "<option value='".$row['id_objek']."'>".$row['nama_objek']."</option>";
                          }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="id_kriteria">Kriteria</label>
                      <select name="id_kriteria" id="id_kriteria" class="form-control" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <?php
                          $kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
                          while ($row = mysqli_fetch_assoc($kriteria)) {
                            echo "<option value='".$row['id_kriteria']."'>".$row['nama_kriteria']."</option>";
                          }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="nilai">Nilai</label>
                      <input type="number" step="any" name="nilai" id="nilai" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="index.php?page=data_kriteria" class="btn btn-light">Batal</a>
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
