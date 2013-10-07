<?php include 'conexion.php'; 
if(isset($_REQUEST['id'])){
	$id = $_REQUEST['id'];
	//$level = $_REQUEST['level'];
	$level = rand(1,5);
	$sublevel = rand(1,4);
	$query = "SELECT * FROM challenge WHERE idChallenge = '$id'";
	$result = mysql_query($query) or die(mysql_error()); 
	$row = mysql_fetch_array($result);
	$challenge1 = array();
	$challenge1[1] = $row['idChallenger'];
	$challenge1[2] = $row['idChallenged'];
	$challenge1[3] = $row['idWho'];
}

//var_dump($challenge1);

/* Filtarar pregunta */
/* Se toma al usuario que tiene que adivinar el reto */
$uid = $facebook->getUser();

/* Nivel de la pregunta */
//$level = 5; //lo da rul
//$sublevel = 1; //lo d raul
$hasInformation = false;
$variable = 1;

if($uid > 0 && $who > 0){
	$path = $challenge1[3];
	$method = 'GET';

	/* While para checar si existe el parametro en la informacion del usuario */
	while (!$hasInformation) {
		switch ($level) {
			/* NIVEL 1 */
			case 1:
				switch ($sublevel) {
					case 1: case 2: /* Genero */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "gender"));
						$sublevel++;
						break;
					case 3: /* Lugar */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "location"));
						$variable = $whoFriendInformation["location"]["name"];
						break;
					case 4: /* Lenguajes */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "languages"));
						$variable = $whoFriendInformation["languages"][0]["name"];
						$sublevel++;
						break;
					default:
						$level++;
						$sublevel = 1;
						break;
				}
				
				if(count($whoFriendInformation) > 1){ $hasInformation = true; }

				break;
			/* NIVEL 2 */
			case 2:
				switch ($sublevel) {
					case 1: /* Studing */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "education"));
						$sublevel++;
						break;
					case 2: /* Working */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "work"));
						$sublevel++;
						break;
					case 3: /* Eventos */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "events"));
						$sublevel++;
						break;
					case 4: /* Locations */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "locations"));
						$sublevel++;
						break;
					case 5: /* Locations */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "hometown"));
						$sublevel++;
						break;
					default:
						$level++;
						break;
				}

				if(count($whoFriendInformation) > 1){ $hasInformation = true; }

				break;
			/* Nivel 3 */
			case 3:
				switch ($sublevel) {
					case 1: /* Mutual Friends */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "mutualfriends.user(".$uid.")"));
						$sublevel++;
						break;
					case 2: /* Movies */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "movies"));
						$sublevel++;
						break;
					case 3: /* Music */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "music"));
						$sublevel++;
						break;
					case 4: /* Checkins */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "checkins"));
						$sublevel++;
						break;
					case 5: /* Sports */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "sports"));
						$sublevel++;
						break;
					default:
						$level++;
						break;
				}

				if(count($whoFriendInformation) > 1){ $hasInformation = true; }
			break;
			/* Nivel 4 */
			case 4:
				switch ($sublevel) {
					case 1: /* Relationship Status */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "relationship_status"));
						$sublevel++;
						break;
					case 2: /* Relogion */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "religion"));
						$sublevel++;
						break;
					case 3: /* Television */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "television"));
						$sublevel++;
						break;
					case 4: /* Books */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "books"));
						$sublevel++;
						break;
					default:
						$level++;
						break;
				}

				if(count($whoFriendInformation) > 1){ $hasInformation = true; }
				break;
			/* Nivel 5 */
			case 5:
				switch ($sublevel) {
					case 1: /* Birthday */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "birthday"));
						$sublevel++;
						break;
					case 2: /* Grupos */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "groups"));
						$sublevel++;
						break;
					case 3: /* Webite */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "website"));
						$sublevel++;
						break;
					case 4: /* Webite */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "website"));
						$sublevel++;
						break;
					case 5: /* Webite */
						$whoFriendInformation = $facebook->api($path, $method, array("fields" => "statuses"));
						$sublevel++;
						break;
					default:
						$level++;
						break;
				}

				if(count($whoFriendInformation) > 1){$hasInformation = true; }
				break;
			default:
				# code...
				break;
		}
	}
}
		
//echo '</br> level = '.$level .'</br>';
//echo '</br> sublevel = '.$sublevel .'</br>';
//echo '</br> variable = '.$variable .'</br>';

?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
 	var level2 = <?php echo $level-1;?>; /* El nivel se pone de la base de datos */
 	var sublevel2 = <?php echo $sublevel-1;?> /* El subnivel se pone de la base de datos */
 	var idWho = <?php echo $challenge1[3] ?>; /* Quien se tiene que adivinar */
	var variable2 = <?php echo $variable;?>;
	function loadQuestion(){
		level2++; sublevel2++;
		console.log(level2);
	    $.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queryLevel.php",
	        data: {level:level2, idWho: idWho, sublevel:sublevel2, variable:variable2},
	         dataType: 'json',
	        success:function(result){
	      	$("#question").html(result["json"][0]['question']);
	    }});

	}

	$(window).load(function(){
		startCountDown(15, 1000, myFunction);
	    loadQuestion();
	});

	    function ganador(level){

	    if(level == 1){
	    	console.log("Nivel 6");
	    	pts = 0;

			$.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queries.php",
	        data: {level:level, idWho:idWho, pts:pts},
	        dataType: 'json',
	        success:function(result){
	      		$("#question").html(result["json"][0]['question']);
	    	}
	    	});		
	    }


	    if(level == 2){
	    	console.log("Nivel 6");
	    	pts = 0;

			$.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queries.php",
	        data: {level:level, idWho:idWho, pts:pts},
	        dataType: 'json',
	        success:function(result){
	      		$("#question").html(result["json"][0]['question']);
	    	}
	    	});		
	    }


	    	if(level == 3){
	    	console.log("Nivel 6");
	    	pts = 0;

			$.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queries.php",
	        data: {level:level, idWho:idWho, pts:pts},
	        dataType: 'json',
	        success:function(result){
	      		$("#question").html(result["json"][0]['question']);
	    	}
	    	});		
	    }
	    	


	    	if(level == 4){
	    	console.log("Nivel 6");
	    	pts = 0;

			$.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queries.php",
	        data: {level:level, idWho:idWho, pts:pts},
	        dataType: 'json',
	        success:function(result){
	      		$("#question").html(result["json"][0]['question']);
	    	}
	    	});		
	    }



	    if(level == 5){
	    	console.log("Nivel 6");
	    	pts = 0;

			$.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queries.php",
	        data: {level:level, idWho:idWho, pts:pts},
	        dataType: 'json',
	        success:function(result){
	      		$("#question").html(result["json"][0]['question']);
	    	}
	    	});		
	    }



	    if(level == 6){
	    	console.log("Nivel 6");
	    	pts = 0;

			$.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queries.php",
	        data: {level:level, idWho:idWho, pts:pts},
	        dataType: 'json',
	        success:function(result){
	      		$("#question").html(result["json"][0]['question']);
	    	}
	    	});		
	    }
	}

	function startCountDown(i, p, f) {
		var pause = p;
		var fn = f;
		//	make reference to div
		var countDownObj = document.getElementById("countDown");
			if (countDownObj == null) {
			//	error
			alert("div not found, check your id");
			//	bail
			return;
			}
		countDownObj.count = function(i) {
		//	write out count
		countDownObj.innerHTML = i + " seconds";
			if (i == 0) {
				fn();
				return;
			}
		setTimeout(function() {
			countDownObj.count(i - 1);
		},
			pause
		);
		}
		countDownObj.count(i);
	}

	function myFunction() {
		console.log("Hola");
		loadQuestion();
		startCountDown(15, 1000, myFunction);
	}
</script>

<!--<div id="etapasCont" class="">
	<div class="containerDiv" id="etapas">
		<div class="infoContainer">						
-->
		<div id="logoWho"></div>
		<div class="titulosWho titulosQuestion"><p id="question" class="titulo"></p></div>
		<div id="timerContainer"><p class="titulo">Time: <br/></p><div id="countDown" class="img-polaroid"></div></div>


<?php 	
		/* Se escoge una pregunta */	
		

		/* Se despliega 20 personas para adivinar */
		$path = $row['idChallenged'];
		$method = 'GET';
		$params = array('fields' => 'friends.fields(picture,name)');
		$myFriendsResponse = $facebook->api($path, $method, $params);

		/* Get mutual friends of response */
		$myFriends = $myFriendsResponse["friends"]["data"];
		
		echo '
			<div id="content_mutualfriends" class="friendsContainer">
			<div class="clear"></div>';
		
		for($i=0; $i < 20; $i++ ){
			
			echo '<a href="http://whowho.20d.mx/?page=mutual-friends&name='.$myFriends[$i]['name'].'&friend='.$myFriends[$i]['id'].'">';
			echo '<div id="'.$myFriends[$i]['id'].'" class="mutual_personal">';
			echo '<p class="puestoPersona">'.$myFriends[$i]['name'].'</p>';
			echo '<img class="img-polaroid"  src="'.$myFriends[$i]['picture']['data']['url'].'" />';
			echo '</div></a>';
		}

		echo "</div>";
?>



<script type="text/javascript">
	
	$("document").ready(function() {

		 $(".mutual_personal").mouseenter(function() {
		 	$(this).css("background", "rgba(184, 184, 174, 0.12)");
		    $(this).find(".img-polaroid").css("width","74px");
		  }).mouseleave(function() {
		  	$(this).css("background", "rgba(184, 184, 174, 0.21)");
		    $(this).find(".img-polaroid").css("width","64px");
		  });

		  $(".mutual_personal").click(function() {
		  	$(this).addClass("divDisable");
		  	$(this).css("cursor", "default");
		    $(this).find(".img-polaroid").addClass("imgDisable");
		  });

		


	});

</script>