<?php
session_start();
?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href="css/notification.css" >
    <title>Notification</title>
</head>
<body>
<div class="container">
        <div class="navbar">
            <h2>Marks Management System</h2>
            <nav>
                <ul>
                    <li><a href="">HOME</a></li>
                    <li><a href="aboutinstructor.html">ABOUT</a></li>
                    <li><a href="contactinstructor.html">CONTACT</a></li>
                    <li><a href="login.php">Log out</a></li>
                </ul>   
            </nav>
        </div>
        <div class="greeting">
          <h1>Notification</h1>
        </div>
        <table>
        <?php
        $subjectname = $_SESSION["name"];
       $connection = mysqli_connect("localhost","root","");
         $db = mysqli_select_db($connection,"markmgmt");
         $sql="SELECT * FROM `notification` WHERE `subject`='$subjectname'";
         $result=mysqli_query($connection,$sql);
         while($row=mysqli_fetch_array($result)){
         ?>
            <tr>
                <td>You have got an request for the meeting from a student whose student id is <?php echo $row['student_id'];?> and his name is <?php echo $row['student_name'];?></td>

            </tr>
            <?php } ?>
        </table>
</div>

        <div class="footer">
      <p1>Copyright © 2022, Marks Management System. All Right Reserved.</p1>
    </div>     
</body>
</html>