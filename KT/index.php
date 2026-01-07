<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Car wash</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  
</head>

<body class="full-wrapper">
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">                                                                                          
                                                <li><a href="index.php">Avaleht</a></li>
                                                <li><a href="kalkulaator.php">Autopesu kalkulaator</a></li>
                                                <li><a href="services.html">Teenused</a></li>
                                                <li><a href="contact.php">Kontakt</a>
                                                    <!-- <ul class="submenu">
                                                        <li><a href="blog.html">Blog</a></li>
                                                        <li><a href="blog_details.html">Blog Details</a></li>
                                                        <li><a href="elements.html">Element</a></li>
                                                    </ul> -->
                                                </li>
                                                <li><a href="contact.html">Ostukorv</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- Header-btn -->
                                </div>
                            </div> 
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

     <style>
        .carousel-item img {
            max-height: 800px;
            object-fit: cover;
        }
    </style>

    <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner img-fluid">
    
        <?php
        $pildid = glob('reklaam/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        shuffle($pildid);
        $active = 'active';

        foreach ($pildid as $pilt) {
            echo '<div class="carousel-item ' . $active . '">';
            echo '<img src="' . $pilt . '" class="d-block w-100 img-fluid" alt="Reklaam">';
            echo '</div>';
            $active = '';
        }
        ?>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <main>
        <!-- slider Area Start-->
        <!-- <div class="container-fluid">
            <div class="slider-area position-relative">
                <div class="slider-active dot-style">
                    Single Slider -->
                    <!-- <div class="single-slider hero-overly slider-height slider-bg1 d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-9 col-lg-11 col-md-11">
                                    <div class="hero__caption">
                                        <h1 data-animation="fadeInUp" data-delay=".2s">Car Wash</h1>
                                        <div class="hero-details">
                                            <div class="stock-text" data-animation="fadeInUp" data-delay=".8s">
                                                <h2>& Detailing</h2>
                                                <h2>& Detailing</h2>
                                            </div>
                                            <P data-animation="fadeInUp" data-delay=".4s">Duis aute irure dolor inasfa reprehenderit in voluptate 
                                            velit esse cillum reeut cupidatatfug.</P>
                                            Hero-btn
                                             <div class="hero__btn">
                                                <a href="industries.html" class="btn mb-10"  data-animation="fadeInUp" data-delay=".8s">Our Services</a>
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
        slider Area End -->
        <!--? Office environment  Start-->
        <section class="office-environments" >
            <div class="container">
                <div class="environments-wrapper section-bg02" data-background="assets/img/gallery/section_bg02.png">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8 offset-xl-5 offset-lg-4">
                            <div class="office-pera">
                                <div class="section-tittle">
                                    <h2 class="mb-30">We have the latest  equipment</h2>
                                    <p>Duis aute irure dolor inasfa reprehenderit in voluptate velit esse cillum reeut cupidatatfug nulla pariatur. Excepteur sintxsdfas occaecat.</p>
                                    <a href="#" class="btn">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Office environment  End-->
        <!--? Pricing Card Start -->
         <section class="pricing-card-area fix section-padding30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-md-10">
                        <div class="section-tittle text-center mb-90">
                            <h2>Meie teenused</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                <?php
                // === DEBUG: lülita ajutiselt sisse, kui tahad näha vigu ===
                // ini_set('display_errors',1); error_reporting(E_ALL);

                $csvFile = __DIR__ . '/services.csv'; // kontrollib sama kausta
                $imagesDir = 'pildid/'; // piltide kaust (muuda vajadusel)
                $fallbackImage = 'assets/img/default-service.jpg'; // varupilt - lisa see faili

                if (!file_exists($csvFile)) {
                    echo '<div class="col-12"><div class="alert alert-danger">Viga: services.csv ei leitud kaustast ' . htmlspecialchars(__DIR__) . '.</div></div>';
                } else {
                    // Loeme read (ignoreerime tühjad read)
                    $lines = file($csvFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    if (!$lines || count($lines) < 2) {
                        echo '<div class="col-12"><div class="alert alert-warning">services.csv on tühi või puudub reaalne teenuste rida.</div></div>';
                    } else {
                        // Eemaldame võimaliku BOM esimese read algusest
                        $lines[0] = preg_replace('/^\x{FEFF}/u', '', $lines[0]);

                        $count = 0;
                        // Jätame esimese rea (päise) vahele
                        for ($i = 1; $i < count($lines); $i++) {
                            $row = str_getcsv($lines[$i], ';');
                            // tagame vähemalt 3 veergu (nimi;hind;kirjeldus ja vabatahtlik pilt)
                            if (!$row || count($row) < 3) continue;

                            $nimi = trim($row[0]);
                            $hind = trim($row[1]);
                            $kirjeldus = trim($row[2]);
                            $pilt = isset($row[3]) ? trim($row[3]) : '';

                            // fallback pilt kui puudub
                            $imgPath = $fallbackImage;
                            if ($pilt !== '' && file_exists($imagesDir . $pilt)) {
                                $imgPath = $imagesDir . $pilt;
                            } elseif (file_exists($imagesDir . strtolower($pilt))) {
                                $imgPath = $imagesDir . strtolower($pilt);
                            }

                            // turvaline väljaprintimine
                            $nimi_html = htmlspecialchars($nimi);
                            $kirjeldus_html = htmlspecialchars($kirjeldus);
                            $hind_html = htmlspecialchars($hind);

                            echo '<div class="col-md-4 mb-4">';
                            echo '  <div class="card h-100 text-center shadow">';
                            echo '    <img src="'. $imgPath .'" class="card-img-top" alt="'. $nimi_html .'" style="max-height:200px;object-fit:cover;">';
                            echo '    <div class="card-body d-flex flex-column">';
                            echo '      <h5 class="card-title">'. $nimi_html .'</h5>';
                            echo '      <p class="card-text">'. $kirjeldus_html .'</p>';
                            echo '      <p class="fw-bold mt-auto">'. $hind_html .' €</p>';
                            echo '      <a href="#" class="btn btn-primary">Lisa ostukorvi</a>';
                            echo '    </div>';
                            echo '  </div>';
                            echo '</div>';

                            $count++;
                        }

                        if ($count === 0) {
                            echo '<div class="col-12"><div class="alert alert-info">CSV fail ei sisalda sobivaid teenuseid (vähemalt 1 rida peale päist).</div></div>';
                        }
                    }
                }
                ?>
                </div>
            </div>
        </section>
        <!-- Pricing Card End -->
        <!--? Testimonial Area Start -->
        <section class="testimonial-area testimonial-padding fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="about-caption pb-bottom">
                            <!-- Testimonial Start -->
                            <div class="h1-testimonial-active dot-style">
                                <!-- Single Testimonial -->
                                <div class="single-testimonial position-relative">
                                    <div class="testimonial-caption">
                                        <img src="assets/img/icon/quotes-sign.svg" alt="" class="quotes-sign">
                                        <p>"The automated process starts as soon as your clothe go into the machine. This site outcome is gleaming clothe to the placeholder text commonly</p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center">
                                        <div class="founder-img">
                                            <img src="assets/img/icon/testimonial.svg" alt="">
                                        </div>
                                        <div class="founder-text">
                                            <span>Robart Brown</span>
                                            <p>Creative designer at Colorlib</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Testimonial -->
                                <div class="single-testimonial position-relative">
                                    <div class="testimonial-caption">
                                        <img src="assets/img/icon/quotes-sign.svg" alt="" class="quotes-sign">
                                        <p>"The automated process starts as soon as your clothe go into the machine. This site outcome is gleaming clothe to the placeholder text commonly</p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center">
                                        <div class="founder-img">
                                            <img src="assets/img/icon/testimonial.svg" alt="">
                                        </div>
                                        <div class="founder-text">
                                            <span>Robart Brown</span>
                                            <p>Creative designer at Colorlib</p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- Testimonial End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- testimonial-right img -->
            <div class="testimonial-right-img">
                <img src="assets/img/gallery/testimonial-right-img.png" alt="">
            </div>
        </section>
        <!--? Testimonial Area End -->
        <!--? Services Area Start -->
        <section class="categories-area section-padding40">
            <div class="container">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-10 col-sm-11">
                        <div class="section-tittle mb-60">
                            <h2>Why take our services?</h2>
                            <p>Duis aute irure dolor inasfa reprehenderit in voluptate velit esse cillum reeut 
                            cupidatatfug nulla pariatur. Excepteur sintxsdfas occaecat.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services1.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Car wash 100% without detergents</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services2.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Efficient surface drying machines</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services3.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>We have an application</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services4.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Safe lacquer protection</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--? Services Area End -->
        <!--? video_start -->
        <div class="video-area section-bg2 d-flex align-items-center"  data-background="assets/img/gallery/video-bg.png">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-4 offset-lg-5 offset-md-2 col-xl-6 col-lg-6 offset-sm-1 col-sm-11">
                        <div class="video-wrap">
                            <!-- Video icon -->
                            <div class="video-icon" >
                                <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <div class="section-tittle section-tittle2 mb-90">
                            <h2>Your car will look as your new one</h2>
                            <p>Duis aute irure dolor inasfa reprehenderit in voluptate velit esse cillum reeut cupidatatfug.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- video_end -->
        <div class="maps-area">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-7 col-md-7 col-sm-7">
                        <img src="assets/img/gallery/map.png" alt="" class="w-100">
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <img src="assets/img/gallery/map-left.png" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-wrapper section-bg2"  data-background="assets/img/gallery/footer-bg.png">
            <!-- Footer Start-->
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo mb-35">
                                        <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>Duis aute irure dolor inasfa reprehenderit in voluptate velit esse cillum reeut cupidatatfug.</p>
                                        </div>
                                        <ul class="mb-40">
                                            <li class="number"><a href="#">(80) 783 367-3904</a></li>
                                            <li class="number2"><a href="#">contact@carwash.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Opening hour</h4>
                                    <ul>
                                        <li><a href="#">Mon-Fri (9.00-19.00)</a></li>
                                        <li><a href="#">Sat (12.00-19.00)</a></li>
                                        <li><a href="#">Sun <span>(Closed)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Navigation</h4>
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom area -->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Footer End-->
      </div>
  </footer>
  <!-- Scroll Up -->
  <div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->

<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<!-- <script src="./assets/js/bootstrap.min.js"></script> -->
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="./assets/js/gijgo.min.js"></script>
<!-- Nice-select, sticky -->
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>
<!-- Progress -->
<script src="./assets/js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="./assets/js/jquery.counterup.min.js"></script>
<script src="./assets/js/waypoints.min.js"></script>
<script src="./assets/js/jquery.countdown.min.js"></script>
<script src="./assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>


</body>
</html>