<script>
	$(document).on("click",".btn-registrar-es",function(){
        if ($(".inmueble_slc").val() != ''){
	        $(".btn-registrar-es").prop( "disabled",true)
	        $.ajax({
					type:"POST",
					url:"panel_sys/registro_es/process_registrar_es.php",
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
		<img src="https://gruposelta.com.mx/security/panel_sys/personal/personal_img/<?php echo $qr ?>" alt="imagen" style="width: 200px;height:200px;border:1px solid #222;border-radius:9px;">
		<h3>
			Registro de entrada para el <?php echo ucwords($puesto) ?>
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

			<form method="POST" enctype="multipart/form-data" class="form_es">
				<?php
					if ($puesto == "guardia") {
						echo "";
					}  
					if ($puesto == "supervisor"){
					?>
					<h3>Seleccione el inmueble para el cual hara su registro</h3>
					<select class="inmueble_slc form-control" name="inmueble_slc">
						<option value="">Seleccione inmueble</option>
						<?php 
							$q_inmuebles = mysqli_query($q_sec,"SELECT id_inmueble,name_inmueble FROM inmuebles WHERE cliente = '$empresa'");
							if ($type_personal == "supervisor") {
								$q_inmuebles = mysqli_query($q_sec,"SELECT id_inmueble,name_inmueble FROM inmuebles WHERE supervisor = '$num_user'");
							}
							while ($array = mysqli_fetch_array($q_inmuebles)) {
								$name_inmueble = $array['name_inmueble'];
								$id_inmueble  = $array['id_inmueble'];
								echo "<option value='$id_inmueble'> $name_inmueble </option>";
							}
						?>
					</select>
					<?php
					}
				?>
				<input type="hidden" name="identificador_txt" value="<?php echo $qr ?>">
				<input type="hidden" name="puesto_txt" value="<?php echo $puesto ?>">
				<br>
				<button type="button" class="btn btn-success btn-block btn-registrar-es">Aceptar</button>
			</form>
			<div class="m_v">
				
			</div>	
			
