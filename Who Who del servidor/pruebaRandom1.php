<?php
    include 'conexion.php';
            
	$query = "SELECT idQuestion, question FROM questions WHERE level = '1' ORDER BY RAND() LIMIT 1";
	$result = mysql_query($query) or die(mysql_error()); 
	$row = mysql_fetch_array($result);
	  	?>
	  	<div id="question"> 
	  		<a><?php echo $row['question']; ?></a>
	  	</div>
	  	<button onclick="next()">Next</button>
?>
