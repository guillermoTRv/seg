

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


        if (event.which == 27) {
              
            window.location.href = "logout.php";
        }
    }
});