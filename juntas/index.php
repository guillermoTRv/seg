<!doctype html>
<html lang="es" class="no-js">
<head>
  <meta charset="UTF-8" />
  <title>Administrador Juntas Goter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="../ico/style.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200" rel="stylesheet">
  <!-- remember, jQuery is completely optional -->
  <!-- <script type='text/javascript' src='js/jquery-1.11.1.min.js'></script> -->
  <script type='text/javascript' src='js/jquery.particleground.js'></script>
  <script type='text/javascript' src='js/demo.js'></script>
  
  <style>
    body 
    {
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
        color: rgba(0,155,219,1);
        font-size: 1.14em;
        font-family: 'Nunito Sans', sans-serif;
        font-weight:bold;

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

<div id="particles">
  <div id="intro" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="padding:30px">
                <img src="../ico/logoo.jpg" class="img-responsive" alt="" style="border-radius:40px">
            </div>
        </div>
        <br>
        <div class="row">
            <!--<div class="col-md-6">
                
            </div>-->
            <div class="col-md-6 col-md-offset-3 caja">
                <form class="form-horizontal form_login" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-sm-3 col-sm-offset-1 control-label" style="font-size:1.3em;font-weight: lighter">Usuario <span class="icon-user-tie" style=""></span></label>
                    <div class="col-sm-6">
                      <input type="text" name="usuario_txt" class="form-control input_blue" id="usuario" autofocus autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group" style="margin-top:18px">
                    <label class="col-sm-3 col-sm-offset-1 control-label" style="font-size:1.3em;font-weight: lighter">Password <span class="  icon-lock"></span></label>
                    <div class="col-sm-6">
                      <input type="password" name="pass_txt" class="form-control input_blue" id="pass">
                    </div>
                  </div>
                 
                  <div class="form-group" style="margin-top:37px;margin-bottom:20px">
                    <div class="col-sm-offset-4 col-sm-6">
                      <button type="button" class="btn btn-default btn-block btn_login" style="border:2px solid rgb(8,141,198);font-size:1.2em;font-weight:bold;">Ingresar</button>
                       <div class="mens" style="font-size:1.1em;font-weight: bold;"></div>  
                    </div>
                  </div>

                </form>
               
            </div>
        </div>
    </div>
  </div>
</div>
<script src="../js/jquery.js"></script>
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
                        $(".mens").html("<br>"+data)
                        $(".btn_login").prop("disabled",false)
                      
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
