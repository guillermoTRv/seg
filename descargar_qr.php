<?php
include("funciones.php");

$qr = sanitizar_get('qr');
$qr = "qr_".$qr;
header("Content-disposition: attachment; filename=$qr.png");
header('Content-type: image/jpeg ');
readfile("panel_sys/personal/personal_img/$qr.png");

?>
