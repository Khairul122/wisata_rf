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
                            <?php include 'Controller/objek-wisata.php'; ?>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Objek Wisata</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Objek</th>
                                                    <th>Deskripsi</th>
                                                    <th>Kecamatan</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                    <th>Foto</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($data_wisata as $row): ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['nama_objek'] ?></td>
                                                        <td><?= $row['deskripsi'] ?></td>
                                                        <td><?= $row['kecamatan'] ?></td>
                                                        <td><?= $row['latitude'] ?></td>
                                                        <td><?= $row['longitude'] ?></td>
                                                        <td>
                                                            <?php if (!empty($row['foto'])): ?>
                                                                <img src="uploads/<?= $row['foto'] ?>" width="100">
                                                            <?php else: ?> -
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php if (count($data_wisata) === 0): ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center">Tidak ada data ditemukan</td>
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