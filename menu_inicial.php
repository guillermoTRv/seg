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
    <title>Menu inicial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/estilos_general.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300" rel="stylesheet"> 
    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script  type="text/javascript" src="js/jquery.js"></script>
    <script  type="text/javascript" src="js/fns_menu.js"></script>
</head>

<body>
    <div id="wrapper">
        <div id="sidebar-wrapper" style="background-color:#222;padding:0px">
            
            <ul class="sidebar-nav">
                <div style="margin:12px 20px 12px 12px;">
                    <img src="ico/logo_n.jpg" class="img-responsive" style="margin-right:20px">    
                </div>
                <hr>
            </ul>
        </div>
        <?php 
            include("vistas_principales/nav_datos.php");
        ?>
        <div class="container">   
                 <div style="margin-top:20px">
                        <div class="row">
                          <p style="margin-left:20px">##Utilizar las teclas de navegación <span class="glyphicon glyphicon-arrow-up"></span> <span class=" glyphicon glyphicon-arrow-down"></span></p>
                          <div class="col-md-10" id="clientes">
                                
                                <!--<a href="process_cliente.php?cl=0" class="link_black">
                                    <div class="panel-body panel_cl">
                                         <h4>Información en general todos los clientes</h4> 
                                    </div>    
                                </a>-->
                                <?php 
                                    $q_clientes =  mysqli_query($q_sec,"SELECT * FROM clientes order by id_cliente asc");
                                    while ($array = mysqli_fetch_array($q_clientes)) {
                                           $id_cliente   = $array['id_cliente'];
                                           $name_cliente = $array['name_cliente'];
                                           echo "
                                                <a href='process_cliente.php?cl=$id_cliente' class='link_black'>
                                                    <div class='panel-body panel_cl'>
                                                        <h4>$name_cliente</h4>
                                                    </div>    
                                                </a>
                                           ";
                                    }
                                ?>
                          </div>  
                        </div>
                </div>
        </div>
            
    </div>
    

</body>

</html>
