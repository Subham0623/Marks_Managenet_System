<?php

$id = $_GET['id'];
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"markmgmt");
if (isset($_GET['delete'])){
    $query="delete from studentinfo where student_id= {$id}";
    $result=mysqli_query($connection,$query);
    header("Location: studentlist.php");
    die();
}
if (isset($_POST['edit'])){
    $query= "update studentinfo set full_name = '{$_POST['fullname']}', birthDate = '{$_POST['birthDate']}', familyCount = {$_POST['familyCount']}, contactnumber = {$_POST['contactnumber']}, farmingCrops = '{$_POST['farmingCrops']}', productionRate = {$_POST['productionRate']}, marketRate = {$_POST['marketRate']}, farmerRate = {$_POST['farmerRate']} where id = {$id} ";
    $result=mysqli_query($connection,$query);
    header("Location: studentlist.php");
    die();
}
$sql="SELECT * FROM studentinfo where student_id = {$id}";
// $result=mysqli_query($connection,$sql);
$result=$connection->query($sql);
$row=mysqli_fetch_array($result);
   
?>
<!-- using html and php for making detail farmer form -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href="css/createprofile.css" >
    <title>Create profile</title>
</head>
<body>
<div class="container">
            <div class="navbar">
                <h2>Marks Management System</h2>
                <nav>
                    <ul>
                        <li><a href="">HOME</a></li>
                        <li><a href="about.html">ABOUT</a></li>
                        <li><a href="contact.html">CONTACT</a></li>
                    </ul>   
                </nav>
            </div>
            <div class="cp">
            <h3>Create Profile</h3>
            </div>
            <form  method="post">
            <div class ="user-details">
                <div class="fullname">
                <span class="details">Full Name</span>
                    <input type="text"  value= <?php echo "'{$row['full_name']}'"?> placeholder="Enter your Full Name" required name="fullname"/>    
                </div>
                <div class="studentid">
                    <span class="details">Student ID</span>
                    <input type="text" value= <?php echo "'{$row['student_id']}'"?> placeholder="Enter Student ID"  required name="studentid" /> 
                </div>
                <div class="birthDate">
                    <span class="details">Birth date</span>
                    <input type="date" value= <?php echo "'{$row['dob']}'"?> placeholder="Enter the dob" required name="birthDate" />    
                </div>
                
                <div class="contactnumber">
                    <span class="details">Contact Number</span>
                    <input type="text" value= <?php echo "'{$row['contact_no']}'"?> placeholder="Enter the contact number" required name="contactnumber" />    
                </div>
                 <div class="gender">
                    <span class="details">Gender</span>
                       
                    <div>
                        <select name="genderlist" id="genderl" >
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>
                </div> 
                </div>
                
                <div class="email">
                    <span class="details">Email</span>
                    <input type="text" value= <?php echo "'{$row['password']}'"?>  placeholder="Enter the Email" required name="email" />    
                </div>  
                <div class="password">
                    <span class="details">Password</span>
                    <input type="password" value= <?php echo "'{$row['email']}'"?>  placeholder="Enter the Password" required name="password" />    
                </div>
                <div class="course">
                    <span class="details">Course</span>
                       
                    <div>
                        <select name="courses" id="coursess">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>
                </div> 
                </div>  
            <!-- resetting if press on cancel -->
                
                    <!-- Submitting the file if pressed at create button  -->
                    <div class="button1">
                        <input type="Submit" value="Submit" name="Submit">    
                    </div>  
                    

            </div>
        </form>
</div>
<div class="footer">
                <p1>Copyright © 2022, Marks Management System. All Right Reserved.</p1>
            </div>
    
</body>
</html>