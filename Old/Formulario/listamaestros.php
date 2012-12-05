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


<?php 
   $connection= mysql_connect("localhost","root","") or die("Connection Failed".mysql_error());
    mysql_select_db("proyectorfid",$connection)or die("Error loading the DataBase".mysql_error());

    $callback = $_REQUEST['callback'];
    $data  = array();
    $users = array();
    
    $query = 'SELECT * FROM persona';
    $personas = mysql_query($query);


     echo "<table border=1 cellpadding=4 cellspacing=0>";

/*Priemro los encabezados*/
 echo "<tr>
         <th colspan=5> Reporte </th>
         
       <tr>
        <th>Name</th> <th> Posible</th>
        </tr>";
    
    while ($row = mysql_fetch_array($personas)) {
        $tag = $row['tagrfid'];
        $query = "SELECT * FROM bitacora WHERE tagrfid = $tag ORDER BY getsIn DESC";
        $bitacora = mysql_query($query);
        while ($rows = mysql_fetch_array($bitacora)) {
            if ($rows['status']== 0) {
                $status = 'Entro';
            } else {
                $status = 'Salio';
            }
            
            array_push($data,array(  
                "place"     => $rows["place"],  
                "status"    => $status,
                "date"      => $rows["getsIn"]
            ));
        }
        $id = $row['regla'];
        //echo $id;

        $regla = mysql_fetch_object(mysql_query("SELECT posible FROM reglas WHERE id = $id"));
        array_push($users,array(
            "name"      => $row["name"],
            "posible"   => $regla->posible,
            "data"      => $data    
        ));
        $data = array();
     
 echo "<tr>
        
         <td> $row[name]</td>
         <td>  $regla->posible </td>
      </tr>";
}
echo "</table>";
?>



</body>
</html>