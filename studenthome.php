<?php
session_start();
?>
<?php
$stdname = $_SESSION["name"];
 $connection = mysqli_connect("localhost","root","");
 $db = mysqli_select_db($connection,"markmgmt");
 $query= "SELECT * FROM `studentinfo` WHERE `student_id`='$stdname'";
 $result=mysqli_query($connection,$query);
 $row=mysqli_fetch_array($result);
 $course=$row['courses'];
 $full_name= $row['full_name'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta  charset="utf-8">
  <title>Studen Home</title>
  <link rel="stylesheet" type = "text/css" href="css/studenthome.css" >
  <link rel="stylesheet" href="css/chat.css">
  <link rel="stylesheet" href="css/chatbothome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <!-- navigation bar -->
<div class="container">
    <div class="navbar">
        <h2>Marks Management System</h2>
        <nav>
            <ul>
                <li><a href="">HOME</a></li>
                <li><a href="aboutstudent.html">ABOUT</a></li>
                <li><a href="contactstudent.html">CONTACT</a></li>
                <li><a href="login.php">Log out</a></li>
            </ul>   
        </nav>
    </div>
    <h1>Welcome <?php echo $row['full_name']; ?></h1>

    
    <h3 class="heading">MarkSheet</h3>
     <table id="table">
       <thead>
         <tr>
                        <th width="20%">Subject</th>                       
                        <th width="5%">Credit Hrs</th>                       
                        <th width="5%">PM</th>                       
                        <th width="5%">FM</th>                       
                        <th width="5%">Obtained</th>
         </tr>
       </thead>
       <tbody>
       <?php
       $connection = mysqli_connect("localhost","root","");
         $db = mysqli_select_db($connection,"$course");
         $tables = array();
         $sql = "SHOW TABLES FROM $course";
         $result = mysqli_query($connection,$sql);
         while ($row = mysqli_fetch_row($result)) {
         $tables[] = $row[0];    
        }
        foreach ($tables as $table)  {
           
        
         $sql1="SELECT * FROM $table";
         $result=mysqli_query($connection,$sql1);
        $row=mysqli_fetch_array($result)
         ?>

           <tr>
           <td data-label="Subject" name= "Subject"> <?php echo $table; ?> </td>
           <td data-label="Credit Hrs" name= "Credit Hrs"> 4 </td>
           <td data-label="PM" name= "PM" >40</td>
           <td data-label="FM" name="FM">100</td>
           <td data-label="Obtained" name= "Obtained"><?php if($row["marks"]==0){
            echo "Not graded yet";
           }
           else{
            echo $row["marks"];
           } ?></td>
         
          </tr>
          <?php
        }
          ?>

       </tbody>
     </table>
     <input type="button" id="btnExport" value="Export" onclick="Export()" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('table'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                }
            });
        }
    </script>

</div>

</div>
 <!-- CHAT BAR BLOCK -->
<div class="chat-bar-collapsible">
    <button id="chat-button" type="button" class="collapsible">
        <i id="chat-icon" style="color: #fff;" class="fa fa-fw fa-comments-o"></i>
    </button>
    
            <div class="content">
                <div class="full-chat-block">
                    <!-- Message Container -->
                     <div class="outer-container">
                        <div class="chat-container">
                            <!-- Messages -->
                             <div id="chatbox">
                                <h5 id="chat-timestamp"></h5>
                                <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                            </div>
     
                            <!-- User input box -->
                            <div class="chat-bar-input-block">
                                <div id="userInput">
                                    <input id="textInput" class="input-box" type="text" name="msg"
                                        placeholder="Tap 'Enter' to send a message">
                                    <p></p>
                                </div>
    
                                <div class="chat-bar-icons">
                                    
                                    <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send"
                                        onclick="sendButton()"></i>
                                </div>
                            </div>
    
                            <div id="chat-bar-bottom">
                                <p></p>
                            </div>
    
                        </div>
                    </div>
    
                </div>
                
            </div>
        
  </div>  
 <div class="footer">
    <p1>Copyright © 2022, Marks Management System. All Right Reserved.</p1>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
function getBotResponse(input) {    
    if (input == "BBA"||input=="bba"||input=="Bba") {        
        return "Your request for BBA will be register please select the subject you want to concerner <br>1)business_law_and_ethics<br>2)managing_brands<br>3)personal_finance<br>Type bba infront of the number of the subject <br>For eg: bba1";
    } 
    else if (input == "BIT"||input=="bit"||input=="Bit") {
        return "Your request for BBA will be register please select the subject you want to concerner <br>1)big_data<br>2)databases<br>3)programming<br>4)project<br>Type bit infront of the number of the subject <br>For eg: bit1";
    }
    else if(input=="BBA1"||input=="bba1"||input=="Bba1"){
        <?php 
        
        
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"markmgmt");
        $query1= "INSERT INTO `notification`( `student_id`, `student_name`, `subject`)  
        VALUES ('$stdname','$full_name', 'business_law_and_ethics')";
        $result1=mysqli_query($connection,$query1);
            
        ?>
        
        return "Notification Send"

    }
    else if(input=="BBA2"||input=="bba2"||input=="Bba2"){
        <?php 
        
        
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"markmgmt");
        $query1= "INSERT INTO `notification`( `student_id`, `student_name`, `subject`)  
        VALUES ('$stdname','$full_name', 'managing_brands')";
        $result1=mysqli_query($connection,$query1);
            
        ?>
        
        return "Notification Send"
        
    }
    else if(input=="BBA3"||input=="bba3"||input=="Bba3"){
        <?php 
        
        
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"markmgmt");
        $query1= "INSERT INTO `notification`( `student_id`, `student_name`, `subject`)  
        VALUES ('$stdname','$full_name', 'personal_finance')";
        $result1=mysqli_query($connection,$query1);
            
        ?>
        
        return "Notification Send"
        
    }
    else if(input=="BIT1"||input=="bit1"||input=="Bit1"){
        <?php 
        
        
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"markmgmt");
        $query1= "INSERT INTO `notification`( `student_id`, `student_name`, `subject`)  
        VALUES ('$stdname','$full_name', 'big_data')";
        $result1=mysqli_query($connection,$query1);
            
        ?>
        
        return "Notification Send"
        

    }
    else if(input=="BIT2"||input=="bit2"||input=="Bit2"){
        <?php 
        
        
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"markmgmt");
        $query1= "INSERT INTO `notification`( `student_id`, `student_name`, `subject`)  
        VALUES ('$stdname','$full_name', 'databases')";
        $result1=mysqli_query($connection,$query1);
            
        ?>
        
        return "Notification Send"
    
    }
    else if(input=="BIT3"||input=="bit3"||input=="Bit3"){
        <?php 
        
        
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"markmgmt");
        $query1= "INSERT INTO `notification`( `student_id`, `student_name`, `subject`)  
        VALUES ('$stdname','$full_name', 'programming')";
        $result1=mysqli_query($connection,$query1);
            
        ?>
        
        return "Notification Send"
    
    }
    else if(input=="BIT4"||input=="bit4"||input=="Bit4"){
        <?php 
        
        
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"markmgmt");
        $query1= "INSERT INTO `notification`( `student_id`, `student_name`, `subject`)  
        VALUES ('$stdname','$full_name', 'project')";
        $result1=mysqli_query($connection,$query1);
            
        ?>
        
        return "Notification Send"
    
    }
  
    //  else if (input == "Nepali") {
    //     return "Your request have been register is there anyother subject teacher u want to concerner";
    // }
    // Simple responses
    else if (input == "hello"||input=="hi"||input=="Hi"||input=="HI"||input=="HELLO"||input=="Hello") {
        return "Hello there!";
    } else if (input == "goodbye"||input=="bye"||input=="Bye"||input=="BYE"||input=="Goodbye"||input=="GOODBYE"||input=="NO"||input=="no"||input=="No") {
        return "Talk to you later!";
    } else {
        return "Couldn't understand that try asking something else!";
    }
}</script>
<script src="js/chat.js"></script>
</html>
