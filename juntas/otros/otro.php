<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../ico/style.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200" rel="stylesheet">
	<style>
	html{  
  width: 100%;
	height: 100%;
	background-color: rgba(8,8,8,1.0);
	}

	ul{
		height: 100%;
		width: 100%;
		display: block;
		margin: 0 auto;
	}

	li{
		position: absolute;
		left: 50%;
		top: 50%;
		display: block;
		background: transparent;
		border: 10px solid rgba(23,246,251, 1.0);
		border-left-color: transparent;
		border-right-color: transparent;
		border-radius: 500px;
		transition: all 0.5s ease;
	}

	li:last-child {
		position: absolute;
		left: 50%;
		top: 50%;
		z-index: 20;
		width: 200px;
		height: 100px;
		margin-left: -110px;
		margin-top: -110px;
		padding: 70px 0px 30px;
		background-color: rgba(8,8,8,1.0);
		border: 10px solid rgba(8,8,8,1.0);
		border-radius: 200px;
		text-shadow: 2px 2px 0px rgba(0,0,0,1);
		box-shadow: 0px 0px 30px rgba(23,246,251, 0.5);
		animation: pulseShadow 5s infinite linear;
	}

	li:last-child:after{
		content:'';
		border: 3px dotted rgba(22,42,43,1.0);
		border-radius: 200px;
		width: 200px;
		height: 200px;
		display: block;
		position: absolute;
		top:-3px;
		left:-3px;
		background-color: transparent;
		box-shadow: inset 0px 0px 30px rgba(0,0,0,1.0);
	}

	li:first-child{
		margin-left: -130px;
		margin-top: -130px;
		z-index: 2;
		width: 240px;
		height: 240px;
		border-width: 10px;
		animation: spinBG 5s infinite linear;
	}

	li:nth-child(2){
		margin-left: -137px;
		margin-top: -137px;
		z-index: 1;
		width: 270px;
		height: 270px;
		border-width: 2px;
		border-style: dotted;
		box-shadow: 0px 0px 20px rgba(23,246,251, .5);
		animation: spinBG2 2s infinite linear;
	}

	li:nth-child(3){
		margin-left: -150px;
		margin-top: -150px;
		z-index: 1;
		width: 296px;
		height: 296px;
		border-width: 2px;
		box-shadow: inset 0px 0px 25px rgba(23,246,251, .25);
		animation: spinBG 12s infinite linear;
	}

	li:nth-child(4){
		margin-left: -170px;
		margin-top: -170px;
		z-index: 1;
		width: 330px;
		height: 330px;
		border-width: 5px;
		border-style: solid;
		box-shadow: inset 0px 0px 25px rgba(23,246,251,1.0);
		animation: spinBG3 8s infinite linear;
	}


	/*-------------------------------------------
	 Animations
	-------------------------------------------*/
	@keyframes pulseGlow{
		0%  {text-shadow: 0px 0px 20px rgba(23,246,251, 0.75);}
		50% {text-shadow: 0px 0px 40px rgba(23,246,251, 0.5); }
		100%{text-shadow: 0px 0px 20px rgba(23,246,251, 0.75);}		
	}

	@keyframes pulseShadow{
		0%  {box-shadow: 0px 0px 30px rgba(23,246,251, 0.25);}
		50% {box-shadow: 0px 0px 30px rgba(23,246,251, 0.75);}
		100%{box-shadow: 0px 0px 30px rgba(23,246,251, 0.25);}		
	}

	@keyframes spinBG{
		0%  {transform: rotate(0deg);}
		100%{transform: rotate(360deg);}	
	}

	@keyframes spinBG2{
		0%{
			transform: rotate(360deg);
			box-shadow: 0px 0px 1px rgba(23,246,251, 0.5);
		}
		50%{
			transform: rotate(180deg);
			box-shadow: 0px 0px 20px rgba(23,246,251, 0.5);
		}
		100%{
			transform: rotate(0deg);
			box-shadow: 0px 0px 1px rgba(23,246,251, 0.5);
		}	
	}

	@keyframes spinBG3{
		0%{
			transform: rotate(180deg);
			box-shadow: 0px 0px 1px rgba(23,246,251, 0.1);
		}
		50%{
			transform: rotate(0deg);
		}
		100%{
			transform: rotate(-180deg);
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
	<ul>
	  <li></li>
	  <li></li>
	  <li></li>
	  <li></li>
	  <li></li>
	</ul>
</body>
</html>