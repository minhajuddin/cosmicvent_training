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
<form action="admin.php" method="GET">
 SEARCH:<input type="text" name="search" id="search" value="" size="50">
<input type="submit"  value="GO">&nbsp <a href="advance_search.php"><b><i>ADVANCE SEARCH</i></b></a>
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
 <h3>LIST OF POPULAR BOOKS</h3>
     <ol type=\"\">

     <li><a target='b' href=\"\">Fountain Head<a></li>
     <li><a target='b' href=\"\">Hound of Baskerville<a></li>
     <li><a target='b' href=\"\">Treasure Island<a></li>
     <li><a target='b' href=\"\">Harry Potter and the sorcerer's Stone<a></li>
     <li><a target='b' href=\"\">Harry Potter and the Chamber of Secrets<a></li>
     <li><a target='b' href=\"\">Harry Potter and the Prisoner of Azkaban<a></li>
     <li><a target='b' href=\"\">arry Potter and the Goblet of Fire<a></li>

     </ol>
    
 </td>
 </tr>
 
 </table> ";
 
}
if(isset($_GET['search'])){
$keyword = $_GET['search'];
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
        
        <p><label for='name'><b>Name:</b></label><input type='text' id='name' name='name' size='35'/></p>
        <p><label for='author'><b>Author:</b></label><input type='text' id='author' name='author' size='35'/></p>
        <p><label for='publisher'><b>Publisher:</b></label><input type='text' id='publisher' name='publisher' size='35'/></p>
        <p><label for='price'><b>Price:</label></b><input type='text' id='price' name='price' size='35'/></p>
        <p>catageory:
        	
        <?php 
        require_once 'data_access/catageory_class.php';
        $Obj = new catageory_class();
        $catageorynames = $Obj->display_catageory();
        if(!$catageorynames)
            { 
             echo " <h3> No catageories found </h3> ";
	        }	
		else
			{
			 echo "<select name='catagoery'  width=90>";
			     foreach( $catageorynames as $catageoryObj )
		    	 {
		    	   echo "<option value='$catageoryObj->cid'>$catageoryObj->cname</option>";
		    	  }
                 echo"</select>";
            }
    	 
         ?>
         
         <b>Description:<textarea rows='5' cols='27' id='description' name='description' /> </textarea> </p>
        
        <p><input type='submit' value='Add' /> &nbsp <input type='reset' value='reset' /></p>
      </form>
     </div>
  </td></tr></table>
 
</body>
</html>
 