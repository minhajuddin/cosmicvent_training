<?php
  
require_once 'book.php';
  
class book_class
{
    
    private $db;
    
    function __construct(){
      $this->db = new mysqli('localhost', 'root', '', 'book_db');


                           }    
    //Insert a  book in the database
    function insert_book($book){
      $query_text = "INSERT INTO book_list( id,name, author, publisher, price) VALUES( '$book->book_id','$book->book_name','$book->book_author','$book->book_publisher' , '$book->book_price')";
      $query = $this->db->query( $query_text );
      return ( 1 == $this->db->affected_rows ); //returns true if insert was successful
    
                                     }    
    
    // Search book by name
    function search_books($keyword){
    
    
    $query_text="SELECT * FROM book_list WHERE name like '$keyword%'";
    $query = $this->db->prepare($query_text); 
    $query->bind_result($id, $name, $author, $publisher, $price);
    $query->execute();
    $booknames = array();
    $i=0;
    while($query->fetch()){
    $booknames["$i"] = new book( $id, $name, $author, $publisher, $price);
    $i++;
                   }
      
     $query->close();
     return $booknames; //returns true if insert was successful
     }
    
     // search book by id
     function search_books_by_id($keyword){
    
    
    $query_text="SELECT * FROM book_list WHERE id=$keyword";
    $query = $this->db->prepare($query_text); 
    $query->bind_result($id, $name, $author, $publisher, $price);
    $query->execute();
    $booknames = array();
    $i=0;
    while($query->fetch()){
    $booknames["$i"] = new book( $id, $name, $author, $publisher, $price);
    $i++;
                   }
      
     $query->close();
     return $booknames; //returns true if insert was successful
     }
        
     // update details of the book
     
  
     function update_book($book)
  {  
    
    $query_text = "UPDATE book_list SET name='$book->book_name', author ='$book->book_author', publisher = '$book->book_publisher',price ='$book->book_price' WHERE id='$book->book_id'";
     $query = $this->db->query( $query_text );
     return ( 1 == $this->db->affected_rows );

    /*
    header("location: display_post.php?title=$_POST[postID]");
  */
   } }
?>
     
    
     
     
     
     
     
     
     
     
