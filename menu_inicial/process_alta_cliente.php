<?php 
	include("../funciones.php");
	$name_cliente = sanitizar("name_txt");
	$inicio = sanitizar("inicio_txt");
	$fin = sanitizar("fin_txt");
	$calle = sanitizar("calle_txt");
	$ext = sanitizar("ext_txt");
	$int = sanitizar("int_txt");
	$colonia = sanitizar("colonia_txt");
	$postal = sanitizar("postal_txt");
	$demarcacion = sanitizar("demarcacion_txt");
	$entidad = sanitizar("entidad_txt");
	$codigo = sanitizar("codigo_txt");
	if ($name_cliente == '' or $inicio == '' or $fin == '' or $calle == '' or $ext == '' or $int == '' or $colonia == '' or $postal == '' or $demarcacion == '' or $entidad == '' or $codigo == '') {
		echo "Llene todos los campos del formulario";
	}
	else{
		if ($codigo == $permiso) {
			$consulta_val = consulta_val("SELECT NULL FROM clientes WHERE name_cliente = '$name_cliente'");
			if ($consulta_val == 0) {
				$insertar = consulta_gen("INSERT INTO clientes(name_cliente,calle,num_int,num_ext,colonia,postal,demarcacion,entidad,inicio_contrato,fin_contrato) VALUES('$name_cliente','$calle','$int','$ext','$colonia','$postal','$demarcacion','$entidad','$inicio','$fin')");
				echo "El nuevo cliente $name_cliente fue registrado correctamente";
			}
			else{
				echo "Este cliente ya ha sido registrado anteriormente";
			}
		}
		else{
			echo "Codigo de autorización incorrecto";
		}
	}

?>