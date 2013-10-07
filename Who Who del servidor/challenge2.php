<?php include 'conexion.php'; 
require_once("src/facebook.php");

	/* Facebook Configuration */
  	$config = array();
  	$config['appId'] = '446634545453831';
  	$config['secret'] = 'a5e2d45e69944736853f3fe39449e924';
  	$config['fileUpload'] = false; // optional

   	$facebook = new Facebook($config);

 	$params = array(
		'scope' => 'read_stream',
	  	'redirect_uri' => 'http://whowho.20d.mx/'
	);

	
	/* Logged in user id */
	$uid = $facebook->getUser();
	
		/* Login request to Facebook */
		$loginUrl = $facebook->getLoginUrl($params);
		/* Link to login */
		echo '<a href="'.$loginUrl.'">Facebook Login</a><div class="clear"></div><br/>';
		
					
?>
<html>
<head>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
	<script>
	 var level = 0; 
	
function loadQuestion(){
	level = level + 1;
	console.log(level);
    $.ajax({
    	type: "POST",
        url: "http://whowho.20d.mx/queryLevel.php",
        data: {level:level},
         dataType: 'json',
        success:function(result){
      	$("#question").html(result["json"][0]['question']);
    }});

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
				console.log("Hola");
				loadQuestion();
				startCountDown(5, 1000, myFunction);
			}
	</script>

</head>


<div>
	<div id="countDown"></div>
<div>Who</div>

	  	<div > 
	  		<a id="question"> </a>
	  		<?php $path = $uid;
			$method = 'GET';
			$params = array('fields' => 'fields=friends');
			$friendsResponse = $facebook->api($path, $method, $params);

			/* Get mutual friends of response */
			$friends = $friendsResponse["friends"]["data"];
			$friendsArray=array();
			foreach ($friends as $friends) {
				$friednsArray = $friends['id'];
			}
			echo $friednsArray[0];

			?>
	  	</div>
	  	<button id="button">Next</button>
	 


</div>
</html>

