<?php

/* Abrimos la base de datos */
  $conx = mysql_connect ("localhost","root","");
  if (!$conx) die ("Error al abrir la base <br/>". mysql_error()); 
  mysql_select_db("proyectorfid") OR die("Connection Error to Database");    

/* Realizamos la consulta SQL */
$sql="select persona.name,bitacora.tagrfid,getsln,status,place from bitacora inner join persona on persona.tagrfid = bitacora.tagrfid";
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

/* Desplegamos cada uno de los registros dentro de una tabla */  
echo "<table border=1 cellpadding=4 cellspacing=0>";

/*Priemro los encabezados*/
 echo "<tr>
         <th colspan=5> Reporte </th>
       <tr>
        <th>Name</th> <th> Tagrfid </th><th> Status </th>
         <th> Place </th><th> date </th>
      </tr>";

/*Y ahora todos los registros */
while($row=mysql_fetch_array($result))
{
 echo "<tr>
         <td align='right'> $row[tagrfid] </td>
         <td> $row[name]
         <td> $row[status] </td>
         <td> $row[place] </td>
         <td> $row[date] </td>
      </tr>";
}
echo "</table>";

?>
</body>
</html> 