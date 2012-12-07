<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Chrome Web Design</title>
    <meta name="keywords" content="Chrome Web Design, CSS, HTML, free template, piecemaker" />
    <meta name="description" content="Chrome Web Design is a free website template integrated with PieceMaker 3D Flash Slider." />
    <link href="templatemo_style.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="scripts/swfobject/swfobject.js"></script>
    <script type="text/javascript">

      var flashvars = {};
      flashvars.cssSource = "css/piecemaker.css";
      flashvars.xmlSource = "piecemaker.xml";
    
      var params = {};
      params.play = "true";
      params.menu = "false";
      params.scale = "showall";
      params.wmode = "transparent";
      params.allowfullscreen = "true";
      params.allowscriptaccess = "always";
      params.allownetworking = "all";
    
      swfobject.embedSWF('piecemaker.swf', 'piecemaker', '960', '500', '10', null, flashvars,    
      params, null);

    </script>

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
                    <li><a href="index.html" class="selected">Home</a></li>
                    <li><a href="lista.php">Lista</a></li>
                    <li><a href="buscar.php">Buscar</a></li>
                </ul>
                <br style="clear: left" />
            </div> <!-- end of templatemo_menu -->
            
        </div> <!-- end of header -->
        
        <div id="templatemo_main">

          <div class="col_fw">
          
            <div id="carbonForm">
          
              <h1>BUSCAR MAESTRO</h1>
              <?php
                include("servidor/conexion.php");
                $result = mysql_query("SHOW FIELDS FROM persona");
              ?>

              <center>
                <p>Introduce las palabras para la búsqueda</p>
                <form name="buscador" method="post" action="buscar.php">
                  Buscar en:
                  <select name="campo">
                    <?php
                      while($row = mysql_fetch_row($result)) {
                    ?>
                    <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                  Palabra(s): <input type="text" name="palabra"><br>
                  <input type="submit" value="Buscar" name="enviar">
                </form>
              </center>

              <?php

if(isset($_POST['enviar'])) {
  // Solo se ejecuta si se ha enviado el formulario
  $query = "SELECT * from persona WHERE '%{$_POST['campo']}%' LIKE '%{$_POST['palabra']}%'";

  $result = mysql_query($query);

  $found = false; // Si el query ha devuelto algo pondrá a true esta variable



  while ($row = mysql_fetch_array($result)) {

    echo "string11212";

    $found = true;

    echo $row + "<br>";

    foreach($row as $nombre_campo => $valor_campo) {
      echo "string";

      // Tenemos que mostrar todos los campos de las filas donde se haya
      // encontrado la búsqueda.


      if(is_int($nombre_campo)) {

        continue; //Cuando hacemos mysql_fetch_array, php genera un array
        // con todos los valores guardados dos veces, uno con
        // índice numérico y otro con índice el nombre del campo.
        // Solo nos interesa el del nombre del campo.

      }
      echo "<b>".$nombre_campo."</b> : ".$valor_campo."<br>";

      // if ($nombre_campo === 'regla'|$nombre_campo === 'tagrfid') {

      // }
      // else{
      //   echo "<b>".$nombre_campo."</b> : ".$valor_campo."<br>";
      // }
    }
    echo "</p>";
  }

  




  if(!$found) {
    echo "<br>No se encontró la palabra introducida";
  }

}
                
              ?>


          
            </div> 
              
            <div class="cleaner"></div>
          </div>

          <div class="cleaner"></div>
        </div>
      </div>
        
      <div class="cleaner"></div>

      <div id="templatemo_footer_wrapper">

        <div id="templatemo_footer">

          Copyright © 2048 <a href="#">Your Company Name</a> | 
          Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>

          <div class="cleaner"></div>

        </div>

    </div> 

  </body>

</html>