<?php

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
header('Content-Type: text/html; charset=utf-8');

require("Exception.php");
require("PHPMailer.php");
require("SMTP.php");

function enviar($destino, $assunto, $mensagem){
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->Host = "smtp-relay.sendinblue.com";
$mail->Port = "587"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = "site.vacinacao@gmail.com";
$mail->Password = "SMjm41ERDqhWQv8r";

$mail->From = "site.vacinacao@gmail.com";
$mail->FromName = "SVPortugal";
$mail->AddAddress($destino);
$mail->AddReplyTo("Your Reply-to Address", "Sender's Name");

$mail->CharSet = 'UTF-8';
$mail->isHTML(true);
$mail->Subject = $assunto;
$mail->Body = $mensagem;
$mail->WordWrap = 50;

if(!$mail->Send()) {
echo 'Message was not sent.';
echo 'Mailer error: ' . $mail->ErrorInfo;
exit;
} else {
echo 'Message has been sent.';
}
}
?>
