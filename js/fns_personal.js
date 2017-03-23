
	$(document).ready(function(){
		$(".ul_menu").hide();
	    	
	    	$(".select_a").click(function(event){
	    		event.preventDefault();  
	    		var control_sl = $(".control_sl").length;
	    		if (control_sl == 0) {
	    			$(".ul_menu").slideDown(250);
		        	$(".select_a").addClass("control_sl");
		        	return false;
	    		}
	    		if (control_sl == 1) {
	    			$(".ul_menu").slideUp(100);
		        	$(".select_a").removeClass("control_sl");
		        	$(".control_li").removeClass("control_li");
	    		}

	    	});
	    	$(document).click(function(){
	    		var control_sl = $(".control_sl").length;
	    		if (control_sl == 1) {
	    			$(".ul_menu").slideUp(100);
		        	$(".select_a").removeClass("control_sl");
		        	$(".control_li").removeClass("control_li");
	    		}

	    	});

	    	$(".ul_menu li").click(function(event){
	    		event.preventDefault();
	    		var valor_ajax = $(this).attr("id")
	    		var nombre     = $(this).html()
	    		$.ajax({
					type:"GET",
					url:"panel_sys/personal/tabla_personal.php?val="+valor_ajax+"",				
					success:function(data){
						$(".mens").html(data)
						$(".inm_h").html("Listado del Personal - "+nombre+"")
					}	
										
				});
	    	});

	});


	$(document).keydown(function(event){
		var control_menu = $(".activo_menu").length
		if (control_menu == 0) {
			var control_sl = $(".control_sl").length;
			var control_li = $(".control_li").length;
			if (event.which == 16) {
				if (control_sl == 0) {
		    			$(".ul_menu").slideDown(250);
			        	$(".select_a").addClass("control_sl");
			        	return false;
		    	}
		    	if (control_sl == 1) {
		    			$(".ul_menu").slideUp(100);
			        	$(".select_a").removeClass("control_sl");
			        	$(".control_li").removeClass("control_li");
		    	}
			}
			if (control_sl == 1) {
				if (event.which == 40) {
					if (control_li == 0) {
						$(".ul_menu li:first").addClass("control_li")
					}
					if (control_li == 1) {
						
						var nextt = $(".control_li").next();
						$(".control_li").removeClass("control_li");
						nextt.addClass("control_li");
					}
				}
				if (event.which == 38) {
					if (control_li == 0) {
						$(".ul_menu li:last").addClass("control_li")
					}
					if (control_li == 1) {
						
						var prevv = $(".control_li").prev();
						$(".control_li").removeClass("control_li");
						prevv.addClass("control_li");
					}
				}
			}	
			if (control_li == 1) {
				if (event.which == 13) {
					var valor_ajax = $(".control_li").attr("id");
					var nombre     = $(".control_li").html();
					$.ajax({
						type:"GET",
						url:"panel_sys/personal/tabla_personal.php?val="+valor_ajax+"",
						success:function(data){
							$(".mens").html(data)
							$(".inm_h").html("Listado del Personal - "+nombre+"")
							$(".ul_menu").slideUp(100);
				        	$(".select_a").removeClass("control_sl");
				        	$(".control_li").removeClass("control_li");
						}
											
					});

				}
			}
		}

	});


		
	