<?php 
	include("../../funciones.php");
	$identificador       = sanitizar("usuario_txt");
	$fecha_entrada_post  = sanitizar("fecha_entrada");
	$dia_txt             = sanitizar("dia_txt");
	$hora_entrada        = sanitizar("hora_entrada_txt");
	$hora_salida         = sanitizar("hora_salida_txt");
	$type_jornada        = sanitizar("jornada_txt");

	$id_registro_es = 0;
	$estado         = "en-proceso";  

	echo $identificador;
	echo "<br>".$id_registro_es;
	echo "<br>".$estado;

	###tratar fecha####
	$mes_entrada = substr($fecha_entrada_post,5);

	$mes_entrada = substr($mes_entrada,0,-3);
	if (strlen($mes_entrada) == 1) {
	 	$mes_entrada = "0".$mes_entrada;
		$year        = substr($fecha_entrada_post,0,4);
		$day         = substr($fecha_entrada_post,7);
		echo "<br>".$fecha_entrada_post = $year."-".$mes_entrada."-".$day;
	} 


	if ($dia_txt == "siguiente") {
		$nuevafecha   = strtotime ( '+2 day' , strtotime ( $fecha_entrada_post ) ) ;
		$fecha_salida = date ( 'Y-m-j' , $nuevafecha );
		 
		echo "<br>".$fecha_salida;
	}
	if ($dia_txt == "en-curso") {
		echo "<br>".$fecha_salida = $fecha_entrada_post;
	}


	echo "<br>".$hora_entrada;
	echo "<br>".$hora_salida;
	echo "<br>".$type_jornada;
	#validacion para que no meta el mismo horario
?>