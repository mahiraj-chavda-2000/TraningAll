<?php
 include("connect.php");
 if($_GET['submit']){
    $id = $_GET['id'];
    $username = $_GET['uname'];
    $email = $_GET['Email'];
    $rights = $_GET['check'];
    $convert = implode(",",$rights);

    // echo $rts;
    $query = "INSERT INTO `usertable`(`id`, `username`, `email`, `rights`) VALUES ('$id','$username','$email','$convert')";
    $data = mysqli_query($conn,$query);
    if ($data) {
        echo "<script> alert('Database Updated') </script>";
        header("Location:display.php");

    }
    else{
        echo "Failed";
    }

 }
    

?>
