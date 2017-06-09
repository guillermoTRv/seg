function ajax_login(){
        var url="process_login.php";
        $.ajax({
            type:"POST",
            url:url,
            data:$("#form_login").serialize(),

            success:function(data){
                $("#mensaje_login").html(data);     
              
            }
        });
        return false;
}


$(function(){
    $("#btn_login").click(function(){
        ajax_login()
    });
});


$(document).keydown(function(event){
        var resultado = parseInt(document.activeElement.id);
        if(event.which == 13 || event.which == 40){        
            var cambio = resultado + 1; 
            $("#"+cambio).focus(); 
        }
        if(event.which == 38){        
            var cambio = resultado -1; 
            $("#"+cambio).focus(); 
        }

        var input_uno = $("#1").val();
        var input_dos = $("#2").val();

        if (input_uno != '' && input_dos!='') {
            if (event.which == 13) {
                ajax_login()
            }
        }

});