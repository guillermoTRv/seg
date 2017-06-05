<?php 
  $name_cliente = consulta_array("SELECT name_cliente FROM clientes WHERE id_cliente = '$id_cliente'");
  $name_cliente = $name_cliente['name_cliente'];
?>
<script>
    tabla("?inm=info&val=");
</script>
<div class="row">
  <div class="col-md-11">
                <p style="margin-left:20px">##Utilizar las teclas de navegación <span class="glyphicon glyphicon-arrow-up"></span> <span class=" glyphicon glyphicon-arrow-down"></span></p>
                <h3 style="margin-bottom:20px">Información en general del cliente <?php echo $name_cliente ?></h3>
                <div style="background-color:#fff">
                    <table class="table table-hover">
                          <thead>
                              <tr>
                                <th>Inmueble</th>
                                <th>Identificador</th>
                                <th>Dirección</th>
                                <th>Supervisor</th>
                                <th>
                                    Personal.Act    
                                </th>
                                <th>
                                  <center>
                                    &nbsp;&nbsp;Estado&nbsp;&nbsp;
                                  </center>
                                </th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php 
                                $q_inmuebles = mysqli_query($q_sec,"SELECT * FROM inmuebles WHERE cliente = '$id_cliente' order by id_inmueble ASC");
                                while ($array = mysqli_fetch_array($q_inmuebles)) {
                                  $name_inmueble = $array['name_inmueble'];
                                  $id_inmueble   = $array['id_inmueble'];

                                  $calle         = $array['calle'];
                                  $colonia       = $array['colonia'];
                                  $num_exterior  = $array['num_exterior'];
                                  $entidad       = $array['entidad'];
                                  $demarcacion   = $array['demarcacion'];
                                  $identificador = $array['identificador'];

                                  $direccion     = "Calle ".$calle." #".$num_exterior." Colonia".$colonia." ".$demarcacion." ".$entidad;
                                  
                                  $conteo        = consulta_val("SELECT id_usuario FROM usuarios WHERE inmueble_asign='$id_inmueble'");
                                    
                                  $supervisor_inm  = $array['supervisor'];
                                  if($supervisor_inm != 'Aun no cuenta'){
                                      $supervisor_name = consulta_array("SELECT nombre,apellido_p,apellido_m FROM usuarios WHERE id_usuario = '$supervisor_inm'");  
                                      $nombre = $supervisor_name['nombre'];
                                      $apellido_p = $supervisor_name['apellido_p'];
                                      $apellido_m = $supervisor_name['apellido_m'];
                                      $supervisor_inm = $nombre." ".$apellido_p." ".$apellido_m;
                                      
                                  }
                                  $status = $array['status'];
                                  if ($status == 11) {
                                      $color = "#f0ad4e";
                                  }
                                  else{
                                      $color = "green";
                                  }
                                  
                                  echo "
                                    <tr id='$id_inmueble'>
                                      <td>$name_inmueble</td>
                                      <td>$identificador</td>
                                      <td>$direccion</td>
                                      <td> $supervisor_inm </td>
                                      <td>
                                        
                                          #$conteo Elementos 
                                        
                                      </td>
                                      <td>
                                        <center>
                                          &nbsp;&nbsp;&nbsp;<span class='icon-radio-checked' style='color:$color'></span>&nbsp;&nbsp;&nbsp;
                                        </center>
                                      </td>
                                    </tr>
                                  ";
                                }
                              ?>
                          </tbody>
                      </table>
                </div>
                  
  </div>
</div>

<div class="row">
    <!--<div class="col-md-10">
      <h3>Otros datos</h3>
    </div>-->
</div>