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

	$email = $_SESSION['email'];
	$rand_comic = rand(0, 1000);
	$url    = 'http://xkcd.com/' . $rand_comic . '/info.0.json';
	$comic = json_decode(file_get_contents($url), true);
	$title = 'Your New Comic : ' . $comic['safe_title'];
	$name = $response_data->title;
	$img = $response_data->img;
	echo $img;
	echo $name;
	?>








 
  	
  	
