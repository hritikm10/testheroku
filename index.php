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
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css">
    <script>
    </script>
    <title>XKCD challenge
    </title>
</head>
<body>
    <div class="container1">
        <form action="index.php" method="post">
            <div class="brand-logo"></div>
            <div class="brand-title">Subscribe to XKCD challenge</div>
            <div class="inputs">
                <label>EMAIL</label>
                <input type="email" class="form-control" required placeholder="Enter your emailID" name="email" required>
                <button type="submit"> <span>Subscribe</span> </button>
            </div>
        </form>
    </div>
    

    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $sqlAll = "SELECT * from users WHERE email='$email' AND active = '1'";
        $resultAll = mysqli_query($conn, $sqlAll);
        $row = mysqli_num_rows($resultAll);
        if ($row != 1) {
            $token = bin2hex(random_bytes(25));
            $email = $_POST['email'];
            $_SESSION['tokenS'] = $token;
            $_SESSION['email'] = $email;
            $sql = "INSERT INTO `users` (`sno`, `email`, `tstamp`, `active`, `token`) VALUES (NULL, '$email', current_timestamp(), '0', '$token');";
            $result = mysqli_query($conn, $sql);


            $phpmailer = new PHPMailer(true);
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
                    echo '<div class="alert">
                    <p> <strong>Email verification sent!!! <br> </strong>  Please verify your email address.</p>
                   </div>';
                } else {
                    echo "{$mail->ErrorInfo}";
                }
            } catch (Exception $e) {
                echo "in catch";
                echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
            }
        } else {
            echo '<div class="alert">
            <p> You have already Subscribed to XKCD</p>
           </div>';
        }
    }
    ?>



























    
    <!-- Form control for preventing reload -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <!-- Form control for preventing reload end -->


    <!-- delete functionality  -->
    <script>
        function sub() {
            $('#subscribeModal').modal('toggle');
        }
    </script>
</body>

</html>