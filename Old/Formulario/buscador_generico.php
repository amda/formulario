
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<!-- Menú principal-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>schedule</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/stylesheet.css" />
</head>

<body>
<ul class="menu">
  <li><a href="http://localhost/Formulario/index.html" class="active"><span>Agregar Maestro</span></a></li>
  <li><a href="http://localhost/Formulario/listamaestros.php"><span>Reporte de Maestros</span></a></li>
  <li><a href="http://localhost/Formulario/buscador_generico.php"><span>Buscar Maestro</span></a></li>
</ul>

<!--buscador simple -->

<?
// Buscador para tablas MySQL escrito en PHP. Por Alex (Nenillo) para www.holamundo.es
// Creado el 13-10-2003


////////////////////////////
// Configuración
///////////////////////////

//modifica estas variables según tu servidor de MySQL

$bd_servidor = "localhost";
$bd_usuario = "root";
$bd_contrasenya = "";
$bd_bdname = "proyectorfid";
$bd_tabla = "persona"; // Tabla donde se harán las búsquedas
// Conexión y selección de la base de datos

$link = mysql_connect($bd_servidor,$bd_usuario,$bd_contrasenya);

mysql_select_db($bd_bdname,$link);

////////////////////////////
// Formulario
///////////////////////////

?>

<center>
<p><h2>Introduce las palabras para la búsqueda</h2></p>
<p><form name="buscador" method="post" action="buscador_generico.php"><br>
<!-- Buscar en:
<select name="campo">
<?php

//Con este query obtendremos los campos por los cuales el usuario puede buscar

$result = mysql_query("SHOW FIELDS FROM `$bd_tabla`",$link);

while($row = mysql_fetch_row($result)) {

// en $row[0] tenemos el nombre del campo
// de esta manera no necesitamos conocer el nombre de los campos
// por lo que cualquier tabla nos valdrá

?>
<option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
<?php

}

?>
</select>
 -->Palabra(s): <input type="text" name="palabra"><br>
<input type="submit" value="Buscar" name="enviar">
</form></p>
</center>

<?

////////////////////////////
// Proceso del Formulario
///////////////////////////

if(isset($_POST['enviar'])) {

// Solo se ejecuta si se ha enviado el formulario

$query = "SELECT * from $bd_tabla WHERE name LIKE '%{$_POST['palabra']}%'";

$result = mysql_query($query,$link);



$found = false; // Si el query ha devuelto algo pondrá a true esta variable

while ($row = mysql_fetch_array($result)) {

$found = true;

echo "<p>";

foreach($row as $nombre_campo => $valor_campo) {

// Tenemos que mostrar todos los campos de las filas donde se haya
// encontrado la búsqueda.


if(is_int($nombre_campo)) {

continue; //Cuando hacemos mysql_fetch_array, php genera un array
// con todos los valores guardados dos veces, uno con
// índice numérico y otro con índice el nombre del campo.
// Solo nos interesa el del nombre del campo.

}

if ($nombre_campo === 'regla'|$nombre_campo === 'tagrfid') {

}
else{
echo "<b>".$nombre_campo."</b> : ".$valor_campo."<br>";
}
}
echo "</p>";

}

if(!$found) {

echo "No se encontró la palabra introducida";

}

}
?>


</body>
</html>
