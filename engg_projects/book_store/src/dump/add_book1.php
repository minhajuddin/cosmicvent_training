<html>
 <head>
    <title>
   ADD BOOK
    </title>
    <link type="text/css" rel="stylesheet" href="style.css " />
  </head>
  <body>

<div id="header">
       <div id="search" align="right">
           <form action="index.php" method="post">
           <b>Search</b> 
           <input type="text" name="search" value="user name" id="search">
           <input type=submit name=submit value="GO" id=submit>
           </form>
        </div>

       <div id = "heading" align="center">
          <h2>ADD NEW BOOK</h2> 
       </div>
 </div>


<div id ="main_menu_link" align="right">
<a href="index.php"><b>Return to Main Menu</b></a>
</div>

<b>ADD NEW BOOK TO DATABASE</b>

<div id ="content">
<form action="add_book.php" method="post">
<label for="id">ID</lable>  &nbsp <input type="text" id="id" name="id" size="100"/><br/>
<label for="name">NAME:</lable> &nbsp &nbsp &nbsp <input type="text" id="name" name="name" size="100"/><br/>
</br>
<label for="author">Author :</lable> &nbsp <input type="text" id="author" name="author" size="101" /><br/>
<label for="publisher">Publisher :</lable> &nbsp <input type="text" id="publisher" name="publisher" size="101" /><br/>
<label for="price">Price:</lable> &nbsp <input type="text" id="price" name="price" size="101" /><br/>
</br>

<input type="submit" value="ADD"> &nbsp <input type="reset" value="Reset">
</form>

</div>

<div id ="footer"></div>

<?php
 

require_once 'data_access/book_class.php';
  
  if(isset($_POST[id]))
  
  {
  
  $book_repo = new bookRepo();
$bookids = $book_repo->get_bookids();

/*if(!$bookids)
{
echo " <h3> There are no existing book entries </h3> ";
}
else*/
{


      $id  = $_POST['id'];
      $name  = $_POST['name'];
      $author  = $_POST['author'];
      $publisher  = $_POST['publisher'];
      $price  = $_POST['price'];
      
      
      
      $bookid = new bookEntry($id,$name,$author,$publisher,$price);
      $book_repo = new bookRepo();
      
      $result = $book_repo->insert_bookid( $bookid );
      
      if( $result ){
         }
        
      echo " <h2 style= 'color :green'> 	Book has been added</h2> ";

  }    
    
    }
        
?> 



</body>
</html>