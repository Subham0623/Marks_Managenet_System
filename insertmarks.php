<?php
session_start();
?>
<?php
$tablename = $_SESSION["name"];
$dbname = $_SESSION["pass"];
$id = $_GET['id'];
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"$dbname");
if (isset($_POST['Submit'])){
  $connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"$dbname");
$mark=$_POST['marks'];
    $query= "UPDATE `$tablename` SET `marks`='$mark' WHERE `student_id` = $id";
    $result1=mysqli_query($connection,$query);
    
    header("Location: studentlistinsertmarks.php");
    die();
}
$sql="SELECT * FROM `$tablename` where student_id = {$id}";
// $result=mysqli_query($connection,$sql);
$result=$connection->query($sql);
$row=mysqli_fetch_array($result);
   
?>
<html>
<head>
<meta  charset="utf-8">
  <title>Insert Mark</title>
  <link rel="stylesheet" type = "text/css" href="css/insertmarks.css" >
</head>
<body>
<div class="container">
    <div class="navbar">
        <h2>Marks Management System</h2>
        <nav>
            <ul>
                <li><a href="instructorhome.css">HOME</a></li>
                <li><a href="">ABOUT</a></li>
                <li><a href="contactinstructor.html">CONTACT</a></li>
                <li><a href="login.php">Log out</a></li>
            </ul>   
        </nav>
    </div>
    <form  method="post">
            <div class ="user-details">
                <div class="fullname">
                <span class="details">Full Name</span>
                    <input type="text"  value= <?php echo "'{$row['student_name']}'"?> placeholder="Enter your Full Name" required name="fullname"/>    
                </div>
                <div class="studentid">
                    <span class="details">Student ID</span>
                    <input type="text" value= <?php echo "'{$row['student_id']}'"?> placeholder="Enter Student ID"  required name="studentid" /> 
                </div>
                <div class="marks">
                    <span class="details">Student ID</span>
                    <input type="text" value= <?php echo "'{$row['marks']}'"?>placeholder="Enter Marks"  required name="marks" /> 
                </div>
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
