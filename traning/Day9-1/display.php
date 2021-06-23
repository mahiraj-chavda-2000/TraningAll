<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<button class="open-button" onclick="openForm()">Add User</button>
<div class="form-popup" id="myForm" style="display:none;">
<form action="config.php" method="GET" >
    <table border='0'>
        <tr>
            <td><input type="hidden" name="id" value="0"></td>
        </tr>
        <tr>
            <td> UserName: <td><input type="text" name="uname"></td>
        </tr>
        <tr>
            <td> Email: <td><input type="email" name="Email"></td>
        </tr>
        <tr>
            <td> Rights:</td>
            <td><input type="checkbox" name='check[]' value="Dashboard"> Dashboard<br />
        <input type="checkbox" name='check[]' value="CustomerList"> CustomerList<br />
        <input type="checkbox" name='check[]' value="jobList"> jobList <br />
        <input type="checkbox" name='check[]' value="Review"> Review <br /></td>
        </tr>
        <tr>
            <td><input type="submit" value="save" name="submit"></td>
            
        </tr>
        <tr>
            <td><button type="button" class="btn cancel" onclick="closeForm()">Close</button></td>
        </tr>
      
        </form>

    </table>
    </div>

    <table border="1">
        <tr>
            <th>UserName</th>
            <th>Email</th>
            <th>Rights</th>
            <th colspan='2' align='center'>Operations</th>
            
        </tr>




<?php
    include("connect.php");
    $query = "SELECT * FROM `usertable`";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    
    // echo $result['username'];
    // echo $total;
    if ($total!=0) {
        // $result = mysqli_fetch_assoc($data);
        while ($result = mysqli_fetch_assoc($data)) {
            echo "
            <tr>
            <td>".$result['username']."</td>
            <td>".$result['email']."</td>
            <td>".$result['rights']."</td>
            <td><a href='update.php?id=$result[id]&username=$result[username]&email=$result[email]&rights=$result[rights]'>Update</td>
            <td><a href='delete.php?id=$result[id]'>Delete</td>            
            </tr>                
            ";
          
            
        }
        // echo "Records Found";

    }
    else{
        echo "No Records";
    }
?>

</table>


<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>
</html>
