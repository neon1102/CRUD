<link rel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" 
integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" 
crossorigin="anonymous">


<?php
//Вводишь свои данные
$host = "localhost";
$name = "gadzhieva_402";
$pass = "solo";
$database = "database";

$mysqli = new mysqli($host, $name, $pass, $database);

if($mysqli->connect_error){
    echo "Подключения нет!";
    exit();
} else {echo "da";}

$mysqli->query("SET NAMES UTF8");
$mysqli->query("SET CHARACTER SET UTF8");

?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" 
integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" 
crossorigin="anonymous"></script>