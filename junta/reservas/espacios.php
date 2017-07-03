<?php 
	function brown($ancho,$mensaje,$hrs_ini,$min_ini,$hrs_fin,$min_fin){
		if ($ancho != 0) {
			$brown = "
				<div class='espacio' data-tipo='brown' data-horaini='$hrs_ini' data-minini='$min_ini' data-horafin='$hrs_fin' data-minfin='$min_fin' style='display:inline-block;height:30px;width:$ancho%;background-color:brown;margin-right:-4px;border:px solid black'>
						<p class='p_hora_mens'>$mensaje D</p>
				</div>
			";
			return $brown;
		}
	}

	function purple($ancho,$mensaje){
		$purple = "
			<div class='espacio' data-tipo='purple' data-horaIni='' data-horaFin='' style='display:inline-block;height:30px;width:$ancho%;background-color:purple;margin-right:-4px;border:px solid black'>
					<p class='p_hora_mens'>$mensaje Oc</p>
			</div>
		";
		return $purple;	
	}
	function blue($ancho,$mensaje){
		$blue = "
			<div class='espacio' data-tipo='blue' data-horaIni='' data-horaFin='' style='display:inline-block;height:30px;width:$ancho%;background-color:rgb(129, 218, 245);margin-right:-4px;border:px solid black'>
					<p class='p_hora_mens'>$mensaje B</p>
			</div>
		";
		return $blue;
	}
?>