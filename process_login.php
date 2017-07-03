<?php
	include("funciones.php");
	$usuario = sanitizar("user_txt");
	$pass    = sanitizar("pass_txt");
	session_start();
	if ($usuario == '' or $pass =='') {
		echo "<p>Llene todos los campos del formulario</p>";
	}
	else{
		if ($usuario == "admin") {
			if ($pass == "123qwe") {
				
				$_SESSION['type_user'] = "admi";
				
				?><script>window.location.href = "menu_inicial.php";</script> <?php	
			}
			else{
				echo "<p>Usuario o contraseña incorrectos</p>";  
			}
		}
		else{
			$consulta_val = consulta_val("SELECT null FROM usuarios WHERE usuario = '$usuario'");
			if ($consulta_val == 1) {
				$array = consulta_array("SELECT puesto,pass_xc,identificador FROM usuarios WHERE usuario = '$usuario'","puesto");
				$puesto        = $array['puesto'];
				$pass_xc       = $array['pass_xc'];
				$identificador = $array['identificador'];
				if ($puesto == "supervisor") {
					if ($pass == $pass_xc) {
						$_SESSION['type_user'] = "supervisor";
						$_SESSION['name_user'] = $usuario;
						$_SESSION['identificador'] = $identificador;
						$_SESSION['supervisor'] = "supervisor";
						?><script>window.location.href = "personal.php";</script> <?php
					}
					else{
						echo "<p>Usuario o contraseña incorrectos</p>";
					}
				}
				if ($puesto == "guardia") {
					if ($pass == $pass_xc) {
						$_SESSION['type_user'] = "guardia";
						$_SESSION['name_user'] = $usuario;
						$_SESSION['identificador'] = $identificador;
						$_SESSION['checklist']     = "no-elaborado";
						?><script>window.location.href = "personal.php";</script> <?php
					}
					else{
						echo "<p>Usuario o contraseña incorrectos</p>";
					}
				}
				if ($puesto == "Us-cliente") {
					$_SESSION['type_user'] = "us-cliente";
					$_SESSION['name_user'] = $usuario;
					$_SESSION['identificador'] = $identificador;
					?><script>window.location.href = "us-cliente.php";</script> <?php
				}

			}
			else{
				echo "<p>Usuario o contraseña incorrectos</p>";  
			}
		}
	}
?>