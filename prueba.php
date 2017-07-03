<?php
header("Access-Control-Allow-Origin: *");
$choice =$_POST["button"];
$cars = array('Honde', 'BMW' , 'Ferrari');
$bikes = array('Ducaite', 'Royal Enfield' , 'Harley Davidso');
if($choice == 'cars') print json_encode($cars);
else print json_encode($bikes); ?>