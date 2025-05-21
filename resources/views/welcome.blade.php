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
    <div>
    <div class="container-fluid bg-white position-relative p-0">
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
        <a
            href="{{ url('/dashboard') }}"
            class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block"
        >
            Dashboard
        </a>
    @else
        <div class="navbar-nav"> <!-- Tambahkan container flex untuk grouping -->
            <a
                href="{{ route('login') }}"
                class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block"
            >
                LOGIN
            </a>

            @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block"
                >
                    REGISTER
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


        <!-- Feature Start -->
        <div class="container-fluid py-5">
            <div class="container py-5 px-lg-5">
                <div class="row g-4">
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-4">
                            <i class="bi bi-key-fill fa-3x text-primary mb-4"></i>
                            <h5 class="mb-3">Secure Money Tracking</h5>
                            <p class="m-0">Easily record your income and expenses. All data is protected and accessible anytime, anywhere.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="feature-item bg-light rounded text-center p-4">
                            <i class="bi bi-journal-bookmark-fill fa-3x text-primary mb-4"></i>
                            <h5 class="mb-3">Automatic Financial <br>Insights</h5>
                            <p class="m-0">Get visual reports and analytics to better understand your financial habits.</p>
                        </div>  
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item bg-light rounded text-center p-4">
                            <i class="bi bi-bell-fill fa-3x text-primary mb-4"></i>
                            <h5 class="mb-3">Budget Planning & Bill Reminders</h5>
                            <p class="m-0">Set your budget and receive timely alerts to never miss a payment again.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End -->


        <!-- Facts Start -->
        <div class="container-fluid py-5">
            <div class="container py-5 px-lg-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <p class="section-title text-secondary">Why<span></span></p>
                        <h1 class="mb-4">Why managing finances is important?</h1>
                        <p class="mb-4">Managing your finances <b>isn't just about saving money</b>—it's about taking control of your future and securing peace of mind. Did you know that:</p>
                        <div class="skill mb-4">
                            <div class="d-flex justify-content-between">
                                <a class="mb-2" href="https://finhealthnetwork.org/research/understanding-the-mental-financial-health-connection/"><b>40%</b> of Adults Worldwide Experience Financial Stress</a>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="skill mb-4">
                            <div class="d-flex justify-content-between">
                                <a class="mb-2" href="https://www.federalreserve.gov/publications/files/2023-report-economic-well-being-us-households-202405.pdf"><b>38%</b> of People Do Not Set Aside Money for Long-Term Savings</a>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="skill mb-4">
                            <div class="d-flex justify-content-between">
                                <a class="mb-2" href="https://gflec.org/initiatives/global-finlit-survey/"><b>33%</b> of Adults Worldwide Have a Financial Budget</a>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="wow zoomIn img-fluid" data-wow-delay="0.5s" src="img/about.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts End -->


        <!-- Testimonial Start -->
        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <p class="section-title text-secondary justify-content-center"><span></span>Testimonial<span></span></p>
                <h1 class="text-center mb-5">What Say Our Clients!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Teteng Finance really helped me understand where my money goes every month. Simple interface, but powerful insights!</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Rina Andayani</h5>
                                <span>Freelance Graphic Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Dulu uang saya hilang kayak ninja — sekarang, berkat Teteng, saya tahu ternyata saya yang boros. Terima kasih Teteng, sekarang saya bisa miskin dengan sadar.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Yoga Ganteng Pratama</h5>
                                <span>Mantan Ayu Ting Ting</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Dulu saya sering bingung ke mana perginya uang bulanan saya. Setelah pakai Teteng Finance, saya jadi bisa pantau pengeluaran dengan lebih rapi.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Irfan Maulana</h5>
                                <span>Pegawai Swasta</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


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