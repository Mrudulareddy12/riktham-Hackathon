<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
body{  
    margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-color:black;
    background-image:url("attendance1.jpg");
    background-size:cover;  
    color: white;  
    font-family: verdana;  
    font-size: 100%  
      
        }  
</style>
</head>
<body>

<?php

    $conn=mysqli_connect('localhost','root','','clean') or die("Can't connect to server");  
    mysqli_select_db($conn,'clean') or die("cannot select DB"); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username,picsource,place,date,value FROM login1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>USERNAME</th><th>IMAGES</th><th>PLACE</th><th>DATE</th><th>COUNT</th></tr>";

    while($row = $result->fetch_assoc()) {
       
		echo '<form method=POST action=update.php target=form1>';
        echo "<tr><td>" . $row["username"]. "</td>
	          <td><img src='" . $row["picsource"]. "' height='250' width='250'/></td>
                  <td>" . $row["place"]. " </td>
                  <td>" . $row["date"]. "</td>
                 <td><center>" . $row["value"]. "<center></td>
                 
                <td><input type=button name= upvote value='upvote' /></td>';
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
