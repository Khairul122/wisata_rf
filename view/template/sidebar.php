<?php
$menu = [
  [
    'title' => 'Dashboard',
    'icon' => 'mdi-home',
    'url' => 'index.php?page=home',
    'level' => ['admin', 'user']
  ],
  [
    'title' => 'Objek Wisata',
    'icon' => 'mdi-map-marker',
    'url' => 'index.php?page=objek_wisata',
    'level' => ['admin']
  ],
  [
    'title' => 'Fasilitas',
    'icon' => 'mdi-domain',
    'url' => 'index.php?page=fasilitas',
    'level' => ['admin']
  ],
  [
    'title' => 'Kunjungan',
    'icon' => 'mdi-account-multiple-check',
    'url' => 'index.php?page=kunjungan',
    'level' => ['admin']
  ],
  [
    'title' => 'Kriteria',
    'icon' => 'mdi-clipboard-text-outline',
    'url' => 'index.php?page=kriteria',
    'level' => ['admin']
  ],
  [
    'title' => 'Data Sub Kriteria',
    'icon' => 'mdi-format-list-bulleted-type',
    'url' => 'index.php?page=data_kriteria',
    'level' => ['admin']
  ],
  [
    'title' => 'Latih Data',
    'icon' => 'mdi-database-check',
    'url' => 'index.php?page=latih_data',
    'level' => ['admin']
  ],
  [
    'title' => 'Prediksi Wisata',
    'icon' => 'mdi-chart-line',
    'url' => 'index.php?page=hasil_prediksi',
    'level' => ['admin', 'user']
  ],
  [
    'title' => 'Prediksi Potensi',
    'icon' => 'mdi-chart-areaspline',
    'url' => 'index.php?page=prediksi_tambah',
    'level' => ['admin']
  ],
  [
    'title' => 'Evaluasi',
    'icon' => 'mdi-chart-areaspline',
    'url' => 'index.php?page=evaluasi',
    'level' => ['user']
  ]
];

$currentPage = isset($_GET['page']) ? $_GET['page'] : 'home';
$userLevel = isset($_SESSION['level']) ? $_SESSION['level'] : '';
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <?php foreach ($menu as $item): ?>
      <?php if (in_array($userLevel, $item['level'])): ?>
        <li class="nav-item">
          <a class="nav-link <?php echo $currentPage == basename($item['url'], '.php') ? 'active' : ''; ?>" href="<?php echo $item['url']; ?>">
            <i class="mdi <?php echo $item['icon']; ?> menu-icon"></i>
            <span class="menu-title"><?php echo $item['title']; ?></span>
          </a>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</nav>

<style>
  .sidebar .nav .nav-item .nav-link:hover {
    background-color: rgba(108, 114, 147, 0.1);
    color: #0d6efd;
    transition: all 0.3s ease;
    border-left: 3px solid #0d6efd;
  }

  .sidebar .nav .nav-item .nav-link:hover i {
    color: #0d6efd;
  }

  .sidebar .nav .nav-item .nav-link.active {
    background-color: rgba(108, 114, 147, 0.2);
    color: #0d6efd;
    border-left: 3px solid #0d6efd;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var currentLocation = window.location.href;
    var navLinks = document.querySelectorAll('.sidebar .nav .nav-link');

    navLinks.forEach(function(link) {
      if (link.href === currentLocation) {
        link.classList.add('active');
      }
    });
  });
</script>
