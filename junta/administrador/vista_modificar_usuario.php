<?php 
	include("../funciones.php");
	$id_usuario       = sanitizar_get("id_usuario"); 
	$consulta_usuario = consulta_array("SELECT * FROM usuarios WHERE id_usuario ='$id_usuario'");
	$nombre = $consulta_usuario['nombre'];
	$apellidos = $consulta_usuario['apellidos'];
	$correo   = $consulta_usuario['correo'];
	$usuario  = $consulta_usuario['usuario'];
	$pass_xc  = $consulta_usuario[''];

?>
<a href="" class="regresar_mod"><span class="icon-reply"></span> Regresar</a>
<h3>Modificar datos del usuario - <?php echo $nombre." ".$apellidos ?></h3>
<hr class="linea">
<form class="form-horizontal form_modificar_usuario" method="POST" enctype="multipart/form-data">
  <input type="hidden" value="<?php echo $id_usuario ?>" name="id_usuario">
  <div class="form-group">
    <label class="col-md-2 control-label">Nombre</label>
    <div class="col-md-10">
      <input type="text" class="form-control input_blue nombre" name="nombre" value="<?php echo $nombre ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Apellidos</label>
    <div class="col-md-10">
      <input type="text" class="form-control input_blue apellidos" name="apellidos" value="<?php echo $apellidos ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Correo</label>
    <div class="col-md-10">
      <input type="text" class="form-control input_blue correo" name="correo" value="<?php echo $correo ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Usuario</label>
    <div class="col-md-10">
      <input type="text" class="form-control input_blue usuario" name="usuario" value="<?php echo $usuario ?>">
    </div>
  </div>

  <div class="form-group">
    <label  class="col-md-2 control-label">Password</label>
    <div class="col-md-10">
      <input type="password" class="form-control input_blue" name="password"  placeholder="Password">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-default btn_modificar_usuario" style="border:2px solid rgb(8,141,198);font-size:1.2em;font-weight:bold;">Aceptar y modificar datos</button>
    </div>
  </div>
</form>