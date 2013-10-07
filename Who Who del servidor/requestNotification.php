<?php
require_once("src/facebook.php");

	  $config = array();
	  $config['appId'] = '446634545453831';
	  $config['secret'] = 'a5e2d45e69944736853f3fe39449e924';
	  $config['fileUpload'] = false; // optional

	  $access_token = $config['appId'].'|'.$config['secret'];
	  $facebook = new Facebook($config);
		$path = '/653347944/notifications';
		$method = 'POST';
		$params = array(
			'access_token' => $access_token,
			'href' => 'http://whowho.20d.mx/',
			'template' => '@[720778033] started a game with you, play now!'
		);

		try {
			$response = $facebook->api(	$path, $method, $params);
			print_r($response);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
?>