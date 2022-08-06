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
 $_SESSION=$row['courses'];
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
    
    <h1 class="heading">MarkSheet</h1>
     <table class="table">
       <thead>
         <tr>
                        <th width="20%">subject</th>
                        <th width="10%">Subject code</th>                        
                        <th width="5%">credit hrs</th>                       
                        <th width="5%">PM</th>                       
                        <th width="5%">FM</th>                       
                        <th width="5%">Obtained</th>
         </tr>
       </thead>
       <tbody>

       </tbody>
     </table>
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
<script src="js/response.js"></script>
<script src="js/chat.js"></script>
</html>