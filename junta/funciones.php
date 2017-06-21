<?php 
	
	$type_produccion = "local";

	if ($type_produccion == "local") {
		$ruta = "http://localhost/seg/";
		/**Datos de conexion a la base de datos---------------------------------------**/
		
		$servidor    = "localhost";
		$usuario_s   = "root";

		$password_s  = "123qwezxc";
		$bd_s        = "juntas";
	}

	if ($type_produccion == "serv") {
		$servidor      = "gruposelta.com.mx";
		$usuario_s     = "gruposel_admin";

		$password_s    = "123qweaszxc";
		$bd_s          = "gruposel_juntas";
	}

	$nombre_mi_empresa = "Gideas";


	global $q_sec;
	$q_sec = mysqli_connect($servidor,$usuario_s,$password_s,$bd_s);


	/**Control de errores en el sistema-------------------------------------------**/

	error_reporting(E_ALL ^ E_NOTICE);
	$mens_error = "Surgió un error interno; si esto persiste contactar a sistemas";

	$permiso = "1234";
	/**Sentencias prehechas-------------------------------------------------------**/

	function consulta_val($sentencia){
		global $q_sec;
		global $mens_error;
		$consulta_bd = mysqli_query($q_sec,$sentencia) or die($mens_error."-".$sentencia);
		return $consulta_bd = mysqli_num_rows($consulta_bd);
		mysqli_close($q_sec);
	}

	function consulta_array($sentencia){
		global $q_sec;
		global $mens_error;
		$consulta_bd = mysqli_query($q_sec,$sentencia) or die($mens_error."-".$sentencia);
		return $consulta_bd = mysqli_fetch_array($consulta_bd);
		mysqli_close($q_sec);	
	}

	function insertar($sentencia){
		global $q_sec;
		global $mens_error;
		return $consulta_bd = mysqli_query($q_sec,$sentencia) or die($mens_error."-".$sentencia);
		mysqli_close($q_sec);
	}

	function consulta_gen($sentencia){
		global $q_sec;
		global $mens_error;
		return $consulta_bd = mysqli_query($q_sec,$sentencia) or die($mens_error."-".$sentencia);
		mysqli_close($q_sec);
	}

	function consulta_tx($sentencia,$dato_bd){
		global $q_sec;
		global $mens_error;
		       $consulta_bd = mysqli_query($q_sec,$sentencia) or die($mens_error."-".$sentencia);
		       $fetchArray  = mysqli_fetch_array($consulta_bd);
		return $dato        = $fetchArray[$dato_bd];

		mysqli_close($q_sec);
	}

	/**Control de horario-----------------------------------------------------------**/

	date_default_timezone_set('America/Mexico_City');
    $fecha                =  date("Y-m-d");
    $fecha_hora           =  date("Y-m-d H:i:s");
    $hora                 =  date("H:i:s");

    /**Funcion para sanitizar variables de entrada-----------------------------------**/

    function sanitizar($var_sn){
		$var_sn = addslashes(htmlspecialchars(strip_tags(trim($_POST[$var_sn]))));
		return $var_sn;
	}

	function sanitizar_get($var_sn){
		$var_sn = addslashes(htmlspecialchars(strip_tags(trim($_GET[$var_sn]))));
		return $var_sn;
	}

	
?>