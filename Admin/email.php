<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'packages/PHPMailer/src/Exception.php';
require 'packages/PHPMailer/src/PHPMailer.php';
require 'packages/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.tuscanalesdetv.me';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ejemplouccismtp@gmail.com';                     //SMTP username
    $mail->Password   = 'Ucci*123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ejemplouccismtp@gmail.com', 'DeliveryApp');
    $mail->addAddress($_POST['email']);     //Add a recipient
    $mail->addReplyTo('ejemplouccismtp@gmail.com', 'Information');


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = ''.$_POST['nombres'].' Bienvenido al sitio web DeliveryApp';
    $mail->Body    = 'Muchas gracias '.$_POST['nombres'].' por <b>registrarte!</b>';

    $mail->send();
    echo 'Correo Enviado';
} catch (Exception $e) {
    echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
}


?>