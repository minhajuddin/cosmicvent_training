<?php
  

// calls Search function and prints the returned 
require_once 'data_access/book_class.php';
  

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
 foreach( $booknames as $bookObj ){
 echo "$bookObj->book_id <br/>";
 echo "$bookObj->book_name <br/>";
 echo "$bookObj->book_author <br/>";
 echo "$bookObj->book_publisher <br/>";
 echo "$bookObj->book_price<br/>";
} 
 
 } 
}

?>
 
 
 
 
 
<html>
<head>
<title>ADMIN</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
 
<body>
 
<div id="header">

<div id="search" align="right">
<form action="index.php" method="post">
<b>Search</b>
<input type="text" name="search" value="name of book" id="search">
<input type=submit name=submit value="GO" id=submit>
</form>
</div>
 
<div id = "heading" align="center">
<h1>Welcome to Admin's Page</h1>
</div>

</div>
 
 
 
</body>
</html>
 