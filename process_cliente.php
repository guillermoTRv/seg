<?php 
	include("funciones.php");
	session_start();
	$cliente = sanitizar_get("cl");
	$_SESSION['cliente'] = $cliente;
	header("Location: cliente.php");
?>