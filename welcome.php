<?php
session_start();
$tokenS = $_SESSION['tokenS'];
$getValue = $_GET['token'];
include '_dbConnect.php';

if ($getValue == $tokenS) {
    $email = $_SESSION['email'];
    $sql = "UPDATE `users` SET `active` = '1' WHERE `users`.`email` = '$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        // header("Location: index.php");
    }
} else {
    echo '<br> <br><br> <div class="alert container alert-danger alert-dismissible fade show" role="alert">
                <strong>Something Went Wrong!!!</strong>
              </div>';
    // header("Location: index.php");
}

$sqlMails = "SELECT * from users WHERE email='$email' AND active = '1' ";
$result = mysqli_query($conn, $sqlMails);
$rows = mysqli_num_rows($result);
if ($rows == 1) {
    // header("Location: sendMail.php");
}
else{
    echo '<div class="alert alert-danger container mt-5" role="alert">
    <h4 class="alert-heading">Offo!</h4>
    <p>Please Subscribe First to XKCD.</p>
    <hr>
    <button type="button" class="btn btn-info"><a href="/Assignment/index.php">Home Page</a> </button>';
}
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

    <!-- Bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Bootstrap scripts end-->
    <!-- Form control for preventing reload -->

</body>

</html>