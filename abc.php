<?php
  echo "Hritik";
	require("vendor/autoload.php");
	require_once("php-mailer/PHPMailer.php");
	require_once("php-mailer/SMTP.php");
	require_once("php-mailer/Exception.php");
// Passing true enables exceptions.
$phpmailer = new PHPMailer(true);
try {
  $phpmailer->isSMTP();
  $phpmailer->SMTPAuth = true;
  $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $phpmailer->Host = "smtp.gmail.com";
  $phpmailer->Port = "587";
  $phpmailer->Username = "testmailassignmentphp@gmail.com";
  $phpmailer->Password = "Hritik@123!";
  $phpmailer->setFrom("testmailassignmentphp@gmail.com");
  $phpmailer->addAddress("hritikmiddha10@gmail.com");
  $phpmailer->isHTML(true);
  $phpmailer->Subject = "Mailer To Go Test";
  $phpmailer->Body    = "<b>Hi</b>\nTest from Mailer To Go 😊\n
  <img src='" . $url . "' alt='some comic hehe'/>";
  $phpmailer->AltBody = "Hi!\nTest from Mailer To Go 😊\n";
  $phpmailer->addStringAttachment(file_get_contents($url), 'abc.jpg');
  $phpmailer->send();
  echo "Message has been sent";
} catch (Exception $e) {
  echo "in catch"; 
  echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
}
