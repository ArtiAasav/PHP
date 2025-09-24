<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
<h1>Harjutus 14</h1>

<?php
$kataloog_nimi = 'pildid';
$kataloog = __DIR__ . '/' . $kataloog_nimi;

if (!is_dir($kataloog)) {
    mkdir($kataloog, 0755, true);
    $teade = "Kataloog <code>$kataloog_nimi</code> loodud. Lisa sinna mõned pildid.";
} else {
    $teade = "Kataloog <code>$kataloog_nimi</code> on olemas.";
}

$pildid = [];
if (is_dir($kataloog)) {
    if ($asukoht = opendir($kataloog)) {
        while (($fail = readdir($asukoht)) !== false) {
            if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $fail)) {
                $pildid[] = $fail;
            }
        }
        closedir($asukoht);
    }
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8" />
    <title>Pildid PHP-s Bootstrapiga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-4">PHP ja pildid Bootstrapiga</h1>

    <div class="alert alert-info"><?= $teade ?></div>

    <h2 class="mb-4">Suvaline pilt kataloogist</h2>
    <?php if (count($pildid) > 0): 
        $suvaline = $pildid[array_rand($pildid)];
        $pildi_aadress = $kataloog_nimi . '/' . $suvaline;
    ?>
        <div class="card mb-5 shadow-sm" style="max-width: 350px;">
            <img src="<?= htmlspecialchars($pildi_aadress) ?>" class="card-img-top" alt="Suvaline pilt">
            <div class="card-body">
                <h5 class="card-title text-truncate"><?= htmlspecialchars($suvaline) ?></h5>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">Kataloogis ei leitud ühtegi pilti (jpg, png, gif).</div>
    <?php endif; ?>

    <h2 class="mb-4">Pisipildid (kliki pildile, et avada suurem)</h2>
    <?php if (count($pildid) > 0): ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <?php foreach ($pildid as $pilt):
                $pildi_aadress = $kataloog_nimi . '/' . $pilt;
            ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <a href="<?= htmlspecialchars($pildi_aadress) ?>" target="_blank">
                            <img src="<?= htmlspecialchars($pildi_aadress) ?>" class="card-img-top"
                                 style="max-height: 120px; object-fit: contain;" alt="<?= htmlspecialchars($pilt) ?>">
                        </a>
                        <div class="card-body p-2">
                            <p class="card-text text-truncate mb-0" title="<?= htmlspecialchars($pilt) ?>">
                                <?= htmlspecialchars($pilt) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-secondary">Lisa pilte kataloogi <code>pildid/</code> (jpg, png, gif), et näha pisipilte.</div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<h1>Harjutus 13</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="minu_fail" accept=".jpg, .jpeg">
    <input type="submit" value="Lae üles">
</form>

<?php
    if(!empty($_FILES['minu_fail']['name'])){
    $faili_nimi = $_FILES['minu_fail']['name'];
    $ajutine_fail = $_FILES['minu_fail']['tmp_name'];
    
    $faili_suurus = $_FILES['minu_fail']['size'];
    $max_suurus = 1048576;
    
    $faili_tyyp = $_FILES['minu_fail']['type'];

    $lubatud_tyyp = ['image/jpeg', 'image/jpg'];

    if($faili_suurus <= $max_suurus){
        if(in_array($faili_tyyp, $lubatud_tyyp)){
            $kataloog = 'failid';
            if(!is_dir($kataloog)){
                mkdir($kataloog);
            }
            
            if(move_uploaded_file($ajutine_fail, $kataloog.'/'.$faili_nimi)){
                echo 'Faili üleslaadimine oli edukas<br>';
                echo '<h3>Üleslaetud pildid:</h3>';
                $pildid = scandir($kataloog);
                foreach($pildid as $pilt){
                    if($pilt !== '.' && $pilt !== '..'){
                        echo '<a href="'.$kataloog.'/'.$pilt.'" target="_blank"><img src="'.$kataloog.'/'.$pilt.'" style="width: 100px; margin: 5px;"></a>';
                    }
                }
            } else {
                echo 'Faili üleslaadimine ebaõnnestus';
            }
        } else {
            echo 'Faili ei lubatud üles laadida! Lubatud on ainult JPG ja JPEG failid.';
        }
    } else {
        echo 'Faili suurus ületab lubatud piiri!';
    }
}
?>

<h1>Harjutus 12</h1>

    <form action=""> 
            start: <input type="time" name="start" id=""><br>
            start: <input type="time" name="finish" id=""><br>
            <input type="submit" value="Leia aeg">
    </form>
    <?php

        $s = strtotime($_GET["start"]);
        $f = strtotime($_GET["finish"]);

        $diff = abs($s - $f)/3600*60;
        echo intdiv($diff,60).":".$diff % 60;
    ?>

<?php
            $failitee = 'tootajad.csv';
            $fail = fopen($failitee, 'r') or die('Faili ei leitud!');
            $pealkiri = fgetcsv($fail, filesize($failitee), ';');

            $mehed = [];
            $naised = [];

            while (($andmerida = fgetcsv($fail, 1000, ';')) !== false) {
                if (count($andmerida) === 3) {
                    $nimi_raw = $andmerida[0];
                    $sugu_raw = strtolower(trim($andmerida[1]));
                    $palk_raw = (int)trim($andmerida[2]);

                    if ($sugu_raw === 'm') {
                        $mehed[] = $palk_raw;
                    } elseif ($sugu_raw === 'n') {
                        $naised[] = $palk_raw;
                    }
                }
            }

            fclose($fail);

            function statistika($sissetulekud) {
                if (count($sissetulekud) === 0) {
                    return [0, 0];
                }
                $keskmine = array_sum($sissetulekud) / count($sissetulekud);
                $suurim = max($sissetulekud);
                return [$keskmine, $suurim];
            }

            list($mehed_kesk, $mehed_max) = statistika($mehed);
            list($naised_kesk, $naised_max) = statistika($naised);
        ?>
            <h2>Palkade võrdlus</h2>
            <div>
                <?php
                    echo "<strong>Mehed:</strong><br>";
                    echo "Keskmine palk: " . round($mehed_kesk) . " €<br>";
                    echo "Kõrgeim palk: " . $mehed_max . " €<br><br>";
                ?>
            </div>
            <div>
                <?php
                    echo "<strong>Naised:</strong><br>";
                    echo "Keskmine palk: " . round($naised_kesk) . " €<br>";
                    echo "Kõrgeim palk: " . $naised_max . " €<br><br>";
                ?>
            </div>
        <div>
            <?php
                if ($mehed_kesk > $naised_kesk) {
                    echo "Meeste keskmine palk on kõrgem.";
                } elseif ($mehed_kesk < $naised_kesk) {
                    echo "Naiste keskmine palk on kõrgem.";
                } else {
                    echo "Meeste ja naiste keskmised palgad on võrdsed.";
                }
            ?>
        </div>
<h1>Harjutus 11</h1>


<h1>Harjutus 09</h1>

<?php
    function tervita($n){
        $puhastatud = ucfirst(strtolower(trim($n)));
        return $puhastatud;
        }

        function email_loomine($e, $p){
        $tapikad = array("ä","ö","õ","ü");
        $asendused = array("a","o","o","y");
        $enimi = str_replace($tapikad, $asendused, mb_strtolower(trim($e)));
        $pnimi = str_replace($tapikad, $asendused, mb_strtolower(trim($p)));

        return $enimi.".".$pnimi."@hkhk.edu.ee";
        }

        echo tervita("  nimi  ");
        echo "<br>";
        email_loomine("bomb","clat");
?>

<h1>Harjutus 08</h1>

<?php
$KP= "17.09.2025";
    echo date('d.m.Y G:i', time()+60);
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
