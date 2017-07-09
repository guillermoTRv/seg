<script>
    var device = navigator.userAgent
    if (device.match(/Iphone/i)|| device.match(/Ipod/i)|| device.match(/Android/i)|| device.match(/J2ME/i)|| device.match(/BlackBerry/i)|| device.match(/iPhone|iPad|iPod/i)|| device.match(/Opera Mini/i)|| device.match(/IEMobile/i)|| device.match(/Mobile/i)|| device.match(/Windows Phone/i)|| device.match(/windows mobile/i)|| device.match(/windows ce/i)|| device.match(/webOS/i)|| device.match(/palm/i)|| device.match(/bada/i)|| device.match(/series60/i)|| device.match(/nokia/i)|| device.match(/symbian/i)|| device.match(/HTC/i))
    { 
        

    }
    else
    {
        //window.location = "./administrador.php";
    }
</script>
<?php 
    include("funciones.php"); 
    $mes_enc = date("m");
    $dia_enc = date("d");
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administración de salas de juntas</title>

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
                            <h3 style="display:inline;float:left" ><?php echo saber_dia($fecha)." $dia_enc de ".mes($mes_enc) ?></h3>
                            <h3 style="display:inline;float:right;font-weight: bold;"><a href="./logout.php"><span class="glyphicon glyphicon-share"></span> Salir</a></h3>
                            <br><br>
                            <h3 style="font-weight:bold">Panel de Administración - Grupo <?php echo $empresa ?></h3>
                            <hr class="linea">
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana letra" data="alta_usuario">Alta Usuario</button>
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana letra" data="alta_juntas">Alta Sala de Juntas</button>
                            
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana letra" data="calendario_juntas">Calendarios Salas de Juntas</button>

                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana letra" data="info_usuarios">Información, Modificacion y Baja de Usuarios</button>
                            
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana letra" data="info_salas">Información, Modificación y Baja de Salas</button>
                         
                            <hr class="linea">
                            <br>
                        </div>
                        <div class="principal">
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(".btn_ventana").click(function(){
            var seccion = $(this).attr("data")
            $(".menu").hide()
            $(".principal").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
            if (seccion == "alta_usuario") {
                $(".principal").load("administrador/form_alta_usuario.php",400)    
            }
            if (seccion == "alta_juntas") {
                $(".principal").load("administrador/form_alta_sala.php",400)   
            }
            if (seccion == "calendario_juntas") {
                $(".principal").load("administrador/calendario_juntas.php",400)
            }
            if (seccion == "info_usuarios") {
                $(".principal").load("administrador/info_usuarios.php",400)
            }
            if (seccion == "info_salas") {
                $(".principal").load("administrador/info_salas.php",400)
            }
        });
        $(document).on("click",".regresar",function(){
            $(".principal").html("")
            $(".menu").show()
        });
        $(document).on("click",".boton_sala",function(){
            var valor_sala = $(this).attr("id")
            var name_sala  = $(this).attr("data")
            $.ajax({
                type:"GET",
                url:"administrador/process_calendario_juntas.php?id_sala="+valor_sala+"&name_sala="+name_sala+"",
                success:function(data){
                    $(".calendario_lista").hide()
                    $(".calendario_vista").show()
                    $(".calendario_vista").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
                    $(".calendario_vista").html(data)
                }
            })
        })
        $(document).on("click",".regresar_calendar",function(){
            $(".calendario_vista").html("")
            $(".calendario_lista").show()
            return false
        });
        $(document).on("click",".mover",function(){
            var valor_sala = $(this).data("idsala")
            var name_sala  = $(this).data("namesala")
            var mes        = $(this).data("mes")
            var tipo       = $(this).data("tipo")
            alert(valor_sala+"-"+name_sala+"-"+mes)
            $.ajax({
                type:"GET",
                url:"administrador/process_calendario_mover.php?id_sala="+valor_sala+"&name_sala="+name_sala+"&mes="+mes+"&tipo="+tipo,
                success:function(data){
                    if (data == "si") {

                    }
                    else{
                        $(".calendario_vista").html(data)
                    }
                }
            })
        });
        
    </script>

</body>

</html>
