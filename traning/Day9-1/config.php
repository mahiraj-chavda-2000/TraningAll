<?php
 include("connect.php");
 if($_GET['submit']){
    $id = $_GET['id'];
    $un = $_GET['uname'];
    $em = $_GET['Email'];
    $rt = $_GET['check'];
    $rts = implode(",",$rt);

    // echo $rts;
    $query = "INSERT INTO `usertable`(`id`, `username`, `email`, `rights`) VALUES ('$id','$un','$em','$rts')";
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
