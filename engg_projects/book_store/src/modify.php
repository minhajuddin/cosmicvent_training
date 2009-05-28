<html>
  <head>
    <title>UPDATION COMPLETED</title>
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
  <body><a href="admin.php"><b>RETURN TO ADMIN'S PAGE</b></a>
  <?php
  
  require_once 'data_access/book_class.php';
  
    if(isset($_POST['name'])){
      //insert the post
      $id = $_POST['id'];
      $name = $_POST['name'];
      $author = $_POST['author'];
      $publisher= $_POST['publisher'];
      $price = $_POST['price'];
      
      //TODO: Do the validation for the input
      
      $bookObj = new book($id, $name, $author, $publisher, $price);
          
      $book_classObj = new book_class();
      $result = $book_classObj->update_book( $bookObj );
      
      if( $result ){
        echo "<br><b>Congrats!! Book added Succesfully.</b><br><br><br><br><b>The following are the new details of book:</b><br><br>";
      echo"
      <table class=\"search_result\" width=\"50%\">
 <tr><th>ID</th><th>Name</th><th>Author</th><th>Publisher</th><th>Price</th></tr>
 <tr><td>$id</td><td>$name</td><td>$author</td><td>$publisher</td><td>$price</td></tr>
 </table>";
      
      } 
            
      else {
        echo "Sorry!! Updation of book failed.. ";
      }
    }
  ?>
 <a href="admin.php"><b>RETURN TO ADMIN'S PAGE</b></a>

  </body>
  </html>