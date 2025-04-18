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
                            <?php 
                            $limit = 10; 
                            $page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
                            $offset = ($page - 1) * $limit;
                            
                            include 'controller/fasilitas.php'; 
                            ?>
                            
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                                        <h4 class="card-title text-primary mb-3 mb-md-0">Data Fasilitas</h4>
                                        <div class="d-flex flex-column flex-md-row gap-2">
                                            <form method="GET" action="index.php" class="mb-2 mb-md-0 me-md-2">
                                                <input type="hidden" name="page" value="fasilitas">
                                                <div class="input-group">
                                                    <select name="filter_objek" class="form-select" style="max-width: 200px;">
                                                        <option value="">Semua Objek Wisata</option>
                                                        <?php 
                                                        $objek_list = getAllObjekWisata($conn); 
                                                        foreach($objek_list as $objek) {
                                                            $selected = isset($_GET['filter_objek']) && $_GET['filter_objek'] == $objek['id_objek'] ? 'selected' : '';
                                                            echo '<option value="'.$objek['id_objek'].'" '.$selected.'>'.$objek['nama_objek'].'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                    <input type="text" name="search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" class="form-control" placeholder="Cari fasilitas...">
                                                    <button class="btn btn-primary" type="submit">
                                                        <i class="mdi mdi-magnify"></i>
                                                    </button>
                                                </div>
                                            </form>
                                            <a href="index.php?page=fasilitas_tambah" class="btn btn-primary d-flex align-items-center">
                                                <i class="mdi mdi-plus-circle-outline me-1"></i>
                                                Tambah Fasilitas
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th class="text-center" width="5%">No</th>
                                                    <th width="40%">Nama Objek Wisata</th>
                                                    <th width="40%">Fasilitas</th>
                                                    <th class="text-center" width="15%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($data_fasilitas) > 0): ?>
                                                    <?php 
                                                    $no = $offset + 1;
                                                    $current_objek = '';
                                                    $objek_count = 0;
                                                    
                                                    foreach ($data_fasilitas as $index => $row): 

                                                        if ($current_objek != $row['id_objek']) {
                                                            $current_objek = $row['id_objek'];
                                                            $objek_count++;
                                                            $show_row = true;
                                                            $rowspan = 1;
                                                            
                                                            foreach ($data_fasilitas as $count_row) {
                                                                if ($count_row['id_objek'] == $current_objek && $index != array_search($count_row, $data_fasilitas)) {
                                                                    $rowspan++;
                                                                }
                                                            }
                                                        } else {
                                                            $show_row = false;
                                                        }
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++ ?></td>
                                                        <?php if ($show_row): ?>
                                                        <td class="fw-medium text-wrap align-middle" <?= $rowspan > 1 ? "rowspan=\"$rowspan\"" : "" ?>>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge bg-primary text-white rounded-circle me-2"><?= $objek_count ?></span>
                                                                <?= htmlspecialchars($row['nama_objek']) ?>
                                                            </div>
                                                        </td>
                                                        <?php endif; ?>
                                                        <td class="text-wrap">
                                                            <div class="d-flex align-items-center">
                                                                <i class="mdi mdi-checkbox-marked-circle-outline text-success me-2"></i>
                                                                <?= htmlspecialchars($row['nama_fasilitas']) ?>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group">
                                                                <a href="index.php?page=fasilitas_edit&id=<?= $row['id_fasilitas'] ?>" 
                                                                   class="btn btn-warning btn-sm" 
                                                                   data-bs-toggle="tooltip" 
                                                                   title="Edit Fasilitas">
                                                                    <i class="mdi mdi-pencil"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" 
                                                                   onclick="confirmDelete(<?= $row['id_fasilitas'] ?>, '<?= htmlspecialchars(addslashes($row['nama_fasilitas'])) ?>')" 
                                                                   class="btn btn-danger btn-sm"
                                                                   data-bs-toggle="tooltip"
                                                                   title="Hapus Fasilitas">
                                                                    <i class="mdi mdi-delete"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center py-4">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <i class="mdi mdi-package-variant text-secondary" style="font-size: 3rem;"></i>
                                                                <p class="mt-2 mb-0">Tidak ada data fasilitas</p>
                                                                <?php if (isset($_GET['search']) || isset($_GET['filter_objek'])): ?>
                                                                    <p class="text-muted">Pencarian tidak menghasilkan data</p>
                                                                    <a href="index.php?page=fasilitas" class="btn btn-outline-primary mt-2">Reset Filter</a>
                                                                <?php else: ?>
                                                                    <a href="index.php?page=fasilitas_tambah" class="btn btn-primary mt-3">
                                                                        <i class="mdi mdi-plus-circle-outline me-1"></i>
                                                                        Tambah Fasilitas Pertama
                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <?php if ($total_pages > 1): ?>
                                    <nav aria-label="Page navigation" class="mt-4">
                                        <ul class="pagination justify-content-end">
                                            <?php if ($page > 1): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?page=fasilitas&p=<?= $page-1 ?><?= isset($_GET['search']) ? '&search='.htmlspecialchars($_GET['search']) : '' ?><?= isset($_GET['filter_objek']) ? '&filter_objek='.htmlspecialchars($_GET['filter_objek']) : '' ?>" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                            
                                            <?php 
                                            $start_page = max(1, min($page - 2, $total_pages - 4));
                                            $end_page = min($total_pages, max($page + 2, 5));
                                            
                                            if ($start_page > 1): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?page=fasilitas&p=1<?= isset($_GET['search']) ? '&search='.htmlspecialchars($_GET['search']) : '' ?><?= isset($_GET['filter_objek']) ? '&filter_objek='.htmlspecialchars($_GET['filter_objek']) : '' ?>">1</a>
                                            </li>
                                            <?php if ($start_page > 2): ?>
                                            <li class="page-item disabled">
                                                <span class="page-link">...</span>
                                            </li>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            
                                            <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                                <a class="page-link" href="index.php?page=fasilitas&p=<?= $i ?><?= isset($_GET['search']) ? '&search='.htmlspecialchars($_GET['search']) : '' ?><?= isset($_GET['filter_objek']) ? '&filter_objek='.htmlspecialchars($_GET['filter_objek']) : '' ?>"><?= $i ?></a>
                                            </li>
                                            <?php endfor; ?>
                                            
                                            <?php if ($end_page < $total_pages): ?>
                                            <?php if ($end_page < $total_pages - 1): ?>
                                            <li class="page-item disabled">
                                                <span class="page-link">...</span>
                                            </li>
                                            <?php endif; ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?page=fasilitas&p=<?= $total_pages ?><?= isset($_GET['search']) ? '&search='.htmlspecialchars($_GET['search']) : '' ?><?= isset($_GET['filter_objek']) ? '&filter_objek='.htmlspecialchars($_GET['filter_objek']) : '' ?>"><?= $total_pages ?></a>
                                            </li>
                                            <?php endif; ?>
                                            
                                            <?php if ($page < $total_pages): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?page=fasilitas&p=<?= $page+1 ?><?= isset($_GET['search']) ? '&search='.htmlspecialchars($_GET['search']) : '' ?><?= isset($_GET['filter_objek']) ? '&filter_objek='.htmlspecialchars($_GET['filter_objek']) : '' ?>" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus fasilitas <strong id="facilityName"></strong>?</p>
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
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            const filterObjek = document.querySelector('select[name="filter_objek"]');
            if (filterObjek) {
                filterObjek.addEventListener('change', function() {
                    if (document.querySelector('input[name="search"]').value === '') {
                        this.form.submit();
                    }
                });
            }
        });

        function confirmDelete(id, name) {
            document.getElementById('facilityName').textContent = name;
            document.getElementById('deleteLink').href = 'controller/fasilitas.php?aksi=hapus&id=' + id;
            
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }
    </script>
</body>
</html>