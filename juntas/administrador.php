<script>
    var device = navigator.userAgent
    if (device.match(/Iphone/i)|| device.match(/Ipod/i)|| device.match(/Android/i)|| device.match(/J2ME/i)|| device.match(/BlackBerry/i)|| device.match(/iPhone|iPad|iPod/i)|| device.match(/Opera Mini/i)|| device.match(/IEMobile/i)|| device.match(/Mobile/i)|| device.match(/Windows Phone/i)|| device.match(/windows mobile/i)|| device.match(/windows ce/i)|| device.match(/webOS/i)|| device.match(/palm/i)|| device.match(/bada/i)|| device.match(/series60/i)|| device.match(/nokia/i)|| device.match(/symbian/i)|| device.match(/HTC/i))
    { 
        window.location = "./administrador_mobil.php";

    }
    else
    {

    }
</script>


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
        padding: 70px 15px 40px 15px;
        background-color:#000;
        color:#fff;
        font-family: 'Nunito Sans', sans-serif;
    }
    .caja{
        -webkit-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
        -moz-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
        box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
        border-radius:15px; 
        font-size: 1.1em;
        font-family: 'Nunito Sans', sans-serif;
        padding: 20px

    }
    .linea{
        -webkit-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
        -moz-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
        box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
    }
    .btn_ventana{
        font-weight:bold;
    }
    .vertical{
        -webkit-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
        -moz-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
        box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
        
        width: 1px; /* Line width */
        background-color:white; /* Line color */
        height: 100%; /* Override in-line if you want specific height. */
        float: left; 
        height:300px;
        margin-right: 20px;
    }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 caja">
                <div class="row">
                    <div class="col-md-5">
                        <h3>12-21-2017</h3>
                        <h3 style="font-weight:bold">Panel de Administración - Grupo Gideas</h3>
                        <hr class="linea">
                        <button type="button" class="btn btn-default btn-lg btn-block btn_ventana" data-toggle="modal" data-target="#myModal">Alta Usuario</button>
                        <button type="button" class="btn btn-default btn-lg btn-block btn_ventana">Alta Sala de Juntas </button>
                        <button type="button" class="btn btn-default btn-lg btn-block btn_ventana">Informacion Salas de Juntas</button>
                    </div>
                    <div class="col-md-6">
                        <!--<div class="vertical"></div>-->
                    </div>          
                </div>
            </div> 
        </div> 
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document" style="margin-top:100px;"> 
        <div class="modal-content" style="background-color:black;border:1px solid white;-webkit-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);-moz-box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);
        box-shadow: 0px 0px 12px 5px rgba(0,155,219,1);margin-left:30px;margin-right:30px">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel" style="font-weight: bold;">Alta de Usuario</h4>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
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
