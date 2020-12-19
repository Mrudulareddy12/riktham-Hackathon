
<!doctype html>  
<html>  
<head>  
<title>Register</title>  
    <style>   
        body{  
    margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-color:black;
    background-image:url("tregister.jpg");
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
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
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
  min-width: 160px;
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
 <marquee><h1 style="font-size:300%">NEW USER REGISTRATION</h1></marquee>  
        <div class="navbar">
<a href="http://localhost/project/OAM.html"><button class="btn" align="right"><i class="fa fa-home"></i></button></a>
  <a href="http://localhost/project/login.php">Teacher Login</a>
  <div class="dropdown">
    <button class="dropbtn">More
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="http://localhost/clean/home.html">Home</a>
      <a href="http://localhost/clean/login.php">User Login</a>
    </div>
  </div>
</div>
    <center><h1>REGISTRATION FORM</h1></center>    
<form action="" method="POST">  
    <legend>  
    <fieldset> 
<table> 
<tr><td align='center'>Firstname:</td>
<td><input type="text" name="fname"><br/></td></tr>
<tr><td align='center'>Lastname:</td>
<td><input type="text" name="lname"></td><br/></tr>
<tr><td align='center'>Phonenumber:</td>
<td><input type="text" name="phone"></td><br/></tr>
<tr><td align='center'>EmployeeId:</td>
<td><input type="text" name="eid"></td><br/></tr>
<tr><td align='center'>EmailId:</td>
<td><input type="email" name="email"></td><br/></tr>          
<tr><td align='center'>Username: </td>
<td><input type="text" name="user"></td><br /> </tr>
<tr><td align='center'>Password:</td>
<td align='center'> <input type="password" name="pass"></td><br /></tr>
  </table>
<input type="submit" value="Register" name="submit" />  
              
        </fieldset>  
        </legend>  
</form>  
<?php  
if(isset($_POST["submit"])){  
if(!empty($_POST['fname'])&&!empty($_POST['lname'])&&!empty($_POST['phone'])&&!empty($_POST['eid'])&&!empty($_POST['email'])&&!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $eid=$_POST['eid'];
     $phone=$_POST['phone'];
    $email=$_POST['email'];
    $con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con,'user-registration') or die("cannot select DB");  
  
    $query=mysqli_query($con,"SELECT * FROM login WHERE username='".$user."'");  
if($query)
$arr= mysqli_fetch_array($query);
else
$arr=[];
if($arr==null)
$numrows=0;
else
    $numrows=mysqli_num_rows($arr);  
    if($numrows==0)  
    {  
    $sql="INSERT INTO login(Firstname,Lastname,phonenumber,employeeid,emailid,username,password) VALUES('$fname','$lname','$phone','$eid','$email','$user','$pass')";  
  
    $result=mysqli_query($con,$sql);  
        if($result){  
    echo "Account Successfully Created";  
    } else {  
    echo "Failure!";  
    }  
  
    } else {  
    echo "That username already exists! Please try again with another.";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html>   
