<?php
$getToken = $_GET['token'];
$getEmail = $_GET['email'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css">
    <script>
    </script>
    <title>Verified!!!
    </title>

</head>

<body>
    <div class="container1">

        <div class="brand-title">Verified</div>
        <br> <br> <br>
        <p>you have been successfully Verified to XKCD</p>
        <br>
        <p><b>Enjoy Free Comics...</b> </p>
        <br>
        <p>Check Your mail now!!! &#128525;</p>




        <br> <br> <br>
        <div class="inputs">
            <button type="submit" class="btn btn-primary"><a style="color: white; text-decoration: none;" href="<?php echo "https://testheroku1088.herokuapp.com/unsubscribe.php?email=$getEmail&token=$getToken" ?>">UnSubscribe</a></button>
        </div>


    </div>
    









</body>

</html>