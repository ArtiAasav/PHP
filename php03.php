<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>

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
