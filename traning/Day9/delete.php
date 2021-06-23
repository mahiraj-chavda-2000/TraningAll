<?php
    require('connect.php');
//     print_r($_GET);
//    exit;
    $id=$_GET['id'];
    // print_r($_POST);
    // print_r($id);
    // exit;
    $sql = "DELETE FROM `m1` WHERE `m1`.`id` = $id";
    mysqli_query($conn,$sql);
    // echo $sql;
    header("Location:10th.php");

?>