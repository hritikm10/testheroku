<?php
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script>
    </script>
    <title>XKCD challenge
    </title>

</head>


<body>
    <div class="container mt-5">
        <div class="card">
            <h5 class="card-header">XKCD</h5>
            <div class="card-body">
                <h5 class="card-title">Subscribe to XKCD challenge</h5>
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Enter your emailID" name="email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </div>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $sqlAll = "SELECT * from users WHERE email='$email'";
        $resultAll = mysqli_query($conn, $sqlAll);
        $row = mysqli_num_rows($resultAll);
        if ($row != 1) {
            $token = bin2hex(random_bytes(35));
            $email = $_POST['email'];
            session_start();
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
                https://xkcdhritik.herokuapp.com/welcome.php?token=$token\n";
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
            

           
            
        } else {
            echo '<br> <br><br> <div class="alert container alert-success alert-dismissible fade show" role="alert">
        <strong>You have already Subscribed to XKCD challenge!!!</strong>
      </div>';
        }
    }
    ?>



























    <!-- Bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Bootstrap scripts end-->
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