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
<a href="http://localhost/clean/home.html"><button class="btn" align="right"><i class="fa fa-home"></i></button></a>
  <a href="http://localhost/clean/login.php">User Login</a>
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
<form action="" method="POST" enctype="multipart/form-data">  
    <legend>  
    <fieldset> 
<table> 
<center>
          
<tr><td align='center'>Username: </td>
<td><input type="text" name="user"></td><br /> </tr>
<tr><td align='center'>Password: </td>
<td><input type="text" name="pass"></td><br /> </tr>
<tr><td align='center'>Place:</td>
<td><input type="text" name="place"></td><br/></tr>
<tr><td align='center'>Date:</td>
<td><input type="DATE" name="dob"></td><br/></tr>
<tr><td align='center'>Upload File:</td>
<td><input type="file" name="uploadfile" value=""/></td>
</center>
 </table> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="upload file" name="submit"><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Register" name="submit"> 
              
        </fieldset>  
        </legend>  
</form>  
<?php  
if(isset($_POST["submit"]))
{  
    $user=$_POST['user'];   
    $place=$_POST['place'];
    $pass=$_POST['pass'];
    $date=$_POST['dob'];
    $filename=$_FILES["uploadfile"]["name"];
    $tempname=$_FILES["uploadfile"]["tmp_name"];
    $folder="user/".$filename;
    move_uploaded_file($tempname,$folder);

if($user!=" " && $place!=" " && $filename!=" ")
{  
    
    $con=mysqli_connect('localhost','root','','clean') or die("Can't connect to server");  
    mysqli_select_db($con,'clean') or die("cannot select DB");  
  
    $query=mysqli_query($con,"SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");  
    $numrows=mysqli_num_rows($query);   
   
    if($numrows==1)  
    {  
    $sql="INSERT INTO login1(username,picsource,place,date) VALUES('$user','$folder','$place','$date')";  
  
    $result=mysqli_query($con,$sql);  
        if($result){  
    echo "Data inserted Successfully";  
    } 
    else 
    {  
    echo "Failure!";  
    }  
  
    } else {  
    echo "Incorrect Password..! Please try again with correct password.";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html>   
