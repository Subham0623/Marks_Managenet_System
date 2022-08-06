<?php
session_start();
?>
<?php



if (isset($_POST['Submit'])){
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"markmgmt");
    $first_name =  $_POST['fullname'];
    $studentid = $_POST['studentid'];
    $gender =  $_POST['genderlist'];
    $birthDate = $_POST['birthDate'];
    $email = $_POST['email'];
    $contactnumber =  $_POST['contactnumber'];
    $password = $_POST['password'];
    $course = $_POST['courses'];
    $query= "SELECT * FROM `studentinfo` WHERE ('studentid'='$studentid')";
    $result=mysqli_query($connection,$query);
    $row= $result -> fetch_row();
    if($row==0 ){
        
            if(!empty($gender)&& !empty($course)){
                $query1= "INSERT INTO `studentinfo`(`full_name`, `student_id`, `dob`, `contact_no`, `gender`, `password`, `email`, `courses`)  
                VALUES ('$first_name','$studentid','$birthDate','$contactnumber','$gender','$password',' $email','$course')";
                $result1=mysqli_query($connection,$query1);
                
                $query2="INSERT INTO `logininfo`(`username`, `password`, `usertype`) VALUES ('$studentid','$password','student')";
                $result2=mysqli_query($connection,$query2);
                mysqli_close($connection);
                header("Location: dashboard.php");
                die();
            }
            else{
                echo '<script>alert("Gender or Course empty")</script>';
            }
        }
       
    else{
        echo '<script>alert("Student Id already exist")</script>';
    }
}

?> 
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
                        <li><a href="adminhome.html">HOME</a></li>
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
                    <input type="text"  placeholder="Enter your Full Name" required name="fullname"/>    
                </div>
                <div class="studentid">
                    <span class="details">Student ID</span>
                    <input type="text"  placeholder="Enter Student ID"  required name="studentid" /> 
                </div>
                <div class="birthDate">
                    <span class="details">Birth date</span>
                    <input type="date"  placeholder="Enter the dob" required name="birthDate" />    
                </div>
                
                <div class="contactnumber">
                    <span class="details">Contact Number</span>
                    <input type="text"  placeholder="Enter the contact number" required name="contactnumber" />    
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
                    <input type="text"   placeholder="Enter the Email" required name="email" />    
                </div>  
                <div class="password">
                    <span class="details">Password</span>
                    <input type="password"   placeholder="Enter the Password" required name="password" />    
                </div>
                <div class="course">
                    <span class="details">Course</span>
                       
                    <div>                       
                        <select name="courses" id="coursess">
                        <?php
                         $connection = mysqli_connect("localhost","root","");
                         $db = mysqli_select_db($connection,"markmgmt");
                         $sql="SELECT * FROM courseinfo";
                         $result=mysqli_query($connection,$sql);
                         while($row=mysqli_fetch_array($result)){
                         ?>
                        <option value=<?php echo "{$row['course_name']}"?>><?php echo "{$row['course_name']}"?></option>
                        <?php }?>
                        
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