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
    $mes_enc = date("m");
    $dia_enc = date("d");
    if ($_SESSION['id_usuario'] == '') {
        header("Location: ./");
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="description" content="">
    <meta name="Goter" content="">
    <link rel="shortcut icon" href="fonts/logo.png">

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
                            <h3 class="info_fecha"><?php echo saber_dia($fecha)." $dia_enc de ".mes($mes_enc) ?></h3>
                            <h3 class="boton_salir"><a href="./logout.php"><span class="glyphicon glyphicon-share"></span> Salir</a></h3>
                            <br><br>
                            <h3 style="font-weight:bold"><?php echo $nombre_completo ?> - Uso sala de Juntas</h3>
                            <?php include("info_reserva_cercana.php"); ?>
                            <?php include("info_mis_reservaciones.php"); ?>
                            
                            <hr class="linea">
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana letra" data="reserva_sala">Reservar una sala</button>
                            <!--<button type="button" class="btn btn-default btn-lg btn-block btn_ventana" data="alta_juntas">Alta Sala de Juntas</button>-->
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana letra" data="info_salas">Información Horarios Salas de Juntas</button>
                            <!--<button type="button" class="btn btn-default btn-lg btn-block btn_ventana letra" data="info_usuarios">Modificar mis datos</button>-->
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana letra" data="historial_reservaciones">Historial de mis reservas</button>
                        
                            <hr class="linea">
                            <br>
                        </div>
                        <div class="principal">
                        </div>
                        <form class="form_oculto" method="POST" enctype="multipart/form-data" style="display:none;">
                            
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
        $(".btn_ventana").click(function(event){
            event.preventDefault()
            var seccion = $(this).attr("data")
            $(".menu").hide()
            if (seccion == "reserva_sala") {
                $(".principal").append("<div class='form_uno'></div>")
                $(".principal .form_uno").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
                $(".principal .form_uno").load("reservas/form_uno_reserva.php",400)
            }
            if (seccion == "mis_reservaciones") {
                $(".principal").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
                $(".principal").load("vista_mis_reservaciones.php")
            }
            if (seccion == "cancelar-modificar") {
                $(".principal").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
                $(".principal").load("vista_cancelar_modificar.php");
            }
            if (seccion == "info_salas") {
                $(".principal").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
                $(".principal").load("usuario/info_salas.php")
            }
            if (seccion == "historial_reservaciones") {
                $(".principal").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
                $(".principal").load("usuario/historial_reservaciones.php")   
            }
        })
        $(document).on("click",".regresar_general",function(event){
            event.preventDefault()
            $(".principal").html("")
            $(".menu").show()
        })


        $(document).on("click",".regresar_uno_reserva",function(){
            $(".principal").html("")
            $(".form_oculto").html("")
            $(".menu").show()
            return false
        });
        $(document).on("click",".no_modal",function(){
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
                        //$(".dias_semana").html(data)
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

                $(".caja_dia_select").css("background-color","#A4A4A4")
                $(".caja_dia_select").removeClass("caja_dia_select")
                var input_dia = $(this).attr("data")
                $(this).addClass("caja_dia_select")
                $(this).css("background-color", "#81DAF5")
                $(".input_dia").val(input_dia)
        
            }
            $.ajax({
                type:"POST",
                url:"reservas/process_info_dia_mens.php",
                data:$(".form_oculto").serialize(),
                dataType:"json",
                success:function(data){
                    $(".mensaje_fecha").html(data.uno)
                    $(".input_fecha_ventana").val(data.dos)
                }
            });
            $.ajax({
                type:"POST",
                url:"reservas/process_info_dia.php",
                data:$(".form_oculto").serialize(),
                success:function(data){
                    $(".horarios").html(data)
                }
            });
            if ($(".form_mod_reserva").length != 0) {
                var fecha_junta = $(this).attr("data")
                var id_sala     = $("#sala_txt").val()
                var hrs_ini     = $("#hrs_ini").val()
                var min_ini     = $("#min_ini").val()
                var hrs_fin     = $("#hrs_fin").val()
                var min_fin     = $("#min_ini").val()
                //alert(hrs_ini+"-"+min_ini+"-"+hrs_fin+"-"+min_ini)
                $.ajax({
                    type:"GET",
                    url:"usuario/process_mens_horario.php?id_sala="+id_sala+"&fecha_junta="+fecha_junta+"",
                    dataType:"json",
                    success:function(data){
                        $(".mens_ocupada").html(data.dos)
                    }
                })
                $.ajax({
                    type:"GET",
                    url:"usuario/precess_horas_xsala.php?id_sala="+id_sala+"&fecha_junta="+fecha_junta+"&hrs_ini="+hrs_ini+"&min_ini="+min_ini+"&hrs_fin="+hrs_fin+"&min_fin="+min_fin+"",
                    success:function(data){
                        $(".respuesta_horas").html(data)
                    }
                })
                //alert(input_dia+id_sala)
            }

        })
        ////////////////////////////////////////////////
        $(document).on("click",".input_fecha_ventana",function(event){
            event.preventDefault()
            $(".input_fecha_ventana").blur()
            $(".btn_emergente_fecha").trigger("click")
            var name_sala = $(".input_name_name_sala").val()
            $(".name_sala_ventana").html(name_sala)
        })

        $(document).on("click",".siguiente_mes",function(event){
            var mes_calendario = $(".calendario").attr("data");
            var mes_suma = parseInt(mes_calendario)+1
            $.ajax({
                type:"GET",
                url:"reservas/process_mover_mes.php?mes="+mes_calendario+"&plan=siguiente",
                success:function(data){
                    if (data != 00) {
                        $(".calendario").html(data)   
                        $(".calendario").attr("data",""+mes_suma+"")
                    }
                    if (data == 00) {
                    }
                     
                }
            })
        })
        $(document).on("click",".atras_mes",function(event){
            var mes_calendario = $(".calendario").attr("data");
            var mes_suma = parseInt(mes_calendario)-1
            $.ajax({
                type:"GET",
                url:"reservas/process_mover_mes.php?mes="+mes_calendario+"&plan=atras",
                success:function(data){
                    if (data!="00") {
                        $(".calendario").html(data)   
                        $(".calendario").attr("data",""+mes_suma+"")
                    }
                    
                     
                }
            })
        })

        ////////////////////////////////////////////////
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
            var tipo_horario = $(this).data("tipo")
            if (tipo_horario == "total") {
                var hora_inicio = $(this).data("horainicio")
                var hora_fin    = $(this).data("horafin")
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
            if (tipo_horario == "con") {
                var hrs_ini_data = $(this).data("hrsin")
                var min_ini_data = $(this).data("minin")
                var hrs_fin_data = $(this).data("hrsfin")
                var min_fin_data = $(this).data("minfin")
                var mentira_ini = "0"+hrs_ini_data
                var mentira_fin = "0"+hrs_fin_data
                var mentira_minini = "0"+min_ini_data
                var mentira_minfin = "0"+min_fin_data
                if (mentira_ini.length < 3) {
                    hrs_ini_data = "0"+parseInt(hrs_ini_data)
                }
                if (mentira_fin.length < 3) {
                    hrs_fin_data = "0"+parseInt(hrs_fin_data)
                }
                if (mentira_minini < 3) {
                    min_ini_data = "0"+parseInt(min_ini_data)
                }
                if (mentira_minfin < 3) {
                    min_fin_data = "0"+parseInt(min_fin_data)
                }

                $(".select_inicio_hrs").html("<option class='ip' value='"+hrs_ini_data+"'>"+hrs_ini_data+" Hrs</option>")
                $(".select_inicio_min").html("<option class='ip' value='"+min_ini_data+"'>"+min_ini_data+" Min</option>")
                $(".select_fin_hrs").html("<option class='ip' value='"+hrs_fin_data+"'>"+hrs_fin_data+" Hrs</option>")
                $(".select_fin_min").html("<option class='ip' value='"+min_fin_data+"'>"+min_fin_data+" Min</option>")


                var hora_inicio = $(this).data("horainicio")
                var hora_fin    = $(this).data("horafin")
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
            if (operacion_a < 5) {
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
                for(i=input_fin_comienzo; i<input_fin_comienzo+5;i++){
                    if (i<10) {
                        i_hora = "0"+i
                    }
                    else{
                        i_hora = i
                    }
                    $(".select_fin_hrs").append("<option value='"+i+"'>"+i_hora+" hrs</option>")            
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
                if (select_dos != select_four || select_uno != select_tres) {
                    var minutos_inicio = parseFloat(select_dos/60)
                    var tiempo_inicio = parseFloat(select_uno)+minutos_inicio
                    var minutos_fin  = parseFloat(select_four/60)
                    var tiempo_final = parseFloat(select_tres)+minutos_fin
                    
                    if (tiempo_final > tiempo_inicio) {
                        $.ajax({
                            type:"GET",
                            url:"reservas/process_info_dia_miReserva.php?hrs_ini="+select_uno+"&min_ini="+select_dos+"&hrs_fin="+select_tres+"&min_fin="+select_four+"&sala="+id_sala+"&fecha="+dia_fecha+"",
                            success:function(data){
                                if (data != 'hay') {    
                                    $(".cajota").html(data)
                                    $(".mens_horario").html("")

                                    var cont_input_hrs_ini = $(".input_hrs_ini").length
                                    var cont_input_hrs_fin = $(".input_hrs_fin").length
                                    var cont_input_min_ini = $(".input_min_ini").length
                                    var cont_input_min_fin = $(".input_min_fin").length

                                    if (cont_input_hrs_ini==0 && cont_input_hrs_fin==0 && cont_input_min_ini==0 && cont_input_min_fin==0) {
                                        $(".form_oculto").append("<input type='text' name='hrs_ini_txt' class='input_hrs_ini' value='"+select_uno+"'>")
                                        $(".form_oculto").append("<input type='text' name='min_ini_txt' class='input_min_ini' value='"+select_dos+"'>")
                                        $(".form_oculto").append("<input type='text' name='hrs_fin_txt' class='input_hrs_fin' value='"+select_tres+"'>")
                                        $(".form_oculto").append("<input type='text' name='min_fin_txt' class='input_min_fin' value='"+select_four+"'>")
                                    }
                                    else{
                                        $(".input_hrs_ini").val(select_uno)
                                        $(".input_min_ini").val(select_dos)
                                        $(".input_hrs_fin").val(select_tres)
                                        $(".input_min_fin").val(select_four)
                                    }
                                }
                                else{
                                    alert("Al parecer ya ha reservado una sala en este horario")
                                }
                            }
                        });                 
                    }
                    else{
                        $(".mens_horario").html("<p>La hora de inicio no puede ser mayor a la hora de finalización</p>")
                    }    
                }
                else{
                    $(".mens_horario").html("<p>La hora de inicio no puede ser igual a la hora de finalización</p>")
                }
            }
        })
        ////////////////////////////////////////////////

        $(document).on("click",".espacio",function(){
            var tipo_espacio = $(this).data("tipo")
            $(".espacio").removeClass("espacio_select")
            $(this).addClass("espacio_select")
            if (tipo_espacio == "brown") {
                $(".select_horario_ajaxSe").html("")
                $(".select_inicio_hrsSe").html("<option value=''>Hrs</option>")
                $(".select_inicio_minSe").html("<option value=''>Min</option>")
                $(".select_fin_hrsSe").html("<option value=''>Hrs</option>")
                $(".select_fin_minSe").html("<option value=''>Min</option>")
                
                var hrs_ini = parseInt($(this).data("horaini"))
                var min_ini = parseInt($(this).data("minini"))
                var hrs_fin = parseInt($(this).data("horafin"))
                var min_fin = parseInt($(this).data("minfin"))
                var tiempo_inicio = parseFloat(hrs_ini)+(parseFloat(min_ini)/60)
                var tiempo_final  = parseFloat(hrs_fin)+(parseFloat(min_fin/60))

                $(".btn_emergente_fechaSe").trigger("click")
                //alert(hrs_ini+"...."+min_ini+"..."+hrs_fin+"...."+min_fin+"-----"+tiempo_inicio+"-----------"+tiempo_final)
                if ((tiempo_final - tiempo_inicio)  < .5) {
                    alert("Solo se pueden reservar espacios que sean mayores a media hora")
                }
                else{
                    var esp_salto = $(this).find(".aqui").length
                    if (esp_salto == 1) {
                        var saltos_totales = $(".aqui").length
                        if (saltos_totales >= 2) {    
                            var data_hrs_ini = $(".aqui:first").parent().parent().data("horaini")
                            var data_min_ini = $(".aqui:first").parent().parent().data("minini")
                            var data_hrs_fin = $(".aqui:last").parent().parent().data("horafin")
                            var data_min_fin = $(".aqui:last").parent().parent().data("minfin")
                            //alert(data_hrs_ini+"..."+data_min_ini+"..."+data_hrs_fin+"..."+data_min_fin)
                            ////////comienza modificacion////////////////
                            $(".aqui").parent().parent().data("horaini",data_hrs_ini)
                            $(".aqui").parent().parent().data("minini",data_min_ini)
                            $(".aqui").parent().parent().data("horafin",data_hrs_fin)
                            $(".aqui").parent().parent().data("minfin",data_min_fin)
                            var hrs_ini = parseInt($(this).data("horaini"))
                            var min_ini = parseInt($(this).data("minini"))
                            var hrs_fin = parseInt($(this).data("horafin"))
                            var min_fin = parseInt($(this).data("minfin"))
                            var tiempo_inicio = parseFloat(hrs_ini)+(parseFloat(min_ini)/60)
                            var tiempo_final  = parseFloat(hrs_fin)+(parseFloat(min_fin/60))


                        }
                    }   
                    var limit_hrs_ini = parseInt(hrs_fin)-parseInt(hrs_ini)
                    //alert(parseInt(limit_hrs_ini)+"....."+parseInt(hrs_ini))
                    //alert("hora ->"+limit_hrs_ini+"inicio ->"+hrs_ini)
                    var for_secu = parseInt(limit_hrs_ini)+parseInt(hrs_ini)-1
                    if (min_fin == 0) {  
                        for (i=(hrs_ini);i<=for_secu;i++) {
                            //$(".select_inicio_hrsSe").data( key, value );
                            $(".select_inicio_hrsSe").append("<option value='"+i+"' class='opt_ini_hrs'>"+i+" hrs</option>")
                        }
                    }    
                    else{
                        var for_secu = parseInt(limit_hrs_ini)+parseInt(hrs_ini)
                        for (i=hrs_ini;i<=for_secu;i++) {
                            //$(".select_inicio_hrsSe").data( key, value );
                            $(".select_inicio_hrsSe").append("<option value='"+i+"' class='opt_ini_hrs'>"+i+" hrs</option>")
                        }
                    }
                }

            }
            if (tipo_espacio == "blue") {
                var hrs_ini = parseInt($(this).data("horaini"))
                var min_ini = parseInt($(this).data("minini"))
                var hrs_fin = parseInt($(this).data("horafin"))
                var min_fin = parseInt($(this).data("minfin"))

                var hrs_ini_info = parseInt($(this).data("infohoraini"));
                var min_ini_info = parseInt($(this).data("infominini"));
                var hrs_fin_info = parseInt($(this).data("infohorafin"));
                var min_fin_info = parseInt($(this).data("infominfin"));

                $(".select_horario_ajaxSe").html("")
                $(".select_inicio_hrsSe").html("<option class='ip' value='"+hrs_ini_info+"'>"+hrs_ini_info+" hrs</option>")
                $(".select_inicio_minSe").html("<option class='ip' value='"+min_ini_info+"'>"+min_ini_info+" min</option>")
                $(".select_fin_hrsSe").html("<option class='ip' value='"+hrs_fin_info+"'>"+hrs_fin_info+" hrs</option>")
                $(".select_fin_minSe").html("<option class='ip' value='"+min_fin_info+"'>"+min_fin_info+" min</option>")
                
                var tiempo_inicio = parseFloat(hrs_ini)+(parseFloat(min_ini)/60)
                var tiempo_final  = parseFloat(hrs_fin)+(parseFloat(min_fin/60))

                $(".btn_emergente_fechaSe").trigger("click")
                //alert(hrs_ini+"...."+min_ini+"..."+hrs_fin+"...."+min_fin+"-----"+tiempo_inicio+"-----------"+tiempo_final)
                if ((tiempo_final - tiempo_inicio)  < .5) {
                    alert("Solo se pueden reservar espacios que sean mayores a media hora")
                }
                else{
                    var esp_salto = $(this).find(".aqui_hay").length
                    if (esp_salto == 1) {
                        //alert("aqui estamos")
                        var saltos_totales = $(".aqui").length
                        if (saltos_totales >= 2) {    
                            var data_hrs_ini = $(".aqui:first").parent().parent().data("horaini")
                            var data_min_ini = $(".aqui:first").parent().parent().data("minini")
                            var data_hrs_fin = $(".aqui:last").parent().parent().data("horafin")
                            var data_min_fin = $(".aqui:last").parent().parent().data("minfin")
                            //alert(data_hrs_ini+"..."+data_min_ini+"..."+data_hrs_fin+"..."+data_min_fin)
                            ////////comienza modificacion////////////////
                            $(".aqui").parent().parent().data("horaini",data_hrs_ini)
                            $(".aqui").parent().parent().data("minini",data_min_ini)
                            $(".aqui").parent().parent().data("horafin",data_hrs_fin)
                            $(".aqui").parent().parent().data("minfin",data_min_fin)

                            $(".aqui_hay").parent().parent().data("horaini",data_hrs_ini)
                            $(".aqui_hay").parent().parent().data("minini",data_min_ini)
                            $(".aqui_hay").parent().parent().data("horafin",data_hrs_fin)
                            $(".aqui_hay").parent().parent().data("minfin",data_min_fin)
                            var hrs_ini = parseInt($(this).data("horaini"))
                            var min_ini = parseInt($(this).data("minini"))
                            var hrs_fin = parseInt($(this).data("horafin"))
                            var min_fin = parseInt($(this).data("minfin"))
                            var tiempo_inicio = parseFloat(hrs_ini)+(parseFloat(min_ini)/60)
                            var tiempo_final  = parseFloat(hrs_fin)+(parseFloat(min_fin/60))


                        }
                    }   
                    var limit_hrs_ini = parseInt(hrs_fin)-parseInt(hrs_ini)
                    //alert(parseInt(limit_hrs_ini)+"....."+parseInt(hrs_ini))
                    //alert("hora ->"+limit_hrs_ini+"inicio ->"+hrs_ini)
                    var for_secu = parseInt(limit_hrs_ini)+parseInt(hrs_ini)-1
                    if (min_fin == 0) {  
                        for (i=(hrs_ini);i<=for_secu;i++) {
                            //$(".select_inicio_hrsSe").data( key, value );
                            $(".select_inicio_hrsSe").append("<option class='opt_ini_hrs' value='"+i+"'>"+i+" hrs</option>")
                        }
                    }    
                    else{
                        var for_secu = parseInt(limit_hrs_ini)+parseInt(hrs_ini)
                        for (i=hrs_ini;i<=for_secu;i++) {
                            //$(".select_inicio_hrsSe").data( key, value );
                            $(".select_inicio_hrsSe").append("<option class='opt_ini_hrs' value='"+i+"'>"+i+" hrs</option>")
                        }
                    }
                }

            }
        })

        $(document).on("change",".select_inicio_hrsSe",function(){
            var valor   = $(this).val();
            //var primero = $(".select_inicio_hrsSe .opt_ini:first").val()
            //var ultimo  = $(".select_inicio_hrsSe .opt_ini:last").val()
            $(".opt").remove()
            //alert($(".espacio_select").html())
            var hrs_ini =  parseInt($(".espacio_select").data("horaini"))
            var min_ini =  parseInt($(".espacio_select").data("minini"))
            var hrs_fin =  parseInt($(".espacio_select").data("horafin"))
            var min_fin =  parseInt($(".espacio_select").data("minfin"))
            var limit_hrs_ini = parseInt(hrs_fin)-parseInt(hrs_ini)
            var tiempo_final  = parseFloat(hrs_fin)+(parseFloat(min_fin)/60)

            //alert(hrs_ini +"-"+min_ini +"-"+hrs_fin +"-"+min_fin)
            if (valor == hrs_ini) {
                //alert("mov 1")
                if (min_fin == 0) { 
                    var for_secu = parseInt(limit_hrs_ini)+parseInt(hrs_ini)-1 
                    for (i=hrs_ini;i<=for_secu;i++) {
                        $(".select_fin_hrsSe").append("<option class='opt' value='"+i+"'>"+i+" hrs</option>")
                    }
                    for(i=(parseInt(min_ini)+5);i<=55;i++){
                        $(".select_inicio_minSe").append("<option class='opt' value='"+i+"'>"+i+" min</option>")
                    }
                }    
                else{
                    var for_secu = parseInt(limit_hrs_ini)+parseInt(hrs_ini)
                    for (i=(hrs_ini);i<=for_secu;i++) {
                        $(".select_fin_hrsSe").append("<option class='opt' value='"+i+"'>"+i+" hrs</option>")
                    }
                    for(i=(parseInt(min_ini)+5);i<60;i++){
                        $(".select_inicio_minSe").append("<option class='opt' value='"+i+"'>"+i+" min</option>")
                    }
                }
            }
            if (valor == hrs_fin) {
                //alert("mov 2")
                for(i=1;i<(min_fin-5);i++){
                    $(".select_inicio_minSe").append("<option class='opt' value='"+i+"'>"+i+" min</option>")   
                }
                $(".select_fin_hrsSe").append("<option class='opt' value='"+valor+"'>"+valor+" hrs</option>")
            }
            if (valor != hrs_ini && valor != hrs_fin) {
                //alert("mov 3")
                if (min_fin == 0) {
                    for(i=0;i<=55;i++){
                        $(".select_inicio_minSe").append("<option class='opt' value='"+i+"'>"+i+" min</option>")
                    }
                    var for_secu = parseInt(limit_hrs_ini)+parseInt(hrs_ini)-1
                    for(i=valor;i<=for_secu;i++){
                        $(".select_fin_hrsSe").append("<option class='opt' value='"+i+"'>"+i+" hrs</option>")
                    }
                }
                else {
                    for(i=0;i<60;i++){
                        $(".select_inicio_minSe").append("<option class='opt' value='"+i+"'>"+i+" min</option>")
                    }
                    var secu_for = parseInt(limit_hrs_ini)+parseInt(hrs_ini)
                    for(i=valor;i<=secu_for;i++){
                        //alert("memo")
                        $(".select_fin_hrsSe").append("<option class='opt' value='"+i+"'>"+i+" hrs</option>")
                    }
                }    
            }
        })

        $(document).on("change",".select_fin_hrsSe",function(){
            var valor = $(this).val()
            $(".opt_min_fin").remove()
            var hrs_ini = parseInt($(".espacio_select").data("horaini"))
            var min_ini = parseInt($(".espacio_select").data("minini"))
            var hrs_fin = parseInt($(".espacio_select").data("horafin"))
            var min_fin = parseInt($(".espacio_select").data("minfin"))
            if (valor == hrs_ini) {
                for(i=(min_ini+5);i<60;i++){
                    $(".select_fin_minSe").append("<option class='opt_min_fin' value='"+i+"'>"+i+" min</option>")
                }
            }
            if (valor == hrs_fin) {
                for(i=0;i<(min_fin-5);i++){
                    $(".select_fin_minSe").append("<option class='opt_min_fin' value='"+i+"'>"+i+" min</option>")   
                }
            }
            if (valor != hrs_ini && valor != hrs_fin) {
                var pre = hrs_fin-1
                if (min_fin == 0 && valor==pre){   
                    for(i=0;i<=55;i++){
                        $(".select_fin_minSe").append("<option class='opt_min_fin' value='"+i+"'>"+i+" min</option>")
                    }
                }    
                else{
                    for(i=0;i<60;i++){
                        $(".select_fin_minSe").append("<option class='opt_min_fin' value='"+i+"'>"+i+" min</option>")
                    }
                }
            }

        })

        $(document).on("change",".select_horario_ajaxSe",function(){
            var hrs_ini     = $(".select_inicio_hrsSe").val()
            var min_ini     = $(".select_inicio_minSe").val()
            var hrs_fin     = $(".select_fin_hrsSe").val()
            var min_fin     = $(".select_fin_minSe").val()
            var id_sala     = $(".input_name_sala").val()
            var dia_fecha   = $(".input_dia").val()

            //alert(hrs_ini+"--"+min_ini+"--"+hrs_fin+"--"+min_fin)
            if (hrs_ini != '' && min_ini != '' && hrs_fin !='' && min_fin != '') {
                var tiempo_inicio = parseFloat(hrs_ini)+(parseFloat(min_ini)/60)
                var tiempo_final  = parseFloat(hrs_fin)+(parseFloat(min_fin)/60)
                var continuar
                if (tiempo_inicio == tiempo_final) {
                    $(".mens_horarioSe").html("La hora de inicio no puede ser igual a la hora final")
                }
                else{
                    $(".mens_horarioSe").html("")
                    if (hrs_ini == hrs_fin) {
                        if (parseInt(min_ini)>parseInt(min_fin)) {
                            $(".mens_horarioSe").html("El minuto de inicio no puede ser mayor al minuto final")
                            return false
                        }
                        else{
                            $(".mens_horarioSe").html("")
                            var limite = tiempo_final - tiempo_inicio
                            if (limite >= .33333333333333200) {
                                $(".mens_horarioSe").html("")
                                continuar = "si"
                            }
                            else{
                                $(".mens_horarioSe").html("La junta no puede durar menos de 20 minutos")
                            }
                        }
                    }
                    else{
                        var limite = tiempo_final - tiempo_inicio
                        if (limite >= .33333333333333200) {
                            $(".mens_horarioSe").html("")
                            continuar = "si"
                        }
                        else{
                            $(".mens_horarioSe").html("La junta no puede durar menos de 20 minutos")
                        }
                    }
                }

                if (continuar == "si") {
                    $.ajax({
                        type:"GET",
                        url:"reservas/process_info_espacios.php?hrs_ini="+hrs_ini+"&min_ini="+min_ini+"&hrs_fin="+hrs_fin+"&min_fin="+min_fin+"&sala="+id_sala+"&fecha="+dia_fecha+"",
                        success:function(data){
                            if (data != "hay") {
                                $(".cajota").html(data)
                                var cont_input_hrs_ini = $(".input_hrs_ini").length
                                var cont_input_hrs_fin = $(".input_hrs_fin").length
                                var cont_input_min_ini = $(".input_min_ini").length
                                var cont_input_min_fin = $(".input_min_fin").length

                                if (cont_input_hrs_ini==0 && cont_input_hrs_fin==0 && cont_input_min_ini==0 && cont_input_min_fin==0) {
                                    $(".form_oculto").append("<input type='text' name='hrs_ini_txt' class='input_hrs_ini' value='"+hrs_ini+"'>")
                                    $(".form_oculto").append("<input type='text' name='min_ini_txt' class='input_min_ini' value='"+min_ini+"'>")
                                    $(".form_oculto").append("<input type='text' name='hrs_fin_txt' class='input_hrs_fin' value='"+hrs_fin+"'>")
                                    $(".form_oculto").append("<input type='text' name='min_fin_txt' class='input_min_fin' value='"+min_fin+"'>")
                                }
                                else{
                                    $(".input_hrs_ini").val(hrs_ini)
                                    $(".input_min_ini").val(min_ini)
                                    $(".input_hrs_fin").val(hrs_fin)
                                    $(".input_min_fin").val(min_fin)
                                }
                            }
                            else{
                                alert("Al parecer ya ha reservado una sala en este horario")
                            }
                        }
                    })

                }

            } 
        })




        $(document).on("click",".regresar_dos_reserva",function(){
            $(".principal .form_dos").remove()
            $(".principal .form_uno").show()
            $(".input_dia").remove()
            $(".input_hrs_ini").remove()
            $(".input_min_ini").remove()
            $(".input_hrs_fin").remove()
            $(".input_min_fin").remove()
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
            var hora_inicio = $(".input_hrs_ini").val()
            var min_inicio  = $(".input_min_ini").val()
            if (hora_inicio == undefined && min_inicio == undefined) {
                mens_hora_inicio = "Obligatorio - Registre la hora de inicio"
            }
            else{
                var mentira_ini = "0"+hora_inicio
                if (mentira_ini.length < 3) {
                    hora_inicio = "0"+hora_inicio
                }
                var mentira_minini = "0"+min_inicio
                if (mentira_minini < 3) {
                    min_inicio = "0"+min_inicio
                }
                mens_hora_inicio = "Hora de inicio: "+hora_inicio+"hrs "+min_inicio+"min"
            }
            
            var hora_fin = $(".input_hrs_fin").val()
            var min_fin  = $(".input_min_fin").val() 
            if (hora_fin == undefined && min_fin == undefined) {
                mens_hora_fin = "Obligatorio - Registre la hora de finalización"
            }
            else{
                var mentira_fin = "0"+hora_fin
                if (mentira_fin.length < 3) {
                    hora_fin = "0"+hora_fin
                }
                var mentira_minfin = "0"+min_fin
                if (mentira_minfin < 3) {
                    min_fin = "0"+min_fin
                }
                mens_hora_fin = "Hora de finalización: "+hora_fin+"hrs "+min_fin+"min"
            }
            var conf_snaks  = $(".input_conf_snaks").val()
            var detalles    = $(".input_detalles_juntas").val()
            if (detalles == undefined) {
                detalles = "Opcional - No se registrarón detalles"
            }
            
            $(".sala_info").html("Sala: "+name_sala)
            $(".dia_info").html("Fecha: "+dia)
            $(".inicio_hora_info").html(mens_hora_inicio)
            $(".fin_hora_info").html(mens_hora_fin)
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
                var hora_inicio = $(".input_hrs_ini").val()
                var hora_fin    = $(".input_hrs_fin").val()
                var min_inicio  = $(".input_min_ini").val()
                var min_fin     = $(".input_min_fin").val()
                if (dia == undefined || hora_inicio == undefined || hora_fin == undefined || min_inicio == undefined || min_fin == undefined) {
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
                                //alert(data)
                                if (data == 00) {
                                    $(".btn-close").trigger("click")
                                    $(".memo").remove()
                                    var name_sala   = $(".input_name_name_sala").val()
                                    var dia         = $(".input_dia").val()
                                    var hora_inicio = $(".input_hrs_ini").val()
                                    var hora_fin    = $(".input_hrs_fin").val()
                                    var min_inicio  = $(".input_min_ini").val()
                                    var min_fin     = $(".input_min_fin").val()
                                    var mentira_ini = "0"+hora_inicio
                                    if (mentira_ini.length < 3) {
                                        hora_inicio = "0"+hora_inicio
                                    }
                                    var mentira_minini = "0"+min_inicio
                                    if (mentira_minini < 3) {
                                        min_inicio = "0"+min_inicio
                                    }
                                    var mentira_fin = "0"+hora_fin
                                    if (mentira_fin.length < 3) {
                                        hora_fin = "0"+hora_fin
                                    }
                                    var mentira_minfin = "0"+min_fin
                                    if (mentira_minfin < 3) {
                                        min_fin = "0"+min_fin
                                    }
                                    var conf_snaks  = $(".input_conf_snaks").val()
                                    var detalles    = $(".input_detalles_juntas").val()
                                    if (detalles == undefined) {
                                        detalles = "Opcional - No se registrarón detalles"
                                    }
                                    $(".nota_reserva").load("reservas/nota_reserva.php",function(){
                                        $(".sala_info").html(name_sala)
                                        $(".dia_info").html("Fecha: "+dia)
                                        $(".inicio_hora_info").html("Hora de inicio: "+hora_inicio+"hrs "+min_inicio+"min")
                                        $(".fin_hora_info").html("Hora de finalización: "+hora_fin+"hrs "+min_fin+"min")
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
        $(document).on("click",".cancelar",function(){
            var id_reserva = $(this).attr("data")
            if (confirm("¿Desea eliminar esta reserva?") == true) {
                $.ajax({
                    type:"GET",
                    url:"usuario/process_cancelar_reserva.php?id_reserva="+id_reserva+"",
                    success:function(data){
                        alert("Su reserva fue cancelada")
                        window.location.href = "usuario.php"
                    }
                })
            } 
            else {
                txt = "You pressed Cancel!";
            }
        })   
        $(document).on("click",".modificar",function(){
            var id_reserva = $(this).attr("data")
            $(".regresar_general").hide()
            $(".lista_reservas").hide()
            $(".regresar_sin").show()
            $.ajax({
                type:"GET",
                url:"usuario/form_modificar_reserva.php?id_reserva="+id_reserva+"",
                success:function(data){
                    $(".tratar_datos").html(data)
                }
            })
        }) 
        $(document).on("click",".regresar_sin",function(){
            $(".regresar_sin").hide()
            $(".regresar_general").show()
            $(".lista_reservas").show()
            $(".tratar_datos").html("")
            return false
        })
        $(document).on("click",".btn_snaks_mod",function(){
            var snaks_mod = $(".snaks_mod").val()
            
            var ultimo_valor = $(".lista_snaks_mod .input_val_snak:first").attr("id")
            if (ultimo_valor == undefined) {
                var nuevo_valor = 1;
            }
            else{
                var nuevo_valor  = parseInt(ultimo_valor)+1;
            }
            //alert(ultimo_valor)
            if (snaks_mod != 0) {
                $(".lista_snaks_mod").prepend("<div> <p style='font-size:1.15em'><strong><span class='icon-cancel-circle' style='color:#81DAF5;font-size:1.2em;'></span> "+snaks_mod+"</strong> </p>  <input type='hidden' value='"+snaks_mod+"' name='"+nuevo_valor+"' id='"+nuevo_valor+"' class='input_val_snak'> </div>")
                $(".snaks_mod").val("")
                $(".snaks_mod").focus()
            }
        })
        $(document).on("change","#sala_txt",function(){
            var id_sala     = $(this).val()
            var fecha_junta = $("#fecha_txt").val()
            var hrs_ini     = $("#hrs_ini").val()
            var min_ini     = $("#min_ini").val()
            var hrs_fin     = $("#hrs_fin").val()
            var min_fin     = $("#min_ini").val()
            //alert(hrs_ini+"-"+min_ini+"-"+hrs_fin+"-"+min_ini)
            $.ajax({
                type:"GET",
                url:"usuario/process_mens_horario.php?id_sala="+id_sala+"&fecha_junta="+fecha_junta+"",
                dataType:"json",
                success:function(data){
                    $(".mens_horario_sala").html(data.uno)
                    $(".mens_ocupada").html(data.dos)
                    $("#turno_inicio").val(data.tres)
                    $("#turno_fin").val(data.cuatro)
                }
            })
            $.ajax({
                type:"GET",
                url:"usuario/precess_horas_xsala.php?id_sala="+id_sala+"&fecha_junta="+fecha_junta+"&hrs_ini="+hrs_ini+"&min_ini="+min_ini+"&hrs_fin="+hrs_fin+"&min_fin="+min_fin+"",
                success:function(data){
                    $(".respuesta_horas").html(data)
                }
            })
        })
        $(document).on("change","#hrs_ini",function(){
            var hora_seleccionada = parseInt($(this).val())
            var ultima_hora       = parseInt($("#hrs_ini option:last").val())
            var resta = ultima_hora - hora_seleccionada

            $(".opt_fin").remove()
            if (resta >= 6) {
                var suma = hora_seleccionada+6
                for (i = hora_seleccionada; i < suma; i++) {
                    i = parseInt(i)
                    if (i < 10) {
                        i = "0"+i;
                    }
                    $("#hrs_fin").append("<option class='opt_fin' value='"+i+"'>"+i+" Hrs</option>")
                }
            }
            if (resta < 6) {
                for (i = hora_seleccionada; i < ultima_hora; i++) {
                    i = parseInt(i)
                    if (i < 10) {
                        i = "0"+i;
                    }
                    $("#hrs_fin").append("<option class='opt_fin' value='"+i+"'>"+i+" Hrs</option>")
                }
            }
        })
        $(document).on("click",".btn_mod_reserva",function(){
            var no = $(".no_pasa").length
            if (no == 0) {
                var ultimo_valor = $(".lista_snaks_mod .input_val_snak:first").attr("id")
                var primer_valor = $(".lista_snaks_mod .input_val_snak:last").attr("id")
                $(".input_inicio").val(primer_valor)
                $(".input_fin").val(ultimo_valor)
                //alert(ultimo_valor+"-"+primer_valor)
                $.ajax({
                    type:"POST",
                    url:"reservas/process_modificar_reserva.php",
                    data:$(".form_mod_reserva").serialize(),
                    success:function(data){
                        alert("Los cambios se registraron exitosamente")
                        $(".principal").load("vista_cancelar_modificar.php");
                    }
                })
            }
            else{
                alert("La hora ingresada no puede registrarse. Revise los horarios disponibles y los turnos de la sala")
            }
        })
    </script>
</body>

</html>
