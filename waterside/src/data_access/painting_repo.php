<?php

  require_once 'includes.php';
  require_once 'painting.php';
  
   
  class PaintingRepo
  {
    
    private $db;
    
    // function to connect to the DB
    
    function __construct()
    {
    
      $this->db = new mysqli(SERVER_NAME,USER_NAME,PASSWORD,DB_NAME);
      
    }
    
     /******* Operaions on Painting table **********************/
    
    
    // function to insert an Paint entry.
    
    function insert_painting($PaintEntry)
    {
      
      $query_string = "INSERT INTO paintings(title, description, price, status, image, categoryId, artistId) VALUES ('$PaintEntry->subject', '$PaintEntry->description','$PaintEntry->price' ,'$PaintEntry->status','$PaintEntry->image ','$PaintEntry->categoryId', '$PaintEntry->artistId')";
      
      
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows);       //  true if insertion is succesful
      
    }
    
    // function to get all paint Entries
    
    function get_all_paintings()
    {
    
      $query_string = " SELECT id, title, description, price, status, image, categoryId, artistId FROM paintings";
      $query = $this->db->prepare($query_string);
      $query->bind_result($id, $title, $description, $price, $status, $image,  $categoryId, $artistId);
      $query->execute();
      
      $paints = array();
      $i = 0;
      
      while($query->fetch())
      {
        $paints["$i"] = new Painting($id, $title, $description, $price, $status, $image,  $categoryId, $artistId);
        $i++;
      }
      
      $query->close();
      return $paints;
    }    
    
    // function to delete an paint entry
    
    function delete_painting_byId($id)
    {
      $query_string = "DELETE FROM paintings WHERE id = '$id ' ";
      $query_result = $this->db->query( $query_string );
      
      return ( 1 == $this->db->affected_rows ); //returns true if delete was successful
    }  
    
    // function to edit an paint Entry 
    
    function edit_painting_byId($id)
    {
      $query_string = "UPDATE paintings SET title='$title', price = '$price', status= '$status', image='$image', description='$description', categoryId='$categoryId', artistId='$artistId' WHERE id='$id'";
      
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows ); //returns true if delete was successful
    }  
    
    // function to search an paintings
    
    function search_paintings($keyword)
    
    {
    
      $query_string = "SELECT * FROM paintings WHERE title LIKE '%$keyword%' ";
      $query = $this->db->prepare( $query_string );
      $query->bind_result( $id, $title, $price, $status, $image, $description, $categoryId, $artistId);
      $query->execute();
      
      $paintings = array( );
      
      $i=0;
      
      while($query->fetch())
      {
        $paintings["$i"] = new Painting( $id, $title, $price, $status, $image, $description, $categoryId, $artistId);
        $i++;
      }
      
      $query->close();
      return $paintings;
    
    }
  }
?>
    