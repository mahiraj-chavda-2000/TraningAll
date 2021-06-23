<?php
    include("connect.php");
    $id = $_GET['id'];
    $query = "DELETE FROM `usertable` WHERE `usertable`.`id` = $id";
    mysqli_query($mysqli,$query);
    header("Location:display.php");

?>