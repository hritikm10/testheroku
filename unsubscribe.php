<?php
session_start();
$email = $_SESSION['email'];
$emailV = $_GET['email'];
if (isset($emailV)) {
    if ($email == $emailV) {
        include '_dbConnect.php';
        $sql = "UPDATE `users` SET `active` = '0' WHERE `users`.`email` = '$email'";
        $sqldel = "DELETE FROM `users` WHERE `users`.`email` = '$email'";
        $result = mysqli_query($conn, $sql);
        $resultDel = mysqli_query($conn, $sqldel);
        session_unset();
        session_destroy();
        if ($result) {
            echo '<div class="alert alert-warning container mt-5" role="alert">
        <h4 class="alert-heading">Oooops!!!</h4>
        <p>You have been Unsubscribed to XKCD.</p>
        <hr>
        <p class="mb-0">You will not get a XKC Comic now</p>
       </div>';
            $url = "https://testheroku1088.herokuapp.com/index.php";
            echo '<button type="button" class="btn btn-info mt-5 " ><a style="color: black; text-decoration: none;" href="' . $url . '">Subscribe</a></button>';
        }
    } else {
        echo '<div class="alert alert-danger container mt-5" role="alert">
      <h4 class="alert-heading">Error!</h4>
      <p class="mb-0">Something Went Wrong!</p>
  </div>';
        header("Location : index.php");
    }
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