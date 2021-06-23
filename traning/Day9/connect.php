<?php
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $database_name = 'NewData';

  $conn = mysqli_connect($servername, $username, $password, $database_name);

  if($conn === false) {
    die("Error: could not connect to database".mysqli_connect_error());
  }
  else {
    echo "<script> console.log('connected to database') </script>";
  }
?>