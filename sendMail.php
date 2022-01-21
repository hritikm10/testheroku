  <?php
	session_start();
	require("vendor/autoload.php");
	require_once("php-mailer/PHPMailer.php");
	require_once("php-mailer/SMTP.php");
	require_once("php-mailer/Exception.php");
	?>
  <?php
    $tokenS = $_SESSION['tokenS'];
	echo $tokenS;
	echo "hello";



	?>








 
  	
  	
