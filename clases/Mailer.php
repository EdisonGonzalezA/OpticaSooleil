<?php

/**
 * Clase para envio de correo electrónico
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public function enviarEmail($email, $asunto, $cuerpo)
    {
        require_once __DIR__ . '/../config/config.php';
        require  __DIR__ . '/../phpmailer/src/PHPMailer.php';
        require  __DIR__ . '/../phpmailer/src/SMTP.php';
        require  __DIR__ . '/../phpmailer/src/Exception.php';

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug =  SMTP::DEBUG_SERVER;         //SMTP::DEBUG_OFF;     o       SMTP::DEBUG_SERVER;     
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'edisongonzalezalberca1@gmail.com';
            $mail->Password   = 'xhkb hmzo gqre vfse';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  //PHPMailer::ENCRYPTION_SMTPS;  o     PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;               //PORT  465 o 587
            $mail->setLanguage('es');


            //Correo emisor y nombre
            $mail->setFrom(MAIL_USER, 'Optica Sooleil');
            //Correo receptor y nombre
            $mail->addAddress($email);

            //Contenido
            $mail->isHTML(true);   //Establecer el formato de correo electrónico en HTML
            $mail->Subject = $asunto; //Titulo del correo

            //Cuerpo del correo
            $mail->Body = mb_convert_encoding($cuerpo, 'ISO-8859-1', 'UTF-8');
            //$mail->setLanguage('es', '../phpmailer/language/phpmailer.lang-es.php');

            //Enviar correo
            return $mail->send();
        } catch (Exception $e) {
            echo "No se pudo enviar el mensaje. Error de envío: {$mail->ErrorInfo}";
            return false;
        }
    }
}
