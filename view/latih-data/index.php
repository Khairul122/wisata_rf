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
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                    <h4 class="card-title mb-0">Data Kriteria (Data Awal)</h4>
                    <div>
                      <?php 
                      $model_json_path = 'model/model.json';
                      if (file_exists($model_json_path)) {
                        $model_time = date("d-m-Y H:i:s", filemtime($model_json_path));
                        echo "<span class='badge badge-success mr-2'><i class='mdi mdi-check-circle'></i> Model tersedia</span>";
                      } else {
                        echo "<span class='badge badge-warning mr-2'><i class='mdi mdi-alert-circle'></i> Model belum dilatih</span>";
                      }
                      ?>
                      <a href="controller/latih-data.php" class="btn btn-success btn-sm" onclick="return confirm('Latih data sekarang?')">
                        <i class="mdi mdi-brain"></i> Latih Data
                      </a>
                    </div>
                  </div>
                  
                  <div class="table-responsive mb-4">
                    <table class="table table-bordered table-hover">
                      <thead class="thead-light">
                        <tr>
                          <th width="5%">No</th>
                          <th width="35%">Objek Wisata</th>
                          <th width="35%">Kriteria</th>
                          <th width="25%">Nilai</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include('koneksi.php');
                        $no = 1;
                        $query = "SELECT dk.id_data_kriteria, ow.nama_objek, k.nama_kriteria, dk.nilai
                                  FROM data_kriteria dk
                                  JOIN objek_wisata ow ON dk.id_objek = ow.id_objek
                                  JOIN kriteria k ON dk.id_kriteria = k.id_kriteria";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                          echo "<tr><td colspan='4'>Query gagal: " . mysqli_error($conn) . "</td></tr>";
                        } else {
                          while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $row['nama_objek']; ?></td>
                          <td><?php echo $row['nama_kriteria']; ?></td>
                          <td><?php echo $row['nilai']; ?></td>
                        </tr>
                        <?php
                          }
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Model Random Forest</h4>
                  
                  <div class="row mb-4">
                    <div class="col-md-3 col-sm-6 grid-margin stretch-card">
                      <div class="card bg-light border">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <i class="mdi mdi-file-table text-primary icon-lg"></i>
                            <div class="ml-3">
                              <h6>Data Latih</h6>
                              <?php if(file_exists('model/data_latih.csv')): ?>
                                <p class="mb-0 text-success">Tersedia</p>
                              <?php else: ?>
                                <p class="mb-0 text-muted">Belum tersedia</p>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6 grid-margin stretch-card">
                      <div class="card bg-light border">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <i class="mdi mdi-file-table-outline text-danger icon-lg"></i>
                            <div class="ml-3">
                              <h6>Data Uji</h6>
                              <?php if(file_exists('model/data_uji.csv')): ?>
                                <p class="mb-0 text-success">Tersedia</p>
                              <?php else: ?>
                                <p class="mb-0 text-muted">Belum tersedia</p>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6 grid-margin stretch-card">
                      <div class="card bg-light border">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <i class="mdi mdi-json text-warning icon-lg"></i>
                            <div class="ml-3">
                              <h6>Metadata</h6>
                              <?php if(file_exists('model/model.json')): ?>
                                <p class="mb-0 text-success">Tersedia</p>
                              <?php else: ?>
                                <p class="mb-0 text-muted">Belum tersedia</p>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6 grid-margin stretch-card">
                      <div class="card bg-light border">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <i class="mdi mdi-brain text-success icon-lg"></i>
                            <div class="ml-3">
                              <h6>Model</h6>
                              <?php if(file_exists('model/model.pkl')): ?>
                                <p class="mb-0 text-success">Tersedia</p>
                              <?php else: ?>
                                <p class="mb-0 text-muted">Belum tersedia</p>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="mt-4">
                    <ul class="nav nav-tabs nav-tabs-line" id="modelDataTabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="training-tab" data-toggle="tab" href="#training-data" role="tab" aria-controls="training-data" aria-selected="true">
                          <i class="mdi mdi-table"></i> Data Latih
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="testing-tab" data-toggle="tab" href="#testing-data" role="tab" aria-controls="testing-data" aria-selected="false">
                          <i class="mdi mdi-clipboard-text"></i> Data Uji
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="model-info-tab" data-toggle="tab" href="#model-info" role="tab" aria-controls="model-info" aria-selected="false">
                          <i class="mdi mdi-information-outline"></i> Informasi Model
                        </a>
                      </li>
                    </ul>
                    
                    <div class="tab-content border-bottom border-left border-right p-3" id="modelDataTabsContent">
                      <div class="tab-pane fade show active" id="training-data" role="tabpanel">
                        <?php
                        $training_file = 'model/data_latih.csv';
                        if (file_exists($training_file)) {
                          $csv_data = array_map('str_getcsv', file($training_file));
                          $headers = array_shift($csv_data);
                          
                          if (count($csv_data) > 0) {
                            echo '<div class="row mb-2">';
                            echo '<div class="col-md-6">';
                            echo '<div class="alert alert-info">';
                            echo '<i class="mdi mdi-information-outline"></i> Total data latih: <strong>' . count($csv_data) . '</strong> baris';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            
                            echo '<div class="table-responsive">';
                            echo '<table class="table table-bordered table-striped table-hover">';
                            echo '<thead class="thead-dark"><tr>';
                            echo '<th>No</th>';
                            foreach ($headers as $header) {
                              echo '<th>' . htmlspecialchars($header) . '</th>';
                            }
                            echo '</tr></thead>';
                            echo '<tbody>';
                            
                            $row_num = 1;
                            foreach ($csv_data as $row) {
                              echo '<tr>';
                              echo '<td>' . $row_num++ . '</td>';
                              foreach ($row as $cell) {
                                echo '<td>' . htmlspecialchars($cell) . '</td>';
                              }
                              echo '</tr>';
                            }
                            
                            echo '</tbody></table></div>';
                          } else {
                            echo '<div class="alert alert-warning"><i class="mdi mdi-alert"></i> File data latih tersedia tetapi kosong.</div>';
                          }
                        } else {
                          echo '<div class="alert alert-warning">';
                          echo '<i class="mdi mdi-alert"></i> File data latih belum tersedia. Silahkan latih data terlebih dahulu.';
                          echo '</div>';
                        }
                        ?>
                      </div>
                      
                      <div class="tab-pane fade" id="testing-data" role="tabpanel">
                        <?php
                        $testing_file = 'model/data_uji.csv';
                        if (file_exists($testing_file)) {
                          $csv_data = array_map('str_getcsv', file($testing_file));
                          $headers = array_shift($csv_data);
                          
                          if (count($csv_data) > 0) {
                            echo '<div class="row mb-2">';
                            echo '<div class="col-md-6">';
                            echo '<div class="alert alert-info">';
                            echo '<i class="mdi mdi-information-outline"></i> Total data uji: <strong>' . count($csv_data) . '</strong> baris';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            
                            echo '<div class="table-responsive">';
                            echo '<table class="table table-bordered table-striped table-hover">';
                            echo '<thead class="thead-dark"><tr>';
                            echo '<th>No</th>';
                            foreach ($headers as $header) {
                              echo '<th>' . htmlspecialchars($header) . '</th>';
                            }
                            echo '</tr></thead>';
                            echo '<tbody>';
                            
                            $row_num = 1;
                            foreach ($csv_data as $row) {
                              echo '<tr>';
                              echo '<td>' . $row_num++ . '</td>';
                              foreach ($row as $cell) {
                                echo '<td>' . htmlspecialchars($cell) . '</td>';
                              }
                              echo '</tr>';
                            }
                            
                            echo '</tbody></table></div>';
                          } else {
                            echo '<div class="alert alert-warning"><i class="mdi mdi-alert"></i> File data uji tersedia tetapi kosong.</div>';
                          }
                        } else {
                          echo '<div class="alert alert-warning">';
                          echo '<i class="mdi mdi-alert"></i> File data uji belum tersedia. Silahkan latih data terlebih dahulu.';
                          echo '</div>';
                        }
                        ?>
                      </div>
                      
                      <div class="tab-pane fade" id="model-info" role="tabpanel">
                        <?php
                        $model_json = 'model/model.json';
                        if (file_exists($model_json)) {
                          $model_data = json_decode(file_get_contents($model_json), true);
                          
                          if ($model_data) {
                            echo '<div class="row">';
                            
                            echo '<div class="col-md-6 grid-margin">';
                            echo '<div class="card">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title"><i class="mdi mdi-chart-histogram text-primary"></i> Statistik Model</h5>';
                            echo '<div class="table-responsive mt-3">';
                            echo '<table class="table table-striped">';
                            echo '<tbody>';
                            echo '<tr><td width="40%"><strong>Jumlah Data Latih</strong></td><td>' . $model_data['jumlah_data_latih'] . '</td></tr>';
                            echo '<tr><td><strong>Jumlah Data Uji</strong></td><td>' . $model_data['jumlah_data_uji'] . '</td></tr>';
                            
                            $total = $model_data['jumlah_data_latih'] + $model_data['jumlah_data_uji'];
                            $train_percent = round(($model_data['jumlah_data_latih'] / $total) * 100);
                            $test_percent = round(($model_data['jumlah_data_uji'] / $total) * 100);
                            
                            echo '<tr><td><strong>Rasio Train:Test</strong></td><td>' . $train_percent . '%:' . $test_percent . '%</td></tr>';
                            echo '<tr><td><strong>Waktu Pelatihan</strong></td><td>' . date("d-m-Y H:i:s", filemtime($model_json)) . '</td></tr>';
                            echo '</tbody></table>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            
                            echo '<div class="card mt-3">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title"><i class="mdi mdi-tag-multiple text-success"></i> Label Unik</h5>';
                            echo '<div class="mt-3">';
                            foreach ($model_data['label_unik'] as $label) {
                              echo '<span class="badge badge-pill badge-primary mr-2 p-2 mb-2">' . htmlspecialchars($label) . '</span>';
                            }
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            
                            echo '<div class="col-md-6 grid-margin">';
                            echo '<div class="card">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title"><i class="mdi mdi-arrange-bring-forward text-warning"></i> Fitur yang Digunakan</h5>';
                            echo '<div class="table-responsive mt-3">';
                            echo '<table class="table table-bordered table-striped">';
                            echo '<thead><tr><th width="10%">No</th><th>Nama Fitur</th></tr></thead>';
                            echo '<tbody>';
                            $feature_num = 1;
                            foreach ($model_data['fitur'] as $feature) {
                              echo '<tr>';
                              echo '<td>' . $feature_num++ . '</td>';
                              echo '<td>' . htmlspecialchars($feature) . '</td>';
                              echo '</tr>';
                            }
                            echo '</tbody></table>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            
                            echo '</div>';
                          } else {
                            echo '<div class="alert alert-danger"><i class="mdi mdi-alert-circle"></i> Format JSON metadata model tidak valid.</div>';
                          }
                        } else {
                          echo '<div class="alert alert-warning">';
                          echo '<i class="mdi mdi-alert"></i> Metadata model belum tersedia. Silahkan latih data terlebih dahulu.';
                          echo '</div>';
                        }
                        ?>
                      </div>
                    </div>
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
  
  <script>
    $(document).ready(function() {
      function activateTabFromHash() {
        var hash = window.location.hash;
        if (hash) {
          var tab = $('a[href="' + hash + '"]');
          if (tab.length) {
            tab.tab('show');
          }
        }
      }
      
      activateTabFromHash();
      
      $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var id = $(e.target).attr('href');
        if (history.pushState) {
          history.pushState(null, null, id);
        } else {
          location.hash = id;
        }
      });
      
      $(window).on('hashchange', function() {
        activateTabFromHash();
      });
    });
  </script>
</body>

</html>