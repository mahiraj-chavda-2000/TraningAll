<?php
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $database_name = 'dropdown';

  $mysqli = mysqli_connect($servername, $username, $password, $database_name);

  if($conn === false) {
    die("Error: could not connect to database".mysqli_connect_error());
  }
  else {
    // echo "Connected to database";
  }
?>