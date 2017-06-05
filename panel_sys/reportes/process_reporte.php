<?php 
	session_start();
	if ($_SESSION['type_user'] == 'guardia' || $_SESSION['type_user'] == 'supervisor') {
		include("../../funciones.php");
		include("../../psr/PHPMailer-master/class.phpmailer.php");
		$identificador     = $_SESSION['identificador'];
		$consulta_registro = consulta_array("SELECT id_registro_es,inmueble FROM registros_es WHERE identificador = '$identificador' order by id_registro_es desc"); 
		$id_registro_es    = $consulta_registro['id_registro_es'];
		$id_inmueble       = $consulta_registro['inmueble']; 

		$detalle_repo = sanitizar("detalle_repo_txt");
		$option_est   = sanitizar("option_est");
		
		$insertar_reporte  = consulta_gen("INSERT INTO reportes_extra(id_inmueble,identificador,id_registro_es,detalle_reporte,estado_inicial,estado_control,fecha_registro) values(
			'$id_inmueble',
			'$identificador',
			'$id_registro_es',
			'$detalle_repo',
			'$option_est',
			'en-proceso',
			'$fecha_hora'
			)");
		

	}

	$id_reporte  = consulta_tx("SELECT id_reporte FROM reportes_extra WHERE id_registro_es = '$id_registro_es' order by id_reporte desc","id_reporte");
	 

	$var_imagen = 0;
	if ($_FILES['files']["error"] > 0){
		$var_foto = "";
	}
	else{ 
		$resultado = @move_uploaded_file($_FILES['files']["tmp_name"], "imagenes_reportes/".$id_reporte);
		if ($resultado) {
			##$var_imagen = "<br><img src = 'imagenes_reportes/$id_reporte'>";
			$var_imagen = 1;
			$var_foto = "<img src='https://gruposelta.com.mx/security/panel_sys/reportes/imagenes_reportes/$id_reporte' width='300'>";
		}
		else{
			echo "La fotografia no pudo subirse";
		}
	}
	
	$insert_estado_inm = consulta_gen("INSERT INTO estado_inmuebles(id_inmueble,identificador,id_proveniente,modo,detalle,detalle_ck,status,fecha_registro) values(
				'$id_inmueble',
				'$identificador',
				'$id_reporte',
				'extraordinario',
				'$detalle_repo',
				'--',
				'$option_est',
				'$fecha_hora'
				)");

	$mover_estado = consulta_gen("UPDATE inmuebles SET status = '11' WHERE id_inmueble = '$id_inmueble'");



	$name_inmueble = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '$id_inmueble'","name_inmueble");
	$name_usaurio  = consulta_array("SELECT nombre,apellido_p,apellido_m FROM usuarios WHERE identificador = '$identificador'");
	$nombre = $name_usaurio['nombre'];
	$apellido_p = $name_usaurio['apellido_p'];
	$apellido_m = $name_usaurio['apellido_m'];
	$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;
	
			$detalle_repo_mail = utf8_decode($detalle_repo);
	        

	        $mail = new PHPMailer();
			$mail->Host = 'gruposelta.com.mx';

			$mail->From = 'cesar.olivares@gruposelta.com.mx';
			$mail->FromName = 'Reporte Guardia';
			$mail->Subject = "Reporte Extraordinario - $name_inmueble";
			$mail->AddAddress('villagran_gg@hotmail.com','Sistemas');
			$mail->AddAddress('cesar.olivares@gruposelta.com.mx','Administracion');
			
			$body = "
				<div style='margin-top:-100px'>Reporte Extraordinario Guardia <br> Generado por: <strong>$nombre_completo</strong> - Credencial: <strong>$identificador</strong>
					 <br>
					 Fecha y hora: <strong>$fecha_hora</strong>
					 <br>
					 Detalle del Reporte: $detalle_repo_mail
					 $var_imagen
					 <br>
					 Estado del Reporte: <strong>$option_est</strong>
					 <br><br>$var_foto
			</div>";
			$mail->Body = $body;
			#$mail->MsgHTML($mensaje);
			$mail->IsHTML(true);

			$mail->AltBody = "Reporte Extraordinario Supervisor";


			$mail->Send();


	echo "<h3><strong>El reporte fue levantado exitosamente</strong></h3>";
	#crear la funcion para poder subir multiples imagenes
?>

