<?php include('template/header.php'); ?>

<body class="bg-light">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0 justify-content-center">
          <div class="col-lg-4">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4 class="text-center mb-4">Login</h4>
              <form action="index.php?page=auth" method="POST" class="pt-3">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" required>
                </div>
                <div class="form-group mt-3">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
                </div>
                <div class="mt-4 d-grid">
                  <button type="submit" class="btn btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                </div>
              </form>
              <div class="text-center mt-4 font-weight-light">
                Belum punya akun? <a href="#" class="text-primary">Registrasi</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'template/script.php'; ?>
</body>

</html>
