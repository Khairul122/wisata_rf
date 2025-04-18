<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = $conn->query("SELECT * FROM fasilitas WHERE id_fasilitas = '$id'");
$data = $query->fetch_assoc();
?>

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
            <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Fasilitas</h4>
                  <form action="controller/fasilitas.php?aksi=update" method="POST">
                    <input type="hidden" name="id_fasilitas" value="<?= $data['id_fasilitas'] ?>">
                    <div class="form-group">
                      <label>Objek Wisata</label>
                      <select name="id_objek" class="form-control" required>
                        <option value="">-- Pilih Objek Wisata --</option>
                        <?php
                        $objek = $conn->query("SELECT id_objek, nama_objek FROM objek_wisata ORDER BY nama_objek ASC");
                        while ($row = $objek->fetch_assoc()) {
                          $selected = $row['id_objek'] == $data['id_objek'] ? 'selected' : '';
                          echo "<option value='{$row['id_objek']}' $selected>{$row['nama_objek']}</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nama Fasilitas</label>
                      <input type="text" name="nama_fasilitas" class="form-control" value="<?= $data['nama_fasilitas'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="index.php?page=fasilitas" class="btn btn-secondary">Kembali</a>
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
