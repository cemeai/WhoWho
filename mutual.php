<div id="etapasCont" class="">
				<div class="containerDiv" id="etapas">
					<div class="infoContainer">
						<div id="logoWho"></div>
						<p class="titulo tit_cotizacion">Hello World3</p>
			
						<div class="clear"></div>
						<?php 
							/* Login request to Facebook */
							$loginUrl = $facebook->getLoginUrl($params);
	  						/* Link to login */
	  						echo '<a href="'.$loginUrl.'">Facebook Login</a>';

	  						/* Logged in user id */
	  						$uid = $facebook->getUser();

	  						if($uid > 0){
	  							/* Get 2 people mutual friends */
		  						$path = $uid;
		  						$method = 'GET';
		  						$params = array('fields' => 'mutualfriends.user(653347944).fields(picture,name)');
		  						$mutualFriendsResponse = $facebook->api($path, $method, $params);

		  						/* Get mutual friends of response */
		  						$mutualFriends = $mutualFriendsResponse["mutualfriends"]["data"];

		  						//var_dump($mutualfriends);

		  						foreach ($mutualFriends as $mutualFriend) {
		  							echo '</br>';
		  							echo '<h6>'.$mutualFriend['name'].'</h6>';
		  							echo '<p> userId = '.$mutualFriend['id'].'</p>';
		  							echo '<img src="'.$mutualFriend['picture']['data']['url'].'" />';
		  							echo '</br>';
		  						}

	  						}
						?>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>