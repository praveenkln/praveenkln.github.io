<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require (dirname(__FILE__).'/Exception.php');
require (dirname(__FILE__).'/PHPMailer.php');
require (dirname(__FILE__).'/SMTP.php');

//Load Composer's autoloader
// require 'vendor/autoload.php';



$mail = new PHPMailer(true);
$mail->ajax = true;

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'solveitservicesinc@outlook.com';                     //SMTP username
    $mail->Password   = 'Solveit*1';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('solveitservicesinc@outlook.com', 'Contact Form');
    $mail->addAddress('hr@solveitservicesinc.com', '');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(false);                                  //Set email format to HTML
    $mail->Subject = "SolveIT Contact Form - ".$_POST['subject'];
    $mail->Body    = $_POST['email']."\r\n\r\n".$_POST['name']."\r\n".$_POST['message'];

    if($mail->send()) {
        echo 'OK';
    } else {
        echo 'Email could not be sent.';
    }
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo "Message could not be sent.";
}

?>