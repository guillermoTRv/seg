<?php 
	session_start();
	if ($_SESSION['type_user'] == 'guardia') {
		include("../../funciones.php");
		$autorizar_estado = 0;
		$num_campos = sanitizar("cont_campos_txt");

		$identificador     = $_SESSION['identificador'];
		$consulta_registro = consulta_array("SELECT inmueble,id_registro_es FROM registros_es WHERE identificador = '$identificador' order by id_registro_es desc");
		$id_registro_es    = $consulta_registro['id_registro_es'];
		$id_inmueble       = $consulta_registro['inmueble'];



		$insertar_checklist = consulta_gen("INSERT INTO checklist_jornada(id_registro_es,fecha_registro,estado) values('$id_registro_es','$fecha_hora','hecho')");
		$id_check_j  = consulta_tx("SELECT id_check_j FROM checklist_jornada WHERE id_registro_es ='$id_registro_es'","id_check_j");
		     


		for ($i=0; $i < $num_campos ; $i++) { 
			$variable_post       = $i."_valor";
			$valor_estado        = sanitizar($variable_post);
			$variable_categoria  = $i."_categoria";
			$valor_categoria     = sanitizar($variable_categoria);
			$variable_situacion  = $i."_situacion";
			$valor_situacion     = sanitizar($variable_situacion);


			if ($valor_estado == "anomalia") {
				$variable_coment = $i."_coment";
				$valor_coment = sanitizar($variable_coment);

				$detalle_ck = $valor_categoria."-".$valor_situacion;
				$insert_estado_inm = consulta_gen("INSERT INTO estado_inmuebles(id_proveniente,modo,detalle,detalle_ck,status) values(
				'$id_check_j',
				'checklist',
				'$valor_coment',
				'$detalle_ck',
				'revisar')");
				$autorizar_estado = 1;

			}
			else{
				$valor_coment = "";
			}


			$insert_detalles = consulta_gen("INSERT INTO checklist_detalle(id_check_j,categoria,situacion,estado,comentario) VALUES(
				'$id_check_j',
				'$valor_categoria',
				'$valor_situacion',
				'$valor_estado',
				'$valor_coment'
				)");


		}

		if ($autorizar_estado == 1) {
			$mover_estado = consulta_gen("UPDATE inmuebles SET status = '11' WHERE id_inmueble = '$id_inmueble'");		
		}
		

		
		echo "<h3>El checklist fue llenado satisfactoriamente - Ahora puede registrar su salida</h3>";

	}	
?>