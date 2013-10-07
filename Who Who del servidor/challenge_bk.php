<?php include 'conexion.php'; 
if(isset($_REQUEST['id'])){
	$idChall = $_REQUEST['id'];
	$query = "SELECT * FROM challenge WHERE idChallenge = '$idChall'";
	$result = mysql_query($query) or die(mysql_error()); 
	$row = mysql_fetch_array($result);
	$challenge1 = array();
	$challenge1[1] = $row['idChallenger'];
	$challenge1[2] = $row['idChallenged'];
	$challenge1[3] = $row['idWho'];

	var_dump($challenge1);
}
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
 	var level2 = 0; 
 	var idWho = <?php echo $challenge1[3] ?>;
	function loadQuestion(){
		level2++;
		console.log(level2);
	    $.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queryLevel.php",
	        data: {level:level2, idWho: idWho},
	         dataType: 'json',
	        success:function(result){
	      	$("#question").html(result["json"][0]['question']);
	    }});

	}

	function ganador(level){

	    if(level == 1){
	    	console.log("Nivel 1");
	    	pts = 5;

			$.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queries.php",
	        data: {level:level, idch:idch, pts:pts},
	        dataType: 'json',
	        success:function(result){
	      		$("#question").html(result["json"][0]['question']);
	    	}
	    	});		
	    }


	    if(level == 2){
	    	console.log("Nivel 2");
	    	pts = 4;

			$.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queries.php",
	        data: {level:level, idch:idch, pts:pts},
	        dataType: 'json',
	        success:function(result){
	      		$("#question").html(result["json"][0]['question']);
	    	}
	    	});		
	    }


	    	if(level == 3){
	    	console.log("Nivel 3");
	    	pts = 3;

			$.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queries.php",
	        data: {level:level, idch:idch, pts:pts},
	        dataType: 'json',
	        success:function(result){
	      		$("#question").html(result["json"][0]['question']);
	    	}
	    	});		
	    }
	    	


	    	if(level == 4){
	    	console.log("Nivel 4");
	    	pts = 2;

			$.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queries.php",
	        data: {level:level, idch:idch, pts:pts},
	        dataType: 'json',
	        success:function(result){
	      		$("#question").html(result["json"][0]['question']);
	    	}
	    	});		
	    }



	    if(level == 5){
	    	console.log("Nivel 5");
	    	pts = 1;

			$.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queries.php",
	        data: {level:level, idch:idch, pts:pts},
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
	        data: {level:level, idch:idch, pts:pts},
	        dataType: 'json',
	        success:function(result){
	      		$("#question").html(result["json"][0]['question']);
	    	}
	    	});		
	    }
	}

	$(window).load(function(){
		startCountDown(5, 1000, myFunction);
	    loadQuestion();
	});

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
		startCountDown(5, 1000, myFunction);
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
		$path = $row['idChallenged'];
		$method = 'GET';
		$params = array('fields' => 'friends.fields(picture,name)');
		$myFriendsResponse = $facebook->api($path, $method, $params);

		/* Get mutual friends of response */
		$myFriends = $myFriendsResponse["friends"]["data"];
		
		echo '
			<div id="content_mutualfriends" class="friendsContainer">
			<div class="clear"></div>';
		
		for($i=0; $i < 21; $i++ ){
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

	});

</script>