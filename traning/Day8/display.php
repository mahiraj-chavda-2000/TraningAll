<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "MyDataBase");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM MyTable";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border='2' cellspacing = '5'>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>member</th>";
                echo "<th>percentage</th>";
                echo "<th colspan = '2' align = 'center'>Operatioins</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['noofmembers'] . "</td>";
                echo "<td>" . $row['percentage'] . "</td>";
                echo "<th><a href= 'update.php?id=$row[id]&m=$row['noofmembers']&p=$row['percentage']'>"."update" ."<td>";
                echo "<th><a href= 'delete.php?id=$row[id]'>"."Delete" ."<td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>