<?php
// session_start();
include '_dbConnect.php';
require("vendor/autoload.php");
require_once("php-mailer/PHPMailer.php");
require_once("php-mailer/SMTP.php");
require_once("php-mailer/Exception.php");
// $email = $_SESSION['email'];

use PHPMailer\PHPMailer\PHPMailer;
?>
  <?php
    $getToken = $_GET['token'];
	$getEmail = $_GET['email'];
    $indexPage = "https://testheroku1088.herokuapp.com/index.php";
	// $email = $_SESSION['email'];
	$rand_comic = rand(0, 1000);
	$api_url    = 'http://xkcd.com/' . $rand_comic . '/info.0.json';
	$json_data = file_get_contents($api_url);
	$comic = json_decode($json_data);
	$title = 'Your New Comic : ' . $comic->safe_title;
	$name = $comic->title;
	$img = $comic->img;
	$subject = "$comic->title";
	$urlun = "https://testheroku1088.herokuapp.com/unsubscribe.php?token=$getToken&email=$getEmail";
	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->Host = "smtp.gmail.com";
	$mail->Port = "587";
	$mail->Username = "testmailassignmentphp@gmail.com";
	$mail->Password = "Hritik@123!!";
	$mail->setFrom("testmailassignmentphp@gmail.com");
	$mail->addAddress($getEmail);
	$mail->isHTML(true);
	$mail->Subject = "New Comic Arrived...";
	$mail->Body = '
  	          <p>Hello XKCDian</p>
  	          Here is your new comic.
  	          <h3>' . $comic->safe_title . "</h3>
  	          <img src='" . $comic->img . "' alt='some comic hehe'/>
			<br />
			To read the comic,  --> <a target='_blank' href='https://xkcd.com/" . $comic->num . "'>Click here</a><br /> 
			To Unsubscribe the Xkcd,  --> <a target='_blank' href='" . $urlun . "'>Click here</a><br />";
	$mail->addStringAttachment(file_get_contents($img), "$subject.jpg");
	if ($mail->send()) {
		header("Location: success.php?email=$getEmail&token=$getToken");
	} else {
		echo '<div class="container2">
        <div class="brand-title" style="color: red;">Error!!!</div>
        <br> <br> <br>
        <p>You have not subscribed to XKCD!!!</p>
        <br> <br> <br>
        <div class="inputs">
            <button type="submit" class="btn btn-primary"><a style="color: black; text-decoration: none;" href='.$indexPage.'>Subscribe</a></button>
        </div>
    </div>';
	}
	
	?>








 
  	
  	
