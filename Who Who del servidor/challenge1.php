<?php include 'conexion.php'; ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<?php
	$r = mysql_query("SELECT   idWho FROM challenge  ", $conexion) or die(mysql_error());
	$res = mysql_fetch_array($r);
	if(count($res > 0)) {
		$idWho = $res[0];
	}
?>
<script>
 	var level = 0; 

	function loadQuestion(){
		level = level + 1;
		idWho = <? echo $idWho; ?>;
		console.log(level);
	    $.ajax({
	    	type: "POST",
	        url: "http://whowho.20d.mx/queryLevel2.php",
	        data: {level:level},
	        dataType: 'json',
	        success:function(result){
	      		$("#question").html(result["json"][0]['question']);
	    	}
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
		countDownObj.innerHTML = i;
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
		if(level < 6){
		console.log("Hola");
		loadQuestion();
		startCountDown(5, 1000, myFunction);
	}
	}
</script>

<div id="etapasCont" class="">
	<div class="containerDiv" id="etapas">
		<div class="infoContainer">						
			<div id="logoWho"></div>
			<div class="titulosWho"><p id="question" class="titulo"></p></div>
			<div id="countDown"></div>

		</div>	
	</div>	
</div>	

<div>


