<?php
require_once("src/facebook.php");

$config = array();
$config['appId'] = '446634545453831';
$config['secret'] = 'a5e2d45e69944736853f3fe39449e924';
$config['fileUpload'] = false; // optional

$access_token = $config['appId'].'|'.$config['secret'];
$facebook = new Facebook($config);

include('conexion.php');
$jsondata["json"] = array();

if(isset($_POST['level'])) {
	$level = $_POST['level'];
	$sublevel = $_POST['sublevel'];
	$variable = $_POST["variable"];
			$query = "SELECT idQuestion, question FROM questions WHERE level = '$level' AND sublevel = '$sublevel'";
			$result = mysql_query($query) or die(mysql_error()); 
			$row = mysql_fetch_array($result);
			$json = array();
			//$variable = 'example';
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
		//notifications
		$path = '/'.$cha2.'/notifications';
		$method = 'POST';
		$params = array(
			'access_token' => $access_token,
			'href' => 'http://whowho.20d.mx/',
			'template' => '@['.$cha1.'] started a game with you, play now! http://whowho.20d.mx/');
		$response = $facebook->api(	$path, $method, $params);

	echo json_encode($result1);

}
else if(isset($_POST['getChallenge'])){
	$query = "INSERT INTO challenge VALUES(NULL, $cha1,$cha2,$cha3,0,0,now())";
		$result1 = mysql_query($query) or die(mysql_error()); 
}

			
?>