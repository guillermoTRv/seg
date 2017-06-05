<?php 
    include("funciones.php");
    session_start();
    if ($_SESSION['type_user'] == 'guardia' or $_SESSION['type_user'] == 'supervisor' or $_SESSION['type_user'] == 'Us-cliente') {
        #header("Location: ./");
    }
    else{
        header("Location: ./");
    }


    $type_personal_name = ucwords($_SESSION['type_user']);
    $type_personal      = $_SESSION['type_user'];
    $identificador      = $_SESSION['identificador'];

    $usuario  = $_SESSION['name_user'];
    $num_user = consulta_tx("SELECT id_usuario FROM usuarios WHERE usuario = '$usuario'","id_usuario");
    $qr       = sanitizar_get("acceso_qr");

    if ($usuario == '') {
        //header("Location: ./");
    }
    $array_jornada   = consulta_array("SELECT estado_registro,hora_entrada,inmueble FROM registros_es WHERE identificador = '$identificador' order by id_registro_es DESC");
    $estado_registro = $array_jornada['estado_registro'];
    $hora_entrada    = $array_jornada['hora_entrada'];
    $id_inmueble     = $array_jornada['inmueble'];
    $name_inmueble_j = consulta_tx("SELECT name_inmueble FROM inmuebles WHERE id_inmueble = '$id_inmueble'","name_inmueble");

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Personal <?php echo $type_personal_name ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <link rel="stylesheet" href="css/estilos_general.css">
    <link rel="stylesheet" href="ico/style.css">
    <link rel="stylesheet" href="css/estilos_clientes.css">
    <link rel="stylesheet" href="css/estilos_form.css">
    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script  type="text/javascript" src="js/jquery.js"></script>
    <script  type="text/javascript" src="js/fnxxx_personal.js"></script>
    <script  type="text/javascript" src="js/fns_tabla.js"></script>
    <script  type="text/javascript" src="js/fns_atajos.js"></script>
    <script  type="text/javascript" src="js/fns_formm.js"></script>
    <script  type="text/javascript" src="js/js.js"></script>
    <!--<link href="https://fonts.googleapis.com/css?family=Fira+Sans:300" rel="stylesheet"> -->
    <!--  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> -->
    <!--  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300" rel="stylesheet"> 
    <style>
        .blue{color:#0489B1;}
        .content{background-color:#fff;margin-top:15px}
        .info_repo{display: inline;font-size:1.1em}
        a{text-decoration: none}
        a:hover{text-decoration: none}
    </style>
    
</head>
<body style="background-color:#eee">
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="background-color:#222;padding:0px">
            
            <ul class="sidebar-nav navbar">
                <div style="margin:12px 20px 12px 12px;">
                    <img src="ico/logo_n.jpg" class="img-responsive" style="margin-right:20px">    
                </div>
                
                <hr>
                <div class="menu_pr">
                    <?php 
                        if ($type_personal == "guardia") {
                            include("vistas_principales/menu_guardia.php");    
                        }
                        if ($type_personal == "supervisor") {
                            include("vistas_principales/menu_supervisor.php");
                        }
                    ?>
                </div>
                <br>
                <p style="text-align: center;font-size:1.1em">
                <span class="label label-default" id="jaja">Control de menu: Desactivado</span>   
                </p>
                <p style="text-align: center;">
                    <a href="#" data-toggle="modal" data-target="#instruccionesModal"> 
                    <span class="label label-default" id="jaja">Instrucciones del menu</span>    
                    </a> 
                </p>
            </ul>
            
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        
        <div style="width: 100%;height:50px;background-color:white;padding-top:15px">
                <?php 
                if ($usuario == '') {
                    ?>
                        <div class="container-fluid">
                            <div class="col-md-7">
                                <p>
                                <strong>
                                    <span class="glyphicon glyphicon-calendar"></span> <?php echo $fecha ?> &nbsp;&nbsp;&nbsp;&nbsp; 
                                </strong>
                                </p>    
                            </div>
                        </div>
                    <?php
                }
                else{
                ?>    
                    <div class="container-fluid">
                        <div class="col-md-7">
                            <p>
                            <strong>
                                <span class="glyphicon glyphicon-user"></span> <?php echo $type_personal_name." ".$usuario ?> &nbsp;&nbsp;&nbsp;&nbsp; 
                                <span class="glyphicon glyphicon-calendar"></span> <?php echo $fecha ?> &nbsp;&nbsp;&nbsp;&nbsp; 
                                <!--<span class="glyphicon glyphicon-search"></span> <input type="text" style="height:25px;border-top:solid 1px #fff;border-left:solid 1px #fff;border-right:solid 1px #fff;" placeholder="buscar ...">-->
                            </strong>
                            </p>    
                        </div>
                        <div class="col-md-5">
                            <p>
                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="icon-exit"></span><a href="personal.php" class="link_black"> Vista general(g)</a> &nbsp;&nbsp;&nbsp; 
                                <span class="glyphicon glyphicon-log-out"></span><a href="logout.php" class="link_black"> Log out(esc)</a></p>       
                            </strong>
                            </p>
                        </div>
                    </div>
                <?php 
                }
                ?>
        </div>
        <div class="container-fluid" style="margin-top:30px;margin-left:50px">  
            <?php include("controlador_personal.php") ?> 
        </div>
            
    </div>
    <div class="modal fade" id="instruccionesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document" style="margin-top:100px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <p style="text-align:center;margin-left:4px;margin-right:4px;font-size:1.2em;font-weight:bold;">
                    Instrucciones para el Menu <br>
                    1-Para activar la navegacion del menu mediante el teclado, apretar la tecla ctrl, para desactivarlo pulsar ctrl nuevamente <br>
                    2-Utilice las flachas <span class="glyphicon glyphicon-arrow-up"></span> <span class="glyphicon glyphicon-arrow-down"></span> para colocarse en una opcion del menu o del submenu <br>
                    3-Utilice la tecla <span class="glyphicon glyphicon-arrow-right"></span> para abrir un submenu y la tecla <span class="glyphicon glyphicon-arrow-left"></span> para cerrar el submenu <br>
                    4-Una vez colocado en una opcion pulsar enter para abrir la nueva ventana que indica la opcion <br>
                    5-Atajos rapidos: Pulstar la tecla ctrl + la tecla que indica la opcion del menu para abrir de manera rapida la vista que indica la opcion 
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar ventana</button>
          </div>
        </div>
      </div>
    </div>
    

</body>

</html>
