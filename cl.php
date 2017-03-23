<?php include("funciones.php");include("get.php"); session_start();?>
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

    <link rel="stylesheet" href="css/simple-sidebar.css">
    <link rel="stylesheet" href="ico/style.css">
    <link rel="stylesheet" href="css/style_clientes.css">
    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script  type="text/javascript" src="js/fns_personal.js"></script>
    <!--<link href="https://fonts.googleapis.com/css?family=Fira+Sans:300" rel="stylesheet"> -->
    <!--  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> -->
    <!--  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300" rel="stylesheet"> 
    <script>

    $(document).keydown(function(event){
        if (event.which == 80) {
            window.location.href = "clientes.php?pr=principal";
        }
        if (event.which == 73) {
            window.location.href = "clientes.php?inm=principal";
        }
        if (event.which == 67) {
            window.location.href = "clientes.php?ck=principal";
        }
        if (event.which == 83) {
            window.location.href = "clientes.php?cos=principal";
        }
        if (event.which == 82) {
            window.location.href = "clientes.php?rep=principal";
        }
        if (event.which == 77) {
            window.location.href = "menu_inicial.php";
        }
        if (event.which == 71  ) {
            window.location.href = "clientes.php";
        } 
        if (event.which == 27) {  
            event.preventDefault();
            window.location.href = "logout.php";
        }
    });    
       $(document).ready(function() {
          $(".li_nav").hover(
            function() {
              $(this).find('.list_nav').slideDown();
            },
            function() {
              $(this).find('.list_nav').slideUp();
            });
        });
    </script>

    
</head>
<style>
        a{text-decoration: none}
        a:hover{text-decoration: none}
        body{

            /**font-family: 'Fira Sans', sans-serif;*/
            
            /*font-family: 'Quicksand', sans-serif;*/
        
            /*font-family: 'Open Sans', sans-serif;*/

            font-family: 'Nunito Sans', sans-serif;
            
        }
        p{font-size:.93em}

        .select_tr{
            background-color:#dff0d8;
        }
</style>
<body style="background-color:#eee">
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="background-color:#222;padding:0px">
            
            <ul class="sidebar-nav navbar">
                <h2 style="color:white;margin-left:5px;font-weight: lighter">EMPRESA S.A C.V</h2>
                <hr>
                <li>
                    <a href="">Persona</a>
                </li>
                <li class="li_nav">
                    <a href="?pr=principal" class="title_a"><span class="icon-users"></span> Personal (p)</a>
                    <ul class="list_nav">
                        <li><a href="">Alta personal</a></li>
                        <li><a href="">Baja personal</a> </li>
                        <li><a href="">Administacion de horarios</a> </li>
                        <li><a href="">Listado del personal</a> </li>
                    </ul>
                </li>
                <li class="li_nav">
                    <a href="?inm=principal" class="title_a"><span class="icon-office"></span> Inmuebles (i)</a>
                    <ul class="list_nav">
                        <li><a href="">Alta inmueble</a> </li>
                        <li><a href="">Baja inmueble</a> </li>
                        <li><a href="">Listado del personal</a> </li>
                    </ul>
                </li>
                <li class="li_nav">
                    <a href="?ck=principal" class="title_a"><span class="icon-clipboard"></span> Checklist y controles (c)</a>
                    <ul class="list_nav">
                        <li><a href="">Alta checklist</a> </li>
                        <li><a href="">Baja checklist</a> </li>
                        <li><a href="">Listado checklist</a> </li>
                        <li><a href="">Estado checklist</a></li>
                    </ul>
                </li>
                <li class="li_nav">
                    <a href="?rep=principal" class="title_a"><span class="icon-table"></span> Manejo de reportes (r)</a>
                    <ul class="list_nav">
                        <li><a href="">Reportes en general</a> </li>
                        <li><a href="">Reportes de personal</a> </li>
                        <li><a href="">Reportes inmuebles</a> </li>
                        <li><a href="">Reportes costos</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="?cos=principal" class="title_a"><span class="icon-coin-dollar"></span> Costos y servicios (s)</a>
                </li>
                
            </ul>
        </div>
      
    </div>
    

</body>

</html>
