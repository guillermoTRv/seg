<?php 
	include("../../funciones.php");
	$name = sanitizar("name_txt");
	$apellido_p = sanitizar("apellido_uno_txt");
	$apellido_m = sanitizar("apellido_dos_txt");
	$fecha_nacimiento = sanitizar("fecha_txt");
	$curp = sanitizar("curp_txt");
	$telefono_uno = sanitizar("tel_uno_txt");
	$telefono_dos = sanitizar("tel_dos_txt");

	$calle = sanitizar("calle_txt");
	$num_int = sanitizar("num_int_txt");
	$num_ext = sanitizar("num_ext_txt");
	$colonia = sanitizar("colonia_txt");
	$postal = sanitizar("postal_txt");
	$entidad = sanitizar("entidad_txt");
	$demarcacion = sanitizar("demarcacion_txt");

	$peso = sanitizar("peso_txt");
	$altura = sanitizar("altura_txt");

	$inmueble = sanitizar("inmueble_txt");
	$turno = sanitizar("turno_txt");
	$horario = sanitizar("horario_txt");
	$fecha_inicio = sanitizar("fecha_inicio_txt");
	$fecha_finalizacion = sanitizar("fecha_fin_txt");
	$codigo = sanitizar("codigo_txt");



	$validacion_curp = consulta_val("SELECT curp FROM usuarios WHERE curp = '$curp'");
	if ($validacion_curp == 0) {



		$insertar = insertar("INSERT INTO usuarios(
			nombre,
			apellido_p,
			apellido_m,
			curp,
			usuario,
			calle,
			colonia,
			num_exterior,
			num_interior,
			codigo_postal,
			entidad,
			demarcacion,
			num_movil,
			num_dos,
			pass_xc,
			inmueble_asign,
			costo_serv,
			turno,
			horario_laboral,
			tipo_pago,
			fecha_inicio_contrato,
			fecha_finalizacion,
			fecha_registro_bd,
			puesto,
			empresa,
			status,
			identificador
			) 
			VALUES(
			'$nombre',
			'$apellido_p',
			'$apellido_m',
			'$curp',
			'--',
			'$calle',
			'$colonia',
			'$num_ext',
			'$num_int',
			'$postal',
			'$entidad',
			'$demarcacion',
			'$telefono_uno',
			'$telefono_dos',
			'--',
			'$inmueble',
			'--',
			'$turno',
			'$horario',
			'--',
			'$fecha',
			'$fecha',
			'$fecha',
			'guardia',
			'empresa',
			'si',
			'--'
			)");
		$id_usuario = consulta_txt("SELECT id_usuario FROM usuarios WHERE curp = '$curp_txt'","id_usuario");

	}
	if ($validacion_curp == 1) {
		echo "El usuario que este introduciendo ya esta registrado";
	}


	$resultado = @move_uploaded_file($_FILES['files']["tmp_name"], "personal_img/".$curp.".jpg");
	if ($resultado) {
		echo $_FILES["files"]["name"];	
	}
	else{
		echo "string";
	}
?>