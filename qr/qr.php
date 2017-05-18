<?php 

include_once dirname(__FILE__)."/phpqrcode/qrlib.php";
 
// --- url
$url = "http://getbootstrap.com/css/?hola=hlaasa";
 
QRcode::png($url,"no.png"); 


echo "hola como estasaan";

echo "<img src='no.png'>";
?>