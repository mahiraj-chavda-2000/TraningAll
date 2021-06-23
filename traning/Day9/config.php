<?php 
        
        $msg="";
        function cancel_form() {
            echo "cancel pressed";
            //display_results();
          }
        
        function submit_form() {
            require('connect.php');
            // print_r($_POST);
            // exit;
            $id=$_POST['fordelval'];
            $m=$_POST['member'];
            $p=$_POST['percentage'];
            for ($x = 0; $x < count($_POST['member']); $x++) {
              $sql= "SELECT * FROM `mahi` WHERE `id` = $id[$x]";
              mysqli_query($conn,$sql);
              $val=mysqli_affected_rows($conn);
              if ($val==1) {
                  $sql="UPDATE `m1` SET `noofmembers` = '$m[$x]', `percentage` = '$p[$x]' WHERE `m1`.`id` = '$id[$x]'";
                  mysqli_query($conn,$sql); 
                  // echo $sql;
              }
              else{
                  $sql2="INSERT INTO `m1` (`id`, `noofmembers`, `percentage`) VALUES (NULL,'$m[$x]', '$p[$x]')";

                  mysqli_query($conn,$sql2);
                  // echo $sql2;
                  // echo "<br>";
                  // echo "INSERT INTO `m1` (`id`, `noofmembers`, `percentage`) VALUES (NULL, 'lll', 'lll');";
              }
              
            }
          //  exit;
              // $conn->close();

            // $sql = "DELETE FROM MyTable";
            // if(mysqli_query($conn, $sql)) {
            //   echo "updated database";
            // }
            // else {
            //   echo "failed to update database";
            // }
        
            // $members = $_POST['member'];
            // $percentages = $_POST['percentage'];
        
            // for ($i=0; $i < count($percentages); $i++) { 
            //   $member = $members[$i];
            //   $percentage = $percentages[$i];
            //   if($member == '' or $percentage == '') {
            //     continue;
            //     $msg="please fill all fields";
            //   }
            //   else {
            //     echo "$member";
            //     echo "$percentage";
            //     $sql = "INSERT INTO m1 (noofmembers,percentage) VALUES ('$member','$percentage')";
            //     if(mysqli_query($conn, $sql)) {
            //       echo "<script>console.log('data updated successfully')</script>";
            //     }
            //     else {
            //       echo "<script>console.log('failed to update data')</script>";

            //     }
            //   }
            // }
        }
          
        
          if(isset($_POST['cancel'])) {
            cancel_form();
          }
        
          if(isset($_POST['submit'])) {
            submit_form();
          }
        
          header("Location:10th.php");
                
                    
?>        