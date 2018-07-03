<html>
<head>
    <title> HOME !</title>
    <link rel="stylesheet" type="text/css" href="styling.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
<script>
    function showres( str )
{
    var search=document.getElementById("search").value;   
    document.getElementById("result").innerHTML='';
         if(search=="")
            {
                alert("Empty field !");
            }
        else
            {
                
              $.get("https://www.googleapis.com/books/v1/volumes?q=" + search,function(response){
                  
                  
                  for( var i=0;i<response.items.length;i++)
                        {
                        //console.log(response.items[i]);
                         var url=response.items[i].volumeInfo.imageLinks.thumbnail;
                            
                        var iden=response.items[i].id;
                        var title=$("<span>-------------------------------------------------<br></span><span id='tit'><b>"+response.items[i].volumeInfo.title+"<b><br></span>");
                        var author=$("<span> - "+response.items[i].volumeInfo.authors+"<br><br></span>");
                            var image=$("<img id='thumb'<br><br><br><br>");
                            var library= $("<a id='lib' href='lib_end.php?bid="+iden+"&title="+response.items[i].volumeInfo.title+"&auth="+response.items[i].volumeInfo.authors+"&sr="+url+"'>ADD TO LIBRARY</a><br><br>");                  
                            
                            image.attr("src",url);
                            title.appendTo('#result');
                            author.appendTo('#result');
                            library.appendTo('#result');
                            image.appendTo('#result');
                            
                            
                            
                        }});
               
                  
              
                  
            }
      
      } 
       
    </script>
</head>
<body>
    
<a id="logout" href="back_logout.php">Logout</a>
<a id="my_lib" href="my_library.php"> My Library </a>
<a id="other" href="other_users.php"> Other Users </a>
<div class="cont">
<h1 style="color:lemonchiffon;font-size:40px"> Welcome! </h1>
<h2> Search for books </h2>
<form id="my_form">
<input type="text" id="search" onkeyup="showres('pool')">
<br><br>
<button id="submit" > Clear </button>
</form>
</div>
<div id="result">
    
</div>
    

</body>
</html>