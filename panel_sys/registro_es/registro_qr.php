<div class="row">
	<div class="col-md-10" style="margin-right:45px">
		<?php 
			if ($_SESSION['type_user'] == 'guardia' && $qr == '') {
				$qr = $_SESSION['identificador'];
			}
			$q_personal = consulta_array("SELECT * FROM usuarios WHERE identificador = '$qr'");
			$usuario    = $q_personal['usuario'];
			$nombre     = $q_personal['nombre'];
			$apellido_p = $q_personal['apellido_p'];
			$apellido_m = $q_personal['apellido_m'];
			$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;
			$puesto     = $q_personal['puesto'];
		    $empresa    = $q_personal['empresa'];
			echo $fecha_hoy   = date("Y-m-d");
			echo $jornada_dia = consulta_val ("SELECT * FROM jornadas_trabajo 	WHERE fecha_entrada = '$fecha_hoy' and identificador = '$qr'");

		?>
		<?php 

			if ($jornada_dia == 0) {
				include("panel_sys/registro_es/vista_no_labora.php");
			}
			else{
				$consulta_es = consulta_val("SELECT null FROM registros_es WHERE identificador = '$qr'");
				if ($consulta_es == 0 ) {
					echo "<h3><strong>¡Bienvenido a su primer día de trabajo!</strong></h3>";
					include("panel_sys/registro_es/entrada_qr.php");
				}
				else{

					$consulta_registro = consulta_array("SELECT estado_registro,id_registro_es FROM registros_es WHERE identificador = '$qr' order by 	id_registro_es desc");
					$estado_registro   = $consulta_registro['estado_registro'];
	 
					if ($estado_registro == "correcto") {
						include("panel_sys/registro_es/entrada_qr.php");
					}
					if ($estado_registro == "entrada") {
						$id_registro_es     = $consulta_registro['id_registro_es'];
						$cont_checklist     = consulta_val("SELECT null FROM checklist_jornada WHERE id_registro_es = '$id_registro_es'");
						$estado_checklist   = consulta_tx("SELECT estado FROM checklist_jornada WHERE id_registro_es = '$id_registro_es'","estado");

						if ($cont_checklist == 0) {
							?>
							<img src="https://gruposelta.com.mx/security/panel_sys/personal/personal_img/<?php echo $qr ?>" alt="imagen" style="width: 200px;height:200px;border:1px solid #222;border-radius:9px;">
							<h3>
								Registro de salida para el <?php echo ucwords($puesto) ?>
								<br>
								<strong> 
									<?php echo $nombre_completo ?>
								</strong>
								<br>
								Identificador
								<br>
								<strong>
									<?php echo $qr ?>
								</strong> 
							</h3>
							<h3>Necesita llenar su checklist para poder registrar su salida</h3>
							<?php
						}

						if($estado_checklist   == 'hecho' or $_SESSION['type_user'] == 'supervisor'){
							include("panel_sys/registro_es/salida_qr.php");		
						}
						
					}

				}
			}
		?>
	
	</div>
</div>