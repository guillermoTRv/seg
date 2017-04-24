<?php  
	include("../../funciones.php");
	$valor = sanitizar_get("val");
	$q_usuario  = mysqli_query($q_sec,"SELECT * FROM usuarios WHERE inmueble_asign = '$valor' order by id_usuario asc");
	while ($array = mysqli_fetch_array($q_usuario)) {
		   $id_usuario = $array["id_usuario"];
		   $nombre     = $array['nombre'];
		   $apellido_p = $array['apellido_p'];
		   $apellido_m = $array['apellido_m'];
		   $calle      = $array['calle'];
		   $colonia    = $array['colonia'];
		   $num_exterior  = $array['num_exterior'];
		   $entidad       = $array['entidad'];
           $demarcacion   = $array['demarcacion'];
           
           $identificador = $array['identificador'];
           $usuario       = $array['usuario'];

           $fecha_nacimiento = $array['fecha_nacimiento'];
           $segundos= strtotime('now')-strtotime($fecha_nacimiento);
		   $diferencia_dias=intval($segundos/60/60/24);
		   $date_edadNON = $diferencia_dias/365;
		   $edad   = substr($date_edadNON, 0,2);

		   $fecha_rotacion = $array['fecha_rotacion'];
		   $segundos= strtotime('now')-strtotime($fecha_rotacion);
		   $diferencia_dias=intval($segundos/60/60/24);
		   //$date_edadNON = $diferencia_dias/365;
		   //$rotacion   = substr($date_edadNON, 0,2);
           
           echo "
			<tr id='$id_usuario'>
				<td>$nombre $apellido_p $apellido_m</td>
				<td>$identificador</td>
				<td>$usuario</td>
				<td>$edad</td>
				<td>Calle $calle #$num_exterior Colonia $colonia $demarcacion $entidad</td>
				<td>$diferencia_dias dias</td>
				<td>
			        <center>
			            <a href='?pr=opciones_modificar_guardia&val=$id_usuario' style='color:#5296E9'><span class=' icon-cog'></span></a>
			        </center>
			    </td>
			</tr>	
           ";
	}

?>
<script>
	$(document).ready(function(){
        $("tbody tr").dblclick(function(){
          var ruta = $(this).attr("id")
          window.location.href = "?pr=info&val="+ruta+""
        });
    });
</script>