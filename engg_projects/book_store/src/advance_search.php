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
<h1>Advance Search Page</h1>
</div>

</div>

<div id="searchbar" align="center">
<form action="advance_search.php" method="GET">
 SEARCH:<input type="text" name="search" id="search" value="" size="50">
 
 Search by:
 <select name='type' id ='type' width=90>
 	<option value='1'>Name</option>
 	<option value='2'>Author</option>
 	<option value='3'>Publisher</option>
    <option value='4'>Catageory</option>
 	<option value='5'>Description</option>
 	<option value='6'>ID</option>
</select>
 
 <br>
<input type="submit"  value="Advance Search">&nbsp </b></a>
</form>
</div>

<table width="100%"><tr><td>

  
<?php


// calls Search function and prints the returned 

require_once 'data_access/book_class.php';
  
if(!isset($_POST['search'])){
echo"
	
	
 <table width='100%' >
 <tr>
 <td align='left'><h3>CATAGEORIES </h3>
    
     
     <form action=\"search_by_catageory.php\" method=\"GET\">
     <input type=\"hidden\" name=\"catageory\" id=\"catageory\" value=\"fiction\">
     <input type='submit' name='submit' id='submit' value='FICTION' style=\"height: 25px; width: 125px\">
     </form>
     
     
     
     
     <form action=\"search_by_catageory.php\" method=\"GET\">
     <input type=\"hidden\" name=\"catageory\" id=\"catageory\" value=\"non-fiction\">
     <input type='submit' name='submit' id='submit' value='NON-FICTION' style=\"height: 25px; width: 125px\">
     </form>
     
     
     
     <form action=\"search_by_catageory.php\" method=\"GET\">
     <input type=\"hidden\" name=\"catageory\" id=\"catageory\" value=\"fantasy\">
     <input type='submit' name='submit' id='submit' value='FANTASY' style=\"height: 25px; width: 125px\">
     </form>
     
     
     
     <form action=\"search_by_catageory.php\" method=\"GET\">
     <input type=\"hidden\" name=\"catageory\" id=\"catageory\" value=\"sports\">
     <input type='submit' name='submit' id='submit' value='SPORTS'style=\"height: 25px; width: 125px\">
     </form>
     
     	
     
     <form action=\"search_by_catageory.php\" method=\"GET\">
     <input type=\"hidden\" name=\"catageory\" id=\"catageory\" value=\"entertainment\">
     <input type='submit' name='submit' id='submit' value='ENTERTAINMENT' style=\"height: 25px; width: 125px\">
     </form>
     
     
     </td>
 <td align='center'>
    
 </td>
 </tr>
 
 </table> ";
 
}
if(isset($_GET['search'])){
$keyword = $_GET['search'];
$book_classObj = new book_class();

switch ($_GET['type'])
{
case 1:
  $booknames = $book_classObj->search_books($keyword);
  break;
case 2:
  $booknames = $book_classObj->search_books_by_author($keyword);
  break;
case 3:
  $booknames = $book_classObj->search_books_by_publisher($keyword);
  break;
case 4:
  $booknames = $book_classObj->search_books_by_catageory($keyword);
  break;
case 5:
  $booknames = $book_classObj->search_books_by_description($keyword);
  break;
  case 6:
  $booknames = $book_classObj->search_books_by_id($keyword);
  break;
default:
$booknames = $book_classObj->search_books($keyword);
  
  
}




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
 <table class=\"search_result\" width=100%>
 	
 <tr>
<td>
 		
 	<table class=\"search_result\" width=\"100%\">
	 
	 <tr>
	    <th>ID</th>
	 	<th>Name</th>
	 	<th>Author</th>
	 	<th>Publisher</th>
	 	<th>Price</th>
	 	<th>Catageory</th>
	 	<th>Description</th>
	 </tr>
	
	 <tr>
	 	<td>$bookObj->book_id</td>
	    <td>$bookObj->book_name</td>
	    <td>$bookObj->book_author</td>
		<td>$bookObj->book_publisher</td>
		<td>$bookObj->book_price</td>
		<td>$bookObj->book_catageory</td>
		<td>$bookObj->book_description</td></tr>
    </table>
</td>

<td>
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
 
 </td><td align="right">
 	
  </td></tr></table>
 
</body>
</html>
 