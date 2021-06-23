<?php include "config.php"; ?>
<div class='container'>

<?php 
if(isset($_POST['but_delete'])){

  if(isset($_POST['delete'])){
    foreach($_POST['delete'] as $deleteid){

      $deleteUser = "DELETE from users WHERE id=".$deleteid;
      mysqli_query($con,$deleteUser);
    }
  }
 
}
?>
  <!-- Form -->
  <form method='post' action=''>
    <input type='submit' value='Delete' name='but_delete'><br><br>

    <!-- Record list -->
    <table border='1' id='recordsTable' style='border-collapse: collapse;' >
      <tr style='background: whitesmoke;'>
        <th>Username</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>&nbsp;</th>
     </tr>

     <?php 
     $query = "SELECT * FROM users";
     $result = mysqli_query($con,$query);
     
     while($row = mysqli_fetch_array($result) ){
        $id = $row['id'];
        $username = $row['username'];
        $name = $row['name'];
        $gender = $row['gender'];
        $email = $row['email'];
     ?>
     <tr id='tr_<?= $id ?>'>

        <td><?= $username ?></td>
        <td><?= $name ?></td>
        <td><?= $gender ?></td>
        <td><?= $email ?></td>

        <!-- Checkbox -->
        <td><input type='checkbox' name='delete[]' value='<?= $id ?>' ></td>
 
    </tr>
    <?php
    }
    ?>
   </table>
 </form>
</div>
