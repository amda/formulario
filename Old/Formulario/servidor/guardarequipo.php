<?php

$connection= mysql_connect("localhost","root","") or die("Connection Failed".mysql_error());
mysql_select_db("proyectorfid",$connection)or die("Error loading the DataBase".mysql_error());

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