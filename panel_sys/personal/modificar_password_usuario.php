<script>
	$(document).on("click",".btn-generar",function(){
            var val_user = $(".val_user").val()
            $(".btn-generar").prop( "disabled", true )
            $.ajax({
					type:"GET",
					url:"panel_sys/personal/process_modificar_password.php?val="+val_user+"",
					success:function(data){
						$(".m_v").html(data)								
					}
			});
		
    });
</script>

<?php 
	$q_personal = consulta_array("SELECT * FROM usuarios WHERE id_usuario='$val'");
	$nombre =     $q_personal['nombre'];
	$apellido_p = $q_personal['apellido_p'];
	$apellido_m = $q_personal['apellido_m'];
	$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;
	$identificador = $q_personal['identificador'];
	$usuario = $q_personal['usuario'];
	$puesto = $q_personal['puesto'];
?>

<div class="row">
	<div class="col-md-10">
			<h3>
				Recuperacion de contraseña para el <?php echo  ucwords($puesto).": <strong>$nombre_completo</strong>"; ?>
			</h3>
			<h3>
				Identificador: <strong><?php echo $identificador ?> </strong> &nbsp; Nombre de usuario: <strong><?php echo $usuario ?></strong>
			</h3>
			<br>
			<h4>Presione el botón de abajo para general una contraseña</h4>
			<button type="button" class="btn btn-success btn-generar">Generar nueva contraseña</button>
			<input type="hidden" value="<?php echo $val ?>" class='val_user'>
			<div class="m_v">
				
			</div>
	</div>

</div>