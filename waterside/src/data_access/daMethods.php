<?php

  require_once 'classRepo.php';
  
  class DaMethods{
    
    private $db;
    
    // function to connect to the DB
    
    function __construct()
    {
    
      $this->db = new mysqli('localhost','root','','watersideDB');
      
    }
    
    
    /******* Operaions on artist table **********************/
    
    
    // function to insert an Artist entry.
    
    function insert_artist_entry($ArtistEntry)
    {
      
      $query_string = "INSERT INTO artist(name, description) VALUES ('$ArtistEntry->name','$ArtistEntry->description')";
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows);       //  true if insertion is succesful
      
    }
    
    // function to get all Artist Entries
    
    function get_all_artist_entries()
    {
    
      $query_string = " SELECT * FROM artist";
      $query = $this->db->prepare($query_string);
      $query->bind_result($id, $name, $description);
      $query->execute();
      
      $artists = array();
      $i = 0;
      
      while($query->fetch())
      {
        $artists["$i"] = new Artist($id, $name, $description);
        $i++;
      }
      
      $query->close();
      return $artists;
    }    
    
    // function to delete an Artist entry
    
    function delete_artist_entry_byId($id)
    {
      $query_string = "DELETE FROM artist WHERE id = '$id ' ";
      $query_result = $this->db->query( $query_string );
      
      return ( 1 == $this->db->affected_rows ); //returns true if delete was successful
    }  
    
    // function to edit an Artist Entry 
    
    function edit_artist_entry_byId($id)
    {
      $query_string = "UPDATE artist SET name='$name', description='$description' WHERE id='$id'";
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows ); //returns true if delete was successful
    }  
    
    
     /******* Operaions on Painting table **********************/
    
    
    // function to insert an Paint entry.
    
    function insert_paint_entry($PaintEntry)
    {
      
      $query_string = "INSERT INTO paint(subject, description, categoryId, authorId) VALUES ('$PaintEntry->subject', '$PainttEntry->description', '$PainttEntry->categoryId', '$PainttEntry->authorId')";
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows);       //  true if insertion is succesful
      
    }
    
    // function to get all paint Entries
    
    function get_all_paint_entries()
    {
    
      $query_string = " SELECT * FROM paint";
      $query = $this->db->prepare($query_string);
      $query->bind_result($id, $subject, $description, $categoryId, $authorId);
      $query->execute();
      
      $paints = array();
      $i = 0;
      
      while($query->fetch())
      {
        $paints["$i"] = new Paint($id, $subject, $description, $categoryId, $authorId);
        $i++;
      }
      
      $query->close();
      return $paints;
    }    
    
    // function to delete an paint entry
    
    function delete_paint_entry_byId($id)
    {
      $query_string = "DELETE FROM paint WHERE id = '$id ' ";
      $query_result = $this->db->query( $query_string );
      
      return ( 1 == $this->db->affected_rows ); //returns true if delete was successful
    }  
    
    // function to edit an paint Entry 
    
    function edit_artist_entry_byId($id)
    {
      $query_string = "UPDATE paint SET subject='$subject', description='$description', categoryId='$categoryId', authorId='$authorId' WHERE id='$id'";
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows ); //returns true if delete was successful
    }  
    
    
    /******* Operaions on category table **********************/
    
    
    // function to insert an category entry.
    
    function insert_category_entry($CategoryEntry)
    {
      
      $query_string = "INSERT INTO paint(name, description) VALUES ('$CategoryEntry->name', '$CategoryEntry->description'";
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows);       //  true if insertion is succesful
      
    }
    
    // function to get all category entries
    
    function get_all_category_entries()
    {
    
      $query_string = " SELECT * FROM category";
      $query = $this->db->prepare($query_string);
      $query->bind_result($id, $name, $description);
      $query->execute();
      
      $categories = array();
      $i = 0;
      
      while($query->fetch())
      {
        $categories["$i"] = new Paint($id, $name, $description);
        $i++;
      }
      
      $query->close();
      return $categories;
    }    
    
    // function to delete an category entry
    
    function delete_category_entry_byId($id)
    {
      $query_string = "DELETE FROM category WHERE id = '$id ' ";
      $query_result = $this->db->query( $query_string );
      
      return ( 1 == $this->db->affected_rows ); //returns true if delete was successful
    }  
    
    // function to edit an category entry 
    
    function edit_category_entry_byId($id)
    {
      $query_string = "UPDATE category SET name='$name', description='$description' WHERE id='$id'";
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows ); //returns true if delete was successful
    }  
?>
      
      
      
