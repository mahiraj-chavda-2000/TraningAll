<?php
require("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10th</title>

</head>
 
<body>
    
    <div class="MyDiv" id="hideDiv" style="display:none;">
               
                number of members:<input type="text" name="member[]" id="member" reduired>
                Percentage:<input type="text" name="percentage[]" id="percentage" reduired>
                <button onclick="return removeDiv()" id="removebtn">-</button>
                <button id="addbtn" onclick="return cloneDiv()" type="button">+</button><br>
            </div>
    <form name="MyForm" method="POST" id="myForm" action="config.php">
        <div class="formclass">
            
                <?php
                    $query2="SELECT * from NewTable";
                    $result=$conn->query($query2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_array()) {
                            ?>
                            <div class="MyDiv" id="<?php echo $row['id']; ?>">
                                <!-- <input type="text" value="<?php echo $row['id']; ?>" name="idupdate[]" style="width:35px;opacity:1;" readonly> -->
                                number of members:<input type="text" name="member[]" id="member" value="<?php echo $row['noofmembers']; ?>">
                                Percentage:<input type="text" name="percentage[]" id="percentage" value="<?php echo $row['percentage']; ?>">
                                <input type="hidden" name="fordelval[]" id="fordelvalid" value="<?php echo $row['id']; ?>">
                                <button onclick="return deleteBtn(this,<?php echo $row['id']; ?>)" name="delete" id="<?php echo $row['id']; ?>" >-<input type="hidden" name="hidden1[]" id="hiddenid1" value="0"></button>
                                <button id="addbtn" onclick="return cloneDiv()" type="button">+</button>
                                
                            </div>
                            
                            
                            <?php

                        }
                    } else {
                        echo "No Data Found";
                    }
                
                ?>
                <div class="xyz" id="appendDiv"></div>
            <div class="MyDiv" id="npd" style="text-align:right;">
                
                <button id="addbtn" onclick="return cloneDiv()" type="button">+</button>
            </div>
            
            
            <p id="valid" style="color:red;"><?php echo $msg; ?></p>
            <br><br>
            <button class="savebtn" onClick="return validation()" name="submit" value="save" id="sbtn" type="submit">save</button>
            <button class="canclebtn">Cancle</button>
           
            
        </div>
        
    </form>
    
    <script>
        
    var counter = 0;
    var cDiv=[];
    var text="";
    
    localStorage.removeItem("arr_del");
    function cloneDiv() {
        let c = document.querySelector("#hideDiv");
        var text = document.querySelectorAll("#appendDiv")[0].appendChild(c.cloneNode(true));
        text.children.member.value="";
        text.children.percentage.value="";
        
        for(let i=0;i<counter+1;i++){
            var nDiv = cDiv.push(text);
           
        }

        text.style.display="block";
        return false;
        
    }

    function removeDiv() {
        let deleteButton = document.querySelector("#hideDiv");

        if (counter >= 0) {
            deleteButton.remove();
           
        }
        return false;

    }
  
     

    function validation(cDiv) {

        var tp1=document.MyForm.member.value;
        var tp2=document.MyForm.percentage.value;
        if( tp1 == '' || tp2 == ''){
            
            document.getElementById("valid").innerHTML = "Please Fill All Field";
            // return false;
        }
        else{
            document.getElementById("valid").style.display="none";
            return true;
            
        }
        
        

        for(let i=0;i<1; i++){
                var nm=cDiv[i].children.member.value;
                var per=cDiv[i].children.percentage.value;

                if(nm == "" || per == ""){
                    document.getElementById("valid").innerHTML = "Please Fill All Field";
                    return false;
                }

                document.getElementById("valid").style.display="none";
                
                return true;
                
                
                
        }

        // document.getElementById("hideDiv").style.display="block";
        return false;      
                 
        // document.getElementById("myForm").submit();
    }

        var arr_del=[];
        function deleteBtn(e,deleteid){
            let deleteButton = document.getElementById(deleteid);
            let delB = deleteButton.remove();

            return false;
        }
             
    </script>
    
</body>
       
</html>