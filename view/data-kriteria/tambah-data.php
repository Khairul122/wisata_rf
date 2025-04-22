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
                  <h4 class="card-title">Input Data Kriteria Objek Wisata</h4>
                  <form action="controller/data-kriteria.php?aksi=insert" method="POST">
                    
                    <!-- Objek Wisata -->
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

                    <!-- Total Fasilitas -->
                    <div class="form-group">
                      <label>Total Fasilitas</label>
                      <input type="number" id="total_fasilitas" name="total_fasilitas" class="form-control" readonly>
                    </div>

                    <!-- Total Pengunjung -->
                    <div class="form-group">
                      <label>Total Pengunjung</label>
                      <input type="number" id="total_pengunjung" name="total_pengunjung" class="form-control" readonly>
                    </div>

                    <!-- Akses Jalan (Dropdown) -->
                    <div class="form-group">
                      <label>Akses Jalan</label>
                      <select name="akses_jalan" class="form-control" required>
                        <option value="">-- Pilih Akses Jalan --</option>
                        <option value="5">Mudah</option>
                        <option value="3">Sedang</option>
                        <option value="1">Sulit</option>
                      </select>
                    </div>

                    <!-- Rating Pengunjung -->
                    <div class="form-group">
                      <label>Rating Pengunjung</label>
                      <input type="number" step="any" name="rating_pengunjung" class="form-control" required>
                    </div>

                    <!-- Jarak ke Kota -->
                    <div class="form-group">
                      <label>Jarak ke Kota (KM)</label>
                      <input type="number" step="any" name="jarak_ke_kota" class="form-control" required>
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

  <!-- AJAX Script -->
  <script>
    document.getElementById('id_objek').addEventListener('change', function () {
      var id_objek = this.value;

      if (id_objek) {
        fetch('controller/get_summary.php?id_objek=' + id_objek)
          .then(response => response.json())
          .then(data => {
            document.getElementById('total_fasilitas').value = data.total_fasilitas || 0;
            document.getElementById('total_pengunjung').value = data.total_pengunjung || 0;
          });
      } else {
        document.getElementById('total_fasilitas').value = '';
        document.getElementById('total_pengunjung').value = '';
      }
    });
  </script>
</body>

</html>
