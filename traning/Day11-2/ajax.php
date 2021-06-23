<?php
    include("connect.php");
    $country = $_GET['country'];
    $state = $_GET['state'];


    if($country!=""){
        $res = mysqli_query($mysqli,"SELECT * FROM states WHERE con_id=$country");
        echo "<select class='form-select' id='statedd' onchange='change_state()'>";
        echo "<option>"; echo "select";   echo"</option>";
        while($row = mysqli_fetch_array($res)){
            echo "<option value='$row[id]' selected>";
            echo $row['name'];
            echo "</option>";
        }
        echo "</select>";

    }



    if($state!=""){
        $res = mysqli_query($mysqli,"SELECT * FROM city WHERE state_id=$state");
        echo "<select class='form-select'>";
        echo "<option>"; echo "select";   echo"</option>";
        while($row = mysqli_fetch_array($res)){
            echo "<option value='$row[id]' selected>";
            echo $row['name'];
            echo "</option>";
        }
        echo "</select>";

    }
  
?>
