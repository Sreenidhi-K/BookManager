<html>
<head>
  <title> My library !</title>
    <link rel="stylesheet" type="text/css" href="styling2.css">   
</head>

<body>
    
<a id="logout" href="back_logout.php">Logout</a>
<a id="home" href="book_home.php"> Home </a>
<a id="other" href="other_users.php"> Other Users </a>
<a id="activity" href="act_page.php"> Activity </a>
<a id="favor" href="fav_page.php"> Favourite </a>
<a id="curr" href="curr_page.php"> Currently Reading </a>
<div class="cont">
<h1> MY LIBRARY </h1>
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
        
        $row=mysqli_query($conn,"SELECT * FROM booktable$id_res;");
        if(mysqli_num_rows($row)==0)
        {
        echo ( "<h4> no list items yet </h4>");
        }
else
    {
    
    while($avail=mysqli_fetch_assoc($row))
    {
     $iden=$avail['bid'];   
    echo("<div id='tit'>".$avail['title']."</div><br>");
    echo("<div id='author'>".$avail['auth']."</div><br><br> ");
    echo("<form action='rate_end.php' method='POST'> Rating: <select name='ratings'> <option value='0'>None</option> <option value='1'>1</option> <option value='2'>2</option> <option value='3'>3</option> <option value='4'>4</option> <option value='5'>5</option>  </select>  <input type='submit'  name='iden' value=".$iden."> </form>");
    echo("<form action='stat_end.php' method='POST'> Status: <select name='status'> <option value='none'>None</option> <option value='current'> reading currently </option> <option value='want'> want to read </option> <option value='done'> finished reading</option> </select>  <input type='submit'  name='iden' value=".$iden."> </form>");
    echo("<form action='fav_end.php' method='POST'> Favourite: <select name='fav'> <option value='none'>None</option> <option value='yes'> yes </option> <option value='no'> no </option> </select> <input type='submit'  name='iden' value=".$iden."> </form><br><br>");
    echo("<img id='thumb' src=".$avail['src']."&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api ><br><br>-------------------------------------------------------------------------------<br>");
   
    }
}
    }
    ?>
    
</div>
 
                             
    

</body>
</html>