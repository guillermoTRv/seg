<?php 
	$array_usuario = consulta_array("SELECT * FROM usuarios WHERE id_usuario='$val'","nombre");	
	$nombre = $array_usuario['nombre'];
	$apellido_p = $array_usuario['apellido_p'];
	$apellido_m = $array_usuario['apellido_m'];
	$identificador = $array_usuario['identificador'];
	$usuario = $array_usuario['usuario'];
	$inmueble_asign = $array_usuario['inmueble_asign'];	
	$puesto = $array_usuario['puesto'];

	?>
<div class="row">
	<div class="col-md-10" id="clientes">
		<h3 style="margin-left:10px">Modificar datos para el 
		 	<?php if ($puesto == 'guardia') {echo "Guardia: ";} ?>	
		 	<?php if ($puesto == 'supervisor') {echo "Supervisor: ";} ?>
			<strong><?php echo $nombre." ".$apellido_p." ".$apellido_m?></strong><br> 
			Identificador: 
			<strong><?php echo $identificador ?></strong> &nbsp;&nbsp;&nbsp;
			Nombre Usuario: 
			<strong><?php echo $usuario ?></strong> 
		</h3>
		<span style="margin-left:20px">##Utilizar las teclas de navegación <span class="glyphicon glyphicon-arrow-up"></span> <span class=" glyphicon glyphicon-arrow-down"></span></span>
		<br>
		<a href="?pr=mod_datos_generales_usuario&val=<?php echo $val ?>" class="link_black">
            <div class="panel-body panel_cl">
                 <h4>Modificar datos generales</h4> 
            </div>    
        </a>
        <a href="?pr=mod_fotografia_usuario&val=<?php echo $val ?>" class="link_black">
            <div class="panel-body panel_cl">
                 <h4>Modificar fotografia</h4> 
            </div>    
        </a>
        <a href="?pr=mod_inmuebles_usuario&val=<?php echo $val ?>" class="link_black">
            <div class="panel-body panel_cl">
                 <h4>Rotacion de inmuebles</h4> 
            </div>    
        </a>
        <a href="?pr=mod_puesto_usuario&val=<?php echo $val ?>" class="link_black">
            <div class="panel-body panel_cl">
                 <h4>Cambio de puesto</h4> 
            </div>    
        </a>
       	<a href="?pr=mod_password_usuario&val=<?php echo $val ?>" class="link_black">
            <div class="panel-body panel_cl">
                 <h4>Recuperacion de contraseña</h4> 
            </div>    
        </a>
        <?php if ($puesto == 'guardia')    {$ruta_return = "?pr=listado&val=$inmueble_asign";} ?>	
		<?php if ($puesto == 'supervisor') {$ruta_return = "?pr=listado";} ?>
        <div style="margin-top:20px"></div>
        <a href="<?php echo $ruta_return ?>" class="blue" style="margin-left:10px"><span class="icon-undo2"></span> Regresar al listado de personal</a><br>
        <a href="?pr=modificar_personal" class="blue" style="margin-left:10px"><span class="icon-undo2"></span> Regresar al panel de busqueda para modificar datos del personal</a><br>
        <a href="?pr=info&val=<?php echo $val ?>" class="blue" style="margin-left:10px"><span class="icon-undo2"></span> Regresar al panel de información del elemento</a>
	</div>
</div>
<script>
	

$(document).keydown(function(event){
	var activo_menu = $(".activo_menu").length;
	if (activo_menu == 0) {
	    var select =  $(".select").length;
	    event.preventDefault();  
	    if (event.which == 40) {
	        if (select == 0) {
	            $("#clientes .panel-body:first").removeClass("panel_cl");
	            $("#clientes .panel-body:first").addClass("select");

	        }
	        if (select > 0) {

	            var nextt = $(".select").parent().next().children();
	            $(".select").addClass("panel_cl");
	            $(".select").removeClass("select");
	            nextt.removeClass("panel_cl");
	            nextt.addClass("select");
	            
	        }
	    }

	    if (event.which == 38) {
	        var select =  $(".select").length;
	        if (select == 0) {
	            $("#clientes .panel-body:last").removeClass("panel_cl");
	            $("#clientes .panel-body:last").addClass("select");
	        }
	        if (select > 0) {
	            var prevv = $(".select").parent().prev().children();
	            $(".select").addClass("panel_cl");
	            $(".select").removeClass("select");
	            prevv.removeClass("panel_cl");
	            prevv.addClass("select");
	            
	        }
	    }
	    if (event.which == 13) {
	        if (select > 0) {
	            var atributo_a = $(".select").parent().attr("href");
	            window.location.href = atributo_a;
	        }      
	    }
	}
});
</script>