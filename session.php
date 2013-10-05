<?php
/* Empezamos la sesión */
session_start();

/* Creamos la sesión */
$_SESSION['id'] = $_POST['id'];

/* Si no hay una sesión creada, redireccionar al index. */
if(empty($_SESSION['username'])) { // Recuerda usar corchetes.
	header('Location: index.html');
} // Recuerda usar corchetes
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Creamos y mostramos la sesión</title>
</head>
<body>
<div class="c1">
<h2>Mostramos los datos guardados</h2>
<section>
<p>
Tu nombre de usuario es <?=$_SESSION['username'];?>
</p>
</section>
</div>
 
<div class="c2">
<section>
<p>
<a href="./index.html">Eliminar sesión</a> <!-- de esta forma se crea la nueva session, sin necesidad de crear otro script en php. -->
</p>
</section>
</div>
</body>