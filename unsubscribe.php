<?php
session_start();
$email = $_SESSION['email'];
$emailV = $_GET['email'];

if ($email == $emailV) {
    include '_dbConnect.php';
    $sql = "UPDATE `users` SET `active` = '0' WHERE `users`.`email` = '$email'";
    $sqldel = "DELETE FROM `users` WHERE `users`.`email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $resultDel = mysqli_query($conn, $sqldel);
    session_unset();
    session_destroy();
    if ($result) {
        echo ' <div class="container1">
            <div class="brand-title">Unsubscribed</div>
            <br> <br> <br>
            <p>you have been successfully Unsubscribed to XKCD</p>
            <br> <br> <br>
            <div class="inputs">
                <button type="submit" class="btn btn-primary"><a style="color: white; text-decoration: none;" href="<?php echo "https://testheroku1088.herokuapp.com/index.php" ?>">Subscribe</a></button>
            </div>
        </div>';
    }
    else {
        echo ' <div class="container1">
            <div class="brand-title" style="color: red;">Error!!!</div>
            <br> <br> <br>
            <p>Something Went Wrong!!!</p>
            <br> <br> <br>
            <div class="inputs">
                <button type="submit" class="btn btn-primary"><a style="color: white; text-decoration: none;" href="<?php echo "https://testheroku1088.herokuapp.com/index.php" ?>Subscribe</a></button>
            </div>
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
    <link rel="stylesheet" href="index.css">
    <script>
    </script>
    <title>Unsubscribed
    </title>
</head>

<body>

</body>

</html>