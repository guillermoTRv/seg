<script>
$(document).ready(function(){
	$(".btn_aceptar").click(function(){
		$.ajax({
			type:"POST",
			url:"panel_sys/personal/process_baja_personal.php",
			data:$("#form_baja_personal").serialize(),
			success:function(data){
			  	$("#respuesta").html(data)
			}
		});
		return false;	
	})
});
$(document).keydown(function(event){
	if (event.which == 13) {
		event.preventDefault()
		/**var valor = $("input.form-control").val()
		if (valor != '') {
			$.ajax({
				type:"POST",
				url:"panel_sys/personal/process_baja_personal.php",
				data:$("#form_baja_personal").serialize(),
				success:function(data){
				  	$("#respuesta").html(data)
				}
			});
			return false;	
		}**/
	}
});
$(function(){
    $(document).on("click",".btn-baja",function(){
         var identificador = $("#identificador").html()
         $(".espacio_baja").html("<br>Ingrese codigo de autorizacion para finalizar la accion o pulse esc para cancelar <br> <form  method='post' enctype='multipart/form-data' class='form-inline'><div class='form-group'> <input name='identificador_txt' type='hidden' value='"+identificador+"'> <input name='codigo' type='password' class='form-control ingrese' autocomplete='off'></div>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-concluir'>Conluir Accion</button>&nbsp;&nbsp;<button type='button' class='btn btn-default btn-cancelar'>Cancelar</button></form>")
    	 $(".ingrese").focus()
    });
    $(document).on("click",".btn-concluir",function(){
        if ($(".ingrese").val() != ''){
	        $.ajax({
					type:"POST",
					url:"panel_sys/personal/process_baja_personal_two.php",
					data:$(".form-inline").serialize(),
					success:function(data){
						if (data == 00) {
							alert("Codigo invalido")
						}
						else{
							$(".espacio_baja").html(data)	
						}
						
					}
			});
		}
    });
    $(document).on("click",".btn-cancelar",function(){
         $(".espacio_baja").html("<button type='button' class='btn btn-danger btn-baja'>Dar de baja al elemento</button>")
    });
});
	
</script>
<div class="row">
	<div class="col-md-10">
		<h3>Baja de personal que labora para <?php echo $name_cliente ?> </h3>
	</div>
	<div class="col-md-10">
		<form id='form_baja_personal' method="post" enctype="multipart/form-data">
		  <div class="form-group"><br>
		    <label>Ingrese a continuación cualquiera de los siguientes datos: Número identificador, nombre del personal o curp</label>
		    <input type="text" class="form-control" name="dato_baja_txt" autofocus>
		  </div>
		  <button type="button" class="btn btn-default btn_aceptar">Buscar</button>
		</form>
		<div id="respuesta">
			
		</div>	
	</div>
</div>