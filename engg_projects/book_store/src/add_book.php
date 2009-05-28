<html>
  <head>
    <title>ADD BOOK</title>
  </head>
  <body><div align="middle"color=#999999><a href=index.html"><input type="button" value="home"></a></div>
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
      $result = $book_classObj->insert_book( $bookObj );
      
      if( $result ){
        echo "Added successfully";
      } 
      
      else {
        echo "Addition failed";
      }
    }
  ?>
    <div>
      <form action='add_book.php' method='post'>
        <p><label for='id'>ID:</label><input type='text' id='id' name='id' /></p>
        <p><label for='name'>Name:</label><input type='text' id='name' name='name'/></p>
        <p><label for='author'>Author:</label><input type='text' id='author' name='author' /></p>
        <p><label for='publisher'>Publisher:</label><input type='text' id='publisher' name='publisher' /></p>
        <p><label for='price'>Price</label><input type='text' id='price' name='price' /></p>
        
        <p><input type='submit' value='Add' /></p>
      </form>
      
      
    </div>
  </body>
</html>