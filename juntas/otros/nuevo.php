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
        padding-top: 70px;
        background-color:#000;
        color:#fff;
        font-family: 'Nunito Sans', sans-serif;
        padding-left:20px;
        padding-right:20px;
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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(".btn_login").click(function(){
            if ($("#usuario").val() != '' && $("#pass").val() != '') {
                var url="process_login.php";
                $(".btn_login").prop("disabled",true)
                $.ajax({
                    type:"POST",
                    url:url,
                    data:$(".form_login").serialize(),

                    success:function(data){
                        $(".mens").html(data)
                      
                    }
                });
                return false;
            }
            else{
                alert("Llene los campos del formulario")
                $(".btn_login").prop("disabled",false)
            }
        });
        
    </script>

</body>

</html>
