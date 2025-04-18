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
                                    <h4 class="card-title">Input Data untuk Prediksi</h4>
                                    <form action="controller/prediksi.php" method="POST">
                                        <div class="form-group">
                                            <label>Objek Wisata</label>
                                            <select name="id_objek" class="form-control" required>
                                                <option value="">-- Pilih Objek Wisata --</option>
                                                <?php
                                                $objek = mysqli_query($conn, "SELECT * FROM objek_wisata ORDER BY nama_objek ASC");
                                                while ($row = mysqli_fetch_assoc($objek)) {
                                                    echo "<option value='{$row['id_objek']}'>{$row['nama_objek']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <?php
                                        include('koneksi.php');
                                        $query = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY id_kriteria ASC");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <div class="form-group">
                                                <label><?php echo $row['nama_kriteria']; ?></label>
                                                <input type="number" step="any" name="kriteria[<?php echo $row['id_kriteria']; ?>]" class="form-control" required>
                                            </div>
                                        <?php } ?>
                                        <button type="submit" class="btn btn-success">Prediksi</button>
                                        <a href="index.php" class="btn btn-light">Batal</a>
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
</body>

</html>