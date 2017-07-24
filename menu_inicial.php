 <?php 
    include("funciones.php"); 
    session_start();
    if ($_SESSION['type_user'] != 'admi') {
        header("Location: ./");
    }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="ico/favicon.png">
    <title>Menu inicial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/estilos_general.css" rel="stylesheet">

    <link rel="stylesheet" href="ico/style.css">
    <link rel="stylesheet" href="css/estilos_clientes.css">


    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300" rel="stylesheet"> 
    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script  type="text/javascript" src="js/jquery.js"></script>
    <script  type="text/javascript" src="js/fns_menu.js"></script>
    <script  type="text/javascript" src="js/fnxxx_personal.js"></script>
    <script  type="text/javascript" src="js/js.js"></script>
    <script  type="text/javascript" src="js/estados.js"></script>
</head>

<body>
    <div id="wrapper">
        <div id="sidebar-wrapper" style="background-color:#222;padding:0px">
            
            <ul class="sidebar-nav">
                <?php include("vistas_principales/logo_empresa.php"); ?>
                <hr>
                <div class="menu_pr">
                    <li class="li_nav">
                        <a class="title_a" href="./menu_inicial.php" data="./menu_inicial.php"><span class="icon-library"></span> Vista Clientes</a>
                    </li> 
                    <li class="nav">
                        <a class="title_a" href="?cont=listado" data="?cont=listado"><span class=" icon-list2"></span> Listado Clientes</a>
                    </li>
                    <li class="nav">
                        <a class="title_a" href="?cont=alta" data="?cont=alta"><span class=" icon-upload3"></span> Alta Clientes</a>
                    </li>
                    <li class="nav">
                        <a class="title_a" href="?cont=lista_modificar" data="?cont=lista_modificar"><span class="icon-cogs"></span> Modificar Clientes</a>
                    </li>
                    <li class="nav">
                        <a class="title_a" href="?cont=lista_eliminar" data="?cont=lista_eliminar"><span class=" icon-cancel-circle"></span> Baja Clientes</a>
                    </li>
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
        <?php 
            include("vistas_principales/nav_datos.php");
        ?>
        <div class="container-fluid" style="margin-top:30px;margin-left:50px">  
            <?php include("controlador_menu_inicial.php"); ?>  
        </div>
    </div>
    

</body>

</html>
