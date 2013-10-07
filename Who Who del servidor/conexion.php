

<?php
// Create connection
$$dbhost = "ftp.doscerodesign.com";
$dbusuario = "doscerod_whowho";
$dbpassword = "admin00%";
$db = "doscerod_whowho";
$conexion = mysql_connect($dbhost, $dbusuario, $dbpassword);  /*te contecta con la base de datos y si no se pudo conectar sale un error*/
            mysql_select_db($db, $conexion) || die(mysql_error());/*una vez que se conecto, ahora le indicas cual es el nombre de tu base de datos*/
?>
