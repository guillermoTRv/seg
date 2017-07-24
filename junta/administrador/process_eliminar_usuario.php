<?php 
	include("../funciones.php");
	$id_usuario = sanitizar_get("id_usuario");
	$delete = consulta_gen("DELETE FROM usuarios WHERE id_usuario ='$id_usuario'");
	$delete = consulta_gen("DELETE FROM reservas_juntas WHERE id_usuario ='$id_usuario'");
?>