<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html> 
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>this is existing products</title> 
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
 echo " <h3> No result found </h3> ";
}

else
{
 echo "<h2>MAKE THE CHANGES AND CLICK ON UPDATE:</h2>";
 foreach( $booknames as $bookObj )
 {
 echo"
 
 <form action=\"modify.php\" method=\"POST\">
 <table class=\"search_result\" width=100%>
 <tr><td><table class=\"search_result\" width=\"100%\">
 <tr><th>ID</th>
     <th>Name</th>
     <th>Author</th>
     <th>Publisher</th>
     <th>Price</th>
     <th>Catageory</th>
     <th>Description</th></tr>	
  <tr><td><input type='hidden'name='id' id='id' value='$bookObj->book_id'></td>
      <td><input type='text' name='name' id='name' value='$bookObj->book_name'></td>
      <td><input type='text' name='author' id='author' value='$bookObj->book_author'</td>
      <td><input type='text' name='publisher' id='publisher' value='$bookObj->book_publisher'</td>
      <td><input type='text' name='price' id='price' value='$bookObj->book_price'</td></tr>
      <td> 
      	";
     
        require_once 'data_access/catageory_class.php';
        $Obj = new catageory_class();
        $catageorynames = $Obj->display_catageory();
        if(!$catageorynames)
            { 
             echo " <h3> No catageories found </h3>";
	        }	
		else
			{    
		    	  echo "<select name='catageory' id ='catageory' width=90>";
			      
			      foreach( $catageorynames as $catageoryObj )
		    	 {
			       if($catageoryObj->cid == $bookObj->book_catageory)
		      	 {  echo "<option value='$catageoryObj->cid' select='TRUE'>$catageoryObj->cname</option>";
		    	  } 
		    	   else
		    	  { 	echo "<option value='$catageoryObj->cid'>$catageoryObj->cname</option>";
		    	 }
		    	 
		    	 
		    	 
	    	  }
                 echo"</select>";
            }
    	 
         
     echo "    	
	 </td>
      <td><textarea rows='5' cols='27' id='description' name='description'>$bookObj->book_description</textarea></td>
      
   
   </table></td><td>
<input type='submit' name=\"update\" id=\"update\" value=\"update\">
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

