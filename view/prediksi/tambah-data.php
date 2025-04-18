<?php 
include('view/template/header.php'); 
include('koneksi.php'); 
?>

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
                  <h4 class="card-title">Input Data untuk Prediksi</h4>
                  <form action="controller/prediksi.php" method="POST">

                    <!-- Dropdown Objek Wisata -->
                    <div class="form-group">
                      <label>Objek Wisata</label>
                      <select name="id_objek" class="form-control" required>
                        <option value="">-- Pilih Objek Wisata --</option>
                        <?php
                        $objek = mysqli_query($conn, "SELECT * FROM objek_wisata ORDER BY nama_objek ASC");
                        while ($row = mysqli_fetch_assoc($objek)) {
                          echo "<option value='{$row['id_objek']}'>{$row['nama_objek']}</option>";
                        }
                        ?>
                      </select>
                    </div>

                    <!-- Input Kriteria Dinamis -->
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY id_kriteria ASC");
                    while ($row = mysqli_fetch_assoc($query)) {
                      $id_kriteria = $row['id_kriteria'];
                      $nama_kriteria = $row['nama_kriteria'];
                    ?>
                      <div class="form-group">
                        <label><?php echo $nama_kriteria; ?></label>
                        <?php if (strtolower($nama_kriteria) === 'akses jalan') { ?>
                          <select name="kriteria[<?php echo $id_kriteria; ?>]" class="form-control" required>
                            <option value="">-- Pilih Akses --</option>
                            <option value="3">Mudah</option>
                            <option value="2">Sedang</option>
                            <option value="1">Sulit</option>
                            <option value="1">Susah</option>
                          </select>
                        <?php } else { ?>
                          <input type="number" step="any" name="kriteria[<?php echo $id_kriteria; ?>]" class="form-control" required>
                        <?php } ?>
                      </div>
                    <?php } ?>

                    <!-- Tombol -->
                    <button type="submit" class="btn btn-success">Prediksi</button>
                    <a href="index.php" class="btn btn-light">Batal</a>
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
