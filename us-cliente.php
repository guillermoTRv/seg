<?php 
    include("funciones.php");
    include("get.php"); 
    session_start(); 
    $id_cliente   = $_SESSION['cliente'];
    $name_cliente = consulta_tx("SELECT name_cliente FROM clientes WHERE id_cliente = '$id_cliente'","name_cliente");
    if ($_SESSION['type_user'] != 'us-cliente') {
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

    <title>Nombre cliente</title>
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
    <!--<link href="https://fonts.googleapis.com/css?family=Fira+Sans:300" rel="stylesheet"> -->
    <!--  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> -->
    <!--  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300" rel="stylesheet"> 
    <style>
        .blue{color:#0489B1;}
        .content{background-color:#fff;margin-top:15px}
        .info_repo{display: inline;font-size:1.1em}
    </style>
    <script>
        $(document).keydown(function(event){
            if (event.which == 27) {  
                event.preventDefault();
                window.location.href = "logout.php";
            }


            var activo_menu = $(".activo_menu").length;
              if (event.which == 225) {
                event.preventDefault()
                if (activo_menu == 0) {
                    $("#jaja").html("Control de menu: Activado")
                    $("#jaja").addClass("activo_menu")
                    $("#jaja").removeClass("label-default")
                    $("#jaja").addClass("label-success")
                }
                if (activo_menu == 1) {
                    $("#jaja").html("Control de menu: Desactivado")
                    $("#jaja").removeClass("activo_menu")
                    $("#jaja").removeClass("label-success")
                    $("#jaja").addClass("label-default")
                    
                    $(".li_teclado .list_nav").slideUp()
                    $(".li_teclado a").css("background-color","") 
                    $(".li_teclado .list_nav").removeClass("sub_menu")
                    $(".li_sub_menu").removeClass("li_sub_menu")
                    $(".li_teclado").removeClass("li_teclado")

                }
              }

              if (activo_menu == 1) {
                  var li_teclado    = $(".li_teclado").length;
                  var sub_menu      = $(".sub_menu").length;
                  var li_sub_menu   = $(".li_sub_menu").length;
                    if (event.which==40) {  
                        
                        if (sub_menu == 0) {    
                            if (li_teclado == 0) {
                                $(".menu_pr li:first .title_a").css("background-color","rgba(255,255,255,0.2)")  
                                $(".menu_pr li:first").addClass("li_teclado");  
                            }
                            if (li_teclado == 1) {
                                var li_nextt = $(".li_teclado").next()
                                $(".li_teclado a").css("background-color","")
                                $(".li_teclado").removeClass("li_teclado")  
                                li_nextt.addClass("li_teclado")
                                li_nextt.children("a").css("background-color","rgba(255,255,255,0.2)")  
                            }
                        }
                        if (sub_menu == 1) {
                            if (li_sub_menu == 0) {
                                $(".li_teclado .list_nav li:first a").css("background-color","rgba(255,255,255,0.2)")  
                                $(".li_teclado .list_nav li:first").addClass("li_sub_menu")
                            }
                            if (li_sub_menu == 1) {
                                var li_sub_nextt = $(".li_sub_menu").next()
                                $(".li_sub_menu a").css("background-color","")
                                $(".li_sub_menu").removeClass("li_sub_menu")  
                                li_sub_nextt.addClass("li_sub_menu")
                                li_sub_nextt.children("a").css("background-color","rgba(255,255,255,0.2)")  
                            }
                        }    
                    
                    }
                    if (event.which == 38) {
                        if (sub_menu == 0) {
                            if (li_teclado == 0) {
                                $(".menu_pr li:last .title_a").css("background-color","rgba(255,255,255,0.2)")  
                                $(".menu_pr li:last").addClass("li_teclado");  
                            }
                            if (li_teclado == 1) {
                                var li_prevv = $(".li_teclado").prev()
                                $(".li_teclado a").css("background-color","")
                                $(".li_teclado").removeClass("li_teclado")  
                                li_prevv.addClass("li_teclado")
                                li_prevv.children("a").css("background-color","rgba(255,255,255,0.2)")  
                            }
                        }
                        if (sub_menu ==1) {
                            if (li_sub_menu == 0) {
                                $(".li_teclado .list_nav li:last a").css("background-color","rgba(255,255,255,0.2)")  
                                $(".li_teclado .list_nav li:last").addClass("li_sub_menu")
                            }
                            if (li_sub_menu == 1) {
                                var li_sub_prevv = $(".li_sub_menu").prev()
                                $(".li_sub_menu a").css("background-color","")
                                $(".li_sub_menu").removeClass("li_sub_menu")  
                                li_sub_prevv.addClass("li_sub_menu")
                                li_sub_prevv.children("a").css("background-color","rgba(255,255,255,0.2)")  
                            }
                        }
                    }
                    if (event.which == 39 && li_teclado == 1) {
                        $(".li_teclado .list_nav").slideDown()
                        $(".li_teclado .list_nav").addClass("sub_menu")
                    }
                    if (event.which == 37 && li_teclado == 1) {
                        $(".li_teclado .list_nav").slideUp()
                        $(".li_teclado .list_nav").removeClass("sub_menu")
                        $(".li_sub_menu").removeClass("li_sub_menu")
                    }
                    if (li_teclado == 1 && li_sub_menu == 0) {
                        if (event.which == 13) {
                            var url_li = $(".li_teclado .title_a").attr("data")
                            window.location.href = url_li;

                        }
                    }
                    if (li_teclado == 1 && li_sub_menu == 1) {
                        if (event.which == 13) {
                            var url_li = $(".li_sub_menu a").attr("href")
                            window.location.href = url_li;
                        }
                    }
                    
              }
        });   

        $(document).ready(function(){
           
           $(this).on("keydown",function(e){
              e.cancelBubble = true;
              console.log(e.keyCode);
              if(e.ctrlKey && e.keyCode==80){
                 e.preventDefault();
                 window.location.href = "cliente.php?pr=listado";
              }
              if(e.ctrlKey && e.keyCode==73){
                 e.preventDefault();
                 window.location.href = "cliente.php?inm=listado";
              }
              if(e.ctrlKey && e.keyCode==617){
                 e.preventDefault();
                 window.location.href = "cliente.php?ck=listado";
              }
              if(e.ctrlKey && e.keyCode==83){
                 e.preventDefault();
                 window.location.href = "cliente.php?cos=listado";
              }
              if(e.ctrlKey && e.keyCode==82){
                 e.preventDefault();
                 window.location.href = "cliente.php?rep=listado";
              }
              if(e.ctrlKey && e.keyCode==77){
                 e.preventDefault();
                 window.location.href = "menu_inicial.php";
              }
              if(e.ctrlKey && e.keyCode==71){
                 e.preventDefault();
                 window.location.href = "cliente.php";
              }
              /**if(e.shiftKey && e.keyCode==80){
                 e.preventDefault();
                 window.location.href = "asasf.php";
              }**/
              
           });
        });

        $(document).ready(function() {
            $(".li_nav").click(function(event){
                var control_slc  = $(".slc").length
                if (control_slc == 0) {
                    $(this).find('.list_nav').slideDown();
                    $(this).find('.list_nav').addClass("slc")
                    $(this).find('.title_a').css({"background-color": "rgba(255,255,255,0.2)", "color": "#fff"})
                }
                if (control_slc == 1) {
                    var control_slcN = $(".slc").prev().html()
                    var control_comp = $(this).find('a').html()

                    if (control_slcN == control_comp) {
                        $(this).find('.list_nav').slideUp(); 
                        $(this).find('.slc').prev().css({"background-color": "", "color": "#fff"})
                        $(this).find('.list_nav').removeClass("slc") 
                    }
                    else{
                        $('.slc').slideUp(200); 
                        $('.slc').prev().css({"background-color": "", "color": "#fff"})
                        $('.slc').removeClass("slc");
                        $(this).find('.list_nav').slideDown(70);
                        $(this).find('.list_nav').addClass("slc");
                        $(this).find('.title_a').css({"background-color": "rgba(255,255,255,0.2)", "color": "#fff"})
                    }
     
                }
            });
        });
    </script>

    
</head>
<style>
        body{


            /**font-family: 'Fira Sans', sans-serif;*/
            
            /*font-family: 'Quicksand', sans-serif;*/
        
            /*font-family: 'Open Sans', sans-serif;*/

            /*font-family: 'Nunito Sans', sans-serif;*/
            
        }
        a{text-decoration: none}
        a:hover{text-decoration: none}
</style>
<body style="background-color:#eee">
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="background-color:#222;padding:0px">
            
            <ul class="sidebar-nav navbar">
                <?php include("vistas_principales/logo_empresa.php"); ?>
                
                <hr>

                <div class="menu_pr">
                    <li class="li_nav">
                        <a class="title_a" data="?pr=listado"><span class="icon-users"></span> Personal (p)</a>
                        <ul class="list_nav">
                            <li><a href="?pr=listado">Listado del personal</a> </li>
                            <li><a href="?pr=costos_personal">Costos personal</a></li>
                            <!--<li><a href="?pr=horarios">Administacion de horarios</a></li>-->
                        </ul>
                    </li>
                    <li class="li_nav">
                        <a  class="title_a" data="?inm=listado"><span class="icon-office"></span> Inmuebles (i)</a>
                        <ul class="list_nav">
                            <li><a href="?inm=listado">Listado de inmuebles</a> </li>
                        </ul>
                    </li>
                    <li class="li_nav">
                        <a class="title_a" data="?ck=listado"><span class="icon-clipboard"></span> Checklist y controles (c)</a>
                        <ul class="list_nav">
                            <li><a href="?ck=listado">Listado checklist</a> </li>
                            <li><a href="?ck=alta">Alta checklist</a> </li>
                            <li><a href="?ck=baja">Baja checklist</a> </li>
                        </ul>
                    </li>
                    <li class="li_nav">
                        <a class="title_a" data="?rep=todos"><span class="icon-table"></span> Manejo de reportes (r)</a>
                        <ul class="list_nav">
                            <li><a href="?rep=todos">Todos los reportes</a> </li>
                            <li><a href="?rep=general">Reportes en general</a> </li>
                            <li><a href="?rep=personal">Reportes del personal</a> </li>
                            <!--<li><a href="?rep=personal">Reportes individuales <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; del personal</a> </li>
                            <li><a href="?rep=inmuebles">Reportes de incidentes <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; en general</a> </li>
                            <li><a href="?rep=inmuebles">Reportes de incidentes <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; por inmueble</a> </li>-->
                            <li><a href="?rep=costos">Historial de reportes</a> </li>
                        </ul>
                    </li>
                    <li class="li_nav">
                        <a href="./cliente.php" class="title_a" data="./cliente.php"><span class="icon-exit"></span> Vista general</a>
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
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        
        <div style="width: 100%;height:50px;background-color:white;padding-top:15px">
                    <div class="container-fluid">
                        <div class="col-md-7">
                            <p>
                            <strong>
                                <span class="glyphicon glyphicon-user"></span> Usuario Tipo Cliente &nbsp;&nbsp;&nbsp;&nbsp; 
                                <span class="glyphicon glyphicon-calendar"></span> <?php echo $fecha ?> &nbsp;&nbsp;&nbsp;&nbsp; 
                                <!--<span class="glyphicon glyphicon-search"></span> <input type="text" style="height:25px;border-top:solid 1px #fff;border-left:solid 1px #fff;border-right:solid 1px #fff;" placeholder="buscar ...">-->
                            </strong>
                            </p>    
                        </div>
                        <div class="col-md-5">
                            <p>
                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="icon-exit"></span><a href="cliente.php" class="link_black"> Vista general(g)</a> &nbsp;&nbsp;&nbsp; 
                                <span class="glyphicon glyphicon-list-alt"></span><a href="menu_inicial.php" class="link_black"> Regresar al menu(m) &nbsp;&nbsp;</a> 
                                <span class="glyphicon glyphicon-log-out"></span><a href="logout.php" class="link_black"> Log out(esc)</a></p>       
                            </strong>
                            </p>
                        </div>
                         
                    </div>
        </div>
        <div class="container-fluid" style="margin-top:30px;margin-left:50px">  
            <?php include("controlador.php") ?> 
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
