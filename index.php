<?php include 'conexion.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta property="og:title" content="Who Who"> 
		<meta name="title" content="Who Who">

		<link rel="image_src" href="http://systheam.com/images/logoHeader.png">
		<meta name="HandheldFriendly" content="?true?">
		<meta name="MobileOptimized" content="?240?">
		
		

		<meta name="viewport" content="?width=320?/">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="Shortcut Icon" type="image/x-icon" href="../images/icono.png">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="../css/reset.css">
		<script type="text/javascript" src="../js/validar.js"></script>	
		<script src="/js/bootstrap.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/collapse-bootstrap.min.js"></script>
		<script src="/js/bootstrap-collapse.js"></script>
        <title>SYSTHEAM</title>
	<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script><script type="text/javascript">



		

		$("document").ready(function() {

			});
					 

	</script></head>
	
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
	

	<body>

	<!-- Iconos de 50 x 40 px -->
	<div id="rightBar">
		<div id="r_inicio" class="rightMenu"></div>
		<div id="r_acerca" class="rightMenu"></div>
		<div id="r_equipo" class="rightMenu"></div>
		<div id="r_servicios" class="rightMenu"></div>
		<div id="r_portafolio" class="rightMenu"></div>
		<div id="r_contacto" class="rightMenu"></div>
	</div>

	<div id="wrap">
				

		
<header>

	
	<div class="navbar navbar-inverse" style="bottom: 0;position: fixed;right: 0;left: 0;z-index: 1030;margin-bottom: 0;">
		<div class="navbar-inner">
			<div class="containerDiv">
				
				<div id="logoNavBar">
					<a class="logoBar" href="#" name="top"><div style="margin: 0 auto;
					width: 100%;
					max-width: 190px;
					height: 38px;
					float: left;
					background-image: url(../images/logoblancohdr.png);
					background-size: contain;
					background-repeat: no-repeat;
					cursor: pointer;
					"></div></a>

				</div>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li id="a_about"><div id="icon-about" class="iconoNav"></div><a>About</a></li>
					  	<li id="a_team"><div id="icon-team" class="iconoNav"></div><a>Team</a></li>
					  	
					  	
					  	
					  	
					</ul>
					
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</div>
		<!--/.navbar-inner -->
	</div>
	<!--/.navbar -->



</header>


		
		
		
		<div id="etapasCont" class=""><div class="containerDiv" id="etapas">
		<div class="infoContainer">
			<p class="titulo tit_cotizacion">Hello World2</p>
			
			
			
			<div class="clear"></div>


				
				


				


				

				




			


			<div class="clear"></div>
			
		</div>

		
		


		<div class="clear"></div>



		<script type="text/javascript">
	
			$("document").ready(function() {
				/*$(".servicios_each").hover(function(){
					//$(this).find("div.icon_servicios").fadeOut(200);
					//$(this).find("div.icon_servicios").fadeIn(200);
					$(this).find("div.icon_servicios").css("opacity","0.9");
				});*/

			

			});
	
		</script></div></div>
		
		
		
		
		

		

	</div> 
	


		

		
	


</body></html>

<?
  require_once("src/facebook.php");
  require_once("conection.php");

  $config = array();
  $config['whowhoID'] = '446634545453831';
  $config['secret'] = '	a5e2d45e69944736853f3fe39449e924';
  $config['fileUpload'] = false; // optional

  $facebook = new Facebook($config);
?>

