<?php 
	include("../funciones.php");
	$nombre    = sanitizar("nombre_txt");
	$apellidos = sanitizar("apellidos_txt");
	$usuario   = sanitizar("usuario_txt");
	$correo    = sanitizar("correo_txt");
	$password  = sanitizar("password_txt");

	$val_uno = consulta_val("SELECT NULL FROM usuarios WHERE usuario = '$usuario'");
	if ($val_uno == 0) {
		$val_two = consulta_val("SELECT null FROM usuarios WHERE correo ='$correo'");
		if ($val_two == 0) {
			$insertar  = consulta_gen("INSERT INTO usuarios(nombre,apellidos,usuario,correo,pass_xc,grupo,fecha_registro) 
								VALUES('$nombre','$apellidos','$usuario','$correo','$password','--','$fecha_hora' )");
		echo "00";	
		}
		else{
			echo "El correo que se esta ingresando ya había sido registrado";
		}
	}
	else{
		echo "El nombre de usuario que se esta ingresando ya había sido registrado";
	}
?>