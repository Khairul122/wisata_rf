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
              <?php include 'controller/kunjungan.php'; ?>
              <div class="card shadow-sm">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                    <h4 class="card-title text-primary mb-3 mb-md-0">Data Kunjungan Wisata</h4>
                    <div class="d-flex flex-column flex-md-row gap-2">
                      <form method="GET" action="index.php" class="mb-2 mb-md-0 me-md-2">
                        <input type="hidden" name="page" value="kunjungan">
                        <div class="input-group">
                          <select name="filter_tahun" class="form-select" style="max-width: 150px;">
                            <option value="">Semua Tahun</option>
                            <?php 
                            // Get unique years from data
                            $years = [];
                            foreach($data_kunjungan as $item) {
                              if (!in_array($item['tahun'], $years)) {
                                $years[] = $item['tahun'];
                              }
                            }
                            sort($years);
                            foreach($years as $year) {
                              $selected = isset($_GET['filter_tahun']) && $_GET['filter_tahun'] == $year ? 'selected' : '';
                              echo '<option value="'.$year.'" '.$selected.'>'.$year.'</option>';
                            }
                            ?>
                          </select>
                          <input type="text" name="search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" class="form-control" placeholder="Cari objek wisata...">
                          <button class="btn btn-primary" type="submit">
                            <i class="mdi mdi-magnify"></i>
                          </button>
                        </div>
                      </form>
                      <a href="index.php?page=kunjungan_tambah" class="btn btn-primary d-flex align-items-center">
                        <i class="mdi mdi-plus-circle-outline me-1"></i>
                        Tambah Kunjungan
                      </a>
                    </div>
                  </div>

                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="bg-light">
                        <tr>
                          <th class="text-center" width="5%">No</th>
                          <th width="40%">Nama Objek Wisata</th>
                          <th width="15%">Tahun</th>
                          <th width="25%">Jumlah Pengunjung</th>
                          <th class="text-center" width="15%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (count($data_kunjungan) > 0): ?>
                          <?php 
                          $no = isset($_GET['page_no']) ? (($_GET['page_no'] - 1) * 10) + 1 : 1;
                          $current_year = null;
                          foreach ($data_kunjungan as $index => $row): 
                            $is_new_year = $current_year !== $row['tahun'];
                            if ($is_new_year) {
                              $current_year = $row['tahun'];
                            }
                          ?>
                            <?php if ($is_new_year): ?>
                              <tr class="bg-light">
                                <td colspan="5" class="fw-bold text-primary">
                                  <i class="mdi mdi-calendar-clock me-1"></i>
                                  Tahun <?= $row['tahun'] ?>
                                </td>
                              </tr>
                            <?php endif; ?>
                            <tr>
                              <td class="text-center"><?= $no++ ?></td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <i class="mdi mdi-map-marker-radius text-danger me-2"></i>
                                  <span class="fw-medium"><?= htmlspecialchars($row['nama_objek']) ?></span>
                                </div>
                              </td>
                              <td><?= $row['tahun'] ?></td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                    <?php 
                                    // Find max visitors to calculate percentage
                                    $max_visitors = 0;
                                    foreach($data_kunjungan as $item) {
                                      if ($item['jumlah_pengunjung'] > $max_visitors) {
                                        $max_visitors = $item['jumlah_pengunjung'];
                                      }
                                    }
                                    $percentage = ($row['jumlah_pengunjung'] / $max_visitors) * 100;
                                    ?>
                                    <div class="progress-bar bg-success" style="width: <?= $percentage ?>%"></div>
                                  </div>
                                  <span class="text-nowrap"><?= number_format($row['jumlah_pengunjung'], 0, ',', '.') ?> orang</span>
                                </div>
                              </td>
                              <td class="text-center">
                                <div class="btn-group" role="group">
                                  <a href="index.php?page=kunjungan_edit&id=<?= $row['id_kunjungan'] ?>" 
                                     class="btn btn-warning btn-sm" 
                                     data-bs-toggle="tooltip" 
                                     title="Edit Data">
                                    <i class="mdi mdi-pencil"></i>
                                  </a>
                                  <a href="javascript:void(0)" 
                                     onclick="confirmDelete(<?= $row['id_kunjungan'] ?>, '<?= htmlspecialchars(addslashes($row['nama_objek'])) ?>', '<?= $row['tahun'] ?>')" 
                                     class="btn btn-danger btn-sm"
                                     data-bs-toggle="tooltip"
                                     title="Hapus Data">
                                    <i class="mdi mdi-delete"></i>
                                  </a>
                                </div>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="5" class="text-center py-4">
                              <div class="d-flex flex-column align-items-center">
                                <i class="mdi mdi-chart-line text-secondary" style="font-size: 3rem;"></i>
                                <p class="mt-2 mb-0">Tidak ada data kunjungan</p>
                                <?php if (isset($_GET['search']) || isset($_GET['filter_tahun'])): ?>
                                  <p class="text-muted">Pencarian tidak menghasilkan data</p>
                                  <a href="index.php?page=kunjungan" class="btn btn-outline-primary mt-2">Reset Filter</a>
                                <?php else: ?>
                                  <a href="index.php?page=kunjungan_tambah" class="btn btn-primary mt-3">
                                    <i class="mdi mdi-plus-circle-outline me-1"></i>
                                    Tambah Data Kunjungan
                                  </a>
                                <?php endif; ?>
                              </div>
                            </td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                  
                  <?php if (isset($total_pages) && $total_pages > 1): ?>
                  <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-end">
                      <?php 
                      $current_page = isset($_GET['page_no']) ? $_GET['page_no'] : 1;
                      $prev_page = $current_page > 1 ? $current_page - 1 : 1;
                      $next_page = $current_page < $total_pages ? $current_page + 1 : $total_pages;
                      ?>
                      
                      <li class="page-item <?= $current_page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="index.php?page=kunjungan&page_no=<?= $prev_page ?><?= isset($_GET['search']) ? '&search='.htmlspecialchars($_GET['search']) : '' ?><?= isset($_GET['filter_tahun']) ? '&filter_tahun='.htmlspecialchars($_GET['filter_tahun']) : '' ?>" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      
                      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= $i == $current_page ? 'active' : '' ?>">
                          <a class="page-link" href="index.php?page=kunjungan&page_no=<?= $i ?><?= isset($_GET['search']) ? '&search='.htmlspecialchars($_GET['search']) : '' ?><?= isset($_GET['filter_tahun']) ? '&filter_tahun='.htmlspecialchars($_GET['filter_tahun']) : '' ?>"><?= $i ?></a>
                        </li>
                      <?php endfor; ?>
                      
                      <li class="page-item <?= $current_page == $total_pages ? 'disabled' : '' ?>">
                        <a class="page-link" href="index.php?page=kunjungan&page_no=<?= $next_page ?><?= isset($_GET['search']) ? '&search='.htmlspecialchars($_GET['search']) : '' ?><?= isset($_GET['filter_tahun']) ? '&filter_tahun='.htmlspecialchars($_GET['filter_tahun']) : '' ?>" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                  <?php endif; ?>

                  <!-- Summary Stats -->
                  <?php if (count($data_kunjungan) > 0): ?>
                  <div class="row mt-4">
                    <div class="col-12">
                      <div class="card bg-light">
                        <div class="card-body">
                          <h5 class="card-title mb-3">Ringkasan Kunjungan</h5>
                          <div class="row">
                            <?php
                            // Calculate summary statistics
                            $total_visitors = 0;
                            $years_data = [];
                            $locations_data = [];
                            
                            foreach($data_kunjungan as $item) {
                              $total_visitors += $item['jumlah_pengunjung'];
                              
                              if (!isset($years_data[$item['tahun']])) {
                                $years_data[$item['tahun']] = 0;
                              }
                              $years_data[$item['tahun']] += $item['jumlah_pengunjung'];
                              
                              if (!isset($locations_data[$item['nama_objek']])) {
                                $locations_data[$item['nama_objek']] = 0;
                              }
                              $locations_data[$item['nama_objek']] += $item['jumlah_pengunjung'];
                            }
                            
                            // Sort and find top locations
                            arsort($locations_data);
                            $top_location = key($locations_data);
                            $top_location_visitors = reset($locations_data);
                            
                            // Year with highest visitors
                            arsort($years_data);
                            $top_year = key($years_data);
                            $top_year_visitors = reset($years_data);
                            ?>
                            
                            <div class="col-md-4 mb-3 mb-md-0">
                              <div class="d-flex align-items-center">
                                <i class="mdi mdi-account-group text-primary me-3" style="font-size: 2.5rem;"></i>
                                <div>
                                  <h6 class="text-muted mb-1">Total Pengunjung</h6>
                                  <h4 class="mb-0"><?= number_format($total_visitors, 0, ',', '.') ?> orang</h4>
                                </div>
                              </div>
                            </div>
                            
                            <div class="col-md-4 mb-3 mb-md-0">
                              <div class="d-flex align-items-center">
                                <i class="mdi mdi-map-marker text-danger me-3" style="font-size: 2.5rem;"></i>
                                <div>
                                  <h6 class="text-muted mb-1">Objek Paling Diminati</h6>
                                  <h4 class="mb-0"><?= htmlspecialchars($top_location) ?></h4>
                                  <small class="text-success"><?= number_format($top_location_visitors, 0, ',', '.') ?> pengunjung</small>
                                </div>
                              </div>
                            </div>
                            
                            <div class="col-md-4">
                              <div class="d-flex align-items-center">
                                <i class="mdi mdi-calendar-star text-info me-3" style="font-size: 2.5rem;"></i>
                                <div>
                                  <h6 class="text-muted mb-1">Tahun Terpadat</h6>
                                  <h4 class="mb-0"><?= $top_year ?></h4>
                                  <small class="text-success"><?= number_format($top_year_visitors, 0, ',', '.') ?> pengunjung</small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Konfirmasi Hapus -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus data kunjungan <strong id="locationName"></strong> tahun <strong id="visitYear"></strong>?</p>
          <p class="text-danger mb-0"><small>Tindakan ini tidak dapat dibatalkan.</small></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <a href="#" id="deleteLink" class="btn btn-danger">Hapus</a>
        </div>
      </div>
    </div>
  </div>

  <?php include 'view/template/script.php'; ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Inisialisasi tooltips
      const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
      });
      
      // Filter tahun change handler
      const filterTahun = document.querySelector('select[name="filter_tahun"]');
      if (filterTahun) {
        filterTahun.addEventListener('change', function() {
          this.form.submit();
        });
      }
    });
    
    // Fungsi konfirmasi hapus dengan modal
    function confirmDelete(id, location, year) {
      document.getElementById('locationName').textContent = location;
      document.getElementById('visitYear').textContent = year;
      document.getElementById('deleteLink').href = 'controller/kunjungan.php?aksi=hapus&id=' + id;
      
      const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
      deleteModal.show();
    }
  </script>
</body>
</html>