function tabla_val(ruta_tr,event){
		var activo_menu = $(".activo_menu").length;
		if (activo_menu == 0) {

			var select = $(".select").length
				if (event.which == 40) {
					if (select == 0) {
						$("tbody tr:first").addClass("select")
					}
					if (select == 1) {
						var nextt = $(".select").next()
						$(".select").removeClass("select")
						nextt.addClass("select")
					}
				}
				if (event.which == 38) {
					if (select == 0) {
						$("tbody tr:last").addClass("select")	
					}
					if (select == 1) {
						var prev = $(".select").prev()
						$(".select").removeClass("select")
						prev.addClass("select")	
					}	
				}
				if (select == 1) {
				    if (ruta_tr != 'nono') {    
				        if (event.which == 13) {
				           var ruta = $(".select").attr("id");
				           window.location.href = ruta_tr+ruta;
				        }
				        if (event.which == 81) {
				        	$(".select").removeClass("select")
				        }
				    }    
			    }
		}	    
}

function tabla_val_varias(ruta_tr,event){
		event.preventDefault();
		var activo_menu = $(".activo_menu").length;
		if (activo_menu == 0) {

			var select = $(".select").length
			var ww = $("tbody.tb_s").length	
				if (event.which == 40) {
					if (select == 0) {
						$("tbody.tb_s tr:first").addClass("select")
					}
					if (select == 1) {
						var nextt = $("tbody.tb_s tr.select").next()
						$(".select").removeClass("select")
						nextt.addClass("select")
					}
				}
				if (event.which == 38) {
					if (select == 0) {
						$("tbody.tb_s tr:last").addClass("select")	
					}
					if (select == 1) {
						var prev = $("tbody.tb_s tr.select").prev()
						$(".select").removeClass("select")
						prev.addClass("select")	
					}	
				}
				if (select == 1) {
			        if (event.which == 13) {
			           var ruta = $(".select").attr("id");
			           window.location.href = ruta_tr+ruta;
			        }
			        if (event.which == 81) {
			        	$(".select").removeClass("select")
			        }
			    }
		}	    
}


function tabla(ruta_tr,event){
	$(document).keydown(function(event){
		var activo_menu = $(".activo_menu").length;
		if (activo_menu == 0) {

			var select = $(".select").length
				if (event.which == 40) {
					if (select == 0) {
						$("tbody tr:first").addClass("select")
					}
					if (select == 1) {
						var nextt = $(".select").next()
						$(".select").removeClass("select")
						nextt.addClass("select")
					}
				}
				if (event.which == 38) {
					if (select == 0) {
						$("tbody tr:last").addClass("select")	
					}
					if (select == 1) {
						var prev = $(".select").prev()
						$(".select").removeClass("select")
						prev.addClass("select")	
					}	
				}
				if (select == 1) {
			        if (event.which == 13) {
			           var ruta = $(".select").attr("id");
			           window.location.href = ruta_tr+ruta;
			        }
			    }
			    if (event.which == 81) {
			        $(".select").removeClass("select")
			    }
		}
	});
	$(document).ready(function(){
        $("tbody tr").dblclick(function(){
          var ruta = $(this).attr("id")
          window.location.href = ruta_tr+ruta+""
        });
    });		    
}	