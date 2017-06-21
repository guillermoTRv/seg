<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administración de salas de juntas</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        padding-top: 70px;
        background-color:#3498DC;
    }
    .reloj{
        width:400px;
        height:400px;
        border-radius:50%;
        background-color:#ECF0F1;
    }
    </style>

</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container" style="margin-left: 10px">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"><span class="glyphicon glyphicon-calendar"></span> Administración Salas de juntas - Sala No.1</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!--<ul class="nav navbar-nav">
                    <li>
                        <a href="#">Ver todos los horarios</a>
                    </li>
                    <li>
                        <a href="#">Alta sala de juntas</a>
                    </li>
                    <li>
                        <a href="#">Alta Usuario</a>
                    </li>
                </ul>-->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-5" style="height: 420px;background-color" >
                    <div style="margin-left:10%;margin-right:10%;margin-top:5%">
                    <div style="width: 400px;height: 400px;background-color:#ECF0F1;margin:auto;border-radius:50%;position: absolute;">
                        <p style="position: absolute; left: 48%; top: 0%;font-size:1.4em"><strong>12</strong></p>
                        <p style="position: absolute; left: 72%; top: 6.3%;font-size:1.4em"><strong>1</strong></p>
                        <p style="position: absolute; left: 89.6%; top: 23%;font-size:1.4em"><strong>2</strong></p>                    

                        <p style="position: absolute; left: 96.4%; top: 47%;font-size:1.4em"><strong>3</strong></p>
                        <p style="position: absolute; left: 89.5%; top: 70%;font-size:1.4em"><strong>4</strong></p>
                        <p style="position: absolute; left: 72%; top: 87.7%;font-size:1.4em"><strong>5</strong></p>
        
                        <p style="position: absolute; left: 49%; top: 94%;font-size:1.4em"><strong>6</strong></p>
                        <p style="position: absolute; left: 25%; top: 87.5%;font-size:1.4em"><strong>7</strong></p>
                        <p style="position: absolute; left: 7.3%; top: 70%;font-size:1.4em"><strong>8</strong></p>
                        
                        <p style="position: absolute; left: 1%; top: 47%;font-size:1.4em"><strong>9</strong></p>
                        <p style="position: absolute; left: 6.9%; top: 23.5%;font-size:1.4em"><strong>10</strong></p>
                        <p style="position: absolute; left: 23.8%; top: 6.1%;font-size:1.4em"><strong>11</strong></p>
                        <canvas id="myCanvas" width="400" height="400">No soporta</canvas>
                    </div>
                    </div>
                    <!--<div class="reloj" style="position:absolute;">
                        <p style="position: absolute; left: 48%; top: 0%;font-size:1.4em"><strong>12</strong></p>
                        <p style="position: absolute; left: 72%; top: 6.3%;font-size:1.4em"><strong>1</strong></p>
                        <p style="position: absolute; left: 89.6%; top: 23%;font-size:1.4em"><strong>2</strong></p>                    

                        <p style="position: absolute; left: 96.4%; top: 47%;font-size:1.4em"><strong>3</strong></p>
                        <p style="position: absolute; left: 89.5%; top: 70%;font-size:1.4em"><strong>4</strong></p>
                        <p style="position: absolute; left: 72%; top: 87.7%;font-size:1.4em"><strong>5</strong></p>
            
                        <p style="position: absolute; left: 49%; top: 94%;font-size:1.4em"><strong>6</strong></p>
                        <p style="position: absolute; left: 25%; top: 87.5%;font-size:1.4em"><strong>7</strong></p>
                        <p style="position: absolute; left: 7.3%; top: 70%;font-size:1.4em"><strong>8</strong></p>
                        
                        <p style="position: absolute; left: 1%; top: 47%;font-size:1.4em"><strong>9</strong></p>
                        <p style="position: absolute; left: 6.9%; top: 23.5%;font-size:1.4em"><strong>10</strong></p>
                        <p style="position: absolute; left: 23.8%; top: 6.1%;font-size:1.4em"><strong>11</strong></p>

                        <canvas id="myCanvas" width="400" height="400">No soporta</canvas>
                    </div>-->
                
            </div>
            <div class="col-md-5 col-sm-5 col-sm-offset-1">
                <h3 style="text-align: center;color:#34495E;font-size: 1.9em;margin-bottom: 15px">Sala No.1</h3>
                
                <button type="button" class="btn btn-primary btn-lg btn-block">Agendar Sala</button>
                <button type="button" class="btn btn-primary btn-lg btn-block">Horarios de las Salas de Juntas</button>
                <button type="button" class="btn btn-primary btn-lg btn-block">Historia de Agendacion</button>
                <button type="button" class="btn btn-primary btn-lg btn-block">Modificar Agendacion</button>
            </div>
            <br><br>
        </div>
    </div>
                
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        ctx.beginPath();
        ctx.strokeStyle = "#2ECC71";
        ctx.lineWidth = 165;
        ctx.arc(200,200,99,Math.PI*(9/6),Math.PI*(10/6),false);
        ctx.stroke();
        ctx.closePath()

        ctx.beginPath();
        ctx.strokeStyle = "#84e296";
        ctx.lineWidth = 165;
        ctx.arc(200,200,99,Math.PI*(10/6),Math.PI*(11/6),false);
        ctx.stroke();
        ctx.closePath()

        ctx.beginPath();
        ctx.strokeStyle = "#f5b041";
        ctx.lineWidth = 165;
        ctx.arc(200,200,99,Math.PI*(11/6),Math.PI*(12/6),false);
        ctx.stroke();
        ctx.closePath()

        ctx.beginPath();
        ctx.strokeStyle = "#E74C3C";
        ctx.lineWidth = 165;
        ctx.arc(200,200,99,Math.PI*(12/6),Math.PI*(2/6),false);
        ctx.stroke();
        ctx.closePath()

        ctx.beginPath();
        ctx.strokeStyle = "#2ECC71";
        ctx.lineWidth = 165;
        ctx.arc(200,200,99,Math.PI*(2/6),Math.PI*(4/6),false);
        ctx.stroke();
        ctx.closePath()

        ctx.beginPath();
        ctx.strokeStyle = "#7F8C8D";
        ctx.lineWidth = 10;
        ctx.arc(200,200,191,0,Math.PI*2,false);
        ctx.stroke();
        ctx.closePath()
        


    </script>
</body>

</html>
