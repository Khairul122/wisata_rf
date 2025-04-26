<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Gayo Lues - Profil</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c7865;
            --secondary-color: #004445;
            --accent-color: #f8b400;
            --light-color: #faf5e4;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        
        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: white !important;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
        }
        
        .nav-link:hover {
            color: white !important;
        }
        
        .btn-login {
            background-color: var(--accent-color);
            color: #333;
            font-weight: 600;
            border: none;
        }
        
        .btn-login:hover {
            background-color: #e0a800;
        }
        
        .hero-section {
            background: linear-gradient(rgba(0, 68, 69, 0.7), rgba(0, 68, 69, 0.7)), 
                        url('https://images.unsplash.com/photo-1588666309990-d68f08e3d4a6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 30px;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        
        .card:hover {
            transform: translateY(-10px);
        }
        
        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: 200px;
            object-fit: cover;
        }
        
        .footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 30px 0;
            margin-top: 50px;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 30px;
            color: var(--secondary-color);
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 50px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 60px 0;
            }
            
            .display-4 {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-mountain me-2"></i>Wisata Gayo Lues
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a href="index.php?page=login" class="btn btn-login">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Profil Wisata Gayo Lues</h1>
            <p class="lead">Menjelajahi Keindahan Alam dan Budaya Tanah Gayo</p>
        </div>
    </section>

    <!-- Profile Section -->
    <section class="profile-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="https://images.unsplash.com/photo-1566438480900-0609be27a4be?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1494&q=80" 
                         alt="Profil Gayo Lues" class="profile-img">
                    <h3 class="mt-3">Kabupaten Gayo Lues</h3>
                    <p class="text-muted">Aceh, Indonesia</p>
                </div>
                <div class="col-md-8">
                    <h2 class="section-title">Tentang Gayo Lues</h2>
                    <p>Kabupaten Gayo Lues adalah salah satu kabupaten di Provinsi Aceh yang kaya akan keindahan alam dan budaya. Dikenal dengan julukan "Bumi Seribu Bukit", Gayo Lues menawarkan panorama alam yang memukau mulai dari air terjun, danau, hingga perkebunan kopi yang terkenal.</p>
                    <p>Budaya masyarakat Gayo yang khas dengan tarian Saman yang telah diakui UNESCO sebagai Warisan Budaya Dunia menjadikan daerah ini sebagai destinasi wisata yang unik dan menarik.</p>
                    
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5><i class="fas fa-map-marker-alt text-primary me-2"></i> Lokasi</h5>
                            <p>Terletak di bagian tenggara Provinsi Aceh, berbatasan dengan Sumatera Utara.</p>
                        </div>
                        <div class="col-md-6">
                            <h5><i class="fas fa-mountain text-primary me-2"></i> Geografis</h5>
                            <p>Wilayah berbukit dengan ketinggian 600-2000 mdpl, suhu sejuk 18-28°C.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Attractions Section -->
    <section class="attractions-section py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Destinasi Unggulan</h2>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1505118380757-91f5f5632de0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1526&q=80" class="card-img-top" alt="Air Terjun">
                        <div class="card-body">
                            <h5 class="card-title">Air Terjun Blang Kolam</h5>
                            <p class="card-text">Air terjun setinggi 75 meter dengan pemandangan hutan tropis yang asri.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1445116572660-236099ec97a0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" class="card-img-top" alt="Perkebunan Kopi">
                        <div class="card-body">
                            <h5 class="card-title">Perkebunan Kopi Gayo</h5>
                            <p class="card-text">Kopi Arabika Gayo terkenal dunia dengan cita rasa unik dan aroma khas.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top" alt="Pegunungan">
                        <div class="card-body">
                            <h5 class="card-title">Pegunungan Burni Telong</h5>
                            <p class="card-text">Gunung berapi aktif dengan pemandangan spektakuler dari puncaknya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Culture Section -->
    <section class="culture-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="section-title">Budaya Gayo</h2>
                    <p>Masyarakat Gayo Lues memiliki budaya yang kaya dan unik. Tarian Saman yang terkenal merupakan warisan budaya dunia yang berasal dari daerah ini. Selain itu, ada juga Didong (seni tutur), Kerawang Gayo (ukiran tradisional), dan berbagai upacara adat.</p>
                    <p>Kopi bukan hanya komoditas ekonomi, tetapi juga bagian dari budaya masyarakat Gayo. Ritual minum kopi menjadi tradisi yang mengikat hubungan sosial.</p>
                </div>
                <div class="col-md-6">
                    <img src="https://images.unsplash.com/photo-1547153760-18fc86324498?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" 
                         alt="Budaya Gayo" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Tentang Kami</h5>
                    <p>Portal informasi wisata Kabupaten Gayo Lues yang menyajikan berbagai destinasi menarik, budaya, dan kuliner khas Gayo.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Merdeka No. 1, Blangkejeren</li>
                        <li><i class="fas fa-phone me-2"></i> (0643) 21001</li>
                        <li><i class="fas fa-envelope me-2"></i> info@wisatagayolues.id</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Sosial Media</h5>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 Wisata Gayo Lues. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>