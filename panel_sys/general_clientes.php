<?php 
  $name_cliente = consulta_array("SELECT name_cliente FROM clientes WHERE id_cliente = '$id_cliente'");
  $name_cliente = $name_cliente['name_cliente'];
?>
<script>
    tabla("?inm=info&val=");
</script>
<div class="row">
  <div class="col-md-10">
                <p style="margin-left:20px">##Utilizar las teclas de navegación <span class="glyphicon glyphicon-arrow-up"></span> <span class=" glyphicon glyphicon-arrow-down"></span></p>
                <h3 style="margin-bottom:20px">Información en general del cliente <?php echo $name_cliente ?></h3>
                <div style="background-color:#fff">
                    <table class="table table-hover">
                          <thead>
                              <tr>
                                <th>Inmueble</th>
                                <th>Identificador</th>
                                <th>Dirección</th>
                                <th>No.Personal</th>
                                <th>#Reportes</th>
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
                                    
                                  echo "
                                    <tr id='$id_inmueble'>
                                      <td>$name_inmueble</td>
                                      <td>$identificador</td>
                                      <td>$direccion</td>
                                      <td>$conteo</td>
                                      <td>#Reportes</td>
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
    <div class="col-md-10">
      <h3>Otros datos</h3>
    </div>
</div>