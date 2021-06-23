<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>11th</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    
    <style> 
        .set{
            padding-top: 15px;
        }
    
    </style>
    
    <script>
        function validate(){
            var valid = false;
            if (document.getElementById("dashbord").checked) {
                valid = true;                
            }
            else if (document.getElementById("customerlist").checked) {
                valid = true;                
            }
            else if (document.getElementById("joblist").checked) {
                valid = true;                
            }
            else if (document.getElementById("review").checked) {
                valid = true;                
            }
            if (valid) {
              console.log("success");
                
            }
            else {
                var msg = document.getElementById("msg");
                msg.innerHTML = "*Please Fill All fields"
                // alert("Please Fill all Fields");
                return false;
            }
        }
    </script>
</head>
<body>

<div class="set"><button class="btn btn-outline-info" style="align:right;" onclick="openForm()">Add User</button></div>
<br><br>
<div class="form-popup" id="myForm" style="display:none;">
<form action="config.php" method="GET" onclick="return validate()" >
    <table border='0'>
        <tr>
            <td><input type="hidden" name="id" value="0"></td>
        </tr>
        <tr>
            <td><p id="msg" style="color:red;"></p></td>
 
        </tr>
        <tr>
            <td> UserName: <td><input type="text" name="uname" required></td>
            
        </tr>
        <tr>
            <td> Email: <td><input type="email" name="Email" required></td>
        </tr>
        <tr>
            <td> Rights:</td>
            <td><input type="checkbox" id="dashbord" name='check[]' value="Dashboard"> Dashboard<br />
        <input type="checkbox" id="customerlist" name='check[]' value="CustomerList"> CustomerList<br />
        <input type="checkbox" id="joblist" name='check[]' value="jobList"> jobList <br />
        <input type="checkbox" id="review" name='check[]' value="Review"> Review <br /></td>
        </tr>
        <tr>
            
            <td><input type="submit" value="save" name="submit" class="btn btn-success"></td>
            <td><button type="button" class="btn btn-dark" onclick="closeForm()">Close</button></td>
        </tr>
        
      
        </form>

    </table>
    </div>

        <br>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>rights</th>
                <th>Edit/Update</th>
                <th>Delete</th>

                
            </tr>
        </thead>
        <tbody>
        <?php
        include("connect.php");
            $query = "SELECT * FROM usertable";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql)){

        ?>

            <tr>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["rights"]; ?></td>
                <td><a href="update.php?id=<?php echo $row['id'];?>&username=<?php echo $row['username'];?>&email=<?php echo $row['email'];?>&rights=<?php echo $row['rights'];?>" class="btn btn-info">Edit/Update</a></td>
                <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>

              
            </tr>
            <?php } ?>
        
  
        </tbody>
        <tfoot>
          
        </tfoot>
    </table>


<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

</script>
</body>
</html>
