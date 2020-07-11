<?php
require_once('PHPMailer.php');
require_once('SMTP.php');
require_once('Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sciacontact07@gmail.com';                     // SMTP username
    $mail->Password   = '123456scia';                           // SMTP password 
    $mail->Port = 587;

    $mail->setFrom('itsbk0703@gmail.com');
    $mail->addAddress('itsbk0703@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Teste de envio de email';
    $mail->Body = 'Chegou email do <strong><a href="http://localhost/scia">ErickGato</a></strong>';
    $mail->AltBody = 'Chegou o email do erick gato';

    if ($mail->send()) {
        echo "Email enviado com sucesso";
    } else {
        echo "Email não enviado";
    }
} catch (Exception $e) {
    echo "Erro ao enviar email: {$mail->ErrorInfo}";
}
