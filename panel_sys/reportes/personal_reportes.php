<script>
	$(function(){
        $(".btn-generar").click(function(){
        	var fecha_1 = $("#fecha_1").val()
            var fecha_2 = $("#fecha_2").val()
            if (fecha_1 != '' && fecha_2 !='') {
	            var url="panel_sys/reportes/generar_reporte_personal.php";
	            $.ajax({
	                type:"POST",
	                url:url,
	                data:$(".form-inline").serialize(),
	                success:function(data){
	                	$(".rango_reporte").html("Reporte generado de "+fecha_1+" a "+fecha_2);
	                    $("tbody").html(data);                
	                }

	            });
	            return false;
        	}
        });
   });
   $(document).on("change","#prehecho_slc",function(){
                   $("#prehecho_slc option:selected").each(function () {
                    registros_es=$(this).val();
                    $.post("panel_sys/reportes/generar_reporte_personal.php", { registros_es: registros_es }, function(data){
                    if (registros_es == "mes") {
                    	var mensaje = "del último mes"
                    }
                    if (registros_es == "semana") {
                    	var mensaje = "de la última semana"
                    }
                    $(".rango_reporte").html("Reporte generado " + mensaje);
                    $("tbody").html(data);
                    
                });
           })
    });
</script>
<div class="row">
	<div class="col-md-10">
		<h3>Reportes del personal para la empresa - <?php echo $name_cliente ?></h3>
		<form method="post" enctype="multipart/form-data" class="form-inline">
			  <div class="form-group">
			  	<!--<select class="form-control" name="inmueble_slc">
			  		<option value="">Seleccione un inmueble</option>
			  		<?php 
			  			/**$inmuebles_select = mysqli_query($q_sec, "SELECT id_inmueble, name_inmueble FROM inmuebles WHERE cliente = '$id_cliente'");
			  			while ($array_slc = mysqli_fetch_array($inmuebles_select)) {
			  				$id_inmueble   = $array_slc['id_inmueble'];
			  				$name_inmueble = $array_slc['name_inmueble'];
			  				echo "<option value='$id_inmueble'>$name_inmueble</option>";
			  			}
			  			##tambien poder hacer reporte por dia por semana o por mes
			  			*/
			  		?>
			  	</select>-->
			  </div>
			  <div class="form-group">
			    <input type="date" class="form-control" placeholder="Fecha 1" name="fecha_1" id="fecha_1">
			  </div>
			  <div class="form-group">
			    <input type="date" class="form-control" placeholder="Fecha 2" name="fecha_2" id="fecha_2">
			  </div>
			  <button type="button" class="btn btn-default btn-generar">Generar Reporte</button>
		
			  <select class="form-control" name="prehecho_slc" id="prehecho_slc" style="margin-left:50px">
			  		<option value="">Reportes Prehechos</option>
			  		<option value="semana">Ultima semana</option>
			  		<option value="mes">Ultimo mes</option>
			  		<?php 
			  			/**$inmuebles_select = mysqli_query($q_sec, "SELECT id_inmueble, name_inmueble FROM inmuebles WHERE cliente = '$id_cliente'");
			  			while ($array_slc = mysqli_fetch_array($inmuebles_select)) {
			  				$id_inmueble   = $array_slc['id_inmueble'];
			  				$name_inmueble = $array_slc['name_inmueble'];
			  				echo "<option value='$id_inmueble'>$name_inmueble</option>";
			  			}
			  			##tambien poder hacer reporte por dia por semana o por mes
			  			*/
			  		?>
			  </select>	
		</form>
		<br>
		<a href="#"><p class="info_repo">&nbsp;<span class="icon-envelop"></span> Enviar reporte</p></a>&nbsp;&nbsp;&nbsp;
		<a href="#"><p class="info_repo"><span class="icon-folder-download"></span> Descargar reporte</p></a>
		<p class="info_repo rango_reporte" style="margin-left:30px"></p>
	</div>
	<div class="col-md-11">
		<div class="content">
			<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Identificador</th>
							<th>Tipo empleado</th>
							<th>Direccion</th>
							<th>Turno mas reciente</th>
							<th>Inmuebles laborados</th>
							<th>Ultimo inmueble laborado( o rotacion)</th>
							<th>Inasistencias</th>
							<th>Advertencias</th>
							<th>Estatura</th>
							<th>Peso</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
			</table>
		</div><br><br>
	</div>
</div>