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
                  <h4 class="card-title">Tambah Fasilitas</h4>
                  <form action="controller/fasilitas.php?aksi=tambah" method="POST">
                    <div class="form-group">
                      <label>Objek Wisata</label>
                      <select name="id_objek" class="form-control" required>
                        <option value="">-- Pilih Objek Wisata --</option>
                        <?php
                        include 'koneksi.php';
                        $query = $conn->query("SELECT id_objek, nama_objek FROM objek_wisata ORDER BY nama_objek ASC");
                        while ($row = $query->fetch_assoc()) {
                          echo "<option value='{$row['id_objek']}'>{$row['nama_objek']}</option>";
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Nama Fasilitas</label>
                      <div id="fasilitas-wrapper">
                        <div class="input-group mb-2">
                          <input type="text" name="nama_fasilitas[]" class="form-control" required>
                          <div class="input-group-append">
                            <button class="btn btn-danger remove-fasilitas" type="button">Hapus</button>
                          </div>
                        </div>
                      </div>
                      <button type="button" id="tambah-fasilitas" class="btn btn-primary btn-sm mt-2">+ Tambah Fasilitas</button>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
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
  <script>
    document.getElementById('tambah-fasilitas').addEventListener('click', function() {
      const wrapper = document.getElementById('fasilitas-wrapper');
      const div = document.createElement('div');
      div.classList.add('input-group', 'mb-2');
      div.innerHTML = `
    <input type="text" name="nama_fasilitas[]" class="form-control" required>
    <div class="input-group-append">
      <button class="btn btn-danger remove-fasilitas" type="button">Hapus</button>
    </div>
  `;
      wrapper.appendChild(div);
    });

    document.addEventListener('click', function(e) {
      if (e.target && e.target.classList.contains('remove-fasilitas')) {
        e.target.closest('.input-group').remove();
      }
    });
  </script>

</body>

</html>