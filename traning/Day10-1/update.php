<?php
    include("connect.php");
    $id = $_GET['id'];
    $username = $_GET['username'];
    $email= $_GET['email'];
    $rights = $_GET['rights'];
    $change = explode(",",$rights);
    // print_r($b);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>
    <form method="GET">
    <table border='0'>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo "$id"?>"></td>
        </tr>
        <tr>
            <td> UserName: <td><input type="text" name="uname" value="<?php echo "$username"?>"></td>
        </tr>
        <tr>
            <td> Email: <td><input type="email" name="Email" value="<?php echo "$email"?>"></td>
        </tr>
        <tr>
            <td> Rights:</td>
            <td><input type="checkbox" name='check[]' value="Dashboard" <?php if (in_array("Dashboard",$change)) {
                echo "checked"; } ?> > Dashboard<br />
            <input type="checkbox" name='check[]' value="CustomerList" <?php if (in_array("CustomerList",$change)) {
                echo "checked"; } ?> > CustomerList<br />
            <input type="checkbox" name='check[]' value="jobList" <?php if (in_array("jobList",$change)) {
                echo "checked"; } ?> > jobList <br />
            <input type="checkbox" name='check[]' value="Review" <?php if (in_array("Review",$change)) {
                echo "checked"; } ?> > Review <br /></td>
        </tr>
        <tr>
            <td><input type="submit" value="submit" name="submit"></td>
        </tr>
      
        </form>

    </table>

    <script>
        
    </script>

    

</body>

</html>
<?php
    if($_GET['submit']){
        $id = $_GET['id'];
        $usern = $_GET['uname'];

        $email = $_GET['Email'];
        $rights = $_GET['check'];
        $change1 = implode(",",$rights);
        

        $query = "UPDATE `usertable1` SET `id` = '$id', `username` = '$usern', `email` = '$email' ,`rights` = '$change1' WHERE `usertable1`.`id` = $id";
        $data = mysqli_query($conn,$query);
        if ($data) {
            echo "<script> alert('Database Updated') </script>";
            header("Location:display.php");

        }
        else{
            echo "Failed";
        }
        // header("Location:display.php");
    }


?>