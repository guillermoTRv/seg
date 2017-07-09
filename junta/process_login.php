<?php
	include("funciones.php");
	$usuario  = sanitizar("usuario_txt");
	$password = sanitizar("pass_txt");

	if ($usuario == "admin") {
		if ($password == $permiso) {
			?><script>window.location.href = "administrador_mobil.php";</script> <?php
		}
		else{
			echo "Usuario o contraseña incorrectos";
		}
	}
	else{
		$consulta_user = consulta_val("SELECT null FROM usuarios WHERE pass_xc = '$password' and (usuario = '$usuario' or correo = '$usuario')");
		if ($consulta_user == 1) {
			session_start();
			$consulta_session = consulta_array("SELECT * FROM usuarios WHERE usuario = '$usuario' or correo = '$usuario'");
			$_SESSION['id_usuario']     = $consulta_session['id_usuario'];
			?><script>window.location.href = "usuario.php";</script> <?php
		}
		if ($consulta_user == 0) {
			echo "Usuario o contraseña incorrectos";
		}
	}	



?>