<?php
$host="localhost";
$dbuser="root";
$pass="";
$dbname="bookmanager";
$conn=mysqli_connect($host,$dbuser,$pass,$dbname);
if(mysqli_connect_errno())
{
    echo("Connection failed");

}
?>

<html>

    <head>
    <title> Signup page </title>
    <link rel="stylesheet" type="text/css" href="reg_style.css">
    </head>
    
    <body>
    
        <?php
        if(isset($_POST['sign_submit']))
        {
            $name_of=mysqli_real_escape_string($conn,$_POST['first_n']);
            $name_user=mysqli_real_escape_string($conn,$_POST['userName']);
            $email_id=mysqli_real_escape_string($conn,$_POST['email_id']);
            $pwd=mysqli_real_escape_string($conn,$_POST['pass_word']);
            $con_pwd=mysqli_real_escape_string($conn,$_POST['con_pass_word']);
            $hashed_pwd=md5($pwd);
            $res = mysqli_query($conn,"SELECT * FROM list WHERE username='$name_user'");
            
            
            if(empty($name_of) || empty($name_user) || empty($email_id) || empty($pwd) || empty($con_pwd) )
            {
                echo("<h3>Cannot leave any field blank !</h3>");
        
                    
               
            }
            else if($pwd!=$con_pwd)
            {
                echo("<h3>Passwords must match</h3>");
                
            }
            
            
            else if(mysqli_num_rows($res)==1)
            {
                echo("<h3>User exists----Change the username</h3>");
            }

            else
            {
                $sql="INSERT INTO list(name, email, username, pass) VALUES('$name_of', '$email_id', '$name_user', '$hashed_pwd');";
                $result=mysqli_query($conn,$sql); 
                
                $some_res=mysqli_query($conn,"SELECT id FROM list WHERE username='$name_user';");
                $rows=mysqli_fetch_row($some_res);
                $id_res=$rows[0];
                
                $new_sql2="CREATE TABLE booktable$id_res (identity INT primary key auto_increment, bid varchar(1000), title varchar(10000) , auth varchar(10000),src varchar(10000),bsname varchar(1000),fav varchar(1000),rate int ,status varchar(1000));
                ";
                $new_res2=mysqli_query($conn,$new_sql2);
                
                $new_sql="CREATE TABLE activity$id_res (iden INT primary key auto_increment, bookid varchar(1000), descr varchar(10000));
                ";
                $new_res=mysqli_query($conn,$new_sql);
                
                if(!$result || !$new_res)
                {
                    echo("<h3>Query failed !</h3> ");
                     
            
                }
                else
                {
                    echo("<h3>Signed up successfully !!</h3>");
                    
                }
            }
        }
        else
        {
            echo("hmmm..Wrong way !");
        }
        ?>
    </body>
</html>