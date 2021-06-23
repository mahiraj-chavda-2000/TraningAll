<?php 
        
        $msg="";
        function cancel_form() {
            echo "cancel pressed";
            //display_results();
          }


        // function delete_form(){
        //     $id=$_POST['id'];
        //     echo $id;

        // }
        
        function submit_form() {
            require('connect.php');

            $id = $_POST['id'];



        

            
            // $m=$_POST['member'];
            // $p=$_POST['percentage'];
            // // console.log($id);
            // // console.log($m);

            // // console.log($p);
            // for ($x = 0; $x < count($_POST['member']); $x++) {
            // $sql= "SELECT * FROM `MyTable` WHERE `id` = $id[$x]";
            
            // mysqli_query($conn,$sql);
            // $val=mysqli_affected_rows($conn);
            // echo $val;
            // if ($val==1) {
            //     $sql="UPDATE `MyTable` SET `noofmembers` = $m[$x], `percentage` = $p[$x] WHERE `mahi`.`id` = $id[$x]";
            //     mysqli_query($conn,$sql); 
            // }
            // else{
            //     $sql2="INSERT INTO `mahi` (`noofmembers`, `percentage`) VALUES ($m[$x], $p[$x])";
            //     mysqli_query($conn,$sql2);
            // }
            
            // }


            

            // $sql = "DELETE FROM MyTable";
            // if(mysqli_query($conn, $sql)) {
            //   echo "updated database";
            // }
            // else {
            //   echo "failed to update database";
            // }
            // $id=$_POST['id'];
            $members = $_POST['member'];
            $percentages = $_POST['percentage'];
        
            for ($i=0; $i < count($percentages); $i++) { 
            //   $id = $id[$i];
              $member = $members[$i];
              $percentage = $percentages[$i];
              if($member == '' or $percentage == '') {
                continue;
                $msg="please fill all fields";
              }
              else {
                
                echo "$id";
                echo "$member";
                echo " ";
                echo "$percentage";
                $sql = "INSERT INTO MyTable (noofmembers,percentage) VALUES ('$member','$percentage')";
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

        //   if(isset($_POST['delete']){
        //       delete_form();
        //   })
        
          header("Location:10.php");
                
                    
?>