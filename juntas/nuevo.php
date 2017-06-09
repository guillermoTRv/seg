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

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200i" rel="stylesheet">
    <style>
    body 
    {
        padding-top: 70px;
        background-color:#000;
        color:#fff;
        font-family: 'Nunito Sans', sans-serif;
    }
    .input_blue{
        -webkit-box-shadow: 0px 0px 5px 2px rgba(35,35,250,0.7);
        -moz-box-shadow: 0px 0px 5px 2px rgba(35,35,250,0.7);
        box-shadow: 0px 0px 5px 2px rgba(35,35,250,0.7);
        color: rgba(35,35,250,0.7);
        font-size: 1.1em;
        font-family: 'Nunito Sans', sans-serif;
    }
    </style>

</head>

<body>
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
            <div class="col-md-6 col-md-offset-3" style="border:1px solid #fff;padding:35px 20px 20px 20px;border-radius:10px;">
                <form class="form-horizontal form_login" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-sm-3 col-sm-offset-1 control-label" style="font-size:1.2em">Usuario <span class="glyphicon glyphicon-user" style=""></span></label>
                    <div class="col-sm-6">
                      <input type="text" name="usuario_txt" class="form-control input_blue" autofocus autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 col-sm-offset-1 control-label" style="font-size:1.2em">Password <span class=" icon-key"></span></label>
                    <div class="col-sm-6">
                      <input type="password" name="pass_txt" class="form-control input_blue" required>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10">
                      <button type="button" class="btn btn-default btn_login">Ingresar</button>
                    </div>
                  </div>
                </form>
                <div class="mens"></div>  
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(".btn_login").click(function(){
            var url="process_login.php";
            //$(".btn_login").prop("disabled",true)
            $.ajax({
                type:"POST",
                url:url,
                data:$(".form_login").serialize(),

                success:function(data){
                    $(".mens").html(data)
                  
                }
            });
            return false;
        });
    </script>

</body>

</html>
