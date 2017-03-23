<?php 
	include("funciones.php");
	$usuario = sanitizar("user_txt");
	$pass    = sanitizar("pass_txt");

	if ($usuario == "root" && $pass == "123qwe") {
		?><script>window.location.href = "menu_inicial.php";</script> <?php
	}
	else{
		echo "<p style='background-color:#e06000;color:white;border-radius:5px'>Usuario o contraseña incorrectos</p>";  
	}

?>