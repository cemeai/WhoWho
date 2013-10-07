
<div id="etapasCont" class="">
				<div class="containerDiv" id="etapas">
					<div class="infoContainer">						
						<div id="logoWho"></div>			
						
						
							

<?php
	/* Login request to Facebook */
	//$loginUrl = $facebook->getLoginUrl($params);
	/* Link to login */
	//echo '<a href="'.$loginUrl.'">Facebook Login</a>';

	/* Logged in user id */
	$uid = $facebook->getUser();

	if($uid > 0){
		if(isset($_REQUEST['friend']) && $_REQUEST['friend'] != ''){
			$friend = $_REQUEST['friend'];
			$friendName = $_REQUEST['name'];

			/* Get 2 people mutual friends */
			$path = $uid;
			$method = 'GET';
			$params = array('fields' => 'mutualfriends.user('.$friend.').fields(picture,name)');
			$mutualFriendsResponse = $facebook->api($path, $method, $params);

			/* Get mutual friends of response */
			$mutualFriends = $mutualFriendsResponse["mutualfriends"]["data"];

			//var_dump($mutualfriends);

			//echo 'You\'re challenging '. $friend;

			echo '	<p class="titulo tit_cotizacion"> You\'re challenging <span class="nameFriend_span">'.$friendName.'</span></p><br/>
					<p class="nombrePersona" style="float:left;">Select who you want your friend to guess</p>
					<div id="content_mutualfriends" class="friendsContainer">
					<div class="clear"></div>';
			foreach ($mutualFriends as $mutualFriend) {
				echo '<a id="'.$mutualFriend['id'].'" class="mutual-friend">';
				echo '<div id="'.$mutualFriend['id'].'" class="mutual_personal">';
				echo '<p class="puestoPersona">'.$mutualFriend['name'].'</p>';
				//echo '<p> userId = '.$mutualFriend['id'].'</p>';
				echo '<img class="img-polaroid" src="'.$mutualFriend['picture']['data']['url'].'" />';
				echo '</div></a>';
			}
		}else{
			echo ' <div class="alert alert-error">
					  Oooops!! You have to select a friend to challenge first!
					</div> ';
		}
	}
?>

<div id="julia" class="clear" style="height:100px;"></div>

<script type="text/javascript">
	
	$("document").ready(function() {

		 $(".mutual_personal").mouseenter(function() {
		 	$(this).css("background", "rgba(184, 184, 174, 0.12)");
		    $(this).find(".img-polaroid").css("width","74px");
		  }).mouseleave(function() {
		  	$(this).css("background", "rgba(184, 184, 174, 0.21)");
		    $(this).find(".img-polaroid").css("width","64px");
		  });

		  $(".mutual-friend").click(function(){
		  	var userId = <?php echo $uid;?>;
			var friend = <?php echo $friend;?>;
			var mutual = $(this).attr('id');
			console.log("userId = " + userId);
			console.log("friend = " + friend);
			console.log("Mutual = " + mutual);
			$.ajax({
		    	type: "POST",
		        url: "http://whowho.20d.mx/queryLevel.php",
		        data: {challenge:"challenge", challenger: userId, challenged: friend, who: mutual},
		        dataType: 'json',
		        success:function(result){
		        	var answer = ""+result;
		        
		        	if(answer == "true"){
		        		alert("Retado con exito");
		        		window.location.href = "http://whowho.20d.mx/";
		        	}else
		        	    console.log("No se creo");

		        	
		    }});
			
		  });

	});

</script>