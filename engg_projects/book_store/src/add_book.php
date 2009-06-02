<html>
  <head>
  		<title>ADD BOOK</title>
 
 	 <style type="text/css">
  <!--
a:link {color: #400000; text-decoration: underline; }
a:active {color: #0000ff; text-decoration: underline; }
a:visited {color: #000000; text-decoration: underline; }
a:hover {color: #ff0000; text-decoration: none; }
-->
  
  .search_result{
background-color:#4682B4;
}
  </style>
  </head>
 
  <body>
  	
  	
  	<a href="admin.php"><b>RETURN TO ADMIN'S PAGE</b></a>
    <?php
    require_once 'data_access/book_class.php';
  
    if(isset($_POST['name'])){
      //insert the post
      $id = $_POST['id'];
      $name = $_POST['name'];
      $author = $_POST['author'];
      $publisher= $_POST['publisher'];
      $price = $_POST['price'];
      $catageory = $_POST['catageory'];
      $description=$_POST['description'];
      //TODO: Do the validation for the input
      
      
      
      $bookObj = new book($id, $name, $author, $publisher, $price, $catageory, $description);
      $book_classObj = new book_class();
      $result = $book_classObj->insert_book( $bookObj );
      
      
      if( $result ){
        echo "<br><b>Congrats!! Book added Succesfully.</b><br><br><br><br><b>The following are the details of the book:</b><br><br>";
      echo"
      <table class=\"search_result\" width=\"50%\">
 <tr><th>ID</th><th>Name</th><th>Author</th><th>Publisher</th><th>Price</th><th>catageory</th><th>Description</th></tr>
 <tr><td>$id</td><td>$name</td><td>$author</td><td>$publisher</td><td>$price</td><td>$catageory</td><td>$description</td></tr>
 </table>";
      
      } 
      
      
      else {
        echo "Sorry!! Addition of book failed.. GIVE SOME OTHER ID TO BOOK";
      }
} 
 ?> 
    <div>
      <form action='add_book.php' method='post'>
        <h2>ADD ANOTHER BOOK :</h2>
         <table>
        <tr><td>ID:</td><td><input type="text" name="id" value="" id="id"</td></tr>
        <tr><td>Name:</td><td><input type="text" name="name" value="" id="name"</td></tr>
        <tr><td>Author:</td><td><input type="text" name="author" value="" id="author"</td></tr>
        <tr><td>Publisher:</td><td><input type="text" name="publisher" value="" id="publisher"</td></tr>
        <tr><td>Price:</td><td><input type="text" name="price" value="" id="price"</td></tr>
        <tr><td>Catageory:</td><td> <?php 
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
       </tr>
        <tr><td>Description:</td><td><textarea rows='5' cols='27' id='description' name='description' /> </textarea></td></tr>
        <tr><td><input type='submit' value='Add' /></td><td><input type='reset' value='reset' /></td></tr>
        </table>
      </form>
      
      <a href="admin.php"><b>RETURN TO HOME PAGE</b></a>
     </div>
 
  </body>
</html>