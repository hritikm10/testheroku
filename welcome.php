<?php
session_start();
$tokenS = $_SESSION['tokenS'];
$getValue = $_GET['token'];
include '_dbConnect.php';
if ($getValue == $tokenS) {
    $indexPage = "https://testheroku1088.herokuapp.com/index.php";
    $email = $_SESSION['email'];
    $sql = "UPDATE `users` SET `active` = '1' WHERE `users`.`email` = '$email'";
    $result = mysqli_query($conn, $sql);
} 
else {
    // header("Location: index.php");
}

$sqlMails = "SELECT * from users WHERE email='$email' AND active = '1' ";
$result = mysqli_query($conn, $sqlMails);
$rows = mysqli_num_rows($result);
if ($rows) {
    header("Location: sendMail.php");
}
else{
    echo ' <div class="container2">
        <div class="brand-title" style="color: red;">Error!!!</div>
        <br> <br> <br>
        <p>You have not subscribed to XKCD!!!</p>
        <br> 
    </div>';
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
    <title>Welcome
    </title>
</head>
</head>

<body>


</body>

</html>