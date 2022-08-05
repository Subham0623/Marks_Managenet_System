<?
session_start()
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta  charset="utf-8">
  <title>login</title>
  <link rel="stylesheet" type = "text/css" href="login.css" >
</head>
  <body text= #68b2a0 >
    <div id="header"><img src='logo.png' alt=""></div>
    <h2 style="text-align:center;">Marks management system</h2>
  <div  id = "frm" class ="center">
    <h1>Login</h1>
    <form  action = "login.php"   method = "POST">
      <div class ="txt_field">
        <input type="text" id ="user" name  = "user" /> 
        <span></span>
        <label>Username</label>
      </div>
      <div class ="txt_field">
        <input type="Password"  id ="pass" name  = "pass" />  
        <span></span>
        <label>Password</label>
      </div>
      <div class="custom-select">
                    <span class="details">Usertype</span>
                    <select id="na" name="type">
                      <option value="Admin">Admin</option>
                      <option value="Instructor">Instructor</option>
                      <option value="Student">Student</option>

                    </select>
                  </div>
                  <br><br>
                  <input type="submit" name="btn" id = "btn" value = "Login"  />  
                  <br><br>
                 
                  

  </form>

</body>

<?php
if(isset($_POST["btn"])){
  $host = "localhost";  
  $user = "root";  
  $password = '';  
  $db_name = "darkknightlogin";  
    
  $con = mysqli_connect($host, $user, $password, $db_name);  
  if(mysqli_connect_errno()) {  
      die("Failed to connect with MySQL: ". mysqli_connect_error());  
 
  
  }  
  $username = $_POST['user'];  
  $password = $_POST['pass'];
  $usertype = $_POST['type'];

    
      //to prevent from mysqli injection  
      $username = stripcslashes($username);  
      $password = stripcslashes($password);  
      $username = mysqli_real_escape_string($con, $username);  
      $password = mysqli_real_escape_string($con, $password);  
    
      $sql = "select *from login where Username = '$username' and Pass = '$password'";  
      $result = mysqli_query($con, $sql);  
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count = mysqli_num_rows($result);  
        
      if($count == 1){ 
        if($usertype=='Admin'){ 
          if ($username== 'Admin'){
              // header ("Location: se.html");   
          }
          else{
            // header ("Location: login1.php");  
          }
        }
        else{
          if($username!='Admin'){
              // $_SESSION["name"]=$_POST['user'];
              // header ("Location: dashboard.php");  
          }
          else{  
        
            // header ("Location: login1.php");  
        }   
        }
        
      }  
      else{  
        
          // header ("Location: login1.php");  
      }     
}


?>