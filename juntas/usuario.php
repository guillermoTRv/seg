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
    <style>
	    body 
	    {
	        padding: 70px 15px 40px 15px;
	        background-color:#000;
	        color:#fff;
	        font-family: 'Nunito Sans', sans-serif;
	    }
	    .caja{
	        -webkit-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
	        -moz-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
	        box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
	        border-radius:15px; 
	        font-size: 1.1em;
	        font-family: 'Nunito Sans', sans-serif;
	        padding: 20px

	    }
	    .linea{
	        -webkit-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
	        -moz-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
	        box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
	    }
	    .btn_ventana{
	        font-weight:bold;
	    }
	    .vertical{
	        -webkit-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
	        -moz-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
	        box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
	        
	        width: 1px; /* Line width */
	        background-color:white; /* Line color */
	        height: 100%; /* Override in-line if you want specific height. */
	        float: left; 
	        height:300px;
	        margin-right: 20px;
	    }
	    .input_blue{
	        border:1px solid rgb(8,141,198);
	        -webkit-box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
	        -moz-box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
	        box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
	        color: rgba(0,155,219,1);
	        font-size: 1.14em;
	        font-family: 'Nunito Sans', sans-serif;
	        font-weight:bold;

	    }
	    .input_blue:focus {
	        -webkit-box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
	        -moz-box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
	        box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);  
	    }
	    .regresar{
	        text-align: center;font-weight: bold;text-decoration:none
	    }
	    .regresar:hover{text-decoration:none;}
	    .regresar:focus{text-decoration:none;}
	    a{color:#81DAF5;}
	    a:hover{text-decoration: none}
	    a:focus{text-decoration: none}
	    .sombra_textos{
    		text-shadow: 0px 0px 10px rgba(0,155,219,1);
    	}
    	.boton_sala{
    		cursor: pointer;
    		background-color:white;
    		border-radius:5px;
    		text-align: center;
    		padding:10px 9px 10px 9px;
    		font-weight: bold;
    		font-size:1.15em;
    		width:100%;
    		color:rgba(0,0,0,.8);
    	}
    	h4 {font-weight: bold;}
    </style>

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
                            <h3 class="sombra_texto"><a href=""><span class="icon-clock sombra_textos"></span> 	Actualmente hay 2 salas en uso - Ver detalle</a></h3>
                            <h3 class="sombra_texto"><a href=""><span class="icon-history sombra_textos"></span>	Faltan 2 horas para que su junta comience en sala uno</a> </h3>
                            <h3 class="sombra_texto"><a href=""><span class="icon-pushpin sombra_textos" ></span>	Usted ah echo 3 reservaciones</a> </h3>
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
            if (seccion == "reserva_sala") {
                $(".principal").load("reserva_sala.php",400)    
            }
            if (seccion == "alta_juntas") {
                $(".principal").load("alta_juntas.html",400)   
            }
            
        });
        $(document).on("click",".regresar",function(){
            $(".principal").html("")
            $(".menu").show()
            return false
        });
        $(document).on("click",".boton_sala",function(){
            var name_sala = $(this).attr("data")
            var id_sala   = $(this).attr("id")
            $(".principal").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
            $(".principal").load("form_reserva_sala.html",function(){
            	$(".name_sala_form").html("Reservar sala de Juntas " + name_sala +" para el")
            }) 
        });
        $(document).on("click",".regresar_reserva_sala",function(){
            $(".principal").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
            $(".principal").load("reserva_sala.php") 
            return false
        });
        $(document).on("click",".btn_sig_alta_sala",function(){
        	alert("hola")
            $(".principal").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
            $(".principal").load("form_detalles_sala.php") 
            return false
        });
        $(document).on("click",".regresar_detalles_sala",function(){
            $(".principal").html("<br><br><br><center><span class=' icon-spinner' style='font-size:8em;'></span></center><br><br><br>")
            $(".principal").load("form_reserva_sala.html") 
            return false
        });
    </script>

</body>

</html>
