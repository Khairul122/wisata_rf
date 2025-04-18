<?php include('view/template/header.php'); ?>

<?php
include('koneksi.php');

$id_objek = isset($_GET['id_objek']) ? $_GET['id_objek'] : 0;

$query_objek = "SELECT * FROM objek_wisata WHERE id_objek = '$id_objek'";
$result_objek = mysqli_query($conn, $query_objek);
$data_objek = mysqli_fetch_assoc($result_objek);

if (!$data_objek) {
  echo "<script>alert('Objek wisata tidak ditemukan!'); window.location='index.php?page=data_kriteria';</script>";
  exit;
}

$data_kriteria = [];
$query_kriteria = "SELECT dk.*, k.nama_kriteria 
                  FROM data_kriteria dk 
                  JOIN kriteria k ON dk.id_kriteria = k.id_kriteria 
                  WHERE dk.id_objek = '$id_objek'";
$result_kriteria = mysqli_query($conn, $query_kriteria);

while ($row = mysqli_fetch_assoc($result_kriteria)) {
  $data_kriteria[$row['id_kriteria']] = [
    'id_data_kriteria' => $row['id_data_kriteria'],
    'nilai' => $row['nilai'],
    'nama_kriteria' => $row['nama_kriteria']
  ];
}
?>

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
                  <h4 class="card-title">Edit Data Nilai Kriteria untuk "<?php echo htmlspecialchars($data_objek['nama_objek']); ?>"</h4>
                  
                  <form action="controller/data-kriteria.php?aksi=update_all" method="POST">
                    <input type="hidden" name="id_objek" value="<?php echo $id_objek; ?>">
                    
                    <div class="form-group">
                      <label for="nama_objek">Objek Wisata</label>
                      <input type="text" class="form-control" value="<?php echo htmlspecialchars($data_objek['nama_objek']); ?>" readonly>
                      <small class="form-text text-muted">Objek wisata tidak dapat diubah di sini</small>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nilai_1">Fasilitas</label>
                          <?php
                          $id_data_kriteria_1 = isset($data_kriteria[1]) ? $data_kriteria[1]['id_data_kriteria'] : '';
                          $nilai_1 = isset($data_kriteria[1]) ? $data_kriteria[1]['nilai'] : '';
                          ?>
                          <input type="hidden" name="id_data_kriteria[1]" value="<?php echo $id_data_kriteria_1; ?>">
                          <input type="number" step="any" name="nilai[1]" id="nilai_1" class="form-control" value="<?php echo $nilai_1; ?>" placeholder="Jumlah fasilitas">
                          <small class="form-text text-muted">Jumlah fasilitas yang tersedia</small>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nilai_2">Akses Jalan</label>
                          <?php
                          $id_data_kriteria_2 = isset($data_kriteria[2]) ? $data_kriteria[2]['id_data_kriteria'] : '';
                          $nilai_2 = isset($data_kriteria[2]) ? $data_kriteria[2]['nilai'] : '';
                          ?>
                          <input type="hidden" name="id_data_kriteria[2]" value="<?php echo $id_data_kriteria_2; ?>">
                          <select name="nilai[2]" id="nilai_2" class="form-control">
                            <option value="">-- Pilih Akses Jalan --</option>
                            <option value="5" <?php echo ($nilai_2 == 5) ? 'selected' : ''; ?>>Mudah</option>
                            <option value="3" <?php echo ($nilai_2 == 3) ? 'selected' : ''; ?>>Sedang</option>
                            <option value="1" <?php echo ($nilai_2 == 1) ? 'selected' : ''; ?>>Sulit</option>
                          </select>
                          <small class="form-text text-muted">Tingkat kesulitan akses jalan</small>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nilai_3">Rating Pengunjung</label>
                          <?php
                          $id_data_kriteria_3 = isset($data_kriteria[3]) ? $data_kriteria[3]['id_data_kriteria'] : '';
                          $nilai_3 = isset($data_kriteria[3]) ? $data_kriteria[3]['nilai'] : '';
                          ?>
                          <input type="hidden" name="id_data_kriteria[3]" value="<?php echo $id_data_kriteria_3; ?>">
                          <input type="number" step="0.1" min="1" max="5" name="nilai[3]" id="nilai_3" class="form-control" value="<?php echo $nilai_3; ?>" placeholder="Rating 1-5">
                          <small class="form-text text-muted">Rating dari pengunjung (skala 1-5)</small>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nilai_4">Jumlah Pengunjung</label>
                          <?php
                          $id_data_kriteria_4 = isset($data_kriteria[4]) ? $data_kriteria[4]['id_data_kriteria'] : '';
                          $nilai_4 = isset($data_kriteria[4]) ? $data_kriteria[4]['nilai'] : '';
                          ?>
                          <input type="hidden" name="id_data_kriteria[4]" value="<?php echo $id_data_kriteria_4; ?>">
                          <input type="number" step="1" min="0" name="nilai[4]" id="nilai_4" class="form-control" value="<?php echo $nilai_4; ?>" placeholder="Total pengunjung">
                          <small class="form-text text-muted">Total jumlah pengunjung</small>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nilai_6">Jarak ke Kota (km)</label>
                          <?php
                          $id_data_kriteria_6 = isset($data_kriteria[6]) ? $data_kriteria[6]['id_data_kriteria'] : '';
                          $nilai_6 = isset($data_kriteria[6]) ? $data_kriteria[6]['nilai'] : '';
                          ?>
                          <input type="hidden" name="id_data_kriteria[6]" value="<?php echo $id_data_kriteria_6; ?>">
                          <input type="number" step="0.1" min="0" name="nilai[6]" id="nilai_6" class="form-control" value="<?php echo $nilai_6; ?>" placeholder="Jarak dalam km">
                          <small class="form-text text-muted">Jarak ke pusat kota dalam kilometer</small>
                        </div>
                      </div>
                    </div>
                    
                    <div class="mt-4">
                      <button type="submit" class="btn btn-success">Simpan Semua Perubahan</button>
                      <a href="index.php?page=data_kriteria" class="btn btn-light">Batal</a>
                    </div>
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