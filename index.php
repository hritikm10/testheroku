<?php
  echo "Hritik";
require("vendor/autoload.php");
require_once("php-mailer/PHPMailer.php");
require_once("php-mailer/SMTP.php");
require_once("php-mailer/Exception.php");
use PHPMailer\PHPMailer\PHPMailer;

// Passing true enables exceptions.
$phpmailer = new PHPMailer(true);
try {
  echo "in try";  // Configure SMTP
  $phpmailer->isSMTP();
  $phpmailer->SMTPAuth = true;
  $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

  // ENV Credentials
  $phpmailer->Host = "smtp.gmail.com";
  $phpmailer->Port = "587";
  $phpmailer->Username = "phpassignmail@gmail.com";
  $phpmailer->Password = "php1123!!";
//   $mailertogo_domain = getenv("MAILERTOGO_DOMAIN", true);

  // Mail Headers
  $phpmailer->setFrom("testmailassignmentphp@gmail.com");
  // Change to recipient email. Make sure to use a real email address in your tests to avoid hard bounces and protect your reputation as a sender.
  $phpmailer->addAddress("hritikmiddha10@gmail.com");

  // Message
  $phpmailer->isHTML(true);
  $phpmailer->Subject = "Mailer To Go Test";
  $phpmailer->Body    = "<b>Hi</b>\nTest from Mailer To Go 😊\n";
  $phpmailer->AltBody = "Hi!\nTest from Mailer To Go 😊\n";

  // Send the Email
  $phpmailer->send();
  echo "Message has been sent";
} catch (Exception $e) {
  echo "in catch"; 
  echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
}

?>
