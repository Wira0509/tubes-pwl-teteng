<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TetengFinance.</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.io" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid bg-white p-0">
        <!-- Spinner Start -->
            <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        <!-- Spinner End -->


       <!-- Navbar & Hero Start -->
       <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">TetengFinance.</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="{{ route('home') }}" class="nav-item nav-link mx-5">Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link mx-5">About</a>
                        <a href="{{ route('ourteam') }}" class="nav-item nav-link mx-5 active">Our Team</a>
                    </div>
                    <!-- <a href="" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Get Started</a> -->
                </div>

              @if (Route::has('login'))
<nav class="flex items-center justify-end gap-4">
    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ url('/admin/dashboard') }}" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block bg-secondary">
                Dashboard
            </a>
        @elseif(auth()->user()->role === 'user')
            <a href="{{ url('/user') }}" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block bg-secondary">
                Dashboard
            </a>
        @endif
    @else
        <div class="navbar-nav"> <!-- Tambahkan container flex untuk grouping -->
            <a
                href="{{ route('login') }}"
                class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block bg-warning"
            >
                Login
            </a>

            @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block bg-info"
                >
                    Register
                </a>
            @endif
            </div>
        @endauth
        </nav>
        @endif
        </header>


            </nav>
        <!-- Navbar & Hero End -->

        <!-- Main Start -->
        <div class="container-fluid py-5 bg-primary hero-header background-transition-header">
            <div class="container my-5 py-5 px-lg-5">
                <div class="row g-5 py-5">
                    <div class="col-12 text-center">
                        <h1 class="text-white animated slideInDown">Our Team</h1>
                        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    </div>
                </div>
            </div>
        </div>
        <!-- Main End -->

<!-- Team Start -->
<div class="container-fluid">
    <div class="container px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Our Team<span></span></p>
            <h1 class="text-center mb-5">Our Team Members</h1>
        </div>
        <div class="row g-4 py-5 justify-content-center">
            <!-- Member 1 -->
            <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light rounded h-100 d-flex flex-column justify-content-between">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="img/ALDRIK.jpg" alt="" style="width: 150px; height: 150px; object-fit: cover;">
                        <h5>Aldrik Noel Sianipar</h5>
                        <span>FOUNDER</span>
                    </div>
                    <div class="d-flex justify-content-center p-4 mt-auto">
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <!-- Member 2 -->
            <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item bg-light rounded h-100 d-flex flex-column justify-content-between">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="img/WIRA.jpg" alt="" style="width: 150px; height: 150px; object-fit: cover;">
                        <h5>Wira Hari Pratama</h5>
                        <span>FOUNDER</span>
                    </div>
                    <div class="d-flex justify-content-center p-4 mt-auto">
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <!-- Member 3 -->
            <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light rounded h-100 d-flex flex-column justify-content-between">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="img/RAFI.jpg" alt="" style="width: 150px; height: 150px; object-fit: cover;">
                        <h5>Rafi Andara Nasution</h5>
                        <span>FOUNDER</span>
                    </div>
                    <div class="d-flex justify-content-center p-4 mt-auto">
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <!-- Member 4 -->
            <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="team-item bg-light rounded h-100 d-flex flex-column justify-content-between">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="img/YOSIA.jpg" alt="" style="width: 150px; height: 150px; object-fit: cover;">
                        <h5>Yosia Marcel Koreshy</h5>
                        <span>FOUNDER</span>
                    </div>
                    <div class="d-flex justify-content-center p-4 mt-auto">
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <!-- Member 5 -->
            <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item bg-light rounded h-100 d-flex flex-column justify-content-between">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="img/LEONDO.jpg" alt="" style="width: 150px; height: 150px; object-fit: cover;">
                        <h5>Leondo Admiral</h5>
                        <span>FOUNDER</span>
                    </div>
                    <div class="d-flex justify-content-center p-4 mt-auto">
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <!-- Member 6 -->
            <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="team-item bg-light rounded h-100 d-flex flex-column justify-content-between">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="img/team-2.jpg" alt="" style="width: 150px; height: 150px; object-fit: cover;">
                        <h5>Salwa Halila</h5>
                        <span>FOUNDER</span>
                    </div>
                    <div class="d-flex justify-content-center p-4 mt-auto">
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>