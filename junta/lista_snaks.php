<a href="" data-toggle="modal" data-target="#<?php echo $id_reserva ?>"> Si - Ver lista </a>

<div class="modal fade" id="<?php echo $id_reserva ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="margin-top:100px;">
			    <div class="modal-content" style="margin:20px;background-color: black;border: 1px solid rgb(8,141,198);-webkit-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);-moz-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color:white" aria-hidden="true">&times;</span></button>
			        <h3 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-apple"></span> Lista Coffe Break</h3>
			      </div>
			      <div class="modal-body">
			        <p>Marque los snaks que ya tenga listos</p> 
			         <ul>
			         	<?php 
			         		$cons_snaks = mysqli_query($q_sec,"SELECT snak FROM snaks where id_reserva = '$id_reserva' order by id_snak asc");
			         		while ($array_snaks = mysqli_fetch_array($cons_snaks)) {
			         			$snak = $array_snaks['snak'];
			         			echo "<li>$snak </li>";
			         		}
			         	?>
			         </ul>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary btn-close" data-dismiss="modal" style="font-weight:bold;"> Cerrar Ventana</button>
			      </div>
			    </div>
	</div>
</div>