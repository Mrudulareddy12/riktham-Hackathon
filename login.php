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
    background-image:url("tlogin1.jpg");
    background-size:cover;
    color: black;  
    font-family: verdana;  
    font-size: 100%  
      
        }  
            h1 {  
    color: black;  
    font-family: verdana;  
    font-size: 100%;  
}  
         h2 {  
    color: black;  
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
 <marquee><h1 style="font-size:200%">Login Form</h1></marquee>   
 <div class="navbar">
   <a href="http://localhost/clean/home.html"><button class="btn" align="right"><i class="fa fa-home"></i></button></a>
  <a href="http://localhost/clean/register.php">Register</a>
  <div class="dropdown">
    <button class="dropbtn">More
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="http://localhost/clean/home.html">Home</a>
      <a href="http://localhost/clean/register.php">New User Registration</a>
       <a href="forgot.php">forgot Password</a>
    </div>
  </div>
</div>
<center><h3 style="font-size:150%">Login Form</h3></center>  
<form action="login.php" method="POST">  
<div><center>
<table>
<tr><td>Username:</td><td><input type="text" name="user"></td></tr> 
<tr><td>Password:</td><td><input type="password" name="pass"></td></tr>  
</table>
<input type="submit" value="Login" name="submit">
</center>
 </div> 
</form>  
<?php  
if(isset($_POST["submit"])){  
  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
  
    $con=mysqli_connect('localhost','root','','clean') or die("Can't connect to server");  
    mysqli_select_db($con,'clean') or die("cannot select DB");  
  
    $query=mysqli_query($con,"SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['username'];  
    $dbpassword=$row['password'];  
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
  	echo '<a href=upload.php  target=_blank>Click here to report the issue</a>';
    }  
    } else {  
    echo "Invalid username or password!";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>
</body>
</html>