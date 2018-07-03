<?php
session_start();
$host="localhost";
$dbuser="root";
$pass="";
$dbname="bookmanager";
$conn=mysqli_connect($host,$dbuser,$pass,$dbname);
if(mysqli_connect_errno())
{
    echo("Connection failed");

}
$name_user=mysqli_real_escape_string($conn,$_SESSION["un_ss"]);
$some_res=mysqli_query($conn,"SELECT id FROM list WHERE username='$name_user';");
 $rows=mysqli_fetch_row($some_res);
$id_res=$rows[0];
$num=$_POST["iden"];
$de=$_POST['ratings'];

$res_sql="INSERT INTO activity$id_res (bookid,descr) VALUES('$num','Rating: $de');";
$result=mysqli_query($conn,$res_sql); 

$new_res=mysqli_query($conn,"SELECT * FROM booktable$id_res WHERE bid='$num';");          
$rows=mysqli_fetch_row($new_res);
if($rows)
{

$res_sql="UPDATE booktable$id_res SET rate='$de' WHERE bid='$num';";
 $result=mysqli_query($conn,$res_sql);

header('Location:my_library.php');
}

?>
