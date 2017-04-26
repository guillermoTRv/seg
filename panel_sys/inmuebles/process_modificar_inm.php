<?php 
	session_start();
	if ($_SESSION['type_user']=='admi') {
		include("../../funciones.php");
		$contraseña = sanitizar('autorizacion_txt');
		if ($contraseña == 1234) {
			$val = sanitizar("valor_txt");
			$name_inmueble = sanitizar("name_txt");
			$calle = sanitizar("calle_txt");
			$num_int = sanitizar("num_int_txt");
			$num_ext = sanitizar("num_ext_txt");
			$colonia = sanitizar("colonia_txt");
			$postal  = sanitizar("postal_txt");
			$entidad = sanitizar("entidad_txt");
			$demarcacion = sanitizar("demarcacion_txt");
			$referencia = sanitizar("referencias_txt");

			$cambios = consulta_gen("UPDATE inmuebles SET 
					name_inmueble='$name_inmueble',
					calle='$calle',
					num_interior = '$num_int',
					num_exterior = '$num_ext',
					colonia = '$colonia',
					codigo_postal = '$postal',
					entidad = '$entidad',
					demarcacion =  '$demarcacion',
					referencia = '$referencia' 
					WHERE id_inmueble = '$val'
					");
			echo "Los cambios se realizaron exitosamente";

		}
		else{
			echo "Codigo de autorizacion incorrecto";
		}
	}
	else{

	}

 ?>
