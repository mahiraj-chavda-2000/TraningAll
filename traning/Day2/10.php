<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'MyDataBase');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// print_r($_POST);

$m=$_POST['member'];
$p=$_POST['pr'];

$stmt = $conn->prepare("INSERT INTO mahi ( member,pr) VALUES (?, ?)");
$stmt->bind_param("ss", $member, $pr);

for ($x = 0; $x < count($_POST); $x++) {
    $member = $m[$x];
    $pr = $p[$x];
    $stmt->execute();   
  }
  $stmt->close();
  $conn->close();
?>
