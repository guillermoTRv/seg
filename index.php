<!DOCTYPE html>
<html lang="es">

    <head><meta charset="utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Security System </title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/form_login.css">
        <link rel="stylesheet" href="css/estilo_login.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/fns_login.js"></script>

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4 form-box">
                            <div class="form-top">
                                
                                <div class="form-top-left">
                                    <p>Ingrese su nombre de usuario y su contraseña</p>
                                </div>
                                <div class="form-top-right">
                                    <p style="font-size:.8em"><span class="glyphicon glyphicon-user"></span></p>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form"  method="post" enctype="multipart/form-data" class="login-form" id="form_login">
                                    <div class="form-group">
                                        <input type="text" name="user_txt" placeholder="Nombre de usuario" class="form-username form-control" id="1" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pass_txt" placeholder="Contraseña" class="form-password form-control" id="2">
                                    </div>
                                    
                                    <button type="button" class="btn" id="btn_login">Ingresar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <center>
                    <div id="mensaje_login" style="width:361px;margin-top:20px;">
                    </div>
                </center>
            </div>
            
        </div>

    </body>

</html>

