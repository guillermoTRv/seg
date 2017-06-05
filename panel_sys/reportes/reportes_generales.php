<?php 
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
<div class="row">
	<div class="col-md-10">
		<h3>Reporte general para la empresa - <?php echo $name_cliente ?></h3>
		<h4>
			<strong>
				<?php echo saber_dia($fecha); ?>
				<?php echo date("d")." de "; ?>
				<?php echo mes_castellano(date("m")); ?>
			</strong>
		</h4>
		<form method="post" enctype="multipart/form-data" class="form-inline">
			<div class="form-group">
			    <input type="date" class="form-control" placeholder="Fecha 1" name="fecha_1" id="fecha_1">
			  </div>
		</form>
		&nbsp;<a href="#"><p style="display: inline;font-size:1.1em"><span class="icon-envelop"></span> Enviar reporte</p></a>&nbsp;&nbsp;&nbsp;
		<a href="#"><p style="display: inline;font-size:1.1em"><span class="icon-folder-download"></span> Descargar reporte</p></a>
	</div>
	<div class="col-md-11">
		<div class="content">
			<h4>Historial de reportes extraordinarios por cliente tambien agregar por inmueble</h4>#reporte por rango
			<table class="table table-hover table-bordered">
					<!--En este tipo de reportes se mostraria el numero de supervisores que estuvieron presentes y la fluctuacion del numero de empleados-->
					<thead>
						<tr>	
							<th>Inmueble</th>
							<th>Identificador</th>
							<th>Direccion</th>
							<th>#Rep <br>Moderados</th>
							<th>#Rep <br>Severos</th>
							<th>#Rep <br>Graves</th>
							<th>Total <br> Rep.Ext</th>
							<!--
							<th>Inmueble</th>
							<th>Identificador</th>
							<th>Direccion</th>
							<th>Supervisor</th>
							<th>Personal Activo</th>
							<th>Total <br> Rep.Ext</th>
							<th>#Rep <br>Moderados</th>
							<th>#Rep <br>Severos</th>
							<th>#Rep <br>Graves</th>
							<th></th>-->
						</tr>
					</thead>
					<tbody>
						<?php /**
							$inmuebles = mysqli_query($q_sec,"SELECT * FROM inmuebles WHERE cliente = '$id_cliente'");
							while ($array_inm = mysqli_fetch_array($inmuebles)) {
								$id_inmueble   = $array_inm['id_inmueble'];
								$name_inmueble = $array_inm['name_inmueble'];
								
								$calle         = $array_inm['calle'];
                                $colonia       = $array_inm['colonia'];
                                $num_exterior  = $array_inm['num_exterior'];
                                $entidad       = $array_inm['entidad'];
                                $demarcacion   = $array_inm['demarcacion'];

                                $identificador = $array_inm['identificador'];
                                $direccion     = $calle." #".$num_exterior." ".$colonia." ".$demarcacion." ".$entidad;
                                  
                                $conteo        = consulta_val("SELECT id_usuario FROM usuarios WHERE inmueble_asign='$id_inmueble'");
								echo "
									<tr>
										<td>$name_inmueble</td>
										<td>$identificador</td>
										<td>$direccion</td>
										<td>--</td>
										<td>#$conteo elementos</td>
										<td>--</td>
										<td>--</td>
									</tr>
								";
							}
**/
						?>
					</tbody>
			</table>
			<h4>Historial de reportes extaordinarios por inmueble</h4>
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>##</th>
						<th>Fecha</th>
						<th>nombre usuario que lo levanto</th>
						<th>identificador</th>
						<th>puesto</th>
						<th>estado</th>
						<th>detalle</th>
						<th>fecha en que se marco como atendido</th>
					</tr>
				</thead>
			</table>			


			<h4>Reporte de asistencias - va por inmuebles y hay que tener cuidado con las bajas y altas del personal</h4>
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>Nombre del elemento</th>
						<th>Su credencial</th>
						<th>Su direccion</th>
						<th>Su nombre usuario</th>
						<th>Estado de trabajo(si sigue laborando o no) </th>
						<th>Asistencias que debio cumplir</th>
						<th>Asistencias hechas</th>
						<th>Inasistencias</th>
						<th>No.retardos</th>
						<th>Realizo cambio de turno si o no</th>
							
						<th>Costos recabados por penalizacion</th>
						<th>Costos recabados por inasistencias</th>
					</tr>
				</thead>
			</table>
			<h4>Reporte de empleados - va por inmuebles y hay que tener cuidado con las bajas y altas del personal</h4>
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>Nombre del elemento</th>
						<th>Su credencial</th>
						<th>Su direccion</th>
						<th>Edad</th>
						<th>estatura</th>
						<th>peso</th>
						<th>Su nombre usuario</th>
						<th>Estado de trabajo(si sigue laborando o no) </th>
						<th>Asistencias que debio cumplir</th>
						<th>Asistencias hechas</th>
						<th>Inasistencias</th>
						<th>No.retardos</th>
						<th>Realizo cambio de turno si o no</th>
						<th>Cantidad de reportes generados </th>
						<th>Costos recabados por penalizacion</th>
						<th>Costos recabados por inasistencias</th>
						<th>Reportes en contra</th>
						<th>Numero de reportes que he levantado</th>
						<th>salario</th>   -->>ver que onda con los cambios de salario y demas
 					</tr>
				</thead>
			</table>

			<h4>Reporte de checklist</h4>
			<table>
				<thead>
					<tr>
						<th>Nombre del elemento</th>
						<th>Su credencial</th>
						<th>Su direccion</th>
						<th>Edad</th>
						<th>estatura</th>
						<th>peso</th>
						<th>Su nombre usuario</th>
						<th>Estado de trabajo(si sigue laborando o no) </th>
						<th>Asistencias que debio cumplir</th>
						<th>Asistencias hechas</th>
						<th>Inasistencias</th>
						<th>No.retardos</th>
						<th>Realizo cambio de turno si o no</th>
						<th>Cantidad de reportes generados </th>
						<th>Costos recabados por penalizacion</th>
						<th>Costos recabados por inasistencias</th>
						<th>Reportes en contra</th>
						<th>Numero de reportes que he levantado</th>
						<th>salario</th>   -->>ver que onda con los cambios de salario y demas
 					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
##reportes puntuales
##reportes por rangos
## se tiene que registrar