<?php 
	include("../../funciones.php");

	echo $name_inmueble = sanitizar("name_txt");
	echo $calle = sanitizar("calle_txt");
	echo $num_int = sanitizar("num_int_txt");
	echo $num_ext = sanitizar("num_ext_txt");
	echo $colonia = sanitizar("colonia_txt");
	echo $entidad = sanitizar("entidad_txt");
	echo $demarcacion = sanitizar("demarcacion_txt");
	echo $referencia = sanitizar("referencias_txt");
	echo $codigo = sanitizar("autorizacion_txt");

?>