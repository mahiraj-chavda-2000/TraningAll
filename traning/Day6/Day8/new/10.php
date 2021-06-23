<?php

print_r($_POST);
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'MyDataBase');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// print_r($_POST);
// exit;
$id=$_POST['id'];
$m=$_POST['member'];
$p=$_POST['pr'];
 for ($x = 0; $x < count($_POST['member']); $x++) {
   $sql= "SELECT * FROM `mahi` WHERE `id` = $id[$x]";
   mysqli_query($conn,$sql);
   $val=mysqli_affected_rows($conn);
   if ($val==1) {
      $sql="UPDATE `mahi` SET `member` = $m[$x], `pr` = $p[$x] WHERE `mahi`.`id` = $id[$x]";
      mysqli_query($conn,$sql); 
   }
   else{
      $sql2="INSERT INTO `mahi` (`member`, `pr`) VALUES ($m[$x], $p[$x])";
      mysqli_query($conn,$sql2);
   }
  
}
  $conn->close();
?>