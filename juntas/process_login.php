<?php
	include("funciones.php");
	echo $usuario  = sanitizar("usuario_txt");
	echo $password = sanitizar("pass_txt");

	if ($usuario == "admin") {
		if ($password == $permiso) {
			?><script>window.location.href = "administrador.php";</script> <?php
		}
		else{
			echo "Usuario o contraseña incorrectos";
		}
	}
	else{
		echo "Consulta base";
	}	



?>