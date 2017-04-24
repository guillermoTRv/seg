<?php 
	session_start();
	if ($_SESSION['type_user'] == "admi") {
		
		include("../../funciones.php");
		$inmueble = sanitizar("elegid");
		$consulta_categoria = mysqli_query($q_sec,"SELECT id_categoria,categoria FROM checklist_categoria WHERE id_inmueble = '$inmueble'");
		while ($array = mysqli_fetch_array($consulta_categoria)) {
			   $id_categoria = $array['id_categoria'];
			   $categoria = $array['categoria'];
			   echo "<option value='$id_categoria'>$categoria</option>";
		}
	}
	else{
		echo "ataque";
	}
?>