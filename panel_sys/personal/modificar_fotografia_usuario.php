<?php 
	$q_personal = consulta_array("SELECT * FROM usuarios WHERE id_usuario='$val'");
	$nombre =     $q_personal['nombre'];
	$apellido_p = $q_personal['apellido_p'];
	$apellido_m = $q_personal['apellido_m'];
	$nombre_completo = $nombre." ".$apellido_p." ".$apellido_m;
	$identificador = $q_personal['identificador'];
	$usuario = $q_personal['usuario'];
	$puesto = $q_personal['puesto'];
?>
<div class="row">
	<div class="col-md-10">
			<h3>
				Cambio de fotografía para el <?php echo  ucwords($puesto).": <strong>$nombre_completo</strong>"; ?>
			</h3>
			<h3>
				Identificador: <strong><?php echo $identificador ?> </strong> &nbsp; Nombre de usuario: <strong><?php echo $usuario ?></strong>
			</h3>
			<br>
			<form method="POST" enctype="multipart/form-data" class="form_img">
				<input type="hidden" name="val_user" value="<?php echo $identificador ?>">
				<output id="list">
					<h4>Fotografía Actual</h4>
					<img src="panel_sys/personal/personal_img/<?php echo $identificador ?>"  alt="imagen" style='width:300px;height:300px'>
				</output>
				<br>
				<label>Cargue una nueva fotografía</label>
				<input type="file" id="files" name="files" value="Nueva imagen" />
			</form>
			<br>
			<div id="m_v">
				
			</div>
			<a href="?pr=opciones_modificar_usuario&val=<?php echo $val ?>" class="blue"><span class="icon-undo2"></span> Regresar a las opciones de modificación</a><br>
			<a href="?pr=info&val=<?php echo $val ?>" class="blue"><span class="icon-undo2"></span> Regresar al panel de información del elemento</a>
	</div>
</div>
<script>
	$(function(){
            $(document).on("click",".btn-default",function(event){
            	event.preventDefault()
                var formData = new FormData($(".form_img")[0]);

                var ruta = "panel_sys/personal/process_modificar_fotografia.php";

                $.ajax({

                    url: ruta,

                    type: "POST",

                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data)
                    {
                        $("#m_v").html(data);
                    }
                });
                return false;
            });
    });
	function archivo(evt) {
	      var files = evt.target.files; // FileList object
	       
	        //Obtenemos la imagen del campo "file". 
	      for (var i = 0, f; f = files[i]; i++) {         
	           //Solo admitimos imágenes.
	           if (!f.type.match('image.*')) {
	                continue;
	           }
	       
	           var reader = new FileReader();
	           
	           reader.onload = (function(theFile) {
	               return function(e) {
	               // Creamos la imagen.
	                      document.getElementById("list").innerHTML = ['<h4>Nueva Fotografía</h4><img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/> <br><button class="btn btn-default" style="margin-top:20px;">Aceptar para iniciar el cambio de fotografía</button> '].join('');
	               };
	           })(f);
	 
	           reader.readAsDataURL(f);
	       }
	}
	             
	document.getElementById('files').addEventListener('change', archivo, false);
</script>				