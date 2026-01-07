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