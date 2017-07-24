<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Logeo</title>
  <link rel="stylesheet" href="ico/style.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="ico/favicon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300" rel="stylesheet"> 
  <style>
  	body{font-family: 'Nunito Sans', sans-serif;}
  </style>
</head>

<body>
  <div style="height: 70px;">
  	<canvas id="c"></canvas>	
  </div>
  <div class="row">
  	<div  class="col-xs-10 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4 caja_uno" style="color:white;background:rgba(110,110,110,.4);padding:17px 24px 17px 24px;border-radius:10px">
  		<p style="display: inline-block;font-size:3.2em;color: #BDBDBD"><span class="icon-user-tie"></span></p>
		<h3 style="display: inline-block;font-weight:extra-lighter">Ingrese su nombre de usuario <br> y su contraseña</h3>
  		<form class="login-form" id="form_login" method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		    <input type="text" name="user_txt" class="form-control input-lg form-username" placeholder="Nombre de usuario" id="1">
		  </div>
		  <div class="form-group">
		    <input type="password" name="pass_txt" class="form-control input-lg form-password" id="exampleInputPassword1" placeholder="Contraseña" id="2">
		  </div>
		  <button type="button" class="btn btn-default btn-lg btn-block" id="btn_login" style="background-color:#FE2E2E;border:1px #FE2E2E solid;color:white">Ingresar</button><br>
		</form>	

		<div id="mensaje_login" style="text-align:center;">
        </div>

  	</div>

  	<div class="col-xs-10 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4 caja_two" style="color:white;background:rgba(110,110,110,.4);padding:17px 24px 17px 24px;border-radius:10px;margin-top:20px">
  		<img src="ico/logo_n.jpg" class="img-responsive" alt="">	
  	</div>
  </div>
	
<!--
  Move your mouse to controll the larger green particle!
-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/stats.js/r11/Stats.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/188512/MousePositionMonitor.js'></script>
<script src="js/index.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
	$(document).on("click","#btn_login",function(){
		var url="process_login.php";
        $.ajax({
            type:"POST",
            url:url,
            data:$("#form_login").serialize(),
            success:function(data){
                $("#mensaje_login").html(data);     
              
            }
        });
        return false;
	})

	$(document).keydown(function(event){
	        var resultado = parseInt(document.activeElement.id);
	        if(event.which == 13 || event.which == 40){        
	            var cambio = resultado + 1;
	            $("#"+cambio).focus(); 
	        }
	        if(event.which == 38){        
	            var cambio = resultado -1; 
	            $("#"+cambio).focus(); 
	        }

	        var input_uno = $("#1").val();
	        var input_dos = $("#2").val();

	        if (input_uno != '' && input_dos!='') {
	            if (event.which == 13) {
	                ajax_login()
	            }
	        }
	});
	$(document).ready(function(){
		var alto =  parseInt((window.innerHeight));	
		var row  =  parseInt($(".row").height())
		var suma = row+100;
		if (suma> alto) {
			$(".caja_two").hide()
			var nuevo_row = parseInt($(".row").height())
			var espacio = ((alto-nuevo_row)/2)-76
			$(".row").css("margin-top",""+espacio+"px");
		}
		else{
			var espacio = ((alto-row)/2)-76
			$(".row").css("margin-top",""+espacio+"px");	
		}

		/**
		var caja_uno = parseInt($(".caja_uno").height())
		var caja_two = parseInt($(".caja_two").height())
		var suma = caja_two+caja_uno+165;
		if (suma>alto) {
			$(".caja_two").hide()
			var espacio = (alto-caja_uno)/2
			alert(alto+"-"+caja_uno+"-"+espacio)
			$(".row").css({"margin-top":""+espacio+"","margin-bottom":""+espacio+""});
		}
		else{
			alert(alto+"-"+caja_uno+"-"+caja_two+"-"+suma)	
		}**/
	})
	
</script>


</body>
</html>
