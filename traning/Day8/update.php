<?php
 $link = mysqli_connect("localhost", "root", "", "MyDataBase");
 
 // Check connection
 if($link === false){
     die("ERROR: Could not connect. " . mysqli_connect_error());
 }
$id = $_GET['id'];
$m = $_GET['m'];
$p = $_GET['p'];
echo $id;
echo $m;

echo $p;


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10th</title>

</head>

<body>
    <form name="MyForm" method="GET" id="myForm" action="">
        <div class="MyDiv" id="hideDiv">
            <input type="hidden" name="id[]" id="id">
            number of members:<input type="text" name="member[]" id="member" value="<?php echo $m ?>">
            Percentage:<input type="text" name="percentage[]" id="percentage" value="<?php echo $p ?>">
        </div>
        <button class="savebtn" name="submit" value="save" id="sbtn" type="submit">save</button>
    </form>
    


</body>

</html>