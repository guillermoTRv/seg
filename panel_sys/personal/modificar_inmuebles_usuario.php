<?php 
	$q_personal = consulta_array("SELECT * FROM usuarios WHERE id_usuario='$val'");
	$nombre =     $q_personal['nombre'];
	$apellido_p = $q_personal['apellido_p'];
	$apellido_m = $q_personal['apellido_m'];
	$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;
	$identificador = $q_personal['identificador'];
	$usuario = $q_personal['usuario'];
	$puesto = $q_personal['puesto'];

    $inmueble_asign = $q_personal['inmueble_asign'];
	$inmueble_asign = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble='$inmueble_asign'","name_inmueble");
?>
<div class="row" >
	<div class="col-md-10">
			<h3>
				Rotación de Inmuebles para el <?php echo  ucwords($puesto).": <strong>$nombre_completo</strong>"; ?>
			</h3>
			<h3>
				Identificador: <strong><?php echo $identificador ?> </strong> &nbsp; Nombre de usuario: <strong><?php echo $usuario ?></strong>
			</h3>
			
	</div>
</div>
<hr style="border-color:#686868;width:91.3%;float:left">
<?php 
	if ($puesto == 'guardia') {
		include("panel_sys/personal/modificar_inmuebles_guardia.php");
	}
	if ($puesto == 'supervisor') {
		include("panel_sys/personal/modificar_inmuebles_supervisor.php");	
	}
	if ($puesto == 'cliente') {
		echo "<h4>El elemento cliente no rota inmuebles</h4>";
	}
?>
<hr style="border-color:#686868;width:91.3%;float:left">
<div class="row">
    <div class="col-md-10">	
	    <a href="?pr=opciones_modificar_usuario&val=<?php echo $val ?>" class="blue"><span class="icon-undo2"></span> Regresar a las opciones de modificación</a><br>
		<a href="?pr=info&val=<?php echo $val ?>" class="blue"><span class="icon-undo2"></span> Regresar al panel de información del elemento</a>
	</div>
</div>







