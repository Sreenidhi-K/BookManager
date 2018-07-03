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

$num=mysqli_real_escape_string($conn,$_GET["bid"]);
$ti=mysqli_real_escape_string($conn,$_GET["title"]);
$aut=mysqli_real_escape_string($conn,$_GET["auth"]);
$source=mysqli_real_escape_string($conn,$_GET["sr"]);
$srcc=$_GET["sr"];

$new_res=mysqli_query($conn,"SELECT * FROM booktable$id_res WHERE bid='$num';");          
$rows=mysqli_fetch_row($new_res);
if(!$rows)
{

$res_sql="INSERT INTO booktable$id_res (bid,title,auth,src,bsname,fav,rate,status) VALUES('$num','$ti','$aut','$source','NONE','NONE','0','NONE');";
 $result=mysqli_query($conn,$res_sql);
header('Location: book_home.php');
}

?>
