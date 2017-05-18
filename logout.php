<?php 
	session_start();
	session_unset();
	session_destroy();
	header("Location:$ruta");
	header("Location: index.php")
 ?>