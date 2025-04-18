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
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title mb-0">Data Nilai Kriteria</h4>
                                        <a href="index.php?page=data_kriteria_tambah" class="btn btn-primary btn-sm">+ Tambah Data</a>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <form action="" method="GET" class="form-inline">
                                                <input type="hidden" name="page" value="data_kriteria">
                                                <div class="form-group mr-2">
                                                    <select name="filter_objek" class="form-control form-control-sm">
                                                        <option value="">Semua Objek Wisata</option>
                                                        <?php
                                                        include('koneksi.php');
                                                        $query_objek = "SELECT id_objek, nama_objek FROM objek_wisata ORDER BY nama_objek";
                                                        $result_objek = mysqli_query($conn, $query_objek);
                                                        while ($row_objek = mysqli_fetch_assoc($result_objek)) {
                                                            $selected = (isset($_GET['filter_objek']) && $_GET['filter_objek'] == $row_objek['id_objek']) ? 'selected' : '';
                                                            echo "<option value='" . $row_objek['id_objek'] . "' $selected>" . $row_objek['nama_objek'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-info">Filter</button>
                                                <?php if (isset($_GET['filter_objek'])): ?>
                                                <a href="index.php?page=data_kriteria" class="btn btn-sm btn-outline-secondary ml-2">Reset</a>
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Cari..." style="width: 200px; float: right;">
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" id="dataTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Objek Wisata</th>
                                                    <th>Fasilitas</th>
                                                    <th>Akses Jalan</th>
                                                    <th>Rating Pengunjung</th>
                                                    <th>Jumlah Pengunjung</th>
                                                    <th>Jarak ke Kota</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $where = "";
                                                
                                                if (isset($_GET['filter_objek']) && $_GET['filter_objek'] != '') {
                                                    $where .= " WHERE ow.id_objek = '" . $_GET['filter_objek'] . "'";
                                                }
                                                
                                                $query = "SELECT 
                                                    ow.id_objek,
                                                    ow.nama_objek,
                                                    MAX(CASE WHEN k.id_kriteria = 1 THEN dk.nilai ELSE NULL END) as fasilitas,
                                                    MAX(CASE WHEN k.id_kriteria = 2 THEN dk.nilai ELSE NULL END) as akses_jalan,
                                                    MAX(CASE WHEN k.id_kriteria = 3 THEN dk.nilai ELSE NULL END) as rating_pengunjung,
                                                    MAX(CASE WHEN k.id_kriteria = 4 THEN dk.nilai ELSE NULL END) as jumlah_pengunjung,
                                                    MAX(CASE WHEN k.id_kriteria = 6 THEN dk.nilai ELSE NULL END) as jarak_kota
                                                FROM 
                                                    objek_wisata ow
                                                LEFT JOIN 
                                                    data_kriteria dk ON ow.id_objek = dk.id_objek
                                                LEFT JOIN 
                                                    kriteria k ON dk.id_kriteria = k.id_kriteria
                                                $where
                                                GROUP BY 
                                                    ow.id_objek, ow.nama_objek
                                                ORDER BY 
                                                    ow.nama_objek";
                                                
                                                $result = mysqli_query($conn, $query);
                                                $row_count = mysqli_num_rows($result);
                                                
                                                if ($row_count > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo htmlspecialchars($row['nama_objek']); ?></td>
                                                        <td><?php echo ($row['fasilitas'] !== NULL) ? htmlspecialchars($row['fasilitas']) : '-'; ?></td>
                                                        <td>
                                                            <?php 
                                                            if ($row['akses_jalan'] !== NULL) {
                                                                $akses = (int)$row['akses_jalan'];
                                                                if ($akses == 5) echo "Mudah";
                                                                elseif ($akses == 3) echo "Sedang";
                                                                elseif ($akses == 1) echo "Sulit";
                                                                else echo htmlspecialchars($row['akses_jalan']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo ($row['rating_pengunjung'] !== NULL) ? htmlspecialchars($row['rating_pengunjung']) : '-'; ?></td>
                                                        <td><?php echo ($row['jumlah_pengunjung'] !== NULL) ? number_format($row['jumlah_pengunjung'], 0, ',', '.') : '-'; ?></td>
                                                        <td><?php echo ($row['jarak_kota'] !== NULL) ? htmlspecialchars($row['jarak_kota']) . ' km' : '-'; ?></td>
                                                        <td class="text-center">
                                                            <a href="index.php?page=data_kriteria_edit&id_objek=<?php echo $row['id_objek']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                            <a href="controller/data-kriteria.php?aksi=delete_all&id_objek=<?php echo $row['id_objek']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus semua kriteria untuk objek wisata ini?')">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php 
                                                    }
                                                } else {
                                                ?>
                                                    <tr>
                                                        <td colspan="8" class="text-center">Tidak ada data yang ditemukan</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <p>Menampilkan <?php echo $row_count; ?> data objek wisata</p>
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
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>