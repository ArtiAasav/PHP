<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Harjutus 06.7</h1>
    <h2>Massiivid ja tsüklid</h2>

    <?php
    $tydrukud = array()
    $poisid = array()

    foreach
    ?>

    <h1>Harjutus 06.6</h1>
    <h2>Kolmega jagunevad</h2>

    <?php
    for ($i=1; $i <=100; $i++) {
        if ($i%3==0) {
            echo $i."<br>";
        }
    }
    ?>

     <h1>Harjutus 06.5</h1>
    <h2>Kahanev</h2>

    <?php
    for ($i=10; $i >=0; $i--) {
        echo $i."<br>";
    }
    ?>

     <h1>Harjutus 06.4</h1>
    <h2>Ruut</h2>

    <?php
    for ($i=1; $i <=100; $i++) {
        echo "* ";
          if($i%10==0) {
            echo "<br>";
        } 
    }
    ?>

    <h1>Harjutus 06.3</h1>
    <h2>Rida II</h2>

    <?php
    for ($i=1; $i <=10; $i++) {
        echo "*<br>";
    }
    ?>

    <h1>Harjutus 06.2</h1>
    <h2>Rida</h2>

    <?php
    for ($i=1; $i <=10; $i++) {
        echo "*";
    }
    ?>

    <h1>Harjutus 06.1</h1>
    <h2>Genereeri</h2>

    <?php
    for ($i=1; $i <=100; $i++) {
        echo  $i.". ";
        if($i%10==0) {
            echo "<br>";
        } 
    }
            

    ?>


</body>
</html>