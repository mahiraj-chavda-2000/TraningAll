<?php
    include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>13th</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
<form action="" id="form1" method="POST">
    <table>
        <tr>
            <td>Select Country</td>
            <td><select class="form-select" id="countrydd" onchange="change_country()">
                    <option>select</option>
                    <?php 
                        $res = mysqli_query($mysqli,"SELECT * FROM country");
                        while($row= mysqli_fetch_array($res)){
                    ?>
                    <option value="<?php echo $row['id']; ?>">
                        <?php echo $row['name']; ?>
                    </option>
                    <?php 
                }
                 ?>
                </select></td>
        </tr>
        <tr>
            <td>Select State</td>
            <td>
                <div id="state">
                    <select class="form-select">
                        <option value="">select</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td>Select city</td>
            <td>
                <div id="city">
                    <select class="form-select">
                        <option value="">select</option>
                    </select>
                </div>
            </td>
        </tr>
    </table>

</form>

<script type="text/javascript">
function change_country() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "ajax.php?country=" + document.getElementById("countrydd").value, false);
    xhr.send(null);
    document.getElementById("state").innerHTML = xhr.responseText;
    if (document.getElementById("countrydd").value == "select") {
        document.getElementById("city").innerHTML = "<select class='form-select'><option>select</option></select>";

    }
}

function change_state() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "ajax.php?state=" + document.getElementById("statedd").value, false);
    xhr.send(null);
    document.getElementById("city").innerHTML = xhr.responseText;
}
</script>
</body>
</html>
