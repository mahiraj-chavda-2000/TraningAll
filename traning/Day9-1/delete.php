<?php
    include("connect.php");
    $id = $_GET['id'];
    $query = "DELETE FROM `usertable` WHERE `usertable`.`id` = $id";
    mysqli_query($conn,$query);
    header("Location:display.php");

?>