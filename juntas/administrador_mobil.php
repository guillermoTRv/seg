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
<?php include("funciones.php"); ?>

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
    a:hover{text-decoration: none}
    a:focus{text-decoration: none}
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 caja">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="menu">
                            <h3 style="display:inline;float:left" ><?php echo $fecha ?></h3>
                            <h3 style="display:inline;float:right;font-weight: bold;"><a href="./logout.php"><span class="glyphicon glyphicon-share"></span> Salir</a></h3>
                            <br><br>
                            <h3 style="font-weight:bold">Panel de Administración - Grupo Gideas</h3>
                            <hr class="linea">
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana" data="alta_usuario">Alta Usuario</button>
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana" data="alta_juntas">Alta Sala de Juntas</button>
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana" data="info_juntas">Informacion Salas de Juntas</button>
                            <button type="button" class="btn btn-default btn-lg btn-block btn_ventana" data="info_usuarios">Informacion Usuarios</button>
                        
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
            if (seccion == "alta_usuario") {
                $(".principal").load("alta_usuario.html",400)    
            }
            if (seccion == "alta_juntas") {
                $(".principal").load("alta_juntas.html",400)   
            }
            
        });
        $(document).on("click",".regresar",function(){
            $(".principal").html("")
            $(".menu").show()
        });
    </script>

</body>

</html>
