<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>About Chrome Web Design</title>
<meta name="keywords" content="About Chrome, Web Design, CSS, HTML, free template, templatemo" />
<meta name="description" content="Chrome Company - free website template provided by templatemo.com" />
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
              	<li><a href="index.html">Home</a></li>
          		<li><a href="about.html" class="selected">About</a></li>
              	<li><a href="contact.html">Contact</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->
    </div> <!-- end of header -->   
    <div id="templatemo_main">
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
    echo "<tr><th colspan=5> Reporte </th><tr><th>Name</th> <th> Posible</th>";
    
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
           <div class="cleaner"></div>
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