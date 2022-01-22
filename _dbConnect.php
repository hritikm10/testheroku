<?php 
 
    $servername = "us-cdbr-east-05.cleardb.net";
    $username = "b9f2bfd24dad54";
    $password = "1c6feb65";
    $database = "heroku_37d29324816bdc6";
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

