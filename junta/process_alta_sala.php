<?php 
	include("funciones.php");
	$name_sala   = sanitizar("sala_txt");
	$hora_inicio = sanitizar("hora_inicio_txt");
	$hora_fin    = sanitizar("hora_fin_txt");
	$insertar    = consulta_gen("INSERT INTO salas_juntas(name_sala,hora_inicio,hora_fin,fecha_registro,estado) values('$name_sala','$hora_inicio','$hora_fin','$fecha_hora','libre')");
	echo "00";
?>