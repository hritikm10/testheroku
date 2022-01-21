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
	function getComic()
	{
		$rand_comic = rand(0, 1000);
		$url    = 'http://xkcd.com/' . $rand_comic . '/info.0.json';
		$result = json_decode(file_get_contents($url), true);
		return $result;
	}
	$comic = getComic();
	$title = 'Your New Comic : ' . $comic['safe_title'];
	$name = $response_data->title;
	$subject = "$response_data->title";
	$urlun = "https://testheroku1088.herokuapp.com/unsubscribe.php?email=$email";
	$mail = new PHPMailer(true);
	try {
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
	} catch (Exception $e) {
		echo "in catch";
		echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
	}
	
	?>








 
  	
  	
