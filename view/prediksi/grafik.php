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
                  <h4 class="card-title">Visualisasi Potensi Objek Wisata Gayo Lues</h4>
                  <p class="card-description">Analisis visual berdasarkan data klasifikasi Random Forest</p>
                  
                  <div class="row">
                    <div class="col-md-6 grid-margin">
                      <div class="card bg-light">
                        <div class="card-body">
                          <h5 class="text-center">Distribusi Kategori Potensi Wisata</h5>
                          <div style="height: 300px;">
                            <canvas id="categoryDistribution"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 grid-margin">
                      <div class="card bg-light">
                        <div class="card-body">
                          <h5 class="text-center">Rata-rata Jumlah Pengunjung per Kategori</h5>
                          <div style="height: 300px;">
                            <canvas id="visitorsByCategory"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6 grid-margin">
                      <div class="card bg-light">
                        <div class="card-body">
                          <h5 class="text-center">Perbandingan Rata-rata Nilai Kriteria</h5>
                          <div style="height: 300px;">
                            <canvas id="criteriaComparison"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 grid-margin">
                      <div class="card bg-light">
                        <div class="card-body">
                          <h5 class="text-center">Distribusi Jumlah Fasilitas</h5>
                          <div style="height: 300px;">
                            <canvas id="facilitiesDistribution"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12 grid-margin">
                      <div class="card bg-light">
                        <div class="card-body">
                          <h5 class="text-center">Detail Nilai Kriteria Berdasarkan Kategori Potensi</h5>
                          <div class="table-responsive">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Kategori</th>
                                  <th>Jumlah Objek</th>
                                  <th>Fasilitas</th>
                                  <th>Akses Jalan</th>
                                  <th>Rating Pengunjung</th>
                                  <th>Jumlah Pengunjung</th>
                                  <th>Jarak ke Kota (km)</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><span class="badge badge-success">Tinggi</span></td>
                                  <td>8</td>
                                  <td>7.5</td>
                                  <td>4.0</td>
                                  <td>4.44</td>
                                  <td>50,548.88</td>
                                  <td>14.35</td>
                                </tr>
                                <tr>
                                  <td><span class="badge badge-warning">Sedang</span></td>
                                  <td>10</td>
                                  <td>5.4</td>
                                  <td>2.4</td>
                                  <td>4.38</td>
                                  <td>3,821.30</td>
                                  <td>22.73</td>
                                </tr>
                                <tr>
                                  <td><span class="badge badge-danger">Rendah</span></td>
                                  <td>12</td>
                                  <td>5.5</td>
                                  <td>3.5</td>
                                  <td>3.96</td>
                                  <td>2,750.00</td>
                                  <td>9.63</td>
                                </tr>
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
        </div>
      </div>
    </div>
  </div>
  <?php include 'view/template/script.php'; ?>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const categories = ["Sedang", "Tinggi", "Rendah"];
      const categoryData = [10, 8, 12];
      const avgVisitors = [3821.3, 50548.875, 2750];
      const criteriaLabels = ["Fasilitas", "Akses Jalan", "Rating Pengunjung", "Jarak ke Kota"];
      const criteriaData = {
        "Sedang": [5.4, 2.4, 4.38, 22.73],
        "Tinggi": [7.5, 4.0, 4.44, 14.35],
        "Rendah": [5.5, 3.5, 3.96, 9.63]
      };
      const facilityValues = ["1", "2", "3", "4", "5", "6", "7", "8"];
      const facilityFrequency = [2, 2, 1, 3, 2, 2, 7, 11];

      const categoryColors = {
        "Tinggi": "rgba(114, 124, 245, 0.7)",   
        "Sedang": "rgba(255, 190, 11, 0.7)",     
        "Rendah": "rgba(252, 92, 101, 0.7)"      
      };
      const categoryBorders = {
        "Tinggi": "rgba(114, 124, 245, 1)",
        "Sedang": "rgba(255, 190, 11, 1)",
        "Rendah": "rgba(252, 92, 101, 1)"
      };

      const ctxCategory = document.getElementById('categoryDistribution').getContext('2d');
      new Chart(ctxCategory, {
        type: 'pie',
        data: {
          labels: categories,
          datasets: [{
            data: categoryData,
            backgroundColor: categories.map(cat => categoryColors[cat]),
            borderColor: categories.map(cat => categoryBorders[cat]),
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'right'
            },
            tooltip: {
              callbacks: {
                label: function(context) {
                  const label = context.label || '';
                  const value = context.raw || 0;
                  const total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                  const percentage = Math.round((value / total) * 100);
                  return `${label}: ${value} objek (${percentage}%)`;
                }
              }
            }
          }
        }
      });

      const ctxVisitors = document.getElementById('visitorsByCategory').getContext('2d');
      new Chart(ctxVisitors, {
        type: 'bar',
        data: {
          labels: categories,
          datasets: [{
            label: 'Rata-rata Jumlah Pengunjung',
            data: avgVisitors,
            backgroundColor: categories.map(cat => categoryColors[cat]),
            borderColor: categories.map(cat => categoryBorders[cat]),
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true,
              title: {
                display: true,
                text: 'Jumlah Pengunjung'
              }
            }
          },
          plugins: {
            tooltip: {
              callbacks: {
                label: function(context) {
                  const value = context.raw;
                  return `Rata-rata: ${value.toLocaleString()} pengunjung`;
                }
              }
            }
          }
        }
      });

      const ctxCriteria = document.getElementById('criteriaComparison').getContext('2d');
      new Chart(ctxCriteria, {
        type: 'radar',
        data: {
          labels: criteriaLabels,
          datasets: categories.map(category => ({
            label: category,
            data: criteriaData[category],
            backgroundColor: `${categoryColors[category].slice(0, -4)}0.2)`,
            borderColor: categoryBorders[category],
            pointBackgroundColor: categoryBorders[category],
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: categoryBorders[category],
            borderWidth: 2
          }))
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            r: {
              min: 0,
              ticks: {
                backdropColor: 'rgba(255, 255, 255, 0)'
              }
            }
          }
        }
      });

      const ctxFacilities = document.getElementById('facilitiesDistribution').getContext('2d');
      new Chart(ctxFacilities, {
        type: 'bar',
        data: {
          labels: facilityValues,
          datasets: [{
            label: 'Jumlah Objek Wisata',
            data: facilityFrequency,
            backgroundColor: 'rgba(0, 187, 221, 0.7)', 
            borderColor: 'rgba(0, 187, 221, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            x: {
              title: {
                display: true,
                text: 'Jumlah Fasilitas'
              }
            },
            y: {
              beginAtZero: true,
              title: {
                display: true,
                text: 'Jumlah Objek Wisata'
              }
            }
          }
        }
      });
    });
  </script>
</body>

</html>