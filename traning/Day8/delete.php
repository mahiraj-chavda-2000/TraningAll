<?php
   $link = mysqli_connect("localhost", "root", "", "MyDataBase");
 
   // Check connection
   if($link === false){
       die("ERROR: Could not connect. " . mysqli_connect_error());
   }
    $id = $_GET['id'];
    // echo $id;
    $query1 = "DELETE FROM `MyTable` WHERE `MyTable`.`id` = $id";
    // echo $query1;
    $data = mysqli_query($link,$query1);
    // if ($data) {
    //     echo "Deleted";
    // }    
    // else{
    //     echo "Not Deleted"
    // }
  

?>