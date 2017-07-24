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

	$empresa = "Su Empresa";


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


	function saber_dia($nombredia) {
		$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
		$fecha_l = $dias[date('N', strtotime($nombredia))];
		return $fecha_l;
	}
	function num_dia($dia_num){
		$diasnum = array('', '1','2','3','4','5','6','7');
		$fecha_num = $diasnum[date('N', strtotime($dia_num))];
		return $fecha_num;
	}
	function mes_castellano($mes_valor){
		$meses = array(Enero=>'01', Febrero=>'02', Marzo=>'03', Abril=>'04', Mayo=>'05',Junio=>'06',Julio=>'07',Agosto=>'08',Septiembre=>'09',Octubre=>'10',Noviembre=>'11',Diciembre=>'12');
		foreach($meses as $mes_nombre=>$mes_num){
			if ($mes_valor == $mes_num) {
				echo $mes_nombre;
				return false;
			}
		}
	}
	function mes($mes_valor){
		$meses = array(Enero=>'01', Febrero=>'02', Marzo=>'03', Abril=>'04', Mayo=>'05',Junio=>'06',Julio=>'07',Agosto=>'08',Septiembre=>'09',Octubre=>'10',Noviembre=>'11',Diciembre=>'12');
		foreach($meses as $mes_nombre=>$mes_num){
			if ($mes_valor == $mes_num) {
				return $mes_nombre;
				return false;
			}
		}
	}
	function tiempo($tiempo){
		if ($tiempo < 10) {
			$tiempo = "0".$tiempo;
			return $tiempo;
		}
		else{
			return $tiempo;
		}
	}

	function tiempo_esp($tiempo){
		if ($tiempo < 10) {
			if (strlen($tiempo)<2) {
				$tiempo = "0".$tiempo;
				return $tiempo;
			}
			else{
				return $tiempo;
			}
		}
		else{
			return $tiempo;
		}
	}
	$esp = "<br>";

	
?>