<html>
   <head>
      <title>Online Repository</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   <style type="text/css">
<!--
a:link {color: #400000; text-decoration: underline; }
a:active {color: #0000ff; text-decoration: underline; }
a:visited {color: #000000; text-decoration: underline; }
a:hover {color: #ff0000; text-decoration: none; }
-->

.search_result{
background-color:#00BFFF;
}
#header_table{
width:100%;
background-color:#000066;
color:#ffffff;
}

#header{
background-color:#000066;
color:#ffffff;
}
   </style>
   
   
   </head>

<body>
 
<div id="header">

<div id="search" align="right">
<form action="admin.php" method="post">
<input type=submit name=submit value="LOGOUT" id=submit>
</form>
</div>
 
<div id = "heading" align="center">
<h1>Welcome to Admin's Home Page</h1>
</div>

</div>

<div id="searchbar" align="center">
<form action="admin.php" method="POST">
 SEARCH:<input type="text" name="search" id="search" value="" size="50">
<input type="submit"  value="GO">&nbsp <a href="advance_search.php"><b><i>ADVANCE SEARCH</i></b></a>
</form>
</div>

<table width="100%"><tr><td>

  
<?php


// calls Search function and prints the returned 

require_once 'data_access/book_class.php';
  
if(!isset($_POST['search'])){
echo" <table width='100%'>
 
 <tr>
 <td align='left'></td><h3>categories </h3>
     <ol type=\"square\">
     <li><a href=\"Maths.html\">maths</a></li>
     <li><a href=\"languages.html\">languages</a></li>
     <li><a href=\"Science.html\">Science</a></li>
     <li><a href=\"SOcial.html\">social</a></li>
     </ol>
     </td>
 <td>
 <h3>LIST OF POPULAR BOOKS</h3>
     <ol type=\"\">
     <li><a href=\"\">Fountain Head<a></li>
     <li><a href=\"\">Hound of Baskerville<a></li>
     <li><a href=\"\">Treasure Island<a></li>
     <li><a href=\"\">Harry Potter and the sorcerer's Stone<a></li>
     <li><a href=\"\">Harry Potter and the Chamber of Secrets<a></li>
     <li><a href=\"\">Harry Potter and the Prisoner of Azkaban<a></li>
     <li><a href=\"\">arry Potter and the Goblet of Fire<a></li>
     </ol>
    
 </td>
 </tr>
 
 </table> ";
 
}
if(isset($_POST['search'])){
$keyword = $_POST['search'];
$book_classObj = new book_class();
$booknames = $book_classObj->search_books($keyword);

if(!$booknames)
{ 
 echo " <h3> No result found </h3> ";
}

else
{
 echo "<h2>SEARCH RESULTS ARE:</h2>";
 foreach( $booknames as $bookObj )
 {
 echo"
 <table class=\"search_result\" width=100%><tr><td><table class=\"search_result\" width=\"70%\">
 <tr><th>ID</th><th>Name</th><th>Author</th><th>Publisher</th><th>Price</th></tr>
 <tr><td>$bookObj->book_id</td><td>$bookObj->book_name</td><td>$bookObj->book_author</td><td>$bookObj->book_publisher</td><td>$bookObj->book_price</td></tr>
 </table></td><td>

<form action=\"edit.php\" method=\"POST\">
<input type=\"hidden\" name=\"id\" id=\"id\" value=\"$bookObj->book_id\">
<input type='submit' name=\"edit\" id=\"edit\" value=\"Edit\">
</form>

<form action=\"delete.php\" method=\"POST\">
<input type=\"hidden\" name=\"id\" id=\"id\" value=\"$bookObj->book_id\">
<input type='submit' name=\"delete\" id=\"delete\" value=\"Delete\">
</form>

 </td></tr></table>
<h2></h2> 
 
  
 ";
 
} 
 
 } 

}


?>
 
 </td><td align="right"><div id="add_book">
      <form action='add_book.php' method='post'>
         <h2>ADD BOOK</h2>
        <p><label for='id'><b>ID:</b></label><input type='text' id='id' name='id' /></p>
        <p><label for='name'><b>Name:</b></label><input type='text' id='name' name='name'/></p>
        <p><label for='author'><b>Author:</b></label><input type='text' id='author' name='author' /></p>
        <p><label for='publisher'><b>Publisher:</b></label><input type='text' id='publisher' name='publisher' /></p>
        <p><label for='price'><b>Price:</label></b><input type='text' id='price' name='price' /></p>
        
        <p><input type='submit' value='Add' /> &nbsp <input type='reset' value='reset' /></p>
      </form>
     </div>
  </td></tr></table>
 


 
 
 
</body>
</html>
 