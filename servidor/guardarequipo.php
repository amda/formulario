<?php

include("conexion.php");

$tag = $_POST['tagrfid'];
$nombre =  $_POST['nombre'];
$base =  $_POST['base'];
$email =  $_POST['email'];

$query = "INSERT INTO persona(tagrfid, name,email, base, regla) 
		  VALUES ('$tag','$nombre','$email','$base', 0)";

$result = mysql_query($query); 
header('location: ../index.html');
echo mysql_error();

?>
