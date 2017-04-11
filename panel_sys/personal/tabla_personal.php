<?php  
	include("../../funciones.php");
	$valor = sanitizar_get("val");
	$q_usuario  = mysqli_query($q_sec,"SELECT * FROM usuarios WHERE inmueble_asign = '$valor'");
	while ($array = mysqli_fetch_array($q_usuario)) {
		   $id_usuario = $array["id_usuario"];
		   $nombre     = $array['nombre'];
		   $apellido_p = $array['apellido_p'];
		   $apellido_m = $array['apellido_m'];
		   $calle      = $array['calle'];
		   $colonia    = $array['colonia'];
		   $num_exterior = $array['num_exterior'];
		   $entidad      = $array['entidad'];
           $demarcacion  = $array['demarcacion'];
           echo "
			<tr id='$id_usuario'>
				<td>$nombre $apellido_p $apellido_m</td>
				<td>--</td>
				<td>$calle $num_exterior $colonia $demarcacion $entidad</td>
				<td>--</td>
				<td>-</td>
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