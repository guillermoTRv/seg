<?php 
	include("PHPMailer-master/class.phpmailer.php");
$mail = new PHPMailer();
$mail->Host = 'vm19.digitalserver.org';

$mail->From = 'cesar.olivares@multiproseg.com';
$mail->FromName = 'Nombre del Remitente';
$mail->Subject = 'Subject del correo';
$mail->AddAddress('reportes@multiproseg.com','Nombre 01');

$body = 'Hola 
';
$body .= 'probando Reportes.

';
$body .= 'Saludos';
$mail->Body = $body;
$mail->AltBody = 'Hola amigo\nprobando PHPMailer\n\nSaludos';
$mail->AddAttachment('sarchivo.xlsx', 'sarchivo.xlsx');

if ($mail->Send()) {
	echo "string";
}

?>