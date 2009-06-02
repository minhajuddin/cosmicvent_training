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
      $query_text = "INSERT INTO book_list( id,name, author, publisher, price,catageory,description) VALUES( '$book->book_id','$book->book_name','$book->book_author','$book->book_publisher' , '$book->book_price','$book->book_catageory','$book->book_description')";
      print_r($query_text);
      $query = $this->db->query( $query_text );
      return ( 1 == $this->db->affected_rows ); //returns true if insert was successful
    
                                     }    
    
    // Search book by name
    function search_books($keyword){
    
    
    $query_text="SELECT * FROM book_list WHERE name like '%$keyword%'";
    $query = $this->db->prepare($query_text); 
    $query->bind_result($id, $name, $author, $publisher, $price,$catageory,$description);
    $query->execute();
    $booknames = array();
    $i=0;
    while($query->fetch()){
    $booknames["$i"] = new book( $id, $name, $author, $publisher, $price,$catageory,$description);
        $i++;
        
                   }
      
     $query->close();
     return $booknames; //returns true if insert was successful
     }
    
     // search book by author name
     function search_books_by_author($keyword){
    
    
    $query_text="SELECT * FROM book_list WHERE author like '%$keyword%'";
    $query = $this->db->prepare($query_text); 
    $query->bind_result($id, $name, $author, $publisher, $price,$catageory,$description);
    $query->execute();
    $booknames = array();
    $i=0;
    while($query->fetch()){
    $booknames["$i"] = new book( $id, $name, $author, $publisher, $price,$catageory,$description);
        $i++;
        
                   }
      $query->close();
     return $booknames; //returns true if insert was successful
     }
     
     // search book by publisher
      function search_books_by_publisher($keyword){
    
    
    $query_text="SELECT * FROM book_list WHERE publisher like '%$keyword%'";
    $query = $this->db->prepare($query_text); 
    $query->bind_result($id, $name, $author, $publisher, $price,$catageory,$description);
    $query->execute();
    $booknames = array();
    $i=0;
    while($query->fetch()){
    $booknames["$i"] = new book( $id, $name, $author, $publisher, $price,$catageory,$description);
        $i++;
        
                   }
     
    // search book by catageory
     function search_books_by_author($keyword){
    
    $catageoryObj = new catageory();
    $catageory_classObj = new catageory_class();
    
    
    $query_text="SELECT * FROM book_list WHERE author like '%$keyword%'";
    $query = $this->db->prepare($query_text); 
    $query->bind_result($id, $name, $author, $publisher, $price,$catageory,$description);
    $query->execute();
    $booknames = array();
    $i=0;
    while($query->fetch()){
    $booknames["$i"] = new book( $id, $name, $author, $publisher, $price,$catageory,$description);
        $i++;
        
                   }
     
     
     // search book by id
     
     function search_books_by_id($keyword){
    
    
    $query_text="SELECT * FROM book_list WHERE id=$keyword";
    $query = $this->db->prepare($query_text); 
    $query->bind_result($id, $name, $author, $publisher, $price, $catageory, $description);
    $query->execute();
    $booknames = array();
    $i=0;
    while($query->fetch()){
    $booknames["$i"] = new book( $id, $name, $author, $publisher, $price, $catageory,$description);
    $i++;
                   }
      
     $query->close();
     return $booknames; //returns true if insert was successful
     }
        
     // update details of the book
     
  
     function update_book($book)
  {  
    
    $query_text = "UPDATE book_list SET name='$book->book_name', author ='$book->book_author', publisher = '$book->book_publisher',price ='$book->book_price',catageory='$book->book_catageory', description='$book->book_description' WHERE id='$book->book_id'";
     $query = $this->db->query( $query_text );
     return ( 1 == $this->db->affected_rows );

   }
   
     function delete_book($keyword)
     {
        $query_text="DELETE FROM book_list WHERE id=$keyword";
        $query = $this->db->query( $query_text );
        return ( 1 == $this->db->affected_rows );   
     
     }
    
    
    /*
    header("location: display_post.php?title=$_POST[postID]");
  */
   
   
}
?>
     
    
     
     
     
     
     
     
     
     
