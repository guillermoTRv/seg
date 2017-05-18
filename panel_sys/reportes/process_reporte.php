<?php 
	session_start();
	if ($_SESSION['type_user'] == 'guardia' || $_SESSION['type_user'] == 'supervisor') {
		include("../../funciones.php");
		$identificador     = $_SESSION['identificador'];
		$consulta_registro = consulta_array("SELECT id_registro_es,inmueble FROM registros_es WHERE identificador = '$identificador' order by id_registro_es desc"); 
		$id_registro_es    = $consulta_registro['id_registro_es'];
		$id_inmueble       = $consulta_registro['inmueble']; 

		$detalle_repo = sanitizar("detalle_repo_txt");
		$option_est   = sanitizar("option_est");
		
		$insertar_reporte  = consulta_gen("INSERT INTO reportes_extra(identificador,id_registro_es,detalle_reporte,estado_inicial,estado_control,fecha_registro) values(
			'$identificador',
			'$id_registro_es',
			'$detalle_repo',
			'$option_est',
			'en-proceso',
			'$fecha_hora'
			)");
		

	}

	$id_reporte  = consulta_tx("SELECT id_reporte FROM reportes_extra WHERE id_registro_es = '$id_registro_es' order by id_reporte desc","id_reporte");
	 


	if ($_FILES['files']["error"] > 0){
				
	}
	else{ 
		$resultado = @move_uploaded_file($_FILES['files']["tmp_name"], "imagenes_reportes/".$id_reporte);
		if ($resultado) {					
		}
		else{
			echo "La fotografia no pudo subirse";
		}
	}
	
	$insert_estado_inm = consulta_gen("INSERT INTO estado_inmuebles(id_proveniente,modo,detalle,detalle_ck,status) values(
				'$id_reporte',
				'extraordinario',
				'$detalle_repo',
				'--',
				'$option_est')");

	$mover_estado = consulta_gen("UPDATE inmuebles SET status = '11' WHERE id_inmueble = '$id_inmueble'");


	echo "<h3><strong>El reporte fue levantado exitosamente</strong></h3>";
	#crear la funcion para poder subir multiples imagenes
?>

