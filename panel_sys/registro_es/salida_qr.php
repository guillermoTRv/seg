<script>
	$(document).on("click",".btn-registrar-es",function(){
        if ($(".inmueble_slc").val() != ''){
	        $(".btn-registrar-es").prop( "disabled",true)
	        $.ajax({
					type:"POST",
					url:"panel_sys/registro_es/process_registrar_salida.php",
					data:$(".form_es").serialize(),
					success:function(data){
						$(".btn-registrar-es").prop( "disabled",false)
						$(".m_v").html(data)
						$(".form_es").hide()
						
					}
			});
		}
		else{
			$(".m_v").html("<strong>Tiene que seleccionar un inmueble</strong>")
		}
    });
</script>
<div class="row">
	<div class="col-md-10" style="margin-right:46">
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
		<?php 
			$array_jornada = consulta_array("SELECT hora_entrada,inmueble FROM registros_es WHERE identificador = '$qr' and estado_registro = 'entrada' order by id_registro_es desc");
	    	$consulta_hora = $array_jornada['hora_entrada'];
	        $segundos= strtotime('now')-strtotime($consulta_hora);
			
			$id_inmueble   = $array_jornada['inmueble'];
			$name_inmueble = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '$id_inmueble'","name_inmueble");
			echo "<h3>Inmueble de registro $name_inmueble</h3>";



			if ($segundos >= 3600) {
				
				$horas = $segundos/3600;

				if ($horas < 8) {
					$mensaje = "<h3>No ha completado un turno por completo mayor a 8 horas <br> ¿Esta seguro que desea registrar su 	salida?</h3>";
					$type_salida = "menor 8";
				}
				else{
					$mensaje     = "<h3>Registrar Salida</h3>";
					$type_salida = "completa";
				}


			}
			else{
				$mensaje = "<h3>Tiene unos minutos que registro su entrada <br> ¿Esta seguro que desea registrar su salida?</h3>";
				$type_salida = "minutos";
			}
		
		?>	
		<form method="POST" enctype="multipart/form-data" class="form_es">
			<?php echo $mensaje ?>
			<button type="button" class="btn btn-success btn-block btn-registrar-es">Aceptar</button>
			<input type="hidden" name="identificador_txt" value="<?php echo $qr ?>">
			<input type="hidden" name="type_salida_txt" value="<?php echo $type_salida ?>">
			<input type="hidden" name="hora_entrada_txt" value="<?php echo $consulta_hora ?>">
		</form>
		<div class="m_v">
			
		</div>	
	</div>
</div>