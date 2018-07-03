<?php

$host="localhost";
$dbuser="root";
$pass="";
$dbname="bookmanager";
$conn=mysqli_connect($host,$dbuser,$pass,$dbname);

$uname=mysqli_real_escape_string($conn,$_REQUEST['uname']);
$data=mysqli_query($conn,"SELECT * FROM list where username='$uname'");
if(mysqli_num_rows($data)>0)
{
print "<span style=\"color:red;\">exists</span>";
}
else
{
print "<span style=\"color:greenyellow;\">available</span>";
}
?>