
					<form class="datos_checklist">
					  	<table class="table">
							<thead>
								<tr>
									<th>Categoria</th>
									<th>Situacion</th>
									<th class="centra"><center></center> Correcto</th>
									<th class="centra"><center></center>Anomalia</th>
								</tr>
								<tr>
									<?php 
										$q_categoria = mysqli_query($q_sec,"SELECT id_categoria,categoria FROM checklist_categoria WHERE id_inmueble= '$id_inmueble'");
										$cont_campos = 0;
										while  ($array_categoria = mysqli_fetch_array($q_categoria)) {
											    $id_categoria = $array_categoria['id_categoria'];
											    $categoria    = $array_categoria['categoria'];

											    $q_situacion  = mysqli_query($q_sec,"SELECT id_situacion,situacion FROM checklist_situacion WHERE id_categoria = '$id_categoria'");
											    while ($array_situacion = mysqli_fetch_array($q_situacion)) {
											    	   $id_situacion = $array_situacion['id_situacion'];
											    	   $situacion    = $array_situacion['situacion'];
											    	   ?>
														<tr>
															<td class="categoria_name">
																<?php echo $categoria ?> 
																<span
																	><input type="hidden" name="<?php echo $cont_campos ?>_categoria" value="<?php echo $categoria ?>">
																</span>
															</td>
															<td class="situacion_name">
																<?php echo $situacion ?>
																<span>
																	<input type="hidden" name="<?php echo $cont_campos ?>_situacion" value="<?php echo $situacion ?>">
																</span>
															</td>
															<td class="centra">
																<span class="icon-checkbox-unchecked check" data="normal"></span>
															</td>
															<td class="centra" data="<?php echo $cont_campos ?>">
																<span class="icon-checkbox-unchecked check" data="anomalia"></span> 
																<span class="td_coment"></span>
																<span class="td_valor"><input type="hidden" name="<?php echo $cont_campos ?>_valor" class="input_valor"></span>
															</td>
														</tr>
													   <?php
													   $cont_campos++;

											    }
										}
									?>	
								</tr>
							</thead>
						</table>
						<input type="hidden" class="cont_campos" value="<?php echo $cont_campos ?>" name="cont_campos_txt">
					</form>
					
					<button class="btn btn-lg btn-block btn-success btn-checklist" style="font-size:1.4em">Enviar</button>