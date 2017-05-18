<?php 
	include("../../funciones.php");

	$foto_prev = $_FILES['files']["name"];
	$identificador = sanitizar("val_user");
	#unlink('personal_img/$foto_prev');
	if ($tipo_img == 'png') {$type_imagen = 'png';}
	if ($tipo_img == 'jpeg') {$type_imagen = 'jpg';}
	unlink("personal_img/$identificador");
	$resultado = @move_uploaded_file($_FILES['files']["tmp_name"], "personal_img/".$identificador.$tipo_imagen);
	if ($resultado) {
		echo "<h4>El cambio de fotografia se realizo exitosamente</h4>";
	}
	else{
		echo "<h4>La fotografia no pudo subirse tendra que subirla aparte</h4>";
	}
?>