<?php
	include('conexion.php');

		$idch = $_REQUEST['idch'];
		$level = $_REQUEST['level'];
		$pts = $_REQUEST['pts'];
		$date = date(DATE_RFC2822);


		mysql_query("UPDATE  challenge   
			SET score = '.$pts.', level = '.$level.'
			WHERE idch = 0" , $conexion) 
			or die(mysql_error());
?>




