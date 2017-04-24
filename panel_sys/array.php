<?php

echo $cadena="123-45-678-912-32-123-";
echo "<br>";
echo substr($cadena,2,7);


$inicio_corte = 0;
for($i=0;$i<strlen($cadena);$i++)

{
	if (is_numeric($cadena[$i])) {
		echo "<br>".$cadena[$i]."--".$i;
	}
	else{
		$fin_corte = $i - $inicio_corte;
		$corte = substr($cadena,$inicio_corte,$fin_corte);
		echo "<br>no es numerico ";
		echo "R = $corte ";
		$inicio_corte = $i+1;
	}	

}

?>