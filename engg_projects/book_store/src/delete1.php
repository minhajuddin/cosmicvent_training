<html>
  <head>
    <title>DELETION COMPLETED</title>
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
  
      //insert the post
      $id = $_POST['id'];
      $name = $_POST['name'];
      $author = $_POST['author'];
      $publisher= $_POST['publisher'];
      $price = $_POST['price'];
      
      //TODO: Do the validation for the input
      
      $bookObj = new book($id, $name, $author, $publisher, $price);
          
      $book_classObj = new book_class();
      $result = $book_classObj->delete_book($id);
      
      if($result){
        echo "<br><b>Congrats!! Book Succesfully Deleted .</b><br><br><br><br><b></b><br><br>";
      
      } 
            
      else {
        echo "Sorry!! Deletion of book failed.. ";
      }
      header("location: admin.php");
  ?>
 

  </body>
  </html>