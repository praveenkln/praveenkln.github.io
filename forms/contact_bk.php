<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  */

  // Replace contact@example.com with your real receiving email address
  // include("./PHPMailer.php");

  $to = "solveitservicesinc@outlook.com";

  $subject = "SolveIT Contact Form - ".$_POST['subject'];
  $txt = $_POST['name']."\n\n".$_POST['message'];
  // $headers = "From: ".$_POST['email'];
  $headers = array(
    'From' => "hr@solveitservicesinc.com",
    'Reply-To' => $_POST['email'],
    'Cc' => 'hr@solveitservicesinc.com',
    'X-Mailer' => 'PHP/' . phpversion()
);

  $mailSent = mail($to,$subject,$txt,$headers);


  // $receiving_email_address = 'contact@example.com';

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  if($mailSent) {
    echo "OK";
  } else {
    die('Failed sending email!');
  }

  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;
  // $mail = new PHPMailer(true);
  // echo $mail;
  
  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // $contact->add_message( $_POST['message'], 'Message', 10);

  // echo $contact->send();
?>
