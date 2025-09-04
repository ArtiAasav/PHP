<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1>Harjutus 04.7</h1>
    <h2>Hinne</h2>

    <form action="#" method="get">
    Punktid <input type="number" name="punktid" required value="5" min="1" max="10"><br>
    <input type="submit" value="Anna hinne">
    </form>

    <?php
       if(isset($_GET["punktid"])){
          $vanus = $_GET["punktid"];
        
          switch($punktid){
            case($punktid>=10): echo '3';
            break;
            case(($punktid>=5) && ($punktid<=9)): echo '3';
            break;
            default: echo 'MA';
          }
        }

    ?>




    <h1>Harjutus 04</h1>
    <h2>Juubel</h2>
    <form action="#" method="get">
    Sünniaasta <input type="number" name="synniaasta" required><br>
    <input type="submit" value="Leia juubel">
    </form>

    <?php
        if(isset($_GET["synniaasta"])){
            $vanus = 2025 - $_GET["synniaasta"];
            if($vanus%5 == 0){
                echo "Juubel!";
            } else {
            echo "Ei ole juubel.";
            }
        }
    ?>

    <h1>Harjutus 04</h1>
    <h2>Jagamine</h2>
    <form action="#" method="get">
        arv1 <input type="number" name="arv1" required><br>
        arv2 <input type="number" name="arv2" required><br>
        <input type="submit" value="jaga">
    </form> 
    <?php
        if(isset($_GET["arv1"]) && isset($_GET["arv2"])){
        $arv1 = $_GET["arv1"];
        $arv2 = $_GET["arv2"];
            
        if($arv2==0){
            echo "Nulliga ei saa jagada!";
        } else {
            echo $arv1 /$arv2;
        }
    }

    ?>

    <h1>Harjutus 03</h1>
    <form action="#" method="get">
        a <input type="number" name="a" required><br>
        b <input type="number" name="b" required><br>
        h <input type="number" name="h" required><br>
        <input type="submit" value="arvuta" class="btn btn-danger">
    </form> 
    <?php
        $a = $_GET["a"];
        $b = $_GET["b"];
        $h = $_GET["h"];
        $s = ($a + $b)/2*$h;

        echo "Trapetsi pindala: ".$s."<br>";




    ?>

    <h1>Harjutus 02</h1>
    <?php
    // Aasav 01.09.25
    // Ülesanne 2
    // arvudega tehted

    $a1 = 7;
    $a2 = 5;

    printf("%d + %d = %d <br>", $a1, $a2, $a1+$a2);
    printf("%d - %d = %d <br>", $a1, $a2, $a1-$a2);
    printf("%d * %d = %d <br>", $a1, $a2, $a1*$a2);
    printf("%d / %d = %0.2f <br>", $a1, $a2, $a1/$a2);
    printf("%d jääk %d = %d <br>", $a1, $a2, $a1%$a2);

    // täisnurkne kolmnurk
        $a3 = 8;
        $p = $a1+$a2+$a3;
        $s = $a1 * $a2 / 2;
        echo "Ümbermõõt: ".$p."<br>";
        echo "Pindala: ".$s."<br>";
    ?>

    <h1>Harjutus 01</h1>
    <?php
    // Aasav 01.09.25
    // Ülesanne 1

    $nimi = "Arti";
    $aasta = 1980;
    $tahtkuju = "skorpion";

    echo $nimi."<br>".$aasta."<br>".$tahtkuju;
    echo "<br>";
    echo '"It\'s My Life" - Dr. Alban';

    echo "<br> (\(\ <br>";
    echo "( -.-) <br>";
    echo "o_(\")(\") <br>";


    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>