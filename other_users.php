<html>
<head>
  <title> Other Users !</title>
    <link rel="stylesheet" type="text/css" href="styling2.css">   
</head>

<body>
    
<a id="logout" href="back_logout.php">Logout</a>
<a id="home" href="book_home.php"> Home </a>
<a id="other" href="my_library.php"> My Library </a>

<div class="cont">
<h1> OTHER USERS </h1>
</div>
<div id="result">
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
    if(empty($_SESSION['un_ss']))
    {
        header('Location: login_books.php');
    }
    else
    {
       $name_user=mysqli_real_escape_string($conn,$_SESSION["un_ss"]);       
        $row=mysqli_query($conn,"SELECT * FROM list WHERE username <> '$name_user';");
        if(mysqli_num_rows($row)==0)
        {
        echo ( "<h4> no other users </h4>");
        }
else
    {
    
    while($avail=mysqli_fetch_assoc($row))
    {
    
    echo("<div id='act_cont'>");
    echo("<div id='author'>".$avail['username']."</div><br>");
    echo("<div>".$avail['name']."</div><br><br>");
    echo("<a id='oact' href='other_act.php?name=".$avail['username']."'> View activity </a><br><br>");
    echo("</div><br><br>");
   
    }
    }
    }
    ?>
    
</div>
 
                             
    

</body>
</html>