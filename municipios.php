<option value="">--</option>
<?php 
	include("funciones.php");
	$estado = utf8_decode(sanitizar_get("estado"));
	$id_estado = consulta_tx("SELECT id FROM estados WHERE nombre='$estado'","id");
	$consulta_municipios = mysqli_query($q_sec,"SELECT nombre FROM municipios WHERE estado_id = '$id_estado' order by nombre asc");
	while ($array_municipio = mysqli_fetch_array($consulta_municipios)) {
		$nombre = utf8_encode($array_municipio['nombre']);
		echo "<option value='$nombre'>$nombre</option>";
	}
?>