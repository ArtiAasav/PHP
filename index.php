<!DOCTYPE html>
<html>
<body>
<?php

header('Content-Type: text/html; charset=UTF-8');

$currentDate = date('Y-m-d');

if ($currentDate == false) {
    $currentDate = 'Date could not be retrieved';
}


echo '     <h1>My first Webserver!</h1>';
echo '     <p><a href="http://www.W3Schools.com">Study material</a></p>';
echo "     <p>Today is $currentDate</p>";
echo '     <p>Page creator - Jörn IT-24</p>';
?>

</body>
</html>
