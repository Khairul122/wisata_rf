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
                                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                                        <h4 class="card-title text-primary mb-3 mb-md-0">Data Kriteria</h4>
                                        <div class="d-flex flex-column flex-md-row gap-2">
                                         
                                            <a href="index.php?page=kriteria_tambah" class="btn btn-primary d-flex align-items-center">
                                                <i class="mdi mdi-plus-circle-outline me-1"></i>
                                                Tambah Data
                                            </a>
                                        </div>
                                    </div>
                                    <?php include 'controller/kriteria.php'; ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Kriteria</th>
                                                    <th>Penjelasan</th>
                                                    <th>Arah Potensi</th>
                                                    <th>Satuan</th>
                                                    <th>Bobot</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($data_kriteria as $row): ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['nama_kriteria'] ?></td>
                                                        <td><?= $row['penjelasan'] ?></td>
                                                        <td><?= ucfirst($row['arah_potensi']) ?></td>
                                                        <td><?= $row['satuan'] ?></td>
                                                        <td><?= $row['bobot'] ?></td>
                                                        <td>
  <a href="index.php?page=kriteria_edit&id=<?= $row['id_kriteria'] ?>" class="btn btn-warning btn-sm">Edit</a>
  <a href="controller/kriteria.php?aksi=hapus&id=<?= $row['id_kriteria'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
</td>

                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php if (count($data_kriteria) === 0): ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">Belum ada data kriteria</td>
                                                    </tr>
                                                <?php endif; ?>
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
</body>

</html>