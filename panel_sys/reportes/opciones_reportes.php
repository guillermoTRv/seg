<script>
	

$(document).keydown(function(event){
	var activo_menu = $(".activo_menu").length;
	if (activo_menu == 0) {
	    var select =  $(".select").length;
	    event.preventDefault();  
	    if (event.which == 40) {
	        if (select == 0) {
	            $("#clientes .panel-body:first").removeClass("panel_cl");
	            $("#clientes .panel-body:first").addClass("select");

	        }
	        if (select > 0) {

	            var nextt = $(".select").parent().next().children();
	            $(".select").addClass("panel_cl");
	            $(".select").removeClass("select");
	            nextt.removeClass("panel_cl");
	            nextt.addClass("select");
	            
	        }
	    }

	    if (event.which == 38) {
	        var select =  $(".select").length;
	        if (select == 0) {
	            $("#clientes .panel-body:last").removeClass("panel_cl");
	            $("#clientes .panel-body:last").addClass("select");
	        }
	        if (select > 0) {
	            var prevv = $(".select").parent().prev().children();
	            $(".select").addClass("panel_cl");
	            $(".select").removeClass("select");
	            prevv.removeClass("panel_cl");
	            prevv.addClass("select");
	            
	        }
	    }
	    if (event.which == 13) {
	        if (select > 0) {
	            var atributo_a = $(".select").parent().attr("href");
	            window.location.href = atributo_a;
	        }      
	    }
	}
});
</script>
<div class="row">
	<div class="col-md-8" id="clientes">
		<h3><span class="icon-table"></span> Elige un tipo de reporte a generar</h3><span style="margin-left:20px">##Utilizar las teclas de navegación <span class="glyphicon glyphicon-arrow-up"></span> <span class=" glyphicon glyphicon-arrow-down"></span></span>
		<br>
		<a href="?rep=general" class="link_black">
            <div class="panel-body panel_cl">
                 <h4>Estado de la Empresa</h4> 
            </div>    
        </a>
		<!--
		<a href="?rep=general" class="link_black">
            <div class="panel-body panel_cl">
                 <h4>Reportes generales</h4> 
            </div>    
        </a>
        <a href="?rep=personal" class="link_black">
            <div class="panel-body panel_cl">
                 <h4>Reportes del personal</h4> 
            </div>    
        </a>
        <a href="?rep=personal" class="link_black">
            <div class="panel-body panel_cl">
                 <h4>Reportes individuales del personal</h4> 
            </div>    
        </a>
        <a href="?rep=inmuebles" class="link_black">
            <div class="panel-body panel_cl">
                 <h4>Reportes de incidentes en general</h4> 
            </div>    
        </a>
        <a href="?rep=inmuebles" class="link_black">
            <div class="panel-body panel_cl">
                 <h4>Reportes de incidentes por inmueble</h4> 
            </div>    
        </a>
        <a href="?rep=costos" class="link_black">
            <div class="panel-body panel_cl">
                 <h4>Historial de reportes</h4> 
            </div>    
        </a>-->
	</div>
</div>