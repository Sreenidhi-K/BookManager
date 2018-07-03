<html>
<head>
  <title> My Favs !</title>
    <link rel="stylesheet" type="text/css" href="styling2.css">   
</head>

<body>
    
<a id="logout" href="back_logout.php">Logout</a>
<a id="home" href="book_home.php"> Home </a>
<a id="other" href="my_library.php"> My Library </a>

<div class="cont">
<h1> MY FAVOURITES </h1>
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
        $some_res=mysqli_query($conn,"SELECT id FROM list WHERE username='$name_user';");
        $rows=mysqli_fetch_row($some_res);
        $id_res=$rows[0]; 
        
        $row=mysqli_query($conn,"SELECT * FROM booktable$id_res WHERE fav='yes';");
        if(mysqli_num_rows($row)==0)
        {
        echo ( "<h4> no list items yet </h4>");
        }
else
    {
    
    while($avail=mysqli_fetch_assoc($row))
    {
    $book_tit=$avail['title']; 
    echo("<div id='act_cont'>");
    echo("<div id='tit'>".$book_tit."</div><br>");
    echo("<div id='author'>".$avail['auth']."</div>");
    echo("</div><br><br>");
   
    }
    }
    }
    ?>
    
</div>
 
                             
    

</body>
</html>