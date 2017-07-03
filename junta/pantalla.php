<?php
    include("funciones.php");
    $id_sala = sanitizar_get("sala");
?>  
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pantalla</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../ico/style.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200" rel="stylesheet">
    <link rel="stylesheet" href="css/juntas.css">
    <link rel="stylesheet" href="cronometro/inc/TimeCircles.css" />
</head>

<style>
    .vertical{
        width: 1px;
        background-color: rgb(8,141,198); 
        height: 100%; 
        margin-right: 10px
        border:1px solid rgb(8,141,198);
        -webkit-box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
        -moz-box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
        box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
        display: block
    }
    .midiv.{
        margin-top: -10px
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row" style="padding-left:10px;padding-right:10px">
            <div class="col-md-10 col-md-offset-1 caja">
                <?php  
                    if ($id_sala == '') {
                        ?>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h2 style="text-align: center;"><span class="icon-briefcase"></span> Seleccione una Sala</h2>
                                <hr class="linea">
                                <?php 
                                    $consulta_sala = mysqli_query($q_sec,"SELECT * FROM salas_juntas order by id_sala asc");
                                      while ($array  = mysqli_fetch_array($consulta_sala)) {
                                          $name_sala = $array['name_sala'];
                                          $id_sala   = $array['id_sala'];
                                          ?>

                                            <a style="color:black" href="?sala=<?php echo $id_sala ?>">
                                                <p class="boton_sala"> <?php echo $name_sala ?>
                                                </p>
                                            </a>
                                          <?php
                                      }
                                ?>
                                <br>
                            </div>
                        </div>
                        <?php    
                    }
                    else{
                        ?>
                        <div class="row">
                            <?php echo "<input type='hidden' value='$id_sala' class='sala_js'>" ?>
                            <div class="col-md-6 col-sm-6 midiv">
                                <?php include("consultas_pantalla_tempo.php"); ?>
                                <h2 class="center visible-xs-block visible-sm-block" style="font-size:1.8em;margin-right:0px;margin-top: 0px">
                                    <?php 
                                        echo $name_sala = consulta_tx("SELECT name_sala FROM salas_juntas where id_sala='$id_sala'","name_sala");
                                    ?>
                                </h2>
                                <div class="visible-sm-block visible-md-block visible-lg-block">
                                    <br>
                                </div>
                            </div>
                            <div class="col-xs-12 visible-xs-block" style="margin-bottom: 30px">
                                <hr class="linea">
                            </div>
                            <div class="col-md-1 col-sm-1 visible-sm-block visible-md-block visible-lg-block" style="padding: 0px">
                                <center><div class="vertical" style="margin-bottom:-2px"></div></center>
                                <center>    
                                    <div class="memo">

                                    </div>
                                </center>
                                <center><div class="vertical" style="margin-top:-7px"></div></center>  
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-12 contra">
                                <?php include("consultas_pantalla_reservas.php"); ?>
                            </div> 
                        </div>
                        <?php
                    }
                    ?>
            </div> 
        </div> 
    </div> 
</body>
<script src="js/jquery.js"></script>
<script type="text/javascript" src="cronometro/inc/TimeCircles.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
        $("#DateCountdown").TimeCircles({
            "animation": "smooth",
            "bg_width": 1.2,
            "fg_width": 0.05,
            "circle_bg_color": "#60686F",
            "time": {
                "Days": {
                    "text": "Days",
                    "color": "#FFCC66",
                    "show": false
                },
                "Hours": {
                    "text": "Horas",
                    "color": "#99CCFF",
                    "show": true
                },
                "Minutes": {
                    "text": "Minutos",
                    "color": "#BBFFBB",
                    "show": true
                },
                "Seconds": {
                    "text": "Seconds",
                    "color": "#FF9999",
                    "show": false
                }
            }
        })
</script>
<script>    
    $(window).resize(function() {        
        var alto_uno =  parseInt($(".midiv").height());
        var alto_two =  parseInt($(".contra").height());
        if (alto_uno > alto_two) {
            div_alto = alto_uno
        }
        if (alto_uno < alto_two) {
            div_alto = alto_two   
        }
        if (alto_uno == alto_two) {
            div_alto = alto_uno
        }        
        var alto_vertical = parseFloat(parseInt(4*div_alto)/10)
        $(".vertical").css("height", ""+alto_vertical+"")
    })
    $(document).ready(function(){
        function mostrarAlerta(){
            var sala_js = $(".sala_js").val()
            window.location.href = "pantalla.php?sala="+sala_js+""
            /*$.ajax({
                type:"GET",
                url:"pantalla/refresh.php?variable=memorama",
                success:function(data){

                    if (data == "memo") {
                        var sala_js = $(".sala_js").val()
                        window.location.href = "pantalla.php?sala="+sala_js+""
                    }
                    else{
                        //alert("no pasa algo")
                    }
                }
            })*/
            //alert("memo")
        }
        setInterval(mostrarAlerta, 90000);
        var div_ancho = $(".midiv").width();
        
        var alto_uno =  parseInt($(".midiv").height());
        var alto_two =  parseInt($(".contra").height());
        if (alto_uno > alto_two) {
            div_alto = alto_uno
        }
        if (alto_uno < alto_two) {
            div_alto = alto_two   
        }
        if (alto_uno == alto_two) {
            div_alto = alto_uno
        }        



        var alto_vertical = parseFloat(4*div_alto/10)
        $(".vertical").css("height", ""+alto_vertical+"")
        //$(".vertical").css({"width":""+div_ancho+"","height":""+div_alto+""})
        
        var alto_circulo = parseFloat(2*div_alto/10)
        //$("#myCanvas").height(alto_circulo)
        //$("#myCanvas").width(alto_circulo)

        $(".memo").append("<center><canvas id='myCanvas' width='"+alto_circulo+"' height='"+alto_circulo+"'>No soporta</canvas></center>")
        //$(".mesmo").css({"width":""+alto_circulo+"","height":""+alto_circulo+""})

        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        var coor  = alto_circulo/2
        var radio = (alto_circulo/2)-4
        ctx.beginPath();
        ctx.strokeStyle = "#009bdb";
        ctx.lineWidth = 2;
        ctx.arc(coor,coor,radio,Math.PI*(2/8),Math.PI*(9/8),false);
        ctx.stroke();
        ctx.closePath()    

        ctx.beginPath();
        ctx.strokeStyle = "#009bdb";
        ctx.lineWidth = 2;
        ctx.arc(coor,coor,radio,Math.PI*(10/8),Math.PI*(17/8),false);
        ctx.stroke();
        ctx.closePath()
    })
    $(document).on("click",".siguiente",function(){
        //$(".sig_reserva").hide(800)
        var sala  = $(".sig_reserva").data("sala")
        var fecha = $(".sig_reserva").data("fecha")
        $.ajax({
            type:"GET",
            url:"pantalla/process_sig_reserva.php?fecha="+fecha+"&sala="+sala+"",
            success:function(data){
                //alert(data)
                if (data=="no") {
                    alert("No hay más reservas a futuro")
                }
                else{
                    $(".atras").show()
                    $(".caja_siguiente").html(data)
                }
            }
        });   
    });
    $(document).on("click",".atras",function(){
        var primero = $(".select").data("select")
        var sala  = $(".sig_reserva").data("sala")
        var fecha = $(".sig_reserva").data("fecha")
        //alert(fecha+",,,"+sala+",,,"+primero)
        $.ajax({
            type:"GET",
            url:"pantalla/process_atras_reserva.php?fecha="+fecha+"&sala="+sala+"&primero="+primero+"",
            success:function(data){
                $(".caja_siguiente").html(data)
                var spans = $(".sig_reserva").data("spans")
                if (spans == "no") {
                    $(".atras").hide()
                }
            }
        })
            
    })

    //falta poner hoy o la info del dia y el sitetime
    //la pantalla de entrada para elegir la pantalla 
    //detalle botones abajo
</script>
