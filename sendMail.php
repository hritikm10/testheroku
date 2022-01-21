  <?php
	session_start();
	include '_dbConnect.php';
	require("vendor/autoload.php");
	require_once("php-mailer/PHPMailer.php");
	require_once("php-mailer/SMTP.php");
	require_once("php-mailer/Exception.php");
	use PHPMailer\PHPMailer\PHPMailer;
	require 'vendor/autoload.php';
	?>
  <?php
	$email = $_SESSION['email'];
	$mail = new PHPMailer(true);
	$phpmailer->isSMTP();
	$phpmailer->SMTPAuth = true;
	$phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$phpmailer->Host = "smtp.gmail.com";
	$phpmailer->Port = "587";
	$phpmailer->Username = "testmailassignmentphp@gmail.com";
	$phpmailer->Password = "Hritik@123!!";
	$phpmailer->setFrom("testmailassignmentphp@gmail.com");
	$phpmailer->addAddress($email);
	$phpmailer->isHTML(true);
	$phpmailer->Subject = "Verify email";
	$phpmailer->Body    = "You will be subscribed to XKCD challenge after verifying!
		https://testheroku1088.herokuapp.com/welcome.php?token=$token\n";
	if ($phpmailer->send()) {
		echo '<br> <br><br> <div class="alert container alert-success alert-dismissible fade show" role="alert">
			<strong>Email verification sent!!!</strong>  Please verify your email address.
		  </div>';
	} else {
		echo "{$mail->ErrorInfo}";
	}


	?>








 
  	
  	
