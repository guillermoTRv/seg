<?php 
	include("../funciones.php");
	$nombre = sanitizar("nombre");
	$apellidos = sanitizar("apellidos");
	$correo = sanitizar("correo");
	$usuario = sanitizar("usuario");
	$pass = sanitizar("password");
	$id_usuario = sanitizar("id_usuario");

	//$cont = consulta_val("SELECT null FROM usuarios WHERE ")

	if ($pass == '') {
		consulta_gen("UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',correo='$correo',usuario='$usuario' where id_usuario ='$id_usuario'");	
	}
	else{
		consulta_gen("UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',correo='$correo',usuario='$usuario',pass_xc='$pass' where id_usuario ='$id_usuario'");
	}
	echo "si";
?>