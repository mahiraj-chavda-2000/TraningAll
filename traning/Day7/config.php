<?php 
        
        $msg="";
        function cancel_form() {
            echo "cancel pressed";
            //display_results();
          }
        
        function submit_form() {
            require('connect.php');
            $id = $_POST['id'];
            $members = $_POST['member'];
            $percentages = $_POST['percentage'];
            for ($i=0; $i < count($percentages); $i++) { 
              $member = $members[$i];
              $percentage = $percentages[$i];
              if($member == '' or $percentage == '') {
                continue;
                $msg="please fill all fields";
              }
              else {
                echo "$member";
                echo "$percentage";
                $sql= "SELECT * FROM `MyTable` WHERE `id` = $id[$x]";
                mysqli_query($conn,$sql);
                $val=mysqli_affected_rows($conn);
                if ($val==1) {
                  $sql="UPDATE `MyTable` SET `noofmembers` = $member[$x], `percentage` = $percentages[$x] WHERE `MyTable`.`id` = $id[$x]";
                  mysqli_query($conn,$sql); 
                }
                else
                {
                  $sql1 = "INSERT INTO MyTable (noofmembers,percentage) VALUES ('$member','$percentage')";
                  mysqli_query($conn,$sql1); 
                }
                
                // if(mysqli_query($conn, $sql)) {
                //   echo "<script>console.log('data updated successfully')</script>";
                // }
                // else {
                //   echo "<script>console.log('failed to update data')</script>";

                // }
              }
            }

            $sql= "SELECT * FROM `mahi` WHERE `id` = $id[$x]";
            mysqli_query($conn,$sql);
            $val=mysqli_affected_rows($conn);
            // $sql = "DELETE FROM MyTable WHERE id = '$id'";
            // if(mysqli_query($conn, $sql)) {
            //   echo "updated database";
            // }
            // else {
            //   echo "failed to update database";
            // }
        
            // $members = $_POST['member'];
            // $percentages = $_POST['percentage'];
        
            
        }
          
        
          if(isset($_POST['cancel'])) {
            cancel_form();
          }
        
          if(isset($_POST['submit'])) {
            submit_form();
          }
        
          header("Location:page.php");
                
                    
?>        
