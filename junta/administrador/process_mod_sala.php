<?php 
	include("../funciones.php");
	$id_sala   = sanitizar("id_sala");
	$name_sala = sanitizar("sala_txt");
	$hora_inicio = sanitizar("hora_inicio_txt");
	$hora_fin    = sanitizar("hora_fin_txt");
	$ini_equipo  = sanitizar("ini_equipo");
    $fin_equipo  = sanitizar("fin_equipo");

	$delete_equipo    = consulta_gen("DELETE FROM equipo_salas WHERE id_sala ='$id_sala'");
	for ($i=$ini_equipo; $i <= $fin_equipo ; $i++) { 
	     $input_equipo = sanitizar($i);
	     if ($input_equipo != '') {
	     	consulta_gen("INSERT INTO equipo_salas(id_sala,name_equipo) values('$id_sala','$input_equipo')");
	     }
	}

	$cambio = consulta_gen("UPDATE salas_juntas SET name_sala ='$name_sala',hora_inicio='$hora_inicio',hora_fin='$hora_fin' WHERE id_sala='$id_sala'");
	echo "si";
?>