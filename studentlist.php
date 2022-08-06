<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta  charset="utf-8">
    <title>studentlist</title>
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
                </ul>   
            </nav>
        </div>
        

        <div class="table-container">
    
     <h1 class="heading">Farmer Details</h1>
     <div class="add">
      <h5>Student Detail</h5>
      
        </div>
     <table class="table">
       <thead>
         <tr>
         <th>Student ID</th>
                        <th width="18%">Student Name</th>
                        <th width="15%">Date of Birth</th>                        
                        <th width="15%">Contact</th>                       
                        <th width="5%">Gender</th>                       
                        <th width="15%">Email</th>                       
                        <th width="15%">Course</th>
                        
           <th>Option</th>
           <th>Option</th>
         </tr>
       </thead>
       <tbody>
       <?php
       $connection = mysqli_connect("localhost","root","");
         $db = mysqli_select_db($connection,"markmgmt");
         $sql="SELECT * FROM studentinfo";
         $result=mysqli_query($connection,$sql);
         while($row=mysqli_fetch_array($result)){
         ?>

           <tr>
           <td data-label="Student ID" name= "Student ID"> <?php echo $row["student_id"]; ?> </td>
           <td data-label="Student Name" name= "Student Name"> <?php echo $row["full_name"]; ?> </td>
           <td data-label="Date of Birth" name= "Date of Birth" ><?php echo $row["dob"]; ?></td>
           <td data-label="Contact" name="Contact"><?php echo $row["contact_no"]; ?></td>
           <td data-label="Gender" name= "Gender"><?php echo $row["gender"]; ?></td>
           <td data-label="Email" name= "Email"><?php echo $row["email"]; ?></td>
           <td data-label="Course" name= "Course"><?php echo $row["courses"]; ?></td>
           <td data-label="Option"><a href=<?php echo "edit.php?id={$row['student_id']}"?> class="btn-danger">Edit</a></td>
           <td data-label="Option"><a href=<?php echo "edit.php?id={$row['student_id']}&delete=delete"?> class="btn">Delete</a></td>
         
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
<script>
    function arrayToCsv(data){
  return data.map(row =>
    row
    .map(String)  // convert every value to String
    .map(v => v.replaceAll('"', '""'))  // escape double colons
    .map(v => `"${v}"`)  // quote it
    .join(',')  // comma-separated
  ).join('\r\n');  // rows starting on new lines
}
function downloadBlob(content, filename, contentType) {
  // Create a blob
  var blob = new Blob([content], { type: contentType });
  var url = URL.createObjectURL(blob);

  // Create a link to download it
  var pom = document.createElement('a');
  pom.href = url;
  pom.setAttribute('download', filename);
  pom.click();
}


document.getElementById("ex_btn").onclick=function(){
	let lst=[["Student ID","Student Name","Date of Birth", "Contact", "Gender", "Email", "Course"]];
  let temp_lst=[];
  for(let i of lst[0]){
  	let el=document.getElementsByName(i);
    temp_lst.push(el);
    
  }
  for(let i=0;i<temp_lst[0].length;i++){
  		let temp1=[];
  		for(let j of temp_lst){
      	temp1.push(j[i].innerText);
      };
      lst.push(temp1);
  }
    console.log(lst);
    let data=arrayToCsv(lst);
    console.log(data);
    downloadBlob(data,'export.csv', 'text/csv;charset=utf-8;')
  
}
</script>
</html>
