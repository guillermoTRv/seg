<?php 

	$q_personal = consulta_array("SELECT * FROM usuarios WHERE identificador = '$val'");
	$nombre =     $q_personal['nombre'];
	$apellido_p = $q_personal['apellido_p'];
	$apellido_m = $q_personal['apellido_m'];
	$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;

	$calle      = $q_personal['calle'];
	$colonia    = $q_personal['colonia'];
	$num_exterior = $q_personal['num_exterior'];
	$demarcacion  = $q_personal['demarcacion'];
	$entidad      = $q_personal['entidad'];
	$direccion = "Calle ".$calle." #".$num_exterior." Colonia - ".$colonia.", ".$demarcacion.", ".$entidad;

	$fecha_nacimiento = $q_personal['fecha_nacimiento'];
    $segundos= strtotime('now')-strtotime($fecha_nacimiento);
	$diferencia_dias=intval($segundos/60/60/24);
	$date_edadNON = $diferencia_dias/365;
	$edad   = substr($date_edadNON, 0,2);

	$usuario = $q_personal['usuario'];

	$inmueble_asign = $q_personal['inmueble_asign'];
	$name_inmueble  = consulta_array("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '$inmueble_asign'");
	$name_inmueble  = $name_inmueble['name_inmueble'];
	$fecha_rotacion = $q_personal['fecha_rotacion'];
	$segundos= strtotime('now')-strtotime($fecha_rotacion);
	$diferencia_dias=intval($segundos/60/60/24);

	function saber_dia($nombredia) {
		$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
		$fecha_l = $dias[date('N', strtotime($nombredia))];
		echo $fecha_l;
	}
	function mes_castellano($mes_valor){
		$meses = array(Enero=>'01', Febrero=>'02', Marzo=>'03', Abril=>'04', Mayo=>'05',Junio=>'06',Julio=>'07',Agosto=>'08',Septiembre=>'09',Octubre=>'10',Noviembre=>'11',Diciembre=>'12');
		foreach($meses as $mes_nombre=>$mes_num){
			if ($mes_valor == $mes_num) {
				echo $mes_nombre;
				return false;
			}
		}
	}

?>
<div class="row" style="border-bottom:2px solid #6E6E6E;margin-right:60px">
	<div class="col-md-2">
		<img src="panel_sys/personal/personal_img/<?php echo $val ?>" alt="imagen" style="width: 175px;height:175px;border:1px solid #222;border-radius:9px;">
	</div>
	<div class="col-md-8">
		<h3>Administrar horario para el personal - <?php echo $nombre_completo ?></h3>
		<h4>Identificador: <strong><?php echo $val ?></strong>
		&nbsp;&nbsp;&nbsp;&nbsp; Nombre de usuario: <strong><?php echo $usuario ?></strong></h4>
		<h4>Inmueble: <strong><?php echo $name_inmueble ?></strong> &nbsp;&nbsp;&nbsp; Antiguedad en el Inmueble <strong><?php echo $diferencia_dias ?> días</strong></h4>
		<h4>Domicilio: <?php echo $direccion ?></h4>
		<br><br>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<br><br>
		<div class="div_blanco" > 
			<table class="table">
				<thead>
					<tr>
						<th>Jornada</th>
						<th>Dia</th>
						<th>Mes</th>
						<th>Entrada</th>
						<th>Salida</th>
						<th>Estado</th>
						<th>Modificar</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					include("panel_sys/supervisor/consultas_jornada.php");
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>

    $(".select_horario").change(function(){
    		var select_hora_entr = $(this).parent().parent().parent().find(".select_hora_entr").val()
	    	if (select_hora_entr != '') {
	    		var elegid=$(this).val();
	    		oculto_horario    = $(this).parent().parent().parent().children(".oculto_horario").val(elegid)
	    		oculto_horario_op = parseInt(elegid)
	    		select_hora_entr  = parseInt(select_hora_entr)
	    		op_hora_salida = select_hora_entr + oculto_horario_op
	    		if (op_hora_salida < 12) {
					if (op_hora_salida < 10) {
		            	valor_hora_salida = "0"+op_hora_salida+" AM Horas"
		            	hora_val = op_hora_salida
	            		dia_val  = "en-curso"
		            }
		            if (op_hora_salida >= 10) {
		            	valor_hora_salida = op_hora_salida+" AM Horas"
		            	hora_val = op_hora_salida
	            		dia_val  = "en-curso"
		            }
				}

				if (op_hora_salida >=12 && op_hora_salida < 24) {
					valor_hora_salida = op_hora_salida+" PM Horas"
					hora_val = op_hora_salida
	            	dia_val  = "en-curso"
				}
				if (op_hora_salida >= 24) {
					valor_hora_nuevo = op_hora_salida - 24
		            if (valor_hora_nuevo < 12) {
		            	if (valor_hora_nuevo < 10) {
		            		valor_hora_salida = "0"+valor_hora_nuevo+" AM Horas del día siguiente"
		            		hora_val = valor_hora_nuevo
	            			dia_val  = "siguiente"
		            	}
		            	if (valor_hora_nuevo >= 10) {
			            	valor_hora_salida = valor_hora_nuevo+" AM Horas del día siguiente"
			            	hora_val = valor_hora_nuevo
	            		    dia_val  = "siguiente"
			            }
		            }	
		            if (valor_hora_nuevo >=12) {
		            	valor_hora_salida = valor_hora_nuevo+" PM Horas del día siguiente"
		            	hora_val = valor_hora_nuevo
	            		dia_val  = "siguiente"
		            }
				}

				hora_salida =  $(this).parent().parent().parent().find(".hora_salida").val(valor_hora_salida) 
            
                dia_txt     =  $(this).parent().parent().parent().children(".dia_txt").val(dia_val)
                hora_txt    =  $(this).parent().parent().parent().children(".hora_salida_txt").val(hora_val)

    		}
    		else{
    			var elegid=$(this).val();
		        oculto_horario   = $(this).parent().parent().parent().children(".oculto_horario").val(elegid)
    		}
    });

    $(".select_hora_entr").change(function(){
            var elegid         = parseInt($(this).val());
            var oculto_horario = parseInt($(this).parent().parent().parent().children(".oculto_horario").val())
			var op_hora_salida = elegid + oculto_horario

			if (op_hora_salida < 12) {
            	if (op_hora_salida < 10) {
	            	valor_hora_salida = "0"+op_hora_salida+" AM Horas"
	            	hora_val = op_hora_salida
	            	dia_val = "en-curso"
	            }
	            if (op_hora_salida >= 10) {
	            	valor_hora_salida = op_hora_salida+" AM Horas"
	            	hora_val = op_hora_salida
	            	dia_val = "en-curso"
	            }

            }
            if (op_hora_salida >=12 && op_hora_salida < 24) {
            	valor_hora_salida = op_hora_salida+" PM Horas"
            	hora_val = op_hora_salida
	            dia_val = "en-curso"
            }
            if (op_hora_salida >= 24) {
            	valor_hora_nuevo = op_hora_salida - 24
	            if (valor_hora_nuevo < 12) {
	            	if (valor_hora_nuevo < 10) {
	            		valor_hora_salida = "0"+valor_hora_nuevo+" AM Horas del día siguiente"
	            		hora_val = valor_hora_nuevo
	            		dia_val = "siguiente"
	            	}
	            	if (valor_hora_nuevo >= 10) {
		            	valor_hora_salida = valor_hora_nuevo+" AM Horas del día siguiente"
		            	hora_val = valor_hora_nuevo
	            		dia_val = "siguiente"
		            }
	            }	
	            if (valor_hora_nuevo >=12) {
	            	valor_hora_salida = valor_hora_nuevo+" PM Horas del día siguiente"
	            	hora_val = valor_hora_nuevo
	            	dia_val = "siguiente"
	            }
	            	
            }

			hora_salida =  $(this).parent().parent().parent().find(".hora_salida").val(valor_hora_salida) 
            
            dia_txt     =  $(this).parent().parent().parent().children(".dia_txt").val(dia_val)
            hora_txt    =  $(this).parent().parent().parent().children(".hora_salida_txt").val(hora_val)

	});


    $(document).on("click",".btn-aceptar",function(){ 
	    form_horario = $(this).parent().prev().children(".form_horario")
	    mensaje_mv   = $(this).parent().prev().children(".m_v")
	    $.ajax({
			type:"POST",
			url:"panel_sys/supervisor/process_horario.php",
			data:form_horario.serialize(),
			success:function(data){
				mensaje_mv.html(data)
			}
		});
	});
		
</script>