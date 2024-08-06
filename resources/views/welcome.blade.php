<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <title>Welcome Page</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <link href="{{ asset('assets/css/popup.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="#">Kishan Ambani</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('viewPosts') }}">View Post</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('profile') }}">Profile</a></li>

                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                    <li><a class="getstarted scrollto" href="{{ route('register') }}">Register</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    @if (Session::has('success'))
        <div class="msgpopup">
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show text-center">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif

    @if (Session::has('fail'))
        <div class="msgpopup">
            <div class="alert alert-success bg-danger text-light border-0 alert-dismissible fade show text-center">
                {{ Session::get('fail') }}
            </div>
        </div>
    @endif


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Welcome to our file upload portal!</h1>
                    <h2>Please use the form below to upload your files. We accept PDF, image, and document files.</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="{{ route('uploadPost') }}" class="btn-get-started scrollto">Upload File Here</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About Us</h2>
                </div>

                <div class="row content">
                    <div class="col-lg" style="padding-left: 50px;">
                        <p style="padding-right: 10%;
            text-align: justify;
            padding-left: 10%;">
                            Welcome to our file upload platform! We provide a convenient and secure space for you to
                            upload various file types, including PDFs, images, and documents. Whether you need to store,
                            share, or collaborate on files, our platform offers a user-friendly experience to meet your
                            needs. We prioritize data security and privacy, ensuring your files are kept safe and
                            confidential.
                        </p>
                    </div>
                </div>

            </div>
        </section>
        <!-- End About Us Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Services</h2>
                    <p>File Upload: Easily upload PDF, image, and document files to our platform</p>
                </div>

                <div class="row" style="margin-left: 280px; text-align: center;">
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">

                            <h4><a href="#">Images</a></h4>
                            <img src="https://cdn.iconscout.com/icon/free/png-256/free-image-file-2014959-1700567.png"
                                alt="a" width="150px" height="130px">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <h4><a href="#">PDFs</a></h4>
                            <img src="https://png.pngtree.com/png-clipart/20220612/original/pngtree-pdf-file-icon-png-png-image_7965915.png"
                                alt="b" width="150px" height="130px">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <h4><a href="#">Documents</a></h4>
                            <img src="https://img.freepik.com/premium-vector/modern-flat-design-doc-file-icon-web_599062-7102.jpg"
                                alt="c" width="150px" height="130px">
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Services Section -->

        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="container footer-bottom clearfix">
                <div class="copyright">
                    &copy; Copyright <strong><span>Kishan Ambani</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="#">Kishan Ambani</a>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

</body>

</html>
