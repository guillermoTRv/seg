<?php 
	
	include("../../funciones.php");
	$val = sanitizar_get("val");
	$q_categoria = mysqli_query($q_sec,"SELECT id_categoria,categoria FROM checklist_categoria WHERE id_inmueble = '$val'");
							while ($array = mysqli_fetch_array($q_categoria)) {
								   $id_categoria = $array["id_categoria"];
								   $categoria = $array["categoria"];

								   $sentencia_situacion = "SELECT id_situacion,situacion FROM checklist_situacion WHERE id_categoria = '$id_categoria'";
								   $consulta_val = consulta_val($sentencia_situacion);
								   if ($consulta_val == 0) {
								   		echo "
										<tr id=''>
											<td id='$id_categoria'>$categoria</td>
											<td>--</td>
											<td>Falta situación</td>
											<td>
		                                        <center>
		                                            <a href='' class='btn_cambio' style='color:#5296E9'><span class='icon-cog'></span></a>
		                                        	<a href='#' style='color:#FE2E2E'><span class='icon-cancel-circle'></span></a>
		                                        </center>
		                                    </td>
										</tr>	
								        ";	
								   }
								   else{
									    $q_situacion = mysqli_query($q_sec,$sentencia_situacion);
									    while ($array_st = mysqli_fetch_array($q_situacion)) {
									   		$id_situacion = $array_st["id_situacion"];
									   		$situacion    = $array_st["situacion"];
									   		echo "
											<tr id=''>
												<td id='$id_categoria'>$categoria</td>
												<td class='st_$id_situacion' id='$id_situacion'>$situacion</td>
												<td>Activo</td>
												<td>
		                                           <center>
		                                              <a href='' class='btn_cambio' style='color:#5296E9'><span class=' icon-cog'></span></a>
		                                           	  <a href='' class='btn_delete'  style='color:#FE2E2E'><span class='icon-cancel-circle'></span></a>
		                                           </center>
		                                        </td>
											</tr>	
								            ";	
									    }
								   }

						           
							}	
?>