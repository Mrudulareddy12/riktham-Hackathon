<?php
  if(isset($_POST['update']))
{
$att=$_POST['attendance'];
$rno=$_POST['update'];
$Branch=$_POST['branch'];
$Section=$_POST['section'];
$att2=$att+1;
$con=mysqli_connect('localhost','root','','clean') or die("Can't connect to server");  
mysqli_select_db($con,'local1') or die("cannot select DB"); 
$sql1="UPDATE count SET count=".$att."+1 where username='".$user."'";
$quer1=mysqli_query($con,$sql1);
if($quer1)
{
echo "<font color=white>you upvoted this &nbsp;</font>";
echo "<font color=white>".$user."</font>";
echo "<font color=white>'s reported problem &nbsp;</font>";
}
}
?>