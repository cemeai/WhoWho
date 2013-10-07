<?php

include('conexion.php');
$jsondata["json"] = array();
if(isset($_POST['level'])) {
	$level = $_POST['level'];
			$query = "SELECT idQuestion, question FROM questions WHERE level = '$level' ORDER BY RAND() LIMIT 1";
			$result = mysql_query($query) or die(mysql_error()); 
			$row = mysql_fetch_array($result);
			$json = array();
			$variable = 'example';
			$str = $row['question'];
			eval("\$str = \"$str\";");
			$json["id"] = $row["idQuestion"];
			$json["question"] = $str;
			array_push($jsondata["json"],$json);
	echo json_encode($jsondata);

}
else if(isset($_POST['challenge'])) {
		$cha1 = $_POST['challenger'];
		$cha2 = $_POST['challenged'];
		$cha3 = $_POST['who'];
		$query = "INSERT INTO challenge VALUES(NULL, $cha1,$cha2,$cha3,0,0,now())";
		$result1 = mysql_query($query) or die(mysql_error()); 
	echo json_encode($result1);

}
else if(isset($_POST['getChallenge'])){
	$query = "INSERT INTO challenge VALUES(NULL, $cha1,$cha2,$cha3,0,0,now())";
		$result1 = mysql_query($query) or die(mysql_error()); 
}

			
?>