<option value="">--</option>
<?php 
	$estados_consulta = mysqli_query($q_sec,"SELECT * FROM estados order by nombre asc");
	while ($array_estado = mysqli_fetch_array($estados_consulta)) {
		$id_estado_r   = $array_estado['id'];
		$nombre_estado =  utf8_encode($array_estado['nombre']);
		echo "<option id='$id_estado_r' value='$nombre_estado'>$nombre_estado</option>";

	}
?>