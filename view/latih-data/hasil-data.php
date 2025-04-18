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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Hasil Klasifikasi Objek Wisata (Random Forest)</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                      <thead class="table-dark text-center">
                        <tr>
                          <th>No</th>
                          <?php
                          $file = fopen('model/data_random_forest.csv', 'r');
                          $header = fgetcsv($file);
                          foreach ($header as $head) {
                            echo "<th>" . htmlspecialchars($head) . "</th>";
                          }
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        while (($data = fgetcsv($file)) !== FALSE):
                          $label = strtolower(end($data));
                          $rowColor = '';
                          if ($label === 'rendah') $rowColor = 'style="color:green;font-weight:bold"';
                          elseif ($label === 'sedang') $rowColor = 'style="color:orange;font-weight:bold"';
                          elseif ($label === 'tinggi') $rowColor = 'style="color:red;font-weight:bold"';
                          echo "<tr><td class='text-center'>{$no}</td>";
                          foreach ($data as $i => $value) {
                            if ($i === count($data) - 1) {
                              echo "<td $rowColor>" . htmlspecialchars($value) . "</td>";
                            } else {
                              echo "<td>" . htmlspecialchars($value) . "</td>";
                            }
                          }
                          echo "</tr>";
                          $no++;
                        endwhile;
                        fclose($file);
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- PETA -->
          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Peta Lokasi Objek Wisata</h4>
                  <div class="input-group mb-3">
                    <input type="text" id="searchBox" class="form-control" placeholder="Cari nama objek wisata..." />
                  </div>
                  <div id="map" class="w-100 rounded" style="height: 500px;"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- LOG MODEL -->
          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Riwayat Pelatihan Model</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class="table-light">
                        <tr class="text-center">
                          <th>No</th>
                          <th>Tanggal Latih</th>
                          <th>Akurasi</th>
                          <th>Presisi</th>
                          <th>Recall</th>
                          <th>F1-Score</th>
                          <th>Jumlah Pohon</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include('koneksi.php');
                        $log_query = mysqli_query($conn, "SELECT * FROM log_model ORDER BY tanggal_latih DESC");
                        $no = 1;
                        while ($log = mysqli_fetch_assoc($log_query)) {
                          echo "<tr class='text-center'>
                                  <td>{$no}</td>
                                  <td>{$log['tanggal_latih']}</td>
                                  <td>{$log['akurasi']}</td>
                                  <td>{$log['presisi']}</td>
                                  <td>{$log['recal']}</td>
                                  <td>{$log['f1_score']}</td>
                                  <td>{$log['jumlah_pohon']}</td>
                                </tr>";
                          $no++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <?php include 'view/template/script.php'; ?>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <script>
    const map = L.map('map').setView([4.1, 96.7], 8);
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
      attribution: 'Leaflet | © OpenStreetMap contributors',
      minZoom: 7,
      maxZoom: 18
    }).addTo(map);

    const markers = [];
  </script>

  <?php
  $csvData = [];
  $csv = fopen('model/data_random_forest.csv', 'r');
  $headers = fgetcsv($csv);
  include('koneksi.php');

  while (($row = fgetcsv($csv)) !== FALSE) {
    $csvData[] = array_combine($headers, $row);
  }
  fclose($csv);

  foreach ($csvData as $item) {
    $nama = mysqli_real_escape_string($conn, $item['objek_wisata']);
    $label = strtolower(trim($item['label']));
    $color = $label === 'tinggi' ? 'red' : ($label === 'sedang' ? 'orange' : 'green');

    $q = mysqli_query($conn, "SELECT * FROM objek_wisata WHERE nama_objek = '$nama' LIMIT 1");
    if ($objek = mysqli_fetch_assoc($q)) {
      $foto = $objek['foto'] ? 'uploads/' . $objek['foto'] : 'uploads/default.jpg';
      $popup = "<b>{$objek['nama_objek']}</b><br>
                Kecamatan: {$objek['kecamatan']}<br>
                Label: <span style='color:$color;font-weight:bold;'>{$item['label']}</span><br>
                <img src='$foto' width='200'>";
      $namaJS = addslashes($objek['nama_objek']);

      echo "<script>
        const marker_{$objek['id_objek']} = L.marker([{$objek['latitude']}, {$objek['longitude']}], {
          icon: L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-{$color}.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
          })
        }).addTo(map).bindPopup(" . json_encode($popup) . ");
        marker_{$objek['id_objek']}.nama_objek = \"{$namaJS}\";
        markers.push(marker_{$objek['id_objek']});
      </script>";
    }
  }
  ?>

  <script>
    document.getElementById('searchBox').addEventListener('input', function () {
      const keyword = this.value.toLowerCase();
      markers.forEach(marker => {
        if (marker.nama_objek.toLowerCase().includes(keyword) && keyword.length > 1) {
          map.setView(marker.getLatLng(), 14);
          marker.openPopup();
        }
      });
    });
  </script>
</body>
</html>