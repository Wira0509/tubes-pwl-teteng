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
                        <a href="{{ route('home') }}" class="nav-item nav-link active mx-5">Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link mx-5">About</a>
                        <a href="{{ route('ourteam') }}" class="nav-item nav-link mx-5">Our Team</a>
                    </div>
                    <!-- <a href="" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Get Started</a> -->
                </div>

               @if (Route::has('login'))
<nav class="flex items-center justify-end gap-4">
    @auth
        <a href="{{ url('/dashboard') }}" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block bg-secondary">
            Dashboard
        </a>
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

            <div class="container-fluid bg-primary hero-header background-transition-header">
                <div class="container px-lg-5">
                    <div class="row g-5 align-items-end">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white animated slideInDown" style="padding-bottom: 7.5rem; font-size: 50px;">Smart Money Management, <br>Made Simple.</h1>
                        </div>
                        <div class="col-lg-6 text-center text-lg-start mt-6">
                            <img class="img-fluid animated zoomIn" src="img/hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- About Start -->
        <div class="container-fluid py-5 bg-primary hero-header background-transition-header">
            <div class="container my-5 py-5 px-lg-5">
                <div class="row g-5 py-5">
                    <div class="col-12 text-center">
                        <h1 class="text-white animated slideInDown">About Us</h1>
                        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->



        <!-- Main Start -->
        <div class="container-fluid py-2">
            <div class="container px-lg-5">
                <div class="row g-5 text-center">
                    <h1 class="about-text-hl">Teteng Finance.</h1>
                    <div class="about-text bg-light rounded text-center p-4">
                        <p>Managing personal cash flow is often overlooked — yet it’s one of the most essential habits for financial stability.
                        Many individuals still rely on manual notes, inconsistent records, or even nothing at all, leading to confusion about where their money goes.</p>
                    </div>
                    <div class="about-text about-text-lg ">
                        <p><span class="h2 about-text-hl-2">Teteng Finance</span> was built to change that.</p>
                    </div>
                    <div class="about-text bg-light rounded text-center p-4">
                        <p>We focus on helping individuals track their income and expenses with <span class="stabilo-hl">ease</span>. Teteng Finance provides a clear overview of your daily, weekly, or monthly cash flow — but with more control and customization.</p>
                    </div>
                    <h1 class="about-text-hl">What makes us different?</h1>
                    <div class="about-text bg-light rounded text-center p-4">
                        <p>We're <span class="stabilo-hl">simple, focused, and personal</span>. With features like categorized transactions, financial summaries, and reminders, managing your money becomes effortless — so you can make better decisions, every day.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main End -->

        
        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="g-5 row justify-content-between">
                    <div class="col-md-6 col-lg-3 py-5">
                        <p class="section-title text-white h5 mb-4">Address<span></span></p>
                        <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope me-3"></i>info@tetengfinance.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <p class="section-title text-white h5 mb-4">Quick Link<span></span></p>
                        <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                        <a class="btn btn-link" href="{{ route('ourteam') }}">Our Team</a>
                        <!-- <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">Career</a> -->
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">TetengFinance</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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