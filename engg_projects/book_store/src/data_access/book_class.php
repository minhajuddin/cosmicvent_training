<?php
  
  require_once 'book_entry.php';
  
  class bookRepo{
    
    private $db;
    
    function __construct(){
      $this->db = new mysqli('localhost', 'root', '', 'bookdb');
    }
    
    //Insert a  mail id entry in the database
    function insert_bookid( $bookid){
      $query_text = "INSERT INTO book_entries( book_name, book_author, book_publisher, book_price) VALUES( '$bookid->book_name','$bookid->book_author','$bookid->book_publisher' , '$bookid->book_price')";
     
      $query = $this->db->query( $query_text );
      return ( 1 == $this->db->affected_rows ); //returns true if insert was successful
    }
    
    
    function get_bookids(){
    
      $query_text = "SELECT * FROM book_entries ORDER BY id desc ";

      $query = $this->db->prepare( $query_text );
      
      $query->bind_result( $id, $book_name, $book_author, $book_publisher, $book_price);
      
      $query->execute();
      
      $books = array( );
      
      $i=0;
      while($query->fetch()){
        $books["$i"] = new bookEntry( $id, $book_name, $book_author, $book_publisher, $book_price);
        $i++;
      }
      
      $query->close();
      return $books; //returns true if insert was successful
    }       
    
    
 /*   function get_mailid_by_id( $id ){
      
      $query_text = "SELECT *  FROM mail_entries WHERE id = ?";
      
      $query = $this->db->prepare( $query_text );
      
      $query->bind_param( 'i', $id );
            
      $query->bind_result( $id, $user_name, $mail_id);
      
      $query->execute();
      
      if( $query->fetch() ){
        $mailid = new MailEntry( $id, $user_name, $mail_id);
        $query->close();
        return $mailid;
      } else {
        return false;
      }
    }*/
    
    /*
    
    function search_ids($keyword)
    
    {
    $query_text = "SELECT * FROM book_entries WHERE book_id LIKE '%$keyword%' OR book_name LIKE '%$keyword%' ";
    
    
    $query = $this->db->prepare( $query_text );
      
      $query->bind_result( $id, $user_name, $email_id,$enable_status);
      
      $query->execute();
      
      $mails = array( );
      
      $i=0;
      while($query->fetch()){
        $mails["$i"] = new MailEntry( $id, $user_name, $email_id,$enable_status);
        $i++;
      }
      
      $query->close();
      return $mails;
    
    }
    */
    
    
    }