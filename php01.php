<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1>Harjutus 05.8</h1>
    <h2>Pildid</h2>
    
    <div class="container">
        <div class="row">
            <?php
                $pildid = array("prentice.jpg","freeland.jpg","peterus.jpg","devlin.jpg","gabriel.jpg","pete.jpg");

                foreach ($pildid)
            ?>

    </div>

    <h1>Harjutus 05.7</h1>
    <h2>Google</h2>

    <form action="#">
        Otsi nime: <input type="text" name="otsi">
        <input type="submit" value="Otsi nime">
    </form>

    <?php
        $google_nimed = array("Feake","Bradwell","Dreger","Bloggett","Lambole","Daish","Lippiett","Blackie","Stollenbeck","Houseago","Dugall","Sprowson","Kitley","Mcenamin","Allchin","Doghartie","Brierly","Pirrone","Fairnie","Seal","Scoffins","Galer","Matevosian","DeBlase","Cubbin","Izzett","Ebi","Clohisey","Prater","Probart","Samwaye","Concannon","MacLure","Eliet","Kundt","Reyes");

        if(isset($_GET["otsi"])){
         if (in_array($_GET["otsi"], $google_nimed)) {
            echo '<div class="alert alert-success" role="alert">';
            echo "On olemas: ".$_GET["otsi"]."<br>";
            echo '</div>';
         }
        else {
             echo '<div class="alert alert-danger" role="alert">';
            echo "Ei ole olemas";
            echo '</div>';
        }
        }
      

    ?>




    <h1>Harjutus 05.6</h1>
    <h2>Hiina</h2>

    <?php
        $hiina_nimed = array("瀚聪","月松","雨萌","展博","雪丽","哲恒","慧妍","博裕","宸瑜","奕漳","思宏","伟菘","彦歆","睿杰","尹智","琪煜","惠茜","晓晴","志宸","博豪","璟雯","崇杉","俊誉","军卿","辰华","娅楠","志宸","欣妍","明美");

        sort($hiina_nimed);
        foreach($hiina_nimed as $hiina_nimi){
            echo "$hiina_nimi <br>";
        }
        echo "Esimene nimi: ".reset($hiina_nimed)."<br>";
        echo "Viimane nimi: ".end($hiina_nimed)."<br>";
    ?>



    <h1>Harjutus 05.5</h1>
    <h2>Riigid</h2>

    <?php
       $riigid = array("Indonesia","Canada","Kyrgyzstan","Germany","Philippines","Philippines","Canada","Philippines","South Sudan","Brazil","Democratic Republic of the Congo","Indonesia","Syria","Sweden","Philippines","Russia","China","Japan","Brazil","Sweden","Mexico","France","Kazakhstan","Cuba","Portugal","Czech Republic");

            $max_len = max(array_map('strlen', $riigid));
            echo $max_len;  

    ?>


    <h1>Harjutus 05.4</h1>
    <h2>Firmad</h2>

    <form action="#">
        Eemalda firma: <input type="text" name="eemalda">
        <input type="submit" value="Eemalda firma">
    </form>
    <?php
    $firmad = array("Kimia","Mynte","Voomm","Twiyo","Layo","Talane","Gigashots","Tagchat","Quaxo","Voonyx","Kwilith","Edgepulse","Eidel","Eadel","Jaloo","Oyope","Jamia");
    if(isset($_GET["eemalda"])){
        $kustuta_firma = $_GET["eemalda"];
        $otsitav = array_search($kustuta_firma, $firmad);
        unset($firmad[$otsitav]);
    }
    foreach ($firmad as $firma) {
        echo $firma."<br>";
    }


    ?>

    <h1>Harjutus 05.3</h1>
    <h2>Palk</h2>

    <?php
    $palgad = array(1220,1213,1295,1312,1298,1354,1296,1286,1292,1327,1369,1455);

    $keskmine_palk = array_sum($palgad) / count($palgad);
    echo "Keskmine palk on: ".$keskmine_palk;
    ?>


    <h1>Harjutus 05.2</h1>
    <h2>Autod</h2>

    <?php
    $cars = array("Subaru","BMW","Acura","Mercedes-Benz","Lexus","GMC","Volvo","Toyota","Volkswagen","Volkswagen","GMC","Jeep","Saab","Hyundai","Subaru","Mercedes-Benz",
    "Honda","Kia","Mercedes-Benz","Chevrolet","Chevrolet","Porsche","Buick","Dodge","GMC","Dodge","Nissan","Dodge","Jaguar","Ford","Honda","Toyota","Jeep",
    "Kia","Buick","Chevrolet","Subaru","Chevrolet","Chevrolet","Pontiac","Maybach","Chevrolet","Plymouth","Dodge","Nissan","Porsche","Nissan","Mercedes-Benz",
    "Suzuki","Nissan","Ford","Acura","Volkswagen","Lincoln","Mazda","BMW","Mercury","Mitsubishi","Ram","Audi","Kia","Pontiac","Toyota","Acura","Toyota","Toyota",
    "Chevrolet","Oldsmobile","Acura","Pontiac","Lexus","Chevrolet","Cadillac","GMC","Jeep","Audi","Acura","Acura","Honda","Dodge","Hummer","Chevrolet","BMW",
    "Honda","Lincoln","Hummer","Acura","Buick","BMW","Chevrolet","Cadillac","BMW","Pontiac","Audi","Hummer","Suzuki","Mitsubishi","Jeep","Buick","Ford");

    $vins = array("1GKS1GKC8FR966658", "1FTEW1C87AK375821", "1G4GF5E30DF760067", "1FTEW1CW9AF114701", "WAUGGAFC8CN433989", "3G5DA03E83S704506", "4JGDA2EB0DA207570", 
    "1FTEW1E88AK070552", "SAJWA0F77F8732763", "JHMFA3F21BS660717", "JTHBP5C29C5750730", "WA1LFAFP9DA963060", "3D7TT2CT6BG521976", "WVWN7EE961049", 
    "2C3CA5CG3BH341234", "YV4952CFXC162587", "KNALN4D71F5805172", "JN1CV6EK7BM903692", "5FRYD3H84EB186765", "WAUL64B83N441878", "WDDGF4HBXCF845665", 
    "WAUKF78E45A133973", "JN1BY0AR2AM022612", "WA1EY74L69D931520", "3GYFNGEYXBS290465", "1D7CW2GK4AS059336", "JN8AZ1FY5EW087447", "WAUBF78E57A343355", 
    "SCFFBCCD8AG695133", "WBAWC73548E143482", "3GYFNGE38DS093883", "SCBCP73WC348460", "JN8AE2KPXE9353316", "2C3CDXDT2EH018229", "1G6AH5SX7D0325662", 
    "WVWED7AJ7DW431402", "1FTKR1AD3AP316066", "WBAKF5C52CE612586", "1FTNX2A57AE16083", "WAUCFAFR1AA166821", "SCFFDAAM3EG486065", "1G4PR5SK5F4821043", 
    "1C3CDFCB4ED858321", "1N6AD0CW8EN722090", "1NXBU4EE0AZ438077", "2T1BPRHE7FC131594", "JH4KB1637C451183", "1C4NJCBA7ED747024", "WAUHF68P86A736691", 
    "3D7TT2HT1AG96429", "5GADX23L96D250838", "5FRYD3H25FB985936", "1G4GG5E30DF126304", "KNADH5A38B6072755", "WAUBFAFL1BA477979", "3C63DRL4CG674293", 
    "1G6AR5SX0E0834815", "1NXBU4EE2AZ309838", "WAUKGBFB4AN797783", "JN1AJ0HP8AM801887", "WAUPL68E25A448831", "WA1C8BFP3FA535374", "WAUHE78P78A019744", 
    "TRURD38J081400551", "1G4HP52K95428171", "5N1CR2MN1EC607241", "5UMDU93417L322773", "1G6AJ5S35F09585", "JN1CV6AP3BM234743", "SCBCR63W66C842051", 
    "SCFFDCBD2AG509467", "WBA3C1C58CA664091", "1D7RW2BK6BS922303", "WAUDH98E67A546009", "2HNYB1H46CH683844", "3VW467AT4DM257275", "WDDGF4HB7CA515172", 
    "2G61W5S88E9666199", "5GADV33W17D256205", "2C3CDXDT9CH683075", "2G4GU5X0E9989574", "WAUJC58E53A641651", "WDDEJ7KB3CA053774", "3D73M3CL6AG890452", 
    "5GAER13D19J026924", "1G4HC5EM1BU329204", "3VWML7AJ6CM772736", "3C6TD4HT2CG011211", "JTDZN3EU2FJ023675", "JN8AZ1MU4CW041721", "KNAFX5A82F5991024", 
    "1N6AA0CJ1D57470", "WAUEG98E76A780908", "WAUAF78E96A920706", "1GT01XEG8FZ268942", "1FTEW1CW4AF371278", "JN1AZ4EH8DM531691", "WAUEKAFBXAN294295", 
    "1N6AA0EDXFN868772", "WBADW3C59DJ422810");

    echo "Autosid: ".count($cars)."<br>";
    if (count($cars)==count($vins)) {
        echo "Autod ja VINid klapivad <br>";
    } else {
    echo "Autod ja VINid ei klapi <br>";
    }

    $toyo = 0;
    $audi = 0;
    foreach ($cars as $car) {
        if ($car=="Toyota") {
            $toyo++;
        }
        if ($car=="Audi") {
            $audi++;
        }
    }

    echo "Toyota: ".$toyo."<br>";
    echo "Audi: ".$audi."<br>";

    echo "valed VINid:<br>";
    foreach ($vins as $vin) {
        if (strlen($vin)<17) {
            echo $vin."<br>";    
        }
    }
    ?>

   <h1>Harjutus 05.1</h1>
    <h2>Tüdrukud</h2>

    <?php
        $nimed = array('anete','mari','julia','karola','birgit','xaria','lisett','karin');
        sort($nimed);

        $loendur = 1;
        foreach($nimed as $nimi){
            echo "$nimi <br>";
            $loendur++;
            if ($loendur>3){
                break;
            }
        }
        echo "Viimane nimi: ".end($nimed)."<br>";
        echo "Suvaline nimi: ".$nimed[array_rand($nimed)]."<br>";
    ?>



    <h1>Harjutus 04.7</h1>
    <h2>Hinne</h2>
    <!-- Aasav 04.09.25 -->
    <!-- Ülesanne 4 -->

    <form action="#" method="get">
    Punktid <input type="number" name="punktid" required value="5" min="1" max="10"><br>
    <input type="submit" value="Anna hinne">
    </form>

    <?php
       if(isset($_GET["punktid"])){
          $punktid = $_GET["punktid"];
        
          switch($punktid){
            case($punktid>=10): echo '5';
            break;
            case(($punktid>=5) && ($punktid<=9)): echo '3';
            break;
            default: echo 'MA';
          }
        }

    ?>




    <h1>Harjutus 04.6</h1>
    <h2>Juubel</h2>
    <!-- Aasav 01.09.25 -->
    <!-- Ülesanne 4 -->
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
    <!-- Aasav 01.09.25 -->
    <!-- Ülesanne 4 -->
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
    <!-- Aasav 01.09.25 -->
    <!-- Ülesanne 3 -->
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