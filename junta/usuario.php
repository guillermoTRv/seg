<?php 
    include("funciones.php"); 
    session_start();
    $id_usuario_session = $_SESSION['id_usuario'];
    $consulta_us = consulta_array("SELECT * FROM usuarios WHERE id_usuario = '$id_usuario_session'");
    $nombre    = $consulta_us['nombre'];
    $apellidos = $consulta_us['apellidos'];
    $usuarios  = $consulta_us['usuario'];
    $correo    = $consulta_us['correo'];
    $nombre_completo = $nombre." ".$apellidos;  
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Usuario</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../ico/style.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200" rel="stylesheet">
    <link rel="stylesheet" href="css/juntas.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 caja">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="menu">
                            <h3 style="display:inline;float:left" ><?php echo $fecha ?> - Grupo Gideas</h3>
                            <h3 style="display:inline;float:right;font-weight: bold;"><a href="./logout.php"><span class="glyphicon glyphicon-share"></span> Salir</a></h3>
                            <br><br>
                            <h3 style="font-weight:bold"><?php echo $nombre_completo ?> - Uso sala de Juntas</h3>
                            <h3 class=""><a href=""><span class="icon-clock sombra_textos"></span>  Actualmente hay 2 salas en uso - Ver detalle</a></h3>
                            <h3 class="sombra_texto"><a href=""><span class="icon-history sombra_textos"></span>    Faltan 2 horas para que su junta comience en sala uno</a> </h3>
                            <h3 class="sombra_texto"><a href=""><span class="icon-pushpin sombra_textos" ></span>   Usted ah echo 3 reservaciones</a> </h3>
                            <hr class="linea">
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana" data="reserva_sala">Reservar una sala</button>
                            <!--<button type="button" class="btn btn-default btn-lg btn-block btn_ventana" data="alta_juntas">Alta Sala de Juntas</button>-->
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana" data="info_juntas">Informacion detallada Salas de Juntas</button>
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana" data="info_usuarios">Modificar mis datos</button>
                        
                            <hr class="linea">
                            <h3 style="font-weight: bold;margin-top:35px">Actualmente no hay salas ocupadas</h3>
                        </div>
                        <div class="principal">
                        </div>
                        <form class="form_oculto" method="POST" enctype="multipart/form-data">
                            
                        </form>
                        <input type="hidden" value="<?php echo $id_usuario_session ?>" class="id_usuario">
                    </div>
                </div>
            </div> 
        </div> 
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).keydown(function(event){
            if (event.which == 38) {
                event.preventDefault()
            }
        })
        $(".btn_ventana").click(function(){
            var seccion = $(this).attr("data")
            $(".menu").hide()
            if (seccion == "reserva_sala") {
                $(".principal").append("<div class='form_uno'></div>")
                $(".principal .form_uno").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
                $(".principal .form_uno").load("reservas/form_uno_reserva.php",400)
            }
        })
        $(document).on("click",".regresar_uno_reserva",function(){
            $(".principal").html("")
            $(".form_oculto").html("")
            $(".menu").show()
            return false
        });
        $(document).on("click",".boton_sala",function(){
            $(".form_uno").hide()
            var name_sala = $(this).attr("data")
            var id_sala   = $(this).attr("id")
            $(".principal").append("<div class='form_dos'></div>")
            $(".principal .form_dos").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
            $(".form_dos").load("reservas/form_dos_reserva.php",function(){
                var input_name_sala = $(".input_name_sala").length
                if (input_name_sala == 0) {
                    $(".form_oculto").append("<input name='sala_txt' class='input_name_sala' type='text' value='"+id_sala+"' style='color:black'>")
                    $(".form_oculto").append("<input class='input_name_name_sala' type='text' value='"+name_sala+"' style='color:black'>")
                }
                if (input_name_sala == 1) {
                    $(".input_name_sala").val(id_sala)
                    $(".input_name_name_sala").val(name_sala)
                }
                $(".name_sala_form").html("Reservar sala de Juntas " + name_sala +" para el")
                $.ajax({
                    type:"POST",
                    url:"reservas/process_semana.php",
                    data:$(".form_oculto").serialize(),
                    success:function(data){
                        $(".dias_semana").html(data)
                    }
                })   
            })            
        });
        $(document).on("click",".caja_dia",function(){
            var num_select = $(".caja_dia_select").length
            if (num_select ==0 ) {
                $(this).addClass("caja_dia_select")
                $(this).css("background-color", "#81DAF5")
                var input_dia = $(this).attr("data")
                $(".form_oculto").append("<input name='dia_txt' class='input_dia' type='text' value='"+input_dia+"'>")
            }
            if (num_select == 1) {
                if ($(this).html() != $(".caja_dia_select").html()) {
                    $(".input_inicio").val("")
                    $(".input_fin").val("")
                }

                $(".caja_dia_select").css("background-color","white")
                $(".caja_dia_select").removeClass("caja_dia_select")
                var input_dia = $(this).attr("data")
                $(this).addClass("caja_dia_select")
                $(this).css("background-color", "#81DAF5")
                $(".input_dia").val(input_dia)
        
            }
            $.ajax({
                type:"POST",
                url:"reservas/process_info_dia.php",
                data:$(".form_oculto").serialize(),
                success:function(data){
                    $(".horarios").html(data)
                }
            }); 
        })


        $(document).on("click",".disponible",function(){
            $(".btn_emergente").trigger("click")
            $(".select_inicio_hrs").html("")
            $(".select_inicio_min").html("")
            $(".select_fin_hrs").html("")
            $(".select_fin_min").html("")
            $(".select_inicio_hrs").append("<option value=''>Hrs</option>")
            $(".select_inicio_min").append("<option value=''>Min</option>")
            $(".select_fin_hrs").append("<option value=''>Hrs</option>")
            $(".select_fin_min").append("<option value=''>Min</option>")
            var tipo_horario = $(".disponible").data("tipo")
            if (tipo_horario == "total") {
                var hora_inicio = $(".disponible").data("horainicio")
                var hora_fin    = $(".disponible").data("horafin")
                for(i = hora_inicio; i < hora_fin; i++){
                    if (i < 10 && i != hora_inicio) {
                      i_hora = "0" + i
                    }
                    else{
                      i_hora = i
                    }
                    $(".select_inicio_hrs").append("<option value='"+i+"'>"+i_hora+" hrs</option>") 
                }
                for(i = 0; i <= 55; i++){
                    if (i < 10) {
                      i_hora = "0" + i
                    }
                    else{
                      i_hora = i
                    }
                    $(".select_inicio_min").append("<option value='"+i+"'>"+i_hora+" min</option>") 
                    $(".select_fin_min").append("<option value='"+i+"'>"+i_hora+" min</option>")                     
                }

            }

        })

        $(document).on("change",".select_inicio_hrs",function(){
            var change_inicio = parseInt($(this).val())
            var input_fin_comienzo = parseInt(change_inicio)
            var ultima_hora_inicio = $(".select_inicio_hrs option:last").val()
            var operacion_a = ultima_hora_inicio - change_inicio
            $(".select_fin_hrs").html("")
            $(".select_fin_hrs").append("<option value=''>Hrs</option>")
            if (operacion_a < 3) {
                if (operacion_a == 0){ 
                    $(".select_fin_hrs").html("<option value='"+change_inicio+"'>"+change_inicio+" hrs</option>")
                }
                else{
                    for(i=change_inicio;i<=ultima_hora_inicio;i++){
                        $(".select_fin_hrs").append("<option value='"+i+"'>"+i+" hrs</option>")            
                    }
                }
            }
            else{
                $(".select_fin_hrs").html("")
                $(".select_fin_hrs").append("<option value=''>Hrs</option>")
                for(i=input_fin_comienzo; i<input_fin_comienzo+3;i++){
                    if (i<10) {
                        i_hora = "0"+i
                    }
                    else{
                        i_hora = i
                    }
                    $(".select_fin_hrs").append("<option value='"+i+"'>"+i_hora+" hrs</option>")            
                }
            }
            var select_uno  = $(".select_inicio_hrs").val()
            var select_dos  = $(".select_inicio_min").val()
            var select_tres = $(".select_fin_hrs").val()
            var select_four = $(".select_fin_min").val()
            var id_sala     = $(".input_name_sala").val()
            var dia_fecha   = $(".input_dia").val()
            if (select_uno!='' && select_dos!='' && select_tres!='' && select_four!='') {
                if (select_uno != $select_tres && select_dos != select_four) {
                    if (select_dos != select_four || select_uno != select_tres) {
                        $.ajax({
                            type:"GET",
                            url:"reservas/process_info_dia_miReserva.php?hrs_ini="+select_uno+"&min_ini="+select_dos+"&hrs_fin="+select_tres+"&min_fin="+select_four+"&sala="+id_sala+"&fecha="+dia_fecha+"",
                            success:function(data){
                                $(".cajota").html(data)
                            }
                        });                 
                    }                
                }              
            }

        })

        $(document).on("change",".select_horario_ajax",function(){
            var select_uno  = $(".select_inicio_hrs").val()
            var select_dos  = $(".select_inicio_min").val()
            var select_tres = $(".select_fin_hrs").val()
            var select_four = $(".select_fin_min").val()
            var id_sala     = $(".input_name_sala").val()
            var dia_fecha   = $(".input_dia").val()
            if (select_uno!='' && select_dos!='' && select_tres!='' && select_four!='') {
                alert(select_tres)
                    if (select_dos != select_four || select_uno != select_tres) {
                        $.ajax({
                            type:"GET",
                            url:"reservas/process_info_dia_miReserva.php?hrs_ini="+select_uno+"&min_ini="+select_dos+"&hrs_fin="+select_tres+"&min_fin="+select_four+"&sala="+id_sala+"&fecha="+dia_fecha+"",
                            success:function(data){
                                $(".cajota").html(data)
                            }
                        });                 
                    }
            }
        })

        $(document).on("click",".regresar_dos_reserva",function(){
            $(".principal .form_dos").remove()
            $(".principal .form_uno").show()
            $(".input_dia").remove()
            $(".input_inicio").remove()
            $(".input_fin").remove()
            return false
        });
        /**$(document).on("change",".select_inicio_hora",function(){
            var valor_select  = parseInt($(this).val())
            var ultimo_select = parseInt(valor_select + 3)
            //var ultimo_select = $(".select_inicio_hora option:last").val()
            var inicio_for    = parseInt(valor_select + 1)
            var i_hora
            $(".select_fin_hora").html("")
            $(".select_fin_hora").append("<option value=''>Seleccione hora</option>") 

            $(".input_fin").val("")
            var input_inicio = $(".input_inicio").length
            if (input_inicio == 0) {
                $(".form_oculto").append("<input type='text' name='hora_inicio_txt' class='input_inicio' value='"+valor_select+"'>")
            }
            else{
                $(".input_inicio").val(valor_select)
            }

            for(i = inicio_for; i <= ultimo_select; i++){
                if (i < 10) {
                  i_hora = "0" + i
                }
                else{
                  i_hora = i
                }
                $(".select_fin_hora").append("<option value='"+i+"'>"+i_hora+" hrs</option>") 
            }
        })
        $(document).on("change",".select_fin_hora",function(){
            var input_fin = $(".input_fin").length
            var valor_select = $(this).val()
            if (input_fin == 0) {
                $(".form_oculto").append("<input type='text' name='hora_fin_txt' class='input_fin' value='"+valor_select+"'>")
            }
            else{
                $(".input_fin").val(valor_select)
            }            
        })**/
        $(document).on("click",".btn_sig_alta_sala",function(){
            //$(".principal").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
            $(".principal .form_dos").hide()
            var cont_form_tres = $(".principal .form_tres").length
            if (cont_form_tres == 0) {
                $(".principal").append("<div class='form_tres'></div>")
                $(".principal .form_tres").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
                $(".form_tres").load("reservas/form_tres_reserva.php")
            }
            if (cont_form_tres == 1) {
                $(".form_tres").show()
            }
            return false
        }); 
        $(document).on("click",".regresar_tres_reserva",function(){
            $(".principal .form_tres").hide()
            $(".principal .form_dos").show()
            return false
        });

        $(document).on("click",".snaks",function(){
            var opcion_snaks = $(this).attr("data")
            var cont_input_conf_snaks = $(".input_conf_snaks").length
            if (cont_input_conf_snaks == 0) {
                $(".form_oculto").append("<input name='input_conf_snaks' class='input_conf_snaks' type='text' value=''>")
            }


            if (opcion_snaks == "no") {
                $(".principal .form_tres").hide()
                var cont_form_cuatro = $(".form_cuatro").length
                $(".snaks_no").html("No")
                $(".form_snaks").html("")
                $(".caja_snaks").hide()
                $(".input_conf_snaks").val("no")
                if (cont_form_cuatro == 0) {
                    $(".principal").append("<div class='form_cuatro'></div>")
                    $(".principal .form_cuatro").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
                    $(".form_cuatro").load("reservas/form_cuatro_reserva.php")
                }
                if (cont_form_cuatro == 1) {
                    $(".form_cuatro").show()
                }
            }
            if (opcion_snaks == "si") {
                $(".snaks_no").html("Cancelar")
                $(".linea_snaks").show()
                $(".caja_snaks").show()
                $(".caja_snaks .input_snaks").focus()
                $(".input_conf_snaks").val("si")
            }
            return false
        });
        $(document).on("click",".regresar_cuatro_reserva",function(){
            $(".principal .form_cuatro").hide()
            $(".principal .form_tres").show()
            return false
        });
        $(document).on("click",".btn_snaks",function(event){
            event.preventDefault();
            var snaks = $(".input_snaks").val()
            if (snaks != "") {
                var cont_form_snaks = $(".form_snaks").length
                if (cont_form_snaks == 0) {
                    $(".lista_snaks").append("<form class='form_snaks' method='POST' enctype='multipart/form-data'></form><button type='button' class='btn btn-default btn-block btn_sig_confirmacion' style='border:2px solid rgb(8,141,198);font-size:1.2em;font-weight:bold;'>Siguiente - Confirmar</button>")
                    $(".lista_snaks .form_snaks").prepend("<div><p style='font-size:1.15em'><strong><span class='icon-cancel-circle' style='color:#81DAF5;font-size:1.2em;'></span> "+snaks+"</strong></p><input type='hidden' value='"+snaks+"' name='1' id='1' class='input_val_snak'></div>")
                    $(".input_snaks").val("")
                    $(".input_snaks").focus()    
                }
                if (cont_form_snaks == 1) {
                    var cont_inputs_snak = $(".input_val_snak").length
                    if (cont_inputs_snak == 0) {
                        $(".lista_snaks .form_snaks").prepend("<div><p style='font-size:1.15em'><strong><span class='icon-cancel-circle' style='color:#81DAF5;font-size:1.2em;'></span> "+snaks+"</strong></p><input type='hidden' value='"+snaks+"' name='1' id='1' class='input_val_snak'></div>")
                        $(".input_snaks").val("")
                        $(".input_snaks").focus()    
                    }  
                    else{
                        //$(".form_snaks").prepend()
                        var num_snak_prev = parseInt($(".form_snaks .input_val_snak:first").attr("id"))
                        var num_snak = num_snak_prev + 1;
                        $(".lista_snaks .form_snaks").prepend("<div><p style='font-size:1.15em'><strong><span class='icon-cancel-circle' style='color:#81DAF5;font-size:1.2em;'></span> "+snaks+"</strong></p><input type='hidden' value='"+snaks+"' name='"+num_snak+"' id='"+num_snak+"' class='input_val_snak'></div>")
                        $(".input_snaks").val("")
                        $(".input_snaks").focus()   
                    }
                }
                
            }
            else{
                $(".input_snaks").focus()   
            }
        })
        $(document).on("click",".icon-cancel-circle",function(event){
            $(this).parent().parent().parent().remove()
            $(".input_snaks").focus() 
            var input_val_snak       = $(".input_val_snak").length
            if (input_val_snak == 0) {
                $(".btn_sig_confirmacion").remove()
            }

        })
        $(document).on("click",".btn_sig_confirmacion",function(event){
            $(".principal .form_tres").hide()
            var cont_form_cuatro = $(".form_cuatro").length
            if (cont_form_cuatro == 0) {
                $(".principal").append("<div class='form_cuatro'></div>")
                $(".principal .form_cuatro").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
                $(".form_cuatro").load("reservas/form_cuatro_reserva.php")
            }
            if (cont_form_cuatro == 1) {
                $(".form_cuatro").show()
            }
        })
        $(document).on("keyup",".input_detalles",function(event){
            var input_detalles = $(".input_detalles").val()
            var cont_input_detalles = $(".input_detalles_juntas").length
            if (cont_input_detalles == 0) {
                $(".form_oculto").append("<input name='detalles_txt' class='input_detalles_juntas' type='text' value='"+input_detalles+"' style='color:black'>")
                return false
            }
            else{
                $(".input_detalles_juntas").val(input_detalles)
                return false
            }
            
        })
        $(document).on("keyup",".input_pass",function(event){
            var input_pass = $(".input_pass").val()
            var cont_input_pass = $(".input_pass_juntas").length
            if (cont_input_pass == 0) {
                $(".form_oculto").append("<input name='pass_txt' class='input_pass_juntas' type='password' value='"+input_pass+"' style='color:black'>")
                return false
            }
            else{
                $(".input_pass_juntas").val(input_pass)
                return false
            }
            
        })
        $(document).on("click",".btn_aceptar_ventana",function(event){
            var name_sala   = $(".input_name_name_sala").val()
            var dia         = $(".input_dia").val()
            if (dia == undefined) {
                dia = 'Obligatorio - Registre el dia para su reserva'
            }
            var hora_inicio = $(".input_inicio").val()
            if (hora_inicio == undefined) {
                hora_inicio = "Obligatorio - Registre la hora de inicio"
            }
            else{
                hora_inicio = hora_inicio+"hrs"
            }
            var hora_fin    = $(".input_fin").val()
            if (hora_fin == undefined) {
                hora_fin = "Obligatorio - Registre la hora de finalización"
            }
            else{
                hora_fin = hora_fin+"hrs"
            }
            var conf_snaks  = $(".input_conf_snaks").val()
            var detalles    = $(".input_detalles_juntas").val()
            if (detalles == undefined) {
                detalles = "Opcional - No se registrarón detalles"
            }
            
            $(".sala_info").html("Sala: "+name_sala)
            $(".dia_info").html("Fecha: "+dia)
            $(".inicio_hora_info").html("Hora de inicio: "+hora_inicio+"")
            $(".fin_hora_info").html("Hora de finalización: "+hora_fin+"")
            $(".snaks_info").html("Snaks: "+conf_snaks)
            $(".detalles_info").html("Detalles: "+detalles)

            if (conf_snaks == "si") {
                $(".snaks_lista").html("")
                $(".form_snaks .input_val_snak").each(function(){
                    var otro_snak = $(this).val()
                    $(".snaks_lista").prepend("<p style='font-weight:bold'><li>"+otro_snak+"</li></p>")
                }); 
            }
                        


        })
        $(document).on("click",".btn_registrar",function(event){
            var cont_pass = $(".input_pass").val()
            if (cont_pass != '') {
                id_usuario = $(".id_usuario").val()
                var cont_id_usuario = $(".id_usuario_input").length
                if (cont_id_usuario == 0) {
                    $(".form_oculto").append("<input type='text' value='"+id_usuario+"' name='id_usuario_txt' class='id_usuario_input'>")
                }
                
                var dia         = $(".input_dia").val()
                var hora_inicio = $(".input_inicio").val()
                var hora_fin    = $(".input_fin").val()
                if (dia == undefined || hora_inicio == undefined || hora_fin == undefined) {
                    alert("Llene todos los campos obligatorios del formulario")
                }
                else{
                    $(".form_oculto .valores_snaks").remove()
                    $(".form_oculto").append("<div class='valores_snaks'><div>")
                    var conf_snaks  = $(".input_conf_snaks").val()
                    if (conf_snaks == "si") {  
                        var name_snak_first = $(".form_snaks .input_val_snak:first").attr("name")
                        var name_snak_last  = $(".form_snaks .input_val_snak:last").attr("name")
                        $(".valores_snaks").append("<input type='text' name='snak_first' value='"+name_snak_first+"'>")
                        $(".valores_snaks").append("<input type='text' name='snak_last' value='"+name_snak_last+"'>")

                        $(".form_snaks .input_val_snak").each(function(){
                            var otro_snak = $(this).val()
                            var name_snak = $(this).attr("name")
                            $(".valores_snaks").append("<input type='text' name='"+name_snak+"' value='"+otro_snak+"'>")
                        });                     
                    }
                    $(".btn_registrar").prop("disabled",true)
                    $.ajax({
                            type:"POST",
                            url:"reservas/process_reserva.php",
                            data:$(".form_oculto").serialize(),
                            success:function(data){
                                if (data == 00) {
                                    $(".btn-close").trigger("click")
                                    $(".memo").remove()
                                    var name_sala   = $(".input_name_name_sala").val()
                                    var dia         = $(".input_dia").val()
                                    var hora_inicio = $(".input_inicio").val()
                                    var hora_fin    = $(".input_fin").val()
                                    var conf_snaks  = $(".input_conf_snaks").val()
                                    var detalles    = $(".input_detalles_juntas").val()
                                    if (detalles == undefined) {
                                        detalles = "Opcional - No se registrarón detalles"
                                    }
                                    $(".nota_reserva").load("reservas/nota_reserva.php",function(){
                                        $(".sala_info").html(name_sala)
                                        $(".dia_info").html("Fecha: "+dia)
                                        $(".inicio_hora_info").html("Hora de inicio: "+hora_inicio+"hrs")
                                        $(".fin_hora_info").html("Hora de finalización: "+hora_fin+"hrs")
                                        $(".snaks_info").html("Snaks: "+conf_snaks)
                                        $(".detalles_info").html("Detalles: "+detalles)
                                        $(".form_oculto").remove()
                                        if (conf_snaks == "si") {
                                            $(".snaks_lista").html("")
                                            $(".form_snaks .input_val_snak").each(function(){
                                                var otro_snak = $(this).val()
                                                $(".snaks_lista").prepend("<p style='font-weight:bold'><li>"+otro_snak+"</li></p>")
                                            }); 
                                        }
                                    })
                                }
                                if(data == 11){
                                    alert("Contraseña Incorrecta")
                                    $(".btn_registrar").prop("disabled",false)
                                }
                                if (data != 11 && data != 00) {
                                    alert("Error Interno: Consulte a sitemas")
                                    $(".btn_registrar").prop("disabled",false)
                                }
                            }
                    })
                }   
            }
            else{
                alert("Inserte su contraseña")
            }
        })
        $(document).on("click",".regresar_cinco_reserva",function(event){
            window.location.href = "usuario.php"
        })    
    </script>
    <style> 
        @media screen and (max-width:800px){
            body{font-size: .7em;}   
        }
    </style>        
</body>

</html>
