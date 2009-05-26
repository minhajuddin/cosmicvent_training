<?php
  
  require_once 'post.php';
  
  class PostRepo{
    
    //creates a post in the database
    function insert_post( $post ){
      $db = new mysqli('localhost', 'root', '', 'mblog');
      $query_text = "INSERT INTO posts( title, content, author, created_on ) VALUES( '$post->title' , '$post->content', '$post->author', CURDATE())";
      
      $query = $db->query( $query_text );
      return ( 1 == $db->affected_rows ); //returns true if insert was successful
    }
  }
?>