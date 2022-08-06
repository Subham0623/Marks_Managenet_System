<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta  charset="utf-8">
    <title>Student Insert Marks</title>
    <link rel="stylesheet" type="text/css" href="css/studentlist.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <h2>Marks Management System</h2>
            <nav>
                <ul>
                    <li><a href="adminhome.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="">CONTACT</a></li>
                    <li><a href="login.php">Log out</a></li>
                </ul>   
            </nav>
        </div>
        

        <div class="table-container">
    
     <h1 class="heading">Student Details</h1>
     <table class="table">
       <thead>
         <tr>
         <th>Student ID</th>
                        <th width="18%">Student Name</th>
                                          
                        <th width="15%">Marks</th>
                        
           <th>Option</th>
           
         </tr>
       </thead>
       <tbody>
       <?php
       $tablename = $_SESSION["name"];
       $dbname = $_SESSION["pass"];
       $connection = mysqli_connect("localhost","root","");
         $db = mysqli_select_db($connection,"$dbname");
         $sql="SELECT * FROM `$tablename`";
         $result=mysqli_query($connection,$sql);
         while($row=mysqli_fetch_array($result)){
         ?>

           <tr>
           <td data-label="Student ID" name= "Student ID"> <?php echo $row["student_id"]; ?> </td>
           <td data-label="Student Name" name= "Student Name"> <?php echo $row["student_name"]; ?> </td>
           <td data-label="Marks" name= "Marks"><?php echo $row["marks"]; ?></td>
           <td data-label="Option"><a href=<?php echo "insertmarks.php?id={$row['student_id']}"?> class="btn-danger">Add Marks</a></td>
          
         
          </tr>

          <?php
         } ?>
       </tbody>
     </table>
     <a href="#">
        <div >
     <button3 type="button" id = "ex_btn"style="border-style: solid;padding:15px;margin-left: 600px;border-radius: 30px;text-decoration:none; background-color: rgb(87, 198, 148);text-align: center;  ">Export </button3>
    </a>
        </div>
    </div>
        </div>
    
    <div class="footer">
        <p1>Copyright © 2022, Marks Management System. All Right Reserved.</p1>
    </div>
</main>
</body>

</html>
