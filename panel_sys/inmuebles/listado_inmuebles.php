<script>
  tabla("?inm=info&val=")
</script>
<div class="row">
  <div class="col-md-11">
    <h2><span class="icon-office"></span> Inmuebles para <?php echo $name_cliente ?></h2>
    <br>
  </div>
  <div class="col-md-11">
    <!--<p style="margin-left:20px">##Utilizar las teclas de navegación <span class="glyphicon glyphicon-arrow-up"></span> <span class=" glyphicon glyphicon-arrow-down"></span></p>-->
    <div class="div_blanco" style="background-color:#fff">  
        <table class="table table-hover">
            <thead>
                <tr>
                  <th>Inmueble</th>
                  <th>Identificador</th>
                  <th>Dirección</th>
                  <th>Supervisor</th>
                  <th>Personal.Act&nbsp;&nbsp;&nbsp;&nbsp;  </th>
                  <th><center>Modificar</center></th>
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
                                  $direccion     = $calle." #".$num_exterior." ".$colonia." ".$demarcacion." ".$entidad;
                                  
                                  $conteo        = consulta_val("SELECT id_usuario FROM usuarios WHERE inmueble_asign='$id_inmueble'");
                                  $supervisor_inm  = $array['supervisor'];
                                  if($supervisor_inm != 'Aun no cuenta'){
                                      $supervisor_name = consulta_array("SELECT nombre,apellido_p,apellido_m FROM usuarios WHERE id_usuario = '$supervisor_inm'");  
                                      $nombre = $supervisor_name['nombre'];
                                      $apellido_p = $supervisor_name['apellido_p'];
                                      $apellido_m = $supervisor_name['apellido_m'];
                                      $supervisor_inm = $nombre." ".$apellido_p." ".$apellido_m;
                                      
                                  }

                                  echo "
                                    <tr id='$id_inmueble'>
                                      <td>$name_inmueble</td>
                                      <td>$identificador</td>
                                      <td>$direccion</td>
                                      <td>$supervisor_inm</td>
                                      <td>#$conteo Elementos</td>
                                      <td>
                                        <center>
                                            <a href='?inm=modificar_inmueble&val=$id_inmueble' style='color:#5296E9'><span class=' icon-cog'></span></a>
                                        </center>
                                      </td>
                                      <td>
                                        <center>
                                          &nbsp;&nbsp;&nbsp;<span class='icon-radio-checked' style='color:green'></span>&nbsp;&nbsp;&nbsp;
                                        </center>
                                      </td>
                                    </tr>
                                  ";
                                }
                ?>
            </tbody>
        </table>
    </div>
    <br><br>
  </div>
</div>