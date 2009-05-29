<?php
  
require_once 'catageory.php';

class catageory_class
{
    
    private $db;
    
    function __construct(){
      $this->db = new mysqli('localhost', 'root', '', 'book_db');


                           }    
    //Insert a  book in the database
    function insert_catageory($catageory){
      $query_text = "INSERT INTO catageory( cid,cname) VALUES( '$catageory->cid','$catageory->cname')";
      $query = $this->db->query( $query_text );
      return ( 1 == $this->db->affected_rows ); //returns true if insert was successful
    
                                     }    
    
    
    
    
    /*
    header("location: display_post.php?title=$_POST[postID]");
  */
   
   
}
?>
     
    
     
     
     
     
     
     
     
     
