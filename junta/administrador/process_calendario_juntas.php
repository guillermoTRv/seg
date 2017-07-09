<style>
	th{padding:15px 45px;text-align:center;background-color: #006699;}
	td{padding:17px 45px;text-align:center;}
	.td_si{background-color:#6e6e6e;cursor: pointer; }
	.td_no{background-color:#A4A4A4; }
	caption{background-color:#003366;color:#fff;padding-left:10px}
</style>
<?php 
	include("../funciones.php");
    $id_sala   = sanitizar_get("id_sala");
    $name_sala = sanitizar_get("name_sala");
?>
<a href="" class="regresar_sin regresar_calendar"><span class="icon-reply"></span> Regresar</a>
<h3>Calendario para la sala <?php echo $name_sala ?></h3>
<hr class="linea">
	<?php $month=date("n"); ?>
    <div class="calendario" data="<?php echo $month ?>">  
    	<?php
            # definimos los valores iniciales para nuestro calendario
            $year=date("Y");
            
            
            $month_anterior   = $month-1;
            $dia_anterior     = date("d",(mktime(0,0,0,$month_anterior+1,1,$year)-1));
            $fecha_anterior   = $year."-".$month_anterior."-".$dia_anterior;
           	$num_anterior_dia = num_dia($fecha_anterior);
			
			$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
   			$oper_a = num_dia($fecha_anterior)+$ultimoDiaMes;


   			$primer_dia = $year."-".$month."-01";
            $num_primer_dia = num_dia($primer_dia);

   			if ($oper_a <= 35) {
   				$espacios = 35;
   				$inicio = "anterior";
   			}
   			if ($oper_a > 35 && $oper_a < 38) {
   				$espacios = 42;
   				$inicio = "anterior";
   			}
   			if ($oper_a ==38) {
   				$espacios =35;
   				$inicio = "exacto";
   			}

   			$tr = 1;
   			$control_antes = 0;
   			$dia_calendario = 1;
   			$dia_despues = 1;
   			?>
   			<center>
			<table>
			<caption>
				<h4 style="font-weight: bold"> Mes <?php echo mes($month) ?> 
					<span data-idsala="<?php echo $id_sala ?>" data-namesala = "<?php echo $name_sala ?>" data-mes="<?php echo $month ?>" data-tipo='derecha' class='icon-circle-right mover'></span>
				</h4>
			</caption>
			<tr>
                  <th>Lun</th>
                  <th>Mar</th>
                  <th>Mie</th>
                  <th>Jue</th>
                  <th>Vie</th>
                  <th>Sab</th>
                  <th>Dom</th>
            </tr>
   			<?php
   			for ($i=1; $i <= $espacios; $i++) { 
   				if ($tr == 1) {
   					echo "<tr>";
   				}
	   				if ($num_primer_dia == 1) {
									   					
	   					if ($dia_calendario <= $ultimoDiaMes) {
	   							echo "<td class='td_si'>$dia_calendario</td>";
	   							$dia_calendario++;
	   					}
	   					else{
	   							$ultimo_num = num_dia("$year-$month-$ultimoDiaMes");
	   							if ($ultimo_num == 7) {
	   								return false;
	   							}
	   							else{
	   								echo "<td class='td_no'>$dia_despues</td>";
	   								$dia_despues++;
	   							}
	   					}
	   				}
	   				else{
	   					$oper_b = $num_anterior_dia;
	   					$oper_c = $dia_anterior - $num_anterior_dia + 1;
	   					//$dia_anterior_for = $oper_c;
	   					if ($i <= $oper_b) {
	   						if ($control_antes == 0) {
	   							echo "<td class='td_no'>$oper_c</td>";
	   							$dia_anterior_for = $oper_c;
	   							$dia_anterior_for++;
	   							$control_antes    = 1;
	   						}
	   						else{
	   							echo "<td class='td_no'>$dia_anterior_for</td>";
	   							$dia_anterior_for++;
	   						}
	   					}
	   					else{
	   						if ($dia_calendario <= $ultimoDiaMes) {
	   							$mes_poner = tiempo($month);
	   							$dia_poner = tiempo($dia_calendario);
	   							$fecha_calendario = $year."-".$mes_poner."-".$dia_poner;
	   							$consulta_val = consulta_val("SELECT null FROM reservas_juntas WHERE id_sala ='$id_sala' and dia='$fecha_calendario'");
	   							if($consulta_val == 0){$mens_calendario = '---';}
	   							if($consulta_val > 0) {$mens_calendario = "<span class='label label-info'>".$consulta_val."R</span>";}
	   							echo "<td class='td_si' data-toggle='modal' data-target='#$fecha_calendario'><p style='margin-bottom:-14px;'>$dia_calendario</p> <br> $mens_calendario </td>";
	   							include("modal_calendario.php");
	   							$dia_calendario++;
	   						}
	   						else{
	   							$ultimo_num = num_dia("$year-$month-$ultimoDiaMes");
	   							if ($ultimo_num == 7) {
	   								return false;
	   							}
	   							else{
	   								echo "<td class='td_no'>$dia_despues</td>";
	   								$dia_despues++;
	   							}
	   						}
	   						
	   					}
	   				}
   				$tr++;
   				if ($tr == 8) {
   					echo "</tr>";
   					$tr =1;
   				}
   				
   			}
   			echo "</table></center>";
        ?>
    </div>	

    <br><br>
    