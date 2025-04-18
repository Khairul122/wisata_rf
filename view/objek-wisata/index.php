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
                            <?php include 'Controller/objek-wisata.php'; ?>
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                                        <h4 class="card-title text-primary mb-3 mb-md-0">Data Objek Wisata</h4>
                                        <div class="d-flex flex-column flex-md-row gap-2">
                                            <form method="GET" action="index.php" class="mb-3 mb-md-0">
                                                <input type="hidden" name="page" value="objek_wisata">
                                                <div class="input-group">
                                                    <input type="text" name="search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" class="form-control" placeholder="Cari Nama Objek">
                                                    <button class="btn btn-primary" type="submit">
                                                        <i class="mdi mdi-magnify"></i>
                                                    </button>
                                                </div>
                                            </form>
                                            <a href="index.php?page=objek_wisata_tambah" class="btn btn-primary d-flex align-items-center">
                                                <i class="mdi mdi-plus-circle-outline me-1"></i>
                                                Tambah Data
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th class="text-center" width="5%">No</th>
                                                    <th width="15%">Nama Objek</th>
                                                    <th width="20%">Deskripsi</th>
                                                    <th width="10%">Kecamatan</th>
                                                    <th width="10%">Latitude</th>
                                                    <th width="10%">Longitude</th>
                                                    <th width="15%">Foto</th>
                                                    <th class="text-center" width="15%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($data_wisata) > 0): ?>
                                                    <?php $no = $offset + 1; foreach ($data_wisata as $row): ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++ ?></td>
                                                            <td class="fw-medium"><?= htmlspecialchars($row['nama_objek']) ?></td>
                                                            <td>
                                                                <div class="text-wrap">
                                                                    <?= htmlspecialchars($row['deskripsi']) ?>
                                                                </div>
                                                            </td>
                                                            <td><?= htmlspecialchars($row['kecamatan']) ?></td>
                                                            <td><?= htmlspecialchars($row['latitude']) ?></td>
                                                            <td><?= htmlspecialchars($row['longitude']) ?></td>
                                                            <td>
                                                                <?php if (!empty($row['foto'])): ?>
                                                                    <img src="uploads/<?= htmlspecialchars($row['foto']) ?>" class="img-thumbnail" width="100" style="cursor:pointer; transition: all 0.3s;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'" onclick="showImageModal(this.src, '<?= htmlspecialchars($row['nama_objek']) ?>')">
                                                                <?php else: ?>
                                                                    <div class="badge bg-light text-secondary">Tidak ada foto</div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="btn-group" role="group">
                                                                    <a href="index.php?page=objek_wisata_edit&id=<?= $row['id_objek'] ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Edit">
                                                                        <i class="mdi mdi-pencil"></i>
                                                                    </a>
                                                                    <a href="controller/objek-wisata.php?aksi=hapus&id=<?= $row['id_objek'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus objek wisata <?= htmlspecialchars($row['nama_objek']) ?>?')" data-bs-toggle="tooltip" title="Hapus">
                                                                        <i class="mdi mdi-delete"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="8" class="text-center py-4">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <i class="mdi mdi-alert-circle text-secondary" style="font-size: 3rem;"></i>
                                                                <p class="mt-2 mb-0">Tidak ada data yang ditemukan</p>
                                                                <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
                                                                    <p class="text-muted">Pencarian untuk "<?= htmlspecialchars($_GET['search']) ?>" tidak menghasilkan data</p>
                                                                    <a href="index.php?page=objek_wisata" class="btn btn-outline-primary mt-2">Reset Pencarian</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <?php if ($totalPage > 1): ?>
                                    <nav aria-label="Page navigation" class="mt-4">
                                        <ul class="pagination justify-content-end">
                                            <?php if ($page > 1): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?page=objek_wisata&p=<?= $page-1 ?>&search=<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                            
                                            <?php 
                                            $startPage = max(1, min($page - 2, $totalPage - 4));
                                            $endPage = min($totalPage, max($page + 2, 5));
                                            
                                            if ($startPage > 1): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?page=objek_wisata&p=1&search=<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">1</a>
                                            </li>
                                            <?php if ($startPage > 2): ?>
                                            <li class="page-item disabled">
                                                <span class="page-link">...</span>
                                            </li>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            
                                            <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                                <a class="page-link" href="index.php?page=objek_wisata&p=<?= $i ?>&search=<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>"><?= $i ?></a>
                                            </li>
                                            <?php endfor; ?>
                                            
                                            <?php if ($endPage < $totalPage): ?>
                                            <?php if ($endPage < $totalPage - 1): ?>
                                            <li class="page-item disabled">
                                                <span class="page-link">...</span>
                                            </li>
                                            <?php endif; ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?page=objek_wisata&p=<?= $totalPage ?>&search=<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>"><?= $totalPage ?></a>
                                            </li>
                                            <?php endif; ?>
                                            
                                            <?php if ($page < $totalPage): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?page=objek_wisata&p=<?= $page+1 ?>&search=<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" aria-label="Next">
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

    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-header bg-white bg-opacity-75 rounded-top">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="text-center p-3 bg-dark bg-opacity-75 rounded-bottom">
                    <img id="modalImage" src="" class="img-fluid rounded shadow-lg" alt="Detail Foto">
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

            const tableWrapper = document.querySelector('.table-responsive');
            if (tableWrapper) {
                tableWrapper.style.overflowX = window.innerWidth < 992 ? 'auto' : 'visible';
                window.addEventListener('resize', function() {
                    tableWrapper.style.overflowX = window.innerWidth < 992 ? 'auto' : 'visible';
                });
            }
        });
        
        function showImageModal(src, title) {
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            modalImage.src = src;
            modalImage.alt = "Foto " + title;
            modalTitle.textContent = title;
            
            const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
            imageModal.show();

            modalImage.classList.add('animate__animated', 'animate__zoomIn');
            modalImage.addEventListener('animationend', function() {
                modalImage.classList.remove('animate__animated', 'animate__zoomIn');
            });
        }
    </script>
</body>
</html>