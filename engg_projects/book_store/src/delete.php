<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html> 
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Deleting book</title> 
<link type="text/css" rel="stylesheet" href="style.css" />
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


<?php
require_once 'data_access/book_class.php';
$keyword = $_POST['id'];
$book_classObj = new book_class();
$booknames = $book_classObj->search_books_by_id($keyword);

if(!$booknames)
{ 
 echo " <h3> UNABLE TO DELETE </h3> ";
}

else
{
 echo "<h2>ARE YOU SURE YOU WANT TO DELETE THIS BOOK???????</h2>";
 foreach( $booknames as $bookObj )
 {
 echo"
 

<form action=\"delete1.php\" method=\"POST\">
 <table class=\"search_result\" width=60%>
 <tr><td><table class=\"search_result\" width=\"70%\">
 <tr><th>ID</th>
     <th>Name</th>
     <th>Author</th>
     <th>Publisher</th>
     <th>Price</th><th>Catageory</th><th>Description</th></tr>
  <tr><td>$bookObj->book_id</td>
      <td>$bookObj->book_name</td>
      <td>$bookObj->book_author</td>
      <td>$bookObj->book_publisher</td>
      <td>$bookObj->book_price</td>
      	<td>$bookObj->book_catageory</td>
      		<td>$bookObj->book_description</td></tr>
   </table></td><td>

      <input type='hidden'name='id' id='id' value='$bookObj->book_id'>
      <input type='hidden' name='name' id='name' value='$bookObj->book_name'>
      <input type='hidden' name='author' id='author' value='$bookObj->book_author'>
      <input type='hidden' name='publisher' id='publisher' value='$bookObj->book_publisher'>
      <input type='hidden' name='price' id='price' value='$bookObj->book_price'>
      <input type='hidden' name='catageory' id='catageory' value='$bookObj->book_catageory'>
      <input type='hidden' name='description' id='description' value='$bookObj->book_description'>
  


<input type='submit' name=\"delete\" id=\"delete\" value=\"Delete\">
</form>

 </td></tr></table>
<h2></h2> 

";
} 
} 
?>





<p><a href="admin.php"><b>back to main page</b></a>

</p>



</body>
</html> 

