<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function sendVerificationEmail($to, $subject, $message) {
    $_A = new PHPMailer(true);
    try {
        $_A->isSMTP();
        $_A->Host = 'smtp-mail.outlook.com';
        $_A->SMTPAuth = true;
        $_A->Username = 'novenoseguridad@outlook.es';
        $_A->Password = 'seguridad123';
        $_A->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $_A->Port = 587;

        $_A->setFrom('novenoseguridad@outlook.es', 'Mailer');
        $_A->addAddress($to);

        $_A->isHTML(true);
        $_A->Subject = $subject;
        $_A->Body = $message;
        $_A->AltBody = strip_tags($message);

        $_A->send();
        return true;
    } catch (Exception $_B) {
        error_log("Mailer Error: {$_A->ErrorInfo}");
        return false;
    }
}
?>
