
<?php 

	include 'conexion.php';

	require_once("src/facebook.php");

	  $config = array();
	  $config['appId'] = '446634545453831';
	  $config['secret'] = 'a5e2d45e69944736853f3fe39449e924';
	  $config['fileUpload'] = false; // optional

	   $facebook = new Facebook($config);

	  $params = array(
		  'scope' => 'read_stream',
		  'redirect_uri' => 'http://whowho.herokuapp.com/'
		);
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
		<meta name="viewport" content="?width=320?/">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="Shortcut Icon" type="image/x-icon" href="../images/icono.png">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css" />
		<link rel="stylesheet" type="text/css" href="../css/reset.css" />
		<link rel="stylesheet" type="text/css" href="../css/effects.css" />		     
		<link href="../css/adipoli.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="../js/validar.js"></script>	
		<script src="/js/bootstrap.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/collapse-bootstrap.min.js"></script>
		<script src="/js/bootstrap-collapse.js"></script>
        <title>WhoWho?</title>
		<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
	</head>
	
	<?php
      
    /*GET PARRAFOS OHANA*/
    $query = "SELECT * FROM questions"; 
    $result= mysql_query($query) or die (mysql_error());

	while($row = mysql_fetch_array($result))
	  {
	  echo $row['idQuestion'] . " " . $row['question'];
	  echo "<br>";
	  }
	?>
	
>>>>>>> bbdc82b591eb730a2e2bf89e51a5bce653949f03
	<body>
		<div id="wrap">
			<header>
				<div class="navbar navbar-inverse" style="bottom: 0;position: fixed;right: 0;left: 0;z-index: 1030;margin-bottom: 0;">
					<div class="navbar-inner">
						<div class="containerDiv">
							<div id="logoNavBar">
								<a class="logoBar" href="#" name="top"><div id="logoWho_ft"></div></a>
							</div>
							<div class="nav-collapse collapse">
								<ul class="nav">
									<li id="a_about"><div id="icon-about" class="iconoNav"></div><a>About</a></li>
								  	<li id="a_team"><div id="icon-team" class="iconoNav"></div><a>Team</a></li>  	
								</ul>
							</div><!--/.nav-collapse -->
						</div><!--/.container-fluid -->
					</div><!--/.navbar-inner -->
				</div><!--/.navbar -->
			</header>
		<div id="div_Mutual" style="display:none;">
			<? include('mutual.php'); ?>
		</div>
				
		</div> 
		<div id="div_Team" style="display:none;">
			<? include('equipo.php'); ?>
		</div>
	</body>
</html>

<script type="text/javascript">	
	$("document").ready(function() {
		$('#a_team').click(function(){
			$('#div_Team').css('display', 'block');
			$('#div_who').css('display', 'none');
			$('#div_about').css('display', 'none');			   
		 });
		$('#logoNavBar').click(function(){
			$('#div_Team').css('display', 'none');
			$('#div_about').css('display', 'none');			   
			$('#div_who').css('display', 'block');			   
		 });

	});
</script>

