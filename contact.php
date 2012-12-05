<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chrome Web Design - Contact Page</title>
<meta name="keywords" content="Chrome, Contact, Web Design, CSS, HTML, free template" />
<meta name="description" content="Contact Chrome Web - free HTML CSS template from templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

</head>
<body>

<div id="templatemo_wrapper">

	<div id="templatemo_header">
    
    	<div id="site_title"><h1><a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a></h1></div>
        
        <div id="templatemo_menu" class="ddsmoothmenu">
            <ul>
              	<li><a href="index.html">Home</a></li>
          		<li><a href="about.html">About</a></li>
              	<li><a href="contact.html" class="selected">Contact</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->
        
    </div> <!-- end of header -->
    
    <div id="templatemo_main">
    	
        <div class="col_w630 float_l">
        	
             <div id="contact_form">
        
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
<p><h2>Busqueda</h2></p>
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

               
        
            </div> 
        </div>
        
        </div>
	    <div class="cleaner"></div>
    </div> <!-- end of main -->
</div>

<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">
        Copyright © 2048 <a href="#">Your Company Name</a> | 
        Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
        <div class="cleaner"></div>
    </div>
</div> 
  
</body>
</html>