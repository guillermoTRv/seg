<?php 
	include("funciones.php");
	$nombre    = sanitizar("nombre_txt");
	$apellidos = sanitizar("apellidos_txt");
	$usuario   = sanitizar("usuario_txt");
	$correo    = sanitizar("correo_txt");
	$password  = sanitizar("password_txt");

	$insertar  = consulta_gen("INSERT INTO usuarios(nombre,apellidos,usuario,correo,pass_xc,grupo,fecha_registro) 
								VALUES('$nombre','$apellidos','$usuario','$correo','$password','--','$fecha_hora' )");
	echo "00";

?>