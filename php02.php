<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <h1>Harjutus 07.3</h1>
    <h2>Kasutajanimi ja email</h2>

    <?php
    function createUser($u){
        $lu = strtolower($u);
        echo $lu."@hkhk.edu.ee";
        echo "<br>";
        $p = substr(password_hash($lu, PASSWORD_BCRYPT),7,7);
        echo $p;
    }

    function vahemikus($a1, $a2, $s){
        for ($i=$a1; $i <= $a2 ; $i=$i+$s) { 
            echo $i;
        }        
    }

    function rectangles($a1, $a2){
        return $a1 * $a2;
    }

    function ik($ik) {
        $pikkus = (strlen($ik) == 11);
        if ($pikkus==11) {
            if(intval($ik[0])%2==0) {
                $vastus="Naine";
            } else {
                $vastus="Mees";
            } 
        } else {
            return $vastus="IK Vale pikkusega";
            }
        return $vastus;
        }

    function headMotted(){
        $alused = array("Jüri","Mari","Uku");
        $oeldised = array("armastab","viskab","tõmbab");
        $sihitised = array("mind","sind","teda");

        echo $alused[array_rand($alused)]." ".$oeldised[array_rand($oeldised)]." ".$sihitised[array_rand($sihitised)];
    }
    headMotted();

    echo "<br>";
    createUser("ARTI");
    echo "<br>";
    vahemikus(2,20,3);
    echo "<br>";
    echo ik("50807184244");
    ?>
    <h2>Ristküliku pindala</h2>
    <form>
        Külg 1<input type="number" name=kylg1 value="10">
        Külg 2<input type="number" name=kylg2 value ="10">
        <input type="submit" value="Arvuta pindala">
    </form>
    <?php
    echo "Pindala ".rectangles($_GET['kylg1'],$_GET['kylg2']);
    echo "<br>";
    ?>

    <h1>Harjutus 07.2</h1>
    <h2>Liitu uudiskirjaga</h2>

    <?php
       function uudiskiri(){
        echo '<div class="row">
            <div class="col-sm-2">
                <form action="">
                    <input type="text" placeholder="Liitu uudiskirjaga">
                    <input type="submit" value="Liitu!" class="btn btn-success">
                </form>
            </div>
        </div>';
       }

       uudiskiri();
    ?>

    <h1>Harjutus 07.1</h1>
    <h2>Tervitus</h2>
    <?php
        function tervita($n){
		return "Tere $n";	
	    }
	
	    echo tervita("Päiksekesekene");

    ?>
    <h1>Harjutus 06.7</h1>
    <h2>Massiivid ja tsüklid</h2>

    <?php
    $t = array('anete','mari','julia','karola','birgit','xaria','lisett','karin');
    $p = array('rasmus','kert','mihkel','karl','martin','kevin','johan','sergei');

    for ($i=0; $i < count($t); $i++) { 
        echo $t[$i]." - ".$p[$i]."<br>";
    }

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