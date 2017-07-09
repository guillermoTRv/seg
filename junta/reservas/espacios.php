<?php 
	function brown($ancho,$mensaje,$hrs_ini,$min_ini,$hrs_fin,$min_fin){
		if ($ancho != 0) {
			if ($ancho > 5) {
				$pon = "<span class='icon-checkmark'></span>";
			}
			else{
				$pon = "<span style='color:brown'>.</span>";
			}
			$brown = "
				<div class='espacio' data-tipo='brown' data-horaini='$hrs_ini' data-minini='$min_ini' data-horafin='$hrs_fin' data-minfin='$min_fin' style='display:inline-block;height:30px;width:$ancho%;background-color:brown;margin-right:-4px;border:px solid black;padding-left:2px;paddig-top:1px'>
						<p class='p_hora_mens'>$mensaje $pon</p>
				</div>
			";
			return $brown;
		}
	}

	function purple($ancho,$mensaje){
		$purple = "
			<div class='espacio' data-tipo='purple' data-horaIni='' data-horaFin='' style='display:inline-block;height:30px;width:$ancho%;background-color:purple;margin-right:-4px;border:px solid black;padding-left:2px;paddig-top:1px'>
					<p class='p_hora_mens'>$mensaje <span class='icon-cross'></span></p>
			</div>
		";
		return $purple;	
	}
	function blue($ancho,$mensaje,$hrs_ini,$min_ini,$hrs_fin,$min_fin,$hrs_ini_info,$min_ini_info,$hrs_fin_info,$min_fin_info){
		$blue = "
			<div class='espacio' data-tipo='blue' 
					data-horaini='$hrs_ini' 
					data-minini='$min_ini' 
					data-horafin='$hrs_fin' 
					data-minfin='$min_fin' 

					data-infohoraini='$hrs_ini_info' 
					data-infominini='$min_ini_info' 
					data-infohorafin='$hrs_fin_info' 
					data-infominfin='$min_fin_info' 

					style='display:inline-block;height:30px;width:$ancho%;background-color:rgb(129, 218, 245);margin-right:-4px;border:px solid black;padding-left:2px;paddig-top:1px'>
					<p class='p_hora_mens'>$mensaje <span class='icon-user-check'></span></p>
			</div>
		";
		return $blue;
	}
?>