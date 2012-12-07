<?php
/* Abrimos la base de datos */
$connection = mysql_connect("localhost","root","ok...") or die("Connection Failed".mysql_error());
mysql_select_db("proyectorfid",$connection)or die("Error loading the DataBase".mysql_error());
?>