<?php
  
  require_once 'post.php';
  
  class PostRepo{
    
    private $db;
    
    function __construct(){
      $this->db = new mysqli('localhost', 'root', '', 'mblog');
    }
    
    //creates a post in the database
    function insert_post( $post ){
      $query_text = "INSERT INTO posts( title, content, author, created_on ) VALUES( '$post->title' , '$post->content', '$post->author', CURDATE())";
      
      $query = $this->db->query( $query_text );
      return ( 1 == $this->db->affected_rows ); //returns true if insert was successful
    }
    
    //creates a post in the database
    function get_posts(){
    
      $query_text = "SELECT id, title, content, author, created_on FROM posts ORDER BY id desc LIMIT 10";

      $query = $this->db->prepare( $query_text );
      
      $query->bind_result( $id, $title, $content, $author, $created_on );
      
      $query->execute();
      
      $posts = array( '0' => 'whatever');
      
      $i=0;
      while($query->fetch()){
        $posts["$i"] = new Post( $id, $title, $content, $author, $created_on );
        $i++;
      }
      
      $query->close();
      return $posts; //returns true if insert was successful
    }        
  }
?>