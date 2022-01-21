<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "xkcddb";
    // $servername = "us-cdbr-east-05.cleardb.net";
    // $username = "bbb1b74a1cdfb2";
    // $password = "675d2913";
    // $database = "heroku_b0ca9f11c1fddad";
    $conn = mysqli_connect($servername,$username,$password,$database);
    if(!$conn)
    {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Something Went Wrong.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }   
//Get Heroku ClearDB connection information
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// Connect to DB
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

?>

