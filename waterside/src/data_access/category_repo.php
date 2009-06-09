<?php

  require_once 'includes.php';
  require_once 'category.php';
  
   
  class CategoryRepo
  {
    
    private $db;
    
    // function to connect to the DB
    
    function __construct()
    {
    
      $this->db = new mysqli(SERVER_NAME,USER_NAME,PASSWORD,DB_NAME);
      
    }
    
      /******* Operaions on category table **********************/
    
    
    // function to insert an category entry.
    
    function insert_category($CategoryEntry)
    {
      
      $query_string = "INSERT INTO categories(name, description) VALUES ('$CategoryEntry->name', '$CategoryEntry->description')";
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows);       //  true if insertion is succesful
      
    }
    
    // function to get all category entries
    
    function get_all_categories()
    {
    
      $query_string = " SELECT * FROM categories";
      $query = $this->db->prepare($query_string);
      $query->bind_result($id, $name, $description);
      $query->execute();
      
      $categories = array();
      $i = 0;
      
      while($query->fetch())
      {
        $categories["$i"] = new Category($id, $name, $description);
        $i++;
      }
      
      $query->close();
      return $categories;
    }    
    
    // function to delete an category entry
    
    function delete_category_byId($id)
    {
      $query_string = "DELETE FROM categories WHERE id = '$id ' ";
      $query_result = $this->db->query( $query_string );
      
      return ( 1 == $this->db->affected_rows ); //returns true if delete was successful
    }  
    
    // function to edit an category entry 
    
    function edit_category_byId($id)
    {
      $query_string = "UPDATE categories SET name='$name', description='$description' WHERE id='$id'";
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows ); //returns true if delete was successful
    } 
    
    // function to search an paintings
    
    function search_categories($keyword)
    
    {
    
      $query_string = "SELECT * FROM categories WHERE name LIKE '%$keyword%' ";
      $query = $this->db->prepare( $query_string );
      $query->bind_result( $id, $name, $description);
      $query->execute();
      
      $categories = array( );
      
      $i=0;
      
      while($query->fetch())
      {
        $categories["$i"] = new Category( $id, $name, $description);
        $i++;
      }
      
      $query->close();
      return $categories;
    
    }
  }   
?>