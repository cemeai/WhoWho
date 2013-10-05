<?php
/* Empezamos la sesión */
session_start();

/* Creamos la sesión */
$_SESSION['uid'] = $_GET['uid'];

/* Si no hay una sesión creada, redireccionar al index. */
if(empty($_SESSION['uid'])) { // Recuerda usar corchetes.
	header('Location: index.php');
} // Recuerda usar corchetes
?>