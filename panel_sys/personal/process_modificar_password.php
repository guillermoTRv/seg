<?php 
	session_start();
	if ($_SESSION['type_user']=='admi') {
		include("../../funciones.php");
		$val_user = sanitizar_get("val");
		$pass_xc = rand(10000,95000);

		$cambio_pass = consulta_gen("UPDATE usuarios SET pass_xc = '$pass_xc' WHERE id_usuario ='$val_user'");
		echo "<h4>El nuevo password fue generedo exitosamente</h4>";
		echo "<h4>El nuevo password es <strong> $pass_xc </strong></h4>";
	}
	else{
		echo "ataque";
	}
?>