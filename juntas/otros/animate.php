<html>
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
        <style>
            body {
                margin: 0;
                padding: 0;
                overflow:hidden;
                 font-family: 'Nunito Sans', sans-serif;
            }
            .example2 {
                background: green;
                background: -webkit-linear-gradient(180deg, #0BF 0%, #056 100%);
                background: -moz-linear-gradient(180deg, #0BF 0%, #056 100%);
                background: linear-gradient(180deg, #0BF 0%, #056 100%);
                width: 100%;
                height: 100%;
                overflow: hidden;
            }

            .cuadrados {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 1;
            }
            .cuadrados li {
                position: absolute;
                list-style: none;
                display: block;
                width: 40px;
                height: 40px;
                background-color: rgba(255, 255, 255, 0.15);
                bottom: -160px;
                -webkit-animation: square 25s infinite linear;
                -moz-animation: square 25s infinite linear;
                animation: square 25s infinite linear;
            }
            .cuadrados li:nth-child(1) {
                left: 10%;
            }
            .cuadrados li:nth-child(2) {
                left: 20%;
                width: 80px;
                height: 80px;
                -webkit-animation-delay: 2s;
                -moz-animation-delay: 2s;
                animation-delay: 2s;
                -webkit-animation-duration: 17s;
                -moz-animation-duration: 17s;
                animation-duration: 17s;
            }
            .cuadrados li:nth-child(3) {
                left: 25%;
                -webkit-animation-delay: 4s;
                -moz-animation-delay: 4s;
                animation-delay: 4s;
            }
            .cuadrados li:nth-child(4) {
                left: 40%;
                width: 60px;
                height: 60px;
                -webkit-animation-duration: 22s;
                -moz-animation-duration: 22s;
                animation-duration: 22s;
                background-color: rgba(255, 255, 255, 0.25);
            }
            .cuadrados li:nth-child(5) {
                left: 70%;
            }
            .cuadrados li:nth-child(6) {
                left: 80%;
                width: 120px;
                height: 120px;
                -webkit-animation-delay: 3s;
                -moz-animation-delay: 3s;
                animation-delay: 3s;
                background-color: rgba(255, 255, 255, 0.2);
            }
            .cuadrados li:nth-child(7) {
                left: 32%;
                width: 160px;
                height: 160px;
                -webkit-animation-delay: 7s;
                -moz-animation-delay: 7s;
                animation-delay: 7s;
            }
            .cuadrados li:nth-child(8) {
                left: 55%;
                width: 20px;
                height: 20px;
                -webkit-animation-delay: 15s;
                -moz-animation-delay: 15s;
                animation-delay: 15s;
                -webkit-animation-duration: 40s;
                -moz-animation-duration: 40s;
                animation-duration: 40s;
            }
            .cuadrados li:nth-child(9) {
                left: 25%;
                width: 10px;
                height: 10px;
                -webkit-animation-delay: 2s;
                -moz-animation-delay: 2s;
                animation-delay: 2s;
                -webkit-animation-duration: 40s;
                -moz-animation-duration: 40s;
                animation-duration: 40s;
                background-color: rgba(255, 255, 255, 0.3);
            }
            .cuadrados li:nth-child(10) {
                left: 90%;
                width: 160px;
                height: 160px;
                -webkit-animation-delay: 11s;
                -moz-animation-delay: 11s;
                animation-delay: 11s;
            }
            .cuadrados li:nth-child(11) {
                left: 15%;
                width: 17px;
                height: 17px;
                -webkit-animation-delay: 12s;
                -moz-animation-delay: 12s;
                animation-delay: 12s;
                -webkit-animation-duration: 40s;
                -moz-animation-duration: 40s;
                animation-duration: 40s;
                background-color: rgba(255, 255, 255, 0.5);
            }
            .cuadrados li:nth-child(12) {
                left: 20%;
                width: 5px;
                height: 5px;
                -webkit-animation-delay: 15s;
                -moz-animation-delay: 15s;
                animation-delay: 15s;
                -webkit-animation-duration: 15s;
                -moz-animation-duration: 15s;
                animation-duration: 15s;
                background-color: rgba(255, 255, 255, 0.1);
            }
            .cuadrados li:nth-child(13) {
                left: 45%;
                width: 8px;
                height: 8px;
                -webkit-animation-delay: 17s;
                -moz-animation-delay: 17s;
                animation-delay: 17s;
                -webkit-animation-duration: 29s;
                -moz-animation-duration: 29s;
                animation-duration: 29s;
                background-color: rgba(255, 255, 255, 0.3);
            }
            .cuadrados li:nth-child(14) {
                left: 50%;
                width: 120px;
                height: 120px;
                -webkit-animation-delay: 11s;
                -moz-animation-delay: 11s;
                animation-delay: 11s;
                -webkit-animation-duration: 19s;
                -moz-animation-duration: 19s;
                animation-duration: 19s;
                background-color: rgba(255, 255, 255, 0.35);
            }
            .cuadrados li:nth-child(15) {
                left: 67%;
                width: 50px;
                height: 50px;
                -webkit-animation-delay: 6s;
                -moz-animation-delay: 6s;
                animation-delay: 6s;
                -webkit-animation-duration: 12s;
                -moz-animation-duration: 12s;
                animation-duration: 12s;
                background-color: rgba(255, 255, 255, 0.5);
            }
            .cuadrados li:nth-child(16) {
                left: 75%;
                width: 20px;
                height: 20px;
                -webkit-animation-delay: 1s;
                -moz-animation-delay: 1s;
                animation-delay: 1s;
                -webkit-animation-duration: 25s;
                -moz-animation-duration: 25s;
                animation-duration: 25s;
                background-color: rgba(255, 255, 255, 0.3);
            }
            .cuadrados li:nth-child(17) {
                left: 10%;
                width: 10px;
                height: 10px;
                -webkit-animation-delay: 2s;
                -moz-animation-delay: 2s;
                animation-delay: 2s;
                -webkit-animation-duration: 20s;
                -moz-animation-duration: 20s;
                animation-duration: 20s;
                background-color: rgba(255, 255, 255, 0.45);
            }
            .cuadrados li:nth-child(18) {
                left: 55%;
                width: 10px;
                height: 10px;
                -webkit-animation-delay: 2s;
                -moz-animation-delay: 2s;
                animation-delay: 2s;
                -webkit-animation-duration: 32s;
                -moz-animation-duration: 32s;
                animation-duration: 32s;
                background-color: rgba(255, 255, 255, 0.4);
            }
            .cuadrados li:nth-child(19) {
                left: 59%;
                width: 10px;
                height: 10px;
                -webkit-animation-delay: 8s;
                -moz-animation-delay: 8s;
                animation-delay: 8s;
                -webkit-animation-duration: 15s;
                -moz-animation-duration: 15s;
                animation-duration: 15s;
                background-color: rgba(255, 255, 255, 0.4);
            }
            .cuadrados li:nth-child(20) {
                left: 5%;
                width: 15px;
                height: 15px;
                -webkit-animation-delay: 3s;
                -moz-animation-delay: 3s;
                animation-delay: 3s;
                -webkit-animation-duration: 10s;
                -moz-animation-duration: 10s;
                animation-duration: 10s;
                background-color: rgba(255, 255, 255, 0.25);
            }

            /*
            * Animaciones
            */

            @-webkit-keyframes square {
                0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
            100% {
                -webkit-transform: translateY(-100%) rotate(600deg);
                transform: translateY(-100%) rotate(600deg);
            }
            }
            @-moz-keyframes square {
                0% {
                -moz-transform: translateY(0);
                transform: translateY(0);
            }
            100% {
                -moz-transform: translateY(-100%) rotate(600deg);
                transform: translateY(-100%) rotate(600deg);
            }
            }
            @keyframes square {
                0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
            100% {
                -webkit-transform: translateY(-1500px) rotate(600deg);
                transform: translateY(-1500px) rotate(600deg);
            }
            }
            .input_blue{
                border:1px solid rgb(8,141,198);
               -webkit-box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
                -moz-box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
                box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
                        color: rgba(35,35,250,0.7);
                        font-size: 1.1em;
                        font-family: 'Nunito Sans', sans-serif;
                 

            }
            .input_blue:focus {
                         -webkit-box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
                -moz-box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
                box-shadow: 0px 0px 4px 2px rgba(0,155,219,1);
                }
            .caja{
                border:2px solid #009bdb;
                -webkit-box-shadow: 0px 0px 10px 5px rgba(61,166,255,1);
                -moz-box-shadow: 0px 0px 10px 5px rgba(61,166,255,1);
                box-shadow: 0px 0px 10px 5px rgba(61,166,255,1);
                
                padding:35px 20px 20px 20px;
                border-radius:10px;
            }
            .colores{
                background-color:green;
            }
        </style>
    </head>
    <body>

        <section class="example2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-offset-4" >
                        <img src="../ico/logoo.jpg" class="img-responsive" alt="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <!--<div class="col-md-6">
                        
                    </div>-->
                    <div class="col-md-6 col-md-offset-3 caja">
                        <form class="form-horizontal form_login" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <label class="col-sm-3 col-sm-offset-1 control-label" style="font-size:1.3em;font-weight: lighter">Usuario <span class="glyphicon glyphicon-user" style=""></span></label>
                            <div class="col-sm-6">
                              <input type="text" name="usuario_txt" class="form-control input_blue" id="usuario" autofocus autocomplete="off">
                            </div>
                          </div>
                          <div class="form-group" style="margin-top:18px">
                            <label class="col-sm-3 col-sm-offset-1 control-label" style="font-size:1.3em;font-weight: lighter">Password <span class=" icon-key"></span></label>
                            <div class="col-sm-6">
                              <input type="password" name="pass_txt" class="form-control input_blue" id="pass">
                            </div>
                          </div>
                         
                          <div class="form-group" style="margin-top:37px">
                            <div class="col-sm-offset-4 col-sm-6">
                              <button type="button" class="btn btn-default btn-block" style="border:2px solid rgb(8,141,198);font-size:1.2em">Ingresar</button>
                            </div>
                          </div>
                        </form>
                        <div class="mens"></div>  
                    </div>
                </div>
            </div>
            <ul class="cuadrados">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </section>
    </body>
</html>