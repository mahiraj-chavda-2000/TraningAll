<?php
require("connect.php");
$msg="";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10th</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


</head>
 
<body>
    
    <div class="MyDiv" id="hideDiv" style="display:none;">
                <input type="hidden" name="fordelval[]" id="fordelvalid" value="0">
                number of members:<input type="text" name="member[]" id="member" reduired>
                Percentage:<input type="text" name="percentage[]" id="percentage" reduired>
                <button class="btn btn-primary" onclick="return removeDiv()" id="removebtn">-</button>
                <!-- <button id="addbtn" onclick="return cloneDiv()" type="button">+</button><br> -->
    </div>
    <form name="MyForm" method="POST" id="myForm" action="config.php">
        <div class="formclass">
<?php
                    $query2="SELECT * from m1";
                    $result=$conn->query($query2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_array()) {
                            ?>
                            <div class="MyDiv" id="<?php echo $row['id']; ?>">
                                <input type="hidden" name="fordelval[]" id="fordelvalid" value="<?php echo $row['id']; ?>">
                                number of members:<input type="text" name="member[]" id="member" value="<?php echo $row['noofmembers']; ?>">
                                Percentage:<input type="text" name="percentage[]" id="percentage" value="<?php echo $row['percentage']; ?>">
                                <!-- <button onclick="return deleteBtn(this.id,this,<?php echo $row['id']; ?>)" name="delete" id="<?php echo $row['id']; ?>" >-</button>                                 -->
                                <a class="btn btn-primary" href="delete.php?id=<?php echo $row['id']?>" role="button">-</a>
                                <!-- <a href="delete.php?id=<?php echo $row['id']?>">-</a>                             -->
                            </div>
                            
                            
                            <?php

                        }
                    } else {
                        echo "No Data Found";
                    }
                    ?>
                <div class="xyz" id="appendDiv"></div>
            <div class="MyDiv1" id="npd" >
                
                <button class="btn btn-primary" id="addbtn" onclick="return cloneDiv()" type="button">+</button>
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
    // function removeDivi() {
    //     let deleteButton = document.getElementById("iiii");
    //     deleteButton.parentNode.removeChild(b);
    //     return false;

    // }
  
     

    function validation(cDiv) {
        
       

        //  div.parentNode.removeChild(div);
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
        // var elements = document.getElementsByClassName('MyDiv');
        // while(elements.length > 1){
        // elements[1].parentNode.removeChild(elements[1]);
        // console.log(elements.length);
        // }
        // document.getElementById("hideDiv").style.display="block";
        return false;      
                 
        // document.getElementById("myForm").submit();
    }

        // var arr_del=[];
        // function deleteBtn(id,e,deleteid){
         
        //     let deleteButton = document.getElementById(deleteid);
        //     // console.log(id);
        //     let delB = deleteButton.remove();
        //     var xhr = new XMLHttpRequest();
        //     var data = new FormData();
        //     data.append('id[]',id);
        //     xhr.open('GET', 'delete.php');
        //     xhr.onload = function () {
        //         console.log(this.response);
        //     }
        //     xhr.send(data);
        //     return false;
            
        // }
             
    </script>
    
</body>
       
</html>