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
    <title>Unsubscribed
    </title>
</head>

<body>
<?php
$emailV = $_GET['email'];
if ($emailV) {
    $sql = "SELECT * FROM users WHERE active = '1' and email = '$emailV'";
    $indexPage = "https://testheroku1088.herokuapp.com/index.php";
    include '_dbConnect.php';
    $sql = "UPDATE `users` SET `active` = '0' WHERE `users`.`email` = '$emailV'";
    $sqldel = "DELETE FROM `users` WHERE `users`.`email` = '$emailV'";
    $result = mysqli_query($conn, $sql);
    $resultDel = mysqli_query($conn, $sqldel);
    // session_unset();
    // session_destroy();
    if ($result) {
        echo '<div class="container1">
        <div class="brand-title" style="color: red;">unSubscribed!!!</div>
        <br> <br> <br>
        <p>You have unsubscribed from XKCD!!! &#x1F62D;</p>
        <br> <br> <br>
        <div class="inputs">
        <button type="submit" class="btn btn-primary"><a style="color: white; text-decoration: none;" href='.$indexPage.'>Subscribe</a></button>
        </div>
    </div>';
    }
    else {
        header("Location : index.php");
} 

}
?>

</body>

</html>