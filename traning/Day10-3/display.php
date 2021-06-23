<?php
include("connect.php");

$total_pages = $mysqli->query('SELECT * FROM usertable')->num_rows;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$num_results_on_page = 5;

if ($stmt = $mysqli->prepare('SELECT * FROM usertable ORDER BY username LIMIT ?,?')) {
  
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	
	$result = $stmt->get_result();
	?>
<!DOCTYPE html>
<html>

<head>
    <title>Display</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    html {
        font-family: Tahoma, Geneva, sans-serif;
        padding: 20px;
        background-color: #F8F9F9;
    }

    table {
        border-collapse: collapse;
        width: 500px;
    }

    td,
    th {
        padding: 10px;
    }

    th {
        background-color: #54585d;
        color: #ffffff;
        font-weight: bold;
        font-size: 13px;
        border: 1px solid #54585d;
    }

    td {
        color: #636363;
        border: 1px solid #dddfe1;
    }

    tr {
        background-color: #f9fafb;
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .display {
        list-style-type: none;
        padding: 10px 0;
        display: inline-flex;
        justify-content: space-between;
        box-sizing: border-box;
    }

    .display li {
        box-sizing: border-box;
        padding-right: 10px;
    }

    .display li a {
        box-sizing: border-box;
        background-color: #e2e6e6;
        padding: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: bold;
        color: #616872;
        border-radius: 4px;
    }

    .display li a:hover {
        background-color: #d4dada;
    }

    .display .next a,
    .display .prev a {
        text-transform: uppercase;
        font-size: 12px;
    }

    .display .currentpage a {
        background-color: #518acb;
        color: #fff;
    }

    .display .currentpage a:hover {
        background-color: #518acb;
    }
    </style>
    <script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

    function validate() {
        var valid = false;
        if (document.getElementById("dashbord").checked) {
            valid = true;
        } else if (document.getElementById("customerlist").checked) {
            valid = true;
        } else if (document.getElementById("joblist").checked) {
            valid = true;
        } else if (document.getElementById("review").checked) {
            valid = true;
        }
        if (valid) {
            console.log("success");

        } else {
            var msg = document.getElementById("msg");
            msg.innerHTML = "*Please Fill All fields"
            // alert("Please Fill all Fields");
            return false;
        }
    }
    </script>

</head>

<body>

    <div class="set"><button class="btn btn-outline-info" style="align:right;" onclick="openForm()">Add User</button>
    </div>
    <br><br>
    <div class="form-group" id="myForm" style="display:none;">
        <form action="config.php" method="GET" onclick="return validate()">


            <input type="hidden" name="id" value="0">


            <p id="msg" style="color:red;"></p><br>


            UserName:
            <input type="text" name="uname" required><br>
            Email:
            <input type="email" name="Email" required><br>
            Rights: <br>
            <input type="checkbox" id="dashbord" name='check[]' value="Dashboard"> Dashboard<br />
            <input type="checkbox" id="customerlist" name='check[]' value="CustomerList"> CustomerList<br />
            <input type="checkbox" id="joblist" name='check[]' value="jobList"> jobList <br />
            <input type="checkbox" id="review" name='check[]' value="Review"> Review <br />



            <input type="submit" value="save" name="submit" class="btn btn-success">
            <button type="button" class="btn btn-dark" onclick="closeForm()">Close</button>



        </form>


    </div>
    <form action="" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" required
                value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control"
                placeholder="Search data">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <table>
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

                if(isset($_GET['search']))
                {
                    $filtervalues = $_GET['search'];
                    $query = "SELECT * FROM usertable WHERE CONCAT(username,email,rights) LIKE '%$filtervalues%' ";
                    $query_run = mysqli_query($mysqli, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $items)
                        {                               
            ?>
            <tr>

                <td><?= $items['username']; ?></td>
                <td><?= $items['email']; ?></td>
                <td><?= $items['rights']; ?></td>
                <td><a href="update.php?id=<?= $items['id']; ?>&username=<?= $items['username']; ?>&email=<?= $items['email']; ?>&rights=<?= $items['rights']; ?>"
                        class="btn btn-info">Edit/Update</a></td>
                <td><a href="delete.php?id=<?= $items['id']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
                                            }
                                            goto a;
                                        }
                                        else
                                        {
                                            ?>
            <tr>
                <td colspan="3">No Record Found</td>
            </tr>
            <?php
                                        }
                                    }
                                ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["rights"]; ?></td>
                <td><a href="update.php?id=<?php echo $row['id'];?>&username=<?php echo $row['username'];?>&email=<?php echo $row['email'];?>&rights=<?php echo $row['rights'];?>"
                        class="btn btn-info">Edit/Update</a></td>
                <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php endwhile; a:?>
        </tbody>
    </table>
    <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
    <ul class="display">
        <?php if ($page > 1): ?>
        <li class="prev"><a href="display.php?page=<?php echo $page-1 ?>">Prev</a></li>
        <?php endif; ?>

        <?php if ($page > 3): ?>
        <li class="start"><a href="display.php?page=1">1</a></li>
        <li class="dots">...</li>
        <?php endif; ?>

        <?php if ($page-2 > 0): ?><li class="page"><a
                href="display.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
        <?php if ($page-1 > 0): ?><li class="page"><a
                href="display.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

        <li class="currentpage"><a href="display.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

        <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a
                href="display.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
        <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a
                href="display.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

        <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
        <li class="dots">...</li>
        <li class="end"><a
                href="display.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a>
        </li>
        <?php endif; ?>

        <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
        <li class="next"><a href="display.php?page=<?php echo $page+1 ?>">Next</a></li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>
</body>

</html>
<?php
	$stmt->close();
                
}
?>