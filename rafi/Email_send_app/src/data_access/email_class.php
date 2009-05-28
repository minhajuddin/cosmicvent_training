<?php
  
  require_once 'email_entry.php';
  
  class EmailRepo{
    
    private $db;
    
    function __construct(){
      $this->db = new mysqli('localhost', 'root', '', 'maildb');
    }
    
    //Insert a  mail id entry in the database
    function insert_mailid( $mailid ){
      $query_text = "INSERT INTO mail_entries( user_name, email_id,enable_status) VALUES( '$mailid->user_name' , '$mailid->email_id',1)";
     
      $query = $this->db->query( $query_text );
      return ( 1 == $this->db->affected_rows ); //returns true if insert was successful
    }
    
    
    function get_mailids(){
    
      $query_text = "SELECT * FROM mail_entries ORDER BY id desc ";

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
      return $mails; //returns true if insert was successful
    }       
    
    
   function get_mailid_by_id( $id ){
      
      $query_text = "SELECT *  FROM mail_entries WHERE id = ?";
      
      $query = $this->db->prepare( $query_text );
      
      $query->bind_param( 'i', $id );
            
      $query->bind_result( $id, $user_name, $email_id,$enable_status);
      
      $query->execute();
      
      if( $query->fetch() ){
        $mailid = new MailEntry( $id, $user_name, $email_id,$enable_status);
        $query->close();
        return $mailid;
      } else {
        return false;
      }
    }
    
    function search_ids($keyword)
    
    {
    $query_text = "SELECT * FROM mail_entries WHERE email_id LIKE '%$keyword%' OR user_name LIKE '%$keyword%' ";
    
    
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
    
    
     function update_by_id($mailid ){
     
     $query_text = "UPDATE mail_entries SET user_name='$mailid->user_name', email_id='$mailid->email_id'
WHERE id = '$mailid->id' ";

echo "$query_text";
$query = $this->db->query( $query_text );
      return ( 1 == $this->db->affected_rows ); //returns true if insert was successful
     
     }
    
    
    
    }