//element_sl -> elemento del formulario que esta seleccionado
function formulario_control(ruta_fr){ 
$(document).ready(function(){
	$(".element_ol:first").addClass("element_sl").focus()

	$(".p_select").click(function(){
	    	//$(this).next().show()
	    	var select_sl = $(".select_sl").length 
	    	if (select_sl == 0) {
	    		$(this).next().show()
	    		$(this).addClass("select_sl")
	    		return false
	    	}
	    	if (select_sl == 1) {
	    		
	    		if ($(this).parent().prev().html() == $(".select_sl").parent().prev().html()) {
	    			$(".select_sl").next().hide()
		    		$(".select_sl").removeClass("select_sl")
		    		$(".lisub_select").removeClass("lisub_select")	
	    			return false
	    		}
	    		else{
	    			$(".select_sl").next().hide()
		    		$(".select_sl").removeClass("select_sl")
		    		$(".lisub_select").removeClass("lisub_select")
		    		$(this).next().show()
		    		$(this).addClass("select_sl")
		    		return false
	    		}
	    		/*
	    		$(".select_sl").next().hide()
	    		$(".select_sl").removeClass("select_sl")
	    		$(this).next().show()
	    		$(this).addClass("select_sl")
	    		return false
	    		*/
	    	}
	});

	$(".ul_menu li").click(function(){
			$(".ul_menu").hide()
			//$(".element_sl").removeClass("element_sl")
			$(".select_sl").removeClass("select_sl")
			$(".lisub_select").removeClass("lisub_select")

			var select = $(this).children().html()
			$(this).parent().prev().html("<span class='icon-circle-down'></span> "+select)
			$(this).parent().next().val(select)
			return false
	});


	$(".element_ol").click(function(){
			$(".element_sl").removeClass("element_sl")
			$(".lisub_select").removeClass("lisub_select")
			var seleccionado = $(this).addClass("element_sl")
			return false
	});

	$("input.element_ol").click(function(){
			$(".ul_menu").hide()
			$(".select_sl").removeClass("select_sl")
			$(".lisub_select").removeClass("lisub_select")
			return false
	});
	$(".button_enviar").click(function(){
			$(".ul_menu").hide()
			$(".select_sl").removeClass("select_sl")
			$(".lisub_select").removeClass("lisub_select")

			$("form.control_inline input").each(function(){
					    var val_input = $(this).val()
					    if (val_input == '') {
					    	var contador = 1;
					    }
					})

					if (contador == 1) {
						alert("Existen campos vacios en el formulario")
					}
					else{
						var r = confirm("La informacion ingresada sera enviada y procesada");
					    if (r == true) {
					    	
						    	
							    	$.ajax({
							            type:"POST",
							            url:ruta_fr,
							            data:$(".control_inline").serialize(),
							            success:function(data){
							              	alert(data)
							            }
							        });
							        return false;
							   
					    }
				    	else{}
				    }

	});

	$(document).click(function(){
			var select_sl  = $(".select_sl").length
			var element_sl = $(".element_sl").length
			if (select_sl == 1) {
				$(".ul_menu").hide()
				$(".p_select").removeClass("select_sl")
			}
			if (element_sl == 1) {
				$(".element_sl").removeClass("element_sl").blur()
			}
			$(".lisub_select").removeClass("lisub_select")
	});



})

$(document).keydown(function(event){
	control_menu = $(".activo_menu").length
	if (control_menu == 0) {
		var element_sl = $(".element_sl").length
		var select_sl  = $(".select_sl").length

		if (event.which == 38) {
			if (select_sl == 0) {
				if (element_sl == 0) {
						$(".element_ol:last").addClass("element_sl").focus()
						return false
				}
				if (element_sl == 1) {
						var prevv = $(".element_sl").parent().parent().prev().children().next().children(".element_ol")
						$(".element_sl").removeClass("element_sl").blur()
						prevv.addClass("element_sl").focus()
						return false
				}
			}
			if (select_sl == 1) {
				var lisub_select = $(".lisub_select").length
				if (lisub_select == 0) {
					$(".select_sl").next().children("li:last").addClass("lisub_select")
				}
				if (lisub_select == 1) {
					prevv = $(".lisub_select").prev()
					$(".lisub_select").removeClass("lisub_select")
					prevv.addClass("lisub_select")
				}
			}
		}
		if (event.which == 40) {
			if (select_sl == 0) {	
				if (element_sl == 0) {
					$(".element_ol:first").addClass("element_sl").focus()
					return false
				}
				if (element_sl == 1) {
					var nextt = $(".element_sl").parent().parent().next().children().next().children(".element_ol")
					$(".element_sl").removeClass("element_sl").blur()
					nextt.addClass("element_sl").focus()
					return false
				}
			}
			if (select_sl == 1) {
				var lisub_select = $(".lisub_select").length
				if (lisub_select == 0) {
					$(".select_sl").next().children("li:first").addClass("lisub_select")
				}
				if (lisub_select == 1) {
					nextt = $(".lisub_select").next()
					$(".lisub_select").removeClass("lisub_select")
					nextt.addClass("lisub_select")
				}
			}

		}

		if (event.which == 37) {
			var element_slp = $("p.element_sl").length
			if (element_slp == 1) {
				$(".element_sl").removeClass("select_sl")
				$(".lisub_select").removeClass("lisub_select")
				$(".element_sl").next().hide()
			}
		}
		if (event.which == 39) {
			var element_slp = $("p.element_sl").length
			if (element_slp == 1) {
				$(".element_sl").addClass("select_sl")
				$(".element_sl").next().show()
			}
			
		}

		if (event.which == 13) {

			if (select_sl == 0) {
				var last = $("button.element_sl").length
				if (last == 1) {

					var contador = 0
					$("form.control_inline input").each(function(){
					    var val_input = $(this).val()
					    if (val_input == '') {					    
					    	contador = 1
					    }
					})
					if (contador == 1) {
						alert("Existen campos vacios en el formulario")
					}
					else{
						var r = confirm("La información ingresada sera enviada y procesada");
					    if (r == true) {
					    	
						    	
							    	$.ajax({
							            type:"POST",
							            url:ruta_fr,
							            data:$(".control_inline").serialize(),
							            success:function(data){
							              	alert(data)
							            }
							        });
							        return false;
							   
					    }
				    	else{}
				    }
				}
				if (last == 0) {
					nextt = $(".element_sl").parent().parent().next().children().next().children(".element_ol")
					$(".element_sl").removeClass("element_sl").blur()
					nextt.addClass("element_sl").focus()
				}								

				return false
			}
			if (select_sl == 1) {
				var lisub_select = $(".lisub_select").length
				if (lisub_select == 1) {
					var text_li = $(".lisub_select p").html()
					$(".select_sl").html("<span class='icon-circle-down'></span> "+text_li)	
					$(".lisub_select").parent().next().val(text_li)
					$(".ul_menu").hide()
					$(".select_sl").removeClass("select_sl")
					$(".lisub_select").removeClass("lisub_select")

				}
				//$(".element_sl").removeClass("select_sl")
				//$(".element_sl").next().hide()
			}
		}
	}

});
}

function formulario_control_secuencia(ruta_fr){
$(document).ready(function(){
	$(".element_ol:first").addClass("element_sl").focus()

	$(".p_select").click(function(){
	    	//$(this).next().show()
	    	var select_sl = $(".select_sl").length 
	    	if (select_sl == 0) {
	    		$(this).next().show()
	    		$(this).addClass("select_sl")
	    		return false
	    	}
	    	if (select_sl == 1) {
	    		
	    		if ($(this).parent().prev().html() == $(".select_sl").parent().prev().html()) {
	    			$(".select_sl").next().hide()
		    		$(".select_sl").removeClass("select_sl")
		    		$(".lisub_select").removeClass("lisub_select")	
	    			return false
	    		}
	    		else{
	    			$(".select_sl").next().hide()
		    		$(".select_sl").removeClass("select_sl")
		    		$(".lisub_select").removeClass("lisub_select")
		    		$(this).next().show()
		    		$(this).addClass("select_sl")
		    		return false
	    		}
	    		/*
	    		$(".select_sl").next().hide()
	    		$(".select_sl").removeClass("select_sl")
	    		$(this).next().show()
	    		$(this).addClass("select_sl")
	    		return false
	    		*/
	    	}
	});

	$(".ul_menu li").click(function(){
			$(".ul_menu").hide()
			//$(".element_sl").removeClass("element_sl")
			$(".select_sl").removeClass("select_sl")
			$(".lisub_select").removeClass("lisub_select")

			var select = $(this).children().html()
			$(this).parent().prev().html("<span class='icon-circle-down'></span> "+select)
			$(this).parent().next().val(select)
			return false
	});


	$(".element_ol").click(function(){
			$(".element_sl").removeClass("element_sl")
			$(".lisub_select").removeClass("lisub_select")
			var seleccionado = $(this).addClass("element_sl")
			return false
	});

	$("input.element_ol").click(function(){
			$(".ul_menu").hide()
			$(".select_sl").removeClass("select_sl")
			$(".lisub_select").removeClass("lisub_select")
			return false
	});
	$(".button_enviar").click(function(){
			$(".ul_menu").hide()
			$(".select_sl").removeClass("select_sl")
			$(".lisub_select").removeClass("lisub_select")
					var contador = ''
					$("form.control_inline input").each(function(){
					    var val_input = $(this).val()
					    if (val_input == '') {
					    	contador = 1;
					    	alert($(this).parent().html())
					    }
					})

					if (contador == 1) {
						alert("Existen campos vacios en el formulario")
					}
					else{
						var r = confirm("La informacion ingresada sera enviada y procesada");
					    if (r == true) {
					    	
						    	
							    	$.ajax({
							            type:"POST",
							            url:ruta_fr,
							            data:$(".control_inline").serialize(),
							            success:function(data){
							              	alert(data)
							            }
							        });
							        return false;
							   
					    }
				    	else{}
				    }

	});

	$(document).click(function(){
			var select_sl  = $(".select_sl").length
			var element_sl = $(".element_sl").length
			if (select_sl == 1) {
				$(".ul_menu").hide()
				$(".p_select").removeClass("select_sl")
			}
			if (element_sl == 1) {
				$(".element_sl").removeClass("element_sl").blur()
			}
			$(".lisub_select").removeClass("lisub_select")
	});



})

$(document).keydown(function(event){
	control_menu = $(".activo_menu").length
	num_rf = $(".fr").attr("id");
	if (control_menu == 0) {
		var element_sl = $(".element_sl").length
		var select_sl  = $(".select_sl").length

		if (event.which == 38) {
			if (select_sl == 0) {
				if (element_sl == 0) {
						$("#"+num_rf+" .element_ol:last").addClass("element_sl").focus()
						return false
				}
				if (element_sl == 1) {
						var prevv = $("#"+num_rf+" .element_sl").parent().parent().prev().children().next().children(".element_ol")
						$("#"+num_rf+" .element_sl").removeClass("element_sl").blur()
						prevv.addClass("element_sl").focus()
						return false
				}
			}
			if (select_sl == 1) {
				var lisub_select = $(".lisub_select").length
				if (lisub_select == 0) {
					$(".select_sl").next().children("li:last").addClass("lisub_select")
				}
				if (lisub_select == 1) {
					prevv = $(".lisub_select").prev()
					$(".lisub_select").removeClass("lisub_select")
					prevv.addClass("lisub_select")
				}
			}
		}
		if (event.which == 40) {
			if (select_sl == 0) {	
				if (element_sl == 0) {
					$("#"+num_rf+" .element_ol:first").addClass("element_sl").focus()
					return false
				}
				if (element_sl == 1) {
					var nextt = $("#"+num_rf+" .element_sl").parent().parent().next().children().next().children(".element_ol")
					$("#"+num_rf+" .element_sl").removeClass("element_sl").blur()
					nextt.addClass("element_sl").focus()
					return false
				}
			}
			if (select_sl == 1) {
				var lisub_select = $(".lisub_select").length
				if (lisub_select == 0) {
					$(".select_sl").next().children("li:first").addClass("lisub_select")
				}
				if (lisub_select == 1) {
					nextt = $(".lisub_select").next()
					$(".lisub_select").removeClass("lisub_select")
					nextt.addClass("lisub_select")
				}
			}

		}

		if (event.which == 37) {
			var element_slp = $("p.element_sl").length
			if (element_slp == 1) {
				$(".element_sl").removeClass("select_sl")
				$(".lisub_select").removeClass("lisub_select")
				$(".element_sl").next().hide()
			}
			var btn_sig = $(".boton_sig.element_sl").length
			if (btn_sig == 1) {
				$(".element_sl").blur()
				$(".element_sl").removeClass("element_sl")
				$("#"+num_rf+" .boton_atras").addClass("element_sl")
				$("#"+num_rf+" .boton_atras").focus()
			}
			var btn_enviar = $(".button_enviar.element_sl").length
			if (btn_enviar == 1) {
				$(".element_sl").blur()
				$(".element_sl").removeClass("element_sl")
				$("#"+num_rf+" .boton_atras").addClass("element_sl")
				$("#"+num_rf+" .boton_atras").focus()
			}
		}
		if (event.which == 39) {
			var element_slp = $("p.element_sl").length
			if (element_slp == 1) {
				$(".element_sl").addClass("select_sl")
				$(".element_sl").next().show()
			}
			var btn_atras = $(".boton_atras.element_sl").length
			if (btn_atras == 1) {
				$(".element_sl").blur()
				$(".element_sl").removeClass("element_sl")
				var btn_enviar_rf = $("#"+num_rf+" .button_enviar").length
				if (btn_enviar_rf == 0) {
					$("#"+num_rf+" .boton_sig").addClass("element_sl")
					$("#"+num_rf+" .boton_sig").focus()
				}
				if (btn_enviar_rf == 1) {
					$("#"+num_rf+" .button_enviar").addClass("element_sl")
					$("#"+num_rf+" .button_enviar").focus()	
				}	
				
			}
			
		}

		if (event.which == 13) {

			if (select_sl == 0) {
				var last      = $(".button_enviar.element_sl").length
				var btn_sig   = $(".boton_sig.element_sl").length
				var btn_atras = $(".boton_atras.element_sl").length
				if (last == 1) {

					var contador = 0
					$("form.control_inline input").each(function(){
					    var val_input = $(this).val()
					    if (val_input == '') {					    
					    	contador = 1
					    }
					})
					if (contador == 1) {
						alert("Existen campos vacios en el formulario")
					}
					else{
						var r = confirm("La información ingresada sera enviada y procesada");
					    if (r == true) {
					    	
						    	
							    	$.ajax({
							            type:"POST",
							            url:ruta_fr,
							            data:$(".control_inline").serialize(),
							            success:function(data){
							              	alert(data)
							            }
							        });
							        return false;
							   
					    }
				    	else{}
				    }
				}
				if (last == 0) {
					nextt = $("#"+num_rf+" .element_sl").parent().parent().next().children().next().children(".element_ol")
					$("#"+num_rf+" .element_sl").removeClass("element_sl").blur()
					nextt.addClass("element_sl").focus()
				}	
				if (btn_sig == 1) {
					var fr = parseInt($(".fr").attr("id"))
					var fr_siguiente = fr+1
					$("#"+fr).hide();
					$(".element_sl").blur()
					$("#"+fr+" .element_ol").removeClass("element_sl");
					$("#"+fr).removeClass("fr");
					$("#"+fr_siguiente).show()
					$("#"+fr_siguiente).addClass("fr")
					$("#"+fr_siguiente+" .element_ol:eq(0)").addClass("element_sl")
					$("#"+fr_siguiente+" .element_ol:eq(0)").focus()
					
				}
				if (btn_atras == 1) {
					var fr = parseInt($(".fr").attr("id"))
					var fr_atras = fr-1
					$("#"+fr).hide();
					$(".element_sl").blur()
					$("#"+fr+" .element_ol").removeClass("element_sl");
					$("#"+fr).removeClass("fr");
					$("#"+fr_atras).show()
					$("#"+fr_atras).addClass("fr")
					$("#"+fr_atras+" .element_ol:eq(0)").addClass("element_sl")
					$("#"+fr_atras+" .element_ol:eq(0)").focus()
				}							

				return false
			}
			if (select_sl == 1) {
				var lisub_select = $(".lisub_select").length
				if (lisub_select == 1) {
					var text_li = $(".lisub_select p").html()
					$(".select_sl").html("<span class='icon-circle-down'></span> "+text_li)	
					$(".lisub_select").parent().next().val(text_li)
					$(".ul_menu").hide()
					$(".select_sl").removeClass("select_sl")
					$(".lisub_select").removeClass("lisub_select")

				}
				//$(".element_sl").removeClass("select_sl")
				//$(".element_sl").next().hide()
			}
		}
	}

});		
}
