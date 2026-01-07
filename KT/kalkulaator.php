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
                                    <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
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
                                                <li><a href="teenused.php">Teenused</a></li>
                                                <li><a href="contact.php">Kontakt</a>
                                                    <!-- <ul class="submenu">
                                                        <li><a href="blog.html">Blog</a></li>
                                                        <li><a href="blog_details.html">Blog Details</a></li>
                                                        <li><a href="elements.html">Element</a></li>
                                                    </ul> -->
                                                </li>
                                                <li><a href="ostukorv.php">Ostukorv</a></li>
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
</div>

    <main>
    <?php

$csvFile   = __DIR__ . '/services.csv';
$orderFile = __DIR__ . '/orders.txt';

$services = [];
$errors = [];
$success = '';

if (file_exists($csvFile) && filesize($csvFile) > 0) {
    if (($h = fopen($csvFile, 'r')) !== false) {
        $header = fgetcsv($h, 1000, ';');
        if ($header && isset($header[0])) {
            $header[0] = preg_replace('/^\x{FEFF}/u', '', $header[0]);
        }

        while (($row = fgetcsv($h, 1000, ';')) !== false) {
            if (count($row) < 2) continue;
            $name = trim($row[0]);
            $priceRaw = trim($row[1]);
            $price = floatval(str_replace(',', '.', $priceRaw));
            $desc = isset($row[2]) ? trim($row[2]) : '';
            $img  = isset($row[3]) ? trim($row[3]) : '';
            $services[] = [
                'name' => $name,
                'price' => $price,
                'desc' => $desc,
                'img' => $img
            ];
        }
        fclose($h);
    } else {
        $errors[] = 'Viga: ei õnnestu avada services.csv faili.';
    }
} else {
    $errors[] = 'services.csv puudub või on tühi. Lisa faili päis + vähemalt üks teenus (vaata all näidet).';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $serviceIndex = isset($_POST['service']) ? intval($_POST['service']) : -1;
    $carSize = isset($_POST['car_size']) ? $_POST['car_size'] : 'sedaan';

    if ($serviceIndex < 0 || !isset($services[$serviceIndex])) {
        $errors[] = 'Palun vali teenus.';
    } else {
        $basePrice = $services[$serviceIndex]['price'];
        $multiplier = 1.0;
        if ($carSize === 'universaal') $multiplier = 1.10;
        elseif ($carSize === 'maastur') $multiplier = 1.20;
        $finalPrice = round($basePrice * $multiplier, 2);
        $line = date('Y-m-d H:i:s') . ' | ' . $services[$serviceIndex]['name'] . ' | ' . $carSize . ' | ' . $finalPrice . " €" . PHP_EOL;
        $write = @file_put_contents($orderFile, $line, FILE_APPEND | LOCK_EX);
        if ($write === false) {
            $errors[] = 'Viga: ei õnnestu salvestada orders.txt faili. Kontrolli faili õiguseid.';
        } else {
            $finalDisplay = number_format($finalPrice, 2, ',', ' ');
            $success = "Arvutus salvestatud: <strong>" . htmlspecialchars($services[$serviceIndex]['name']) . "</strong> — lõpphind: <strong>{$finalDisplay} €</strong>";
        }
    }
}
?>
<div class="container py-5">
    <h1 class="mb-4">Autopesu kalkulaator</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $e) echo '<div>' . htmlspecialchars($e) . '</div>'; ?>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>

    <?php if (count($services) === 0): ?>
        <div class="card mb-4">
            <div class="card-body">
                <h5>Teenuseid pole laaditud</h5>
                <p>Pane oma projekti fail <code>services.csv</code> (same folder) ja lisa sinna vähemalt päis + 1 rida teenuseid. Näite all.</p>
            </div>
        </div>
    <?php else: ?>
        <div class="card mb-4">
            <div class="card-body">
                <form method="post" novalidate>
                    <div class="mb-3">
                        <label for="service" class="form-label">Vali teenus</label>
                        <select name="service" id="service" class="form-select" required>
                            <option value="">-- Vali teenus --</option>
                            <?php
                            $selService = isset($_POST['service']) ? intval($_POST['service']) : -1;
                            foreach ($services as $i => $s) {
                                $label = htmlspecialchars($s['name']) . ' (' . number_format($s['price'], 2, ',', ' ') . ' €)';
                                $sel = ($i === $selService) ? ' selected' : '';
                                echo '<option value="' . $i . '"' . $sel . '>' . $label . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Vali auto suurus</label>
                        <?php $selSize = isset($_POST['car_size']) ? $_POST['car_size'] : 'sedaan'; ?>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="car_size" id="sedaan" value="sedaan" <?php echo ($selSize === 'sedaan') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="sedaan">Sedaan (0%)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="car_size" id="universaal" value="universaal" <?php echo ($selSize === 'universaal') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="universaal">Universaal (+10%)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="car_size" id="maastur" value="maastur" <?php echo ($selSize === 'maastur') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="maastur">Maastur (+20%)</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Arvuta hind ja salvesta</button>
                    <a href="index.php" class="btn btn-link">← Tagasi avalehele</a>
                </form>
            </div>
        </div>

        <div class="row g-3">
            <?php foreach ($services as $s): ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <?php
                        $imgPath = (!empty($s['img']) && file_exists(__DIR__ . '/pildid/' . $s['img'])) ? 'pildid/' . $s['img'] : 'assets/img/default-service.jpg';
                        ?>
                        <img src="<?php echo htmlspecialchars($imgPath); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($s['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($s['name']); ?></h5>
                            <p class="card-text small"><?php echo htmlspecialchars($s['desc']); ?></p>
                            <p class="fw-bold mb-0"><?php echo number_format($s['price'], 2, ',', ' '); ?> €</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS (popper + bundle) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-..." crossorigin="anonymous"></script>
</body>
</html>
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
                                        <a href="index.php"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
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
