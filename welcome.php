<!-- <?php
session_start();
?> -->

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

<?php
// $tokenS = $_SESSION['tokenS'];
$getValue = $_GET['token'];
$getEmail = $_GET['email'];
include '_dbConnect.php';
if ($getValue) {
    $indexPage = "https://testheroku1088.herokuapp.com/index.php";
    // $email = $_SESSION['email'];
    $sql = "UPDATE `users` SET `active` = '1' WHERE `users`.`token` = '$getValue'";
    $result = mysqli_query($conn, $sql);
} 
else {
    
}

$sqlMails = "SELECT * from users WHERE token='$getValue' AND active = '1' ";
$result = mysqli_query($conn, $sqlMails);
$rows = mysqli_num_rows($result);
if ($rows) {
    header("Location: sendMail.php?token=$getValue&email=$getEmail");
}
else{
    echo ' <div class="container2">
        <div class="brand-title" style="color: red;">Error!!!</div>
        <br> <br> <br>
        <p>Unauthorised access to XKCD!!!, Please subscribe it from your email id.</p>
        <br> 
    </div>';
}
?>
