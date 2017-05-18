<strong><h4>A continuación indique la anomalia, situación o detalle sucedido</h4></strong>
<form method="POST" enctype="multipart/form-data" class="form_reporte">	
			<textarea name="detalle_repo_txt" class="form-control detalle_repo" id="" cols="30" rows="8"></textarea>
			<br>
			<label for="">Estado del reporte</label><br>
			<label class="radio-inline">
			  <input type="radio" value="moderado" class="option_est" name="ok"> Moderado
			</label>
			<label class="radio-inline">
			  <input type="radio" value="severo" class="option_est" name="ok"> Severo
			</label>
			<label class="radio-inline">
			  <input type="radio" value="grave" class="option_est" name="ok"> Grave
			</label>
			<input type="hidden" value="" class="option_val" name="option_est">
			<br><br>
			<label>Subir imagen(opcional de acuerdo al hecho)</label>
			<input type="file" name="files">
			<br>
			<button type="button" class="btn btn-default btn-success btn-block btn-reporte">Enviar reporte</button>
</form>
<div class="m_v"></div>