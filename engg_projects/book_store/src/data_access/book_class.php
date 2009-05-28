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
      print_r($query_text);
      $query = $this->db->query( $query_text );
      print_r($this->db->affected_rows);
      return ( 1 == $this->db->affected_rows ); //returns true if insert was successful
    
                                }    
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
    
    
      
    } 
     
     
       

?>
