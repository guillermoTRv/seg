$(document).on("change",".entidad",function(){
	var estado = $(this).val()
	$.ajax({
		type:"GET",
		url:"municipios.php?estado="+estado+"",
		success:function(data){
			$(".municipios").html(data)
		}
	})
})