<div class="calendario_lista">
<a href="" class="regresar regresar_uno_reserva"><span class="icon-reply"></span> Regresar</a>
<h3><span class="icon-calendar"></span> Seleccione la sala para la cual desea ver su calendario</h3>
<hr class="linea">
<?php 
	include("../funciones.php");
	$consulta_sala = mysqli_query($q_sec,"SELECT * FROM salas_juntas order by id_sala asc");
	  while ($array  = mysqli_fetch_array($consulta_sala)) {
	      $name_sala = $array['name_sala'];
	      $id_sala   = $array['id_sala'];
	      ?>
	        <p class="boton_sala" id='<?php echo $id_sala ?>' data="<?php echo $name_sala ?>"><?php echo $name_sala ?></p>
	      <?php
	}
?>
</div>
<div class="calendario_vista" style="display: none">
	
</div>