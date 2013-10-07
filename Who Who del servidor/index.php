<?php
	require_once("src/facebook.php");
	session_start();
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

	/* Get the actual page */
	if (isset($_REQUEST['page']) && ( 
            $_REQUEST['page'] == 'mutual-friends' || $_REQUEST['page'] == 'team' || $_REQUEST['page'] == 'about' || $_REQUEST['page'] == 'challenge' 
            )) { 
            $page = $_REQUEST['page']; 
	}else{
		$page = 'home';
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta property="og:title" content="Who Who"> 
		<meta name="title" content="Who Who">
		<link rel="image_src" href="../images/logo.png">
		<meta name="HandheldFriendly" content="?true?">
		<meta name="MobileOptimized" content="?240?">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="Shortcut Icon" type="image/x-icon" href="../images/icono.png">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css" />
		<link rel="stylesheet" type="text/css" href="../css/reset.css" />
		<link rel="stylesheet" type="text/css" href="../css/effects.css" />		     
		<link href="../css/adipoli.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="../js/validar.js"></script>	
		<!--
		<script src="/js/bootstrap.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/collapse-bootstrap.min.js"></script>
		<script src="/js/bootstrap-collapse.js"></script>

	-->
        <title>WhoWho?</title>
		<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
	</head>

	<body>
		<?php 
			/* Logged in user id */
			$uid = $facebook->getUser();
			if(!isset($_SESSION['uid'])){
				/* Login request to Facebook */
				$loginUrl = $facebook->getLoginUrl($params);
				/* Link to login */
				//echo '<a href="'.$loginUrl.'">Facebook Login</a><div class="clear"></div><br/>';
				echo '
				<div id="logContainer">
					<div id="logIn">
						<p class="titulo tit_cotizacion noFloat" style="text-align: center;">Log In</p>
						<a href="'.$loginUrl.'"><button class="btn btn-primary" type="button" >With Facebook</button></a>
					</div>
				</div>';

				

				$_SESSION['uid'] = $uid;


			}	
			include($page.'.php');
		?>
		<div id="wrap">
			<header>
				<div class="navbar navbar-inverse" style="bottom: 0;position: fixed;right: 0;left: 0;z-index: 1030;margin-bottom: 0;">
					<div class="navbar-inner">
						<div class="containerDiv">
							<div id="logoNavBar">
								<a class="logoBar" href="index.php" name="top"><div id="logoWho_ft"></div></a>
							</div>
							<div class="nav-collapse collapse">
								<ul class="nav">
									<li id="a_about"><div id="icon-about" class="iconoNav"></div><a href="index.php?page=about">About</a></li>
								  	<li id="a_team"><div id="icon-team" class="iconoNav"></div><a href="index.php?page=team">Team</a></li>
								</ul>
							</div><!--/.nav-collapse -->
						</div><!--/.container-fluid -->
					</div><!--/.navbar-inner -->
				</div><!--/.navbar -->
			</header>
		
			<div id="etapasCont" class="">
				<div class="containerDiv" id="etapas">
					<div class="infoContainer">
						<div class="clear"></div>
					</div>
					<div class="clear" style="height:100px;"></div>
				</div>
			</div>	
		</div> 
		
	</body>
</html>
