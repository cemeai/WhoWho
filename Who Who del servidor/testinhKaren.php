<?php
	  require_once("src/facebook.php");

	  $config = array();
	  $config['appId'] = '446634545453831';
	  $config['secret'] = 'a5e2d45e69944736853f3fe39449e924';
	  $config['fileUpload'] = false; // optional

	  $facebook = new Facebook($config);

	  $params = array(
		  'scope' => 'read_stream',
		  'redirect_uri' => 'http://whowho.20d.mx/'
		);

		$loginUrl = $facebook->getLoginUrl($params);
	  
	  	echo '<html> <head> <title>Testing FB SDK</title></head>
	  	<body>
	  		<a href="'.$loginUrl.'">Facebook Login</a></br></br>';

  		/* Se toma al usuario que se tiene que adivinar */
		$whoFriend = 595520706; //Stephanie Pineda Leal

		/* Se toma al usuario que tiene que adivinar el reto */
		$uid = $facebook->getUser();

		/* Nivel de la pregunta */
		$level = 5;
		$sublevel = 1;
		$hasInformation = false;

		if($uid > 0 && $whoFriend > 0){
			$path = $whoFriend;
			$method = 'GET';
			//$whoFriendInformation = $facebook->api($path, $method);

			//var_dump($whoFriendInformation);

			echo '</br></br>';
			
			/* While para checar si existe el parametro en la informacion del usuario */
			while (!$hasInformation) {
				switch ($level) {
					/* NIVEL 1 */
					case '1':
						switch ($sublevel) {
							case '1': case '2': /* Genero */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "gender"));
								var_dump($whoFriendInformation);
								$hasInformation = true;
								$sublevel++;
								break;
							case '3': /* Lugar */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "location"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							case '4': /* Lenguajes */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "languages"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							default:
								$level++;
								$sublevel = 1;
								break;
						}
						
						if(count($whoFriendInformation) > 1){
							$hasInformation = true;
						}

						break;
					/* NIVEL 2 */
					case '2':
						switch ($sublevel) {
							case '1': /* Studing */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "education"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							case '2': /* Working */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "work"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							case '3': /* Eventos */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "events"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							case '4': /* Locations */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "locations"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							case '5': /* Locations */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "hometown"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							default:
								$level++;
								break;
						}

						if(count($whoFriendInformation) > 1){
							$hasInformation = true;
						}
					/* Nivel 3 */
					case '3':
						switch ($sublevel) {
							case '1': /* Mutual Friends */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "mutualfriends.user(".$uid.")"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							case '2': /* Movies */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "movies"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							case '3': /* Music */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "music"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							case '4': /* Checkins */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "checkins"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							case '5': /* Sports */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "sports"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							default:
								$level++;
								break;
						}

						if(count($whoFriendInformation) > 1){
							$hasInformation = true;
						}
					/* Nivel 4 */
					case '4':
						switch ($sublevel) {
							case '1': /* Relationship Status */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "relationship_status"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							case '2': /* Relogion */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "religion"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							case '3': /* Television */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "television"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							case '4': /* Books */
								$whoFriendInformation = $facebook->api($path, $method, array("fields" => "books"));
								//var_dump($whoFriendInformation);
								//$hasInformation = true;
								$sublevel++;
								break;
							default:
								$level++;
								break;
						}

						if(count($whoFriendInformation) > 1){
							$hasInformation = true;
						}
						/* Nivel 5 */
						case '5':
							switch ($sublevel) {
								case '1': /* Birthday */
									$whoFriendInformation = $facebook->api($path, $method, array("fields" => "birthday"));
									//var_dump($whoFriendInformation);
									//$hasInformation = true;
									$sublevel++;
									break;
								case '2': /* Grupos */
									$whoFriendInformation = $facebook->api($path, $method, array("fields" => "groups"));
									//var_dump($whoFriendInformation);
									//$hasInformation = true;
									$sublevel++;
									break;
								case '3': /* Webite */
									$whoFriendInformation = $facebook->api($path, $method, array("fields" => "website"));
									//var_dump($whoFriendInformation);
									//$hasInformation = true;
									$sublevel++;
									break;
								case '4': /* Webite */
									$whoFriendInformation = $facebook->api($path, $method, array("fields" => "website"));
									//var_dump($whoFriendInformation);
									//$hasInformation = true;
									$sublevel++;
									break;
								case '5': /* Webite */
									$whoFriendInformation = $facebook->api($path, $method, array("fields" => "statuses"));
									var_dump($whoFriendInformation);
									$hasInformation = true;
									$sublevel++;
									break;
								default:
									$level++;
									break;
							}

							if(count($whoFriendInformation) > 1){
								//$hasInformation = true;
							}
					default:
						# code...
						break;
				}
			}

			
		}



	  	echo '</body></html>';

?>