<!doctype html>  
<html>  
<head>  
<title>Login</title>  
<style>   
        body{  
    margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-color:black;
    background-image:url("slofgin2.jpg");  
    color: white;  
    font-family: verdana;  
    font-size: 100%  
      
        }  
            h1 {  
    color: white;  
    font-family: verdana;  
    font-size: 150%;  
}  
         h2 {  
    color: white;  
    font-family: verdana;  
    font-size: 100%;  
}
.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 12px 14px;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 14px;  
  border: none;
  outline: none;
  color: white;
  padding: 12px 14px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color:black;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: silver;
  min-width: 140px;
  box-shadow: 0px 8px 16px 0px black;
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color:silver;
}

.dropdown:hover .dropdown-content {
  display: block;
}</style>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>  
<body>
 <marquee><h1>Online Attendance Management System</h1></marquee>   
 <div class="navbar">
   <a href="http://localhost/project/OAM.html"><button class="btn" align="right"><i class="fa fa-home"></i></button></a>
<a href="http://localhost/project/sregister.php">Student Registration</a>
  <div class="dropdown">
    <button class="dropbtn">More
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="http://localhost/project/OAM.html">Home</a>
      <a href="http://localhost/project/login.php">Teacher Login</a>
      <a href="http://localhost/project/slogin.php">Student Login</a>
        <a href="http://localhost/project/sregister.php">Student Registration</a>
  </div>
</div>
</div>
     <center><h1>Student Login</h1></center>  
<center><h3>Login Form</h3>  
<div><form action="slogin.php" method="POST">  
<table>
<tr><td>Username: </td><td><input type="text" name="sid"><br /></td></tr>  
<tr><td>Date of Birth:</td><td> <input type="DATE" name="dob"><br /></td></tr>
</table>   
<input type="submit" value="Login" name="submit" />  
</form>  </center></div>
<?php  
if(isset($_POST["submit"])){  
  
if(!empty($_POST['sid']) && !empty($_POST['dob'])) {  
    $user=$_POST['sid'];  
    $pass=$_POST['dob'];  
  
    $con=mysqli_connect('localhost','root','','user-registration') or die("Can't connect to server");  
    mysqli_select_db($con,'user-registration') or die("cannot select DB");  
  
    $query=mysqli_query($con,"SELECT * FROM students WHERE Rollno='".$user."' AND dob='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['Rollno'];  
    $dbpassword=$row['dob']; 
    $att=(int)$row['Attendance'];
    $no=(int)$row['numberofclasses'];
    $per=(int)$att/$no;
    $per=$per*100;
      
    if($user == $dbusername && $pass == $dbpassword)  
    {    
	 
	 echo '<br/>';
         echo '<br/>';
         echo '<fieldset>';
	 echo '<font color=white><legend>Your Attendance</legend>';
         echo '<h1>';
         echo '<table style=font-family:Franklin Gothic;>';
         echo '<tr>';
         echo '<td>Name:</td>';
         echo '<td>'.$row['Name'].'</td>';
         echo '</tr>';
         echo '<tr>';
         echo '<td>Rollno:</td>';
         echo '<td>'.$row['Rollno'].'</td>';
         echo '</tr>';
         echo '<tr>';
         echo '<td>Attendance:</td>';
         echo '<td>'.$row['Attendance'].'</td>'; 
         echo '</tr>';
	 echo '<tr><td>Number of classes:&nbsp;</td>';
	 echo '<td>'.$row['numberofclasses'].'</td>';
         echo '</tr>';
	  echo '<tr><td>Percentage:&nbsp;</td>';
	 echo '<td>'.$per.'</td>';
         echo '</tr>';
         echo '</table></font>';
         echo '</fieldset>';
         echo '</h1>';
     	 echo '<p align=right><button name=LOGOUT><a href=OAM.html>LOGOUT</a></button></p>';
    }  
     else {  
    echo "Invalid username or password!";  
    } 
}
} 
  
} else {  
    echo "All fields are required!";  
}  
}  
?>
</body>
</html>