  <?php
	session_start();
	include '_dbConnect.php';
	require("vendor/autoload.php");
	require_once("php-mailer/PHPMailer.php");
	require_once("php-mailer/SMTP.php");
	require_once("php-mailer/Exception.php");
	$email = $_SESSION['email'];
	use PHPMailer\PHPMailer\PHPMailer;
	?>
  <?php
	$mail = new PHPMailer(true);
	try {
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

		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Host = "smtp.gmail.com";
		$mail->Port = "587";
		$mail->Username = "testmailassignmentphp@gmail.com";
		$mail->Password = "Hritik@123!";
		$mail->setFrom("testmailassignmentphp@gmail.com");
		$mail->addAddress("hritikmiddha10@gmail.com");
		$mail->isHTML(true);
		$mail->Subject = "Mailer To Go Test";
		$mail->Body = '
  	          <p>Hello XKCDian</p>
  	          Here is your new comic.
  	          <h3>' . $comic['safe_title'] . "</h3>
  	          <img src='" . $comic[' img'] . "' alt='some comic hehe'/>
			<br />
			To read the comic,  --> <a target='_blank' href='https://xkcd.com/" . $comic[' num'] . "'>Click here</a><br /> 
			To Unsubscribe the Xkcd,  --> <a target='_blank' href='" . $urlun . "'>Click here</a><br />";
		$mail->addStringAttachment(file_get_contents($url), "$subject");
		$mail->send();
		echo "Message has been sent";
		header("Location: success.php");
	} catch (Exception $e) {
		echo "in catch";
		echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
	}



	?>








 
  	
  	
