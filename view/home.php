<?php 
include('template/header.php');
include_once('koneksi.php'); 
?>

<body class="with-welcome-text">
  <div class="container-scroller">
    <?php include 'template/navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'template/setting_panel.php'; ?>
      <?php include 'template/sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card card-rounded bg-primary">
                <div class="card-body pb-0">
                  <h4 class="card-title card-title-dash text-white mb-4">Selamat Datang di Sistem Prediksi Potensi Wisata</h4>
                  <div class="row">
                    <div class="col-sm-8">
                      <p class="text-white mb-4">
                        Sistem ini menggunakan metode Random Forest untuk memprediksi potensi pengembangan objek wisata
                        berdasarkan berbagai kriteria seperti fasilitas, akses jalan, rating pengunjung, jumlah pengunjung,
                        dan jarak ke kota.
                      </p>
                    </div>
                    <div class="col-sm-4 text-center">
                      <i class="mdi mdi-map-marker-multiple icon-lg text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h4 class="card-title card-title-dash">Total Objek Wisata</h4>
                    <i class="mdi mdi-map icon-md text-muted"></i>
                  </div>
                  <?php
                  $total_wisata = 0;
                  $query = "SELECT COUNT(*) as total FROM objek_wisata";
                  $result = mysqli_query($conn, $query);
                  if ($result && mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_assoc($result);
                    $total_wisata = $data['total'];
                  }
                  ?>
                  <h2 class="mb-0"><?php echo $total_wisata; ?></h2>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h4 class="card-title card-title-dash">Total Pengunjung</h4>
                    <i class="mdi mdi-account-group icon-md text-muted"></i>
                  </div>
                  <?php
                  $total_pengunjung = 0;
                  $query = "SELECT SUM(jumlah_pengunjung) as total FROM kunjungan_wisata WHERE tahun = 2024";
                  $result = mysqli_query($conn, $query);
                  if ($result && mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_assoc($result);
                    $total_pengunjung = $data['total'] ?: 0;
                  }
                  ?>
                  <h2 class="mb-0"><?php echo number_format($total_pengunjung); ?></h2>
                  <p class="text-muted">Pengunjung (2024)</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h4 class="card-title card-title-dash">Prediksi Terbaru</h4>
                    <i class="mdi mdi-chart-bar icon-md text-muted"></i>
                  </div>
                  <?php
                  $total_prediksi = 0;
                  $query = "SELECT COUNT(*) as total FROM hasil_prediksi";
                  $result = mysqli_query($conn, $query);
                  if ($result && mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_assoc($result);
                    $total_prediksi = $data['total'];
                  }
                  ?>
                  <h2 class="mb-0"><?php echo $total_prediksi; ?></h2>
                  <p class="text-muted">Total Prediksi</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h4 class="card-title card-title-dash">Akurasi Model</h4>
                    <i class="mdi mdi-bullseye-arrow icon-md text-muted"></i>
                  </div>
                  <?php
                  $akurasi = 0;
                  $query = "SELECT akurasi FROM log_model ORDER BY tanggal_latih DESC LIMIT 1";
                  $result = mysqli_query($conn, $query);
                  if ($result && mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_assoc($result);
                    $akurasi = isset($data['akurasi']) ? $data['akurasi'] * 100 : 0;
                  }
                  ?>
                  <h2 class="mb-0"><?php echo number_format($akurasi, 2); ?>%</h2>
                  <p class="text-muted">Model Terbaru</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Top Destinations and Recent Predictions -->
          <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body">
                  <h4 class="card-title">Top 10 Objek Wisata Berdasarkan Pengunjung (2024)</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Objek Wisata</th>
                          <th>Rating</th>
                          <th>Jml Pengunjung</th>
                          <th>Fasilitas</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "SELECT ow.id_objek, ow.nama_objek, 
                                  (SELECT nilai FROM data_kriteria dk WHERE dk.id_objek = ow.id_objek AND dk.id_kriteria = 3) as rating,
                                  kw.jumlah_pengunjung,
                                  (SELECT COUNT(*) FROM fasilitas f WHERE f.id_objek = ow.id_objek) as jml_fasilitas
                                  FROM objek_wisata ow
                                  JOIN kunjungan_wisata kw ON ow.id_objek = kw.id_objek
                                  WHERE kw.tahun = 2024
                                  ORDER BY kw.jumlah_pengunjung DESC
                                  LIMIT 10";
                        $result = mysqli_query($conn, $query);
                        if ($result) {
                          $no = 1;
                          while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['nama_objek']; ?></td>
                            <td>
                              <div class="d-flex align-items-center">
                                <span><?php echo $row['rating']; ?></span>
                                <i class="mdi mdi-star text-warning ms-1"></i>
                              </div>
                            </td>
                            <td><?php echo number_format($row['jumlah_pengunjung']); ?></td>
                            <td><?php echo $row['jml_fasilitas']; ?> fasilitas</td>
                          </tr>
                        <?php 
                          }
                        } else {
                          echo "<tr><td colspan='5' class='text-center'>Data tidak tersedia</td></tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body">
                  <h4 class="card-title">Prediksi Terbaru</h4>
                  <div class="list-wrapper">
                    <ul class="list-group list-group-flush">
                      <?php
                      $query = "SELECT hp.tanggal, hp.hasil, ow.nama_objek, ow.foto
                                FROM hasil_prediksi hp
                                JOIN objek_wisata ow ON hp.id_objek = ow.id_objek
                                ORDER BY hp.tanggal DESC
                                LIMIT 5";
                      $result = mysqli_query($conn, $query);
                      if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          $badgeClass = "";
                          if ($row['hasil'] == "Tinggi") {
                            $badgeClass = "badge-success";
                          } elseif ($row['hasil'] == "Sedang") {
                            $badgeClass = "badge-warning";
                          } else {
                            $badgeClass = "badge-danger";
                          }
                      ?>
                        <li class="list-group-item border-0 d-flex align-items-center px-0 py-2">
                          <div class="me-3">
                            <?php if (!empty($row['foto'])) : ?>
                              <img src="uploads/<?= htmlspecialchars($row['foto']) ?>" alt="thumbnail" class="rounded-circle" width="40" height="40">
                            <?php else : ?>
                              <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="mdi mdi-image text-white"></i>
                              </div>
                            <?php endif; ?>
                          </div>
                          <div class="d-flex flex-column flex-grow-1">
                            <h6 class="mb-1"><?php echo $row['nama_objek']; ?></h6>
                            <p class="mb-0 text-muted" style="font-size: 0.8rem;">
                              <?php echo date('d M Y', strtotime($row['tanggal'])); ?>
                            </p>
                          </div>
                          <span class="badge <?php echo $badgeClass; ?>"><?php echo $row['hasil']; ?></span>
                        </li>
                      <?php } 
                      } else {
                        echo "<li class='list-group-item border-0 text-center'>Belum ada data prediksi</li>";
                      }
                      ?>
                    </ul>
                  </div>
                  <div class="d-flex justify-content-center mt-3">
                    <a href="prediksi.php" class="btn btn-primary btn-sm">Lihat Semua</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Feature Importance -->
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body">
                  <h4 class="card-title">Tingkat Kepentingan Fitur dalam Model Prediksi</h4>
                  <?php
                  $fitur_importance = [];
                  $query = "SELECT fitur_terpenting FROM log_model ORDER BY tanggal_latih DESC LIMIT 1";
                  $result = mysqli_query($conn, $query);
                  if ($result && mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_assoc($result);
                    if (!empty($data['fitur_terpenting'])) {
                      $fitur_importance = json_decode($data['fitur_terpenting'], true);
                      
                      // Sort by importance (high to low)
                      if (is_array($fitur_importance)) {
                        arsort($fitur_importance);
                      } else {
                        $fitur_importance = [];
                      }
                    }
                  }
                  
                  if (!empty($fitur_importance)) { 
                  ?>
                  <div class="mt-3">
                    <?php foreach ($fitur_importance as $fitur => $importance) : ?>
                      <div class="mb-3">
                        <p class="mb-2"><?php echo ucfirst(str_replace('_', ' ', $fitur)); ?></p>
                        <div class="progress">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $importance * 100; ?>%" aria-valuenow="<?php echo $importance * 100; ?>" aria-valuemin="0" aria-valuemax="100">
                            <?php echo number_format($importance * 100, 1); ?>%
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <?php } else { ?>
                    <p class="text-center my-4">Data fitur belum tersedia</p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>

        </div>
        <?php 
        // Check if footer file exists before including
        $footer_path = 'template/footer.php';
        if (file_exists($footer_path)) {
            include $footer_path;
        }
        ?>
      </div>
    </div>
  </div>
  <?php include 'template/script.php'; ?>
</body>
</html>