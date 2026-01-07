<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <title>Autopesu kalkulaator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-..." crossorigin="anonymous">

    <style>
      /* Väike stiil täienduseks */
      body { background: #f8f9fa; }
      .card-img-top { max-height: 140px; object-fit: cover; }
    </style>
</head>
<body>
<?php
// ======================= PHP loogika (lugemine + POST töötlus) =======================

// Kui tahad näha PHP vigu ajutiselt, eemalda kommentaarid järgnevalt kahe reale:
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

$csvFile   = __DIR__ . '/services.csv'; // tee services.csv juurde (muuda kui on teises kaustas)
$orderFile = __DIR__ . '/orders.txt';   // orders.txt salvestamiseks

$services = [];
$errors = [];
$success = '';

// 1) Loeme services.csv (semikooloniga eraldatud, päis eeldatud)
if (file_exists($csvFile) && filesize($csvFile) > 0) {
    if (($h = fopen($csvFile, 'r')) !== false) {
        // loeme päise
        $header = fgetcsv($h, 1000, ';');
        if ($header && isset($header[0])) {
            // eemalda võimalik BOM
            $header[0] = preg_replace('/^\x{FEFF}/u', '', $header[0]);
        }
        // loeme ülejäänud read
        while (($row = fgetcsv($h, 1000, ';')) !== false) {
            if (count($row) < 2) continue; // vähemalt nimi ja hind
            $name = trim($row[0]);
            // hind võib olla kujul "25" või "25,00" -> teisendame floatiks
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

// 2) Töötle POST (arvuta ja salvesta)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // turvaline paroole: teenuse indeks ja auto suurus
    $serviceIndex = isset($_POST['service']) ? intval($_POST['service']) : -1;
    $carSize = isset($_POST['car_size']) ? $_POST['car_size'] : 'sedaan';

    if ($serviceIndex < 0 || !isset($services[$serviceIndex])) {
        $errors[] = 'Palun vali teenus.';
    } else {
        $basePrice = $services[$serviceIndex]['price'];
        // suuruse kood
        $multiplier = 1.0;
        if ($carSize === 'universaal') $multiplier = 1.10;
        elseif ($carSize === 'maastur') $multiplier = 1.20;
        // lõpphind
        $finalPrice = round($basePrice * $multiplier, 2);
        // inforida salvestamiseks
        $line = date('Y-m-d H:i:s') . ' | ' . $services[$serviceIndex]['name'] . ' | ' . $carSize . ' | ' . $finalPrice . " €" . PHP_EOL;

        // kirjutame orders.txt (append + lock)
        $write = @file_put_contents($orderFile, $line, FILE_APPEND | LOCK_EX);
        if ($write === false) {
            $errors[] = 'Viga: ei õnnestu salvestada orders.txt faili. Kontrolli faili õiguseid.';
        } else {
            // näidatav kujundus kasutajale (komaga eraldus Eesti formaadis)
            $finalDisplay = number_format($finalPrice, 2, ',', ' ');
            $success = "Arvutus salvestatud: <strong>" . htmlspecialchars($services[$serviceIndex]['name']) . "</strong> — lõpphind: <strong>{$finalDisplay} €</strong>";
        }
    }
}
?>
<!-- ======================= HTML sisu ======================= -->
<div class="container py-5">
    <h1 class="mb-4">Autopesu kalkulaator</h1>

    <!-- Veateated -->
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $e) echo '<div>' . htmlspecialchars($e) . '</div>'; ?>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>

    <!-- Vorm: ainult kui teenuseid on loetud -->
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
                            // Säilita valik pärast submiti
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

        <!-- Valikuline: kuvame kiire kokkuvõtte teenustest -->
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

    <hr class="my-5">

    <h5>Näidis: services.csv formaat</h5>
    <pre>
Teenuse nimi;Hind;Kirjeldus;Pilt
Salongi puhastus;25;Tolmu ja prahi eemaldamine;salong.jpg
Vahatamine;30;Auto vahatamine;vahatus.jpg
Rehvipesu;10;Rehvide ja velgede puhastus;rehvipesu.jpg
    </pre>
    <p>Pane pildid kausta <code>pildid/</code>, failinimed peavad kattuma 4. veeruga (või jäta see tühi).</p>
</div>

<!-- Bootstrap JS (popper + bundle) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-..." crossorigin="anonymous"></script>
</body>
</html>
