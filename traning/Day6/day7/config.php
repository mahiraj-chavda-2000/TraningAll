<?php 
        
        $msg="";
        function cancel_form() {
            echo "cancel pressed";
            //display_results();
          }
        
        function submit_form() {
            require('connect.php');
        
            $sql = "DELETE FROM NewTable";
            if(mysqli_query($conn, $sql)) {
              echo "updated database";
            }
            else {
              echo "failed to update database";
            }
        
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
                $sql = "INSERT INTO NewTable (noofmembers,percentage) VALUES ('$member','$percentage')";
                if(mysqli_query($conn, $sql)) {
                  echo "<script>console.log('data updated successfully')</script>";
                }
                else {
                  echo "<script>console.log('failed to update data')</script>";

                }
              }
            }
        }
          
        
          if(isset($_POST['cancel'])) {
            cancel_form();
          }
        
          if(isset($_POST['submit'])) {
            submit_form();
          }
        
          header("Location:page.php");
                
                    
?>        
