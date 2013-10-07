<?php

include('conexion.php');

session_start();
if(isset($_SESSION['uid'])){
		

	

?>


<div id="headerWho" style="padding: 20px;">
	<a href="index.php"> <div id="logoWho"></div></a>
	<div class="clear"></div>
	<p class="titulo">Step 1.</p><p class="nombrePersona">Choose a friend to challenge!</p>
</div>

<div id="left_container">
	
	<div class="friendsContainer">

<?php 

	//session_start(); 
	//if(!isset($_SESSION['uid'])){


	
	$fql = 'SELECT name from user where uid = ' . $uid;
	$ret_obj = $facebook->api(array( 'method' => 'fql.query', 'query' => $fql, ));
	$name = $ret_obj[0]['name'];

	$r = mysql_query("SELECT idFacebook FROM users WHERE idFacebook = ".$uid, $conexion) or die(mysql_error());

	if (count(mysql_fetch_array($r)) > 0) {
		mysql_query("INSERT INTO users (idUser,idFacebook, name) VALUES(NULL,".$uid.",'".$name."');", $conexion) or die(mysql_error());
	}

	if($uid > 0){
		/* Get 2 people mutual friends */
		$path = $uid;
		$method = 'GET';
		//$params = array('fields' => 'friends.fields(picture,name)');
		$params = array('fields' => 'friends.fields(name,picture)');
		asort($params);
		$myFriendsResponse = $facebook->api($path, $method, $params);

		/* Get mutual friends of response */
		$myFriends = $myFriendsResponse["friends"]["data"];

		//var_dump($mutualfriends);

		foreach ($myFriends as $friend) {
			
			echo '<a href="http://whowho.20d.mx/?page=mutual-friends&name='.$friend['name'].'&friend='.$friend['id'].'">';
			echo '<div id="'.$friend['id'].'" class="mutual_personal">';
			echo '<p class="puestoPersona">'.$friend['name'].'</p>';
			//echo '<img class="img-polaroid"  src="/image.php?width=64&image='.$friend['picture']['data']['url'].'" />';
			echo '<img class="img-polaroid"  src="'.$friend['picture']['data']['url'].'" />';
			echo '</div></a>';

		}

		$challengedSql = '';
		$challengesQuery = "Select * from challenge where idChallenged = ".$uid;
		$challengedSql = mysql_query($challengesQuery) or die(mysql_error());

		$uidu = $facebook->getUser();
		$challengesXPerson = "Select * from challenge where idChallenger = ".$uidu;
		$challengesXPersonSql = mysql_query($challengesXPerson) or die(mysql_error());
	}
?>
	</div>

</div>
<div class="right_container up" >
	<p class="titulo " style="text-align: center;"> <span class="nameFriend_span"> Who </span> you challenge?</p> 
  	<hr>
  	<?php
  		if($challengesXPersonSql != 0 && $challengesXPersonSql != NULL){
  			while ($rowChallenger = mysql_fetch_assoc($challengesXPersonSql)) {
  				$challengered = $facebook->api($rowChallenger['idChallenged'], $method, array('fields' => 'name,picture'));
	  			echo '<div class="challenges_each">
				  	<img class="img-polaroid" src="'.$challengered["picture"]["data"]["url"].'" >
				  	<p class="nombrePersona">'.$challengered["name"].'</p>
					<div class="hidden-phone divider"></div>
					<p class="nombrePersona">'.$rowChallenger["score"].' Pts</p>
					
				</div>';
	  		}
  		}
  	?>
	<div class="clear"></div>
	<hr>
</div>
<div class="right_container" >
  	<p class="titulo" style="text-align: center;"> Your challenges</p> 
  	<hr>

  	<?php
  		if($challengedSql != 0 && $challengedSql != NULL){
  			while ($rowChallenge = mysql_fetch_assoc($challengedSql)) {
  				$challenger = $facebook->api($rowChallenge['idChallenger'], $method, array('fields' => 'name,picture'));
	  			echo '<div class="challenges_each">
				  	<img class="img-polaroid" src="'.$challenger["picture"]["data"]["url"].'" >
				  	<p class="nombrePersona">'.$challenger["name"].'</p>
					<div class="hidden-phone divider"></div>
					<p class="nombrePersona">'.$rowChallenge["score"].' Pts</p>
					<a href="http://whowho.20d.mx/?page=challenge&id='.$rowChallenge["idChallenge"].'"><button class="btn btn-success" type="button">Play</button></a>
				</div>';
	  		}
  		}
  	?>
	<div class="clear"></div>
	<hr>
</div>

<div class="clear" style="height:100px;"></div>

<?php


	}else{
		echo '
			<div id="headerWho">
				<div id="logoWho"></div>	
				<div class="clear"></div>
			</div>
		';
	}


?>