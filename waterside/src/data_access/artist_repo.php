<?php

  require_once 'includes.php';
  require_once 'artist.php';
   
  class ArtistRepo
  {
    
    private $db;
    
    // function to connect to the DB
    
    function __construct()
    {
    
      $this->db = new mysqli(SERVER_NAME,USER_NAME,PASSWORD,DB_NAME);
      
    }
    
    /******* Operaions on artist table **********************/
    
    
    // function to insert an Artist entry.
    
    function insert_artist($ArtistEntry)
    {
      
      $query_string = "INSERT INTO artists(name, description) VALUES ('$ArtistEntry->name','$ArtistEntry->description')";
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows);       //  true if insertion is succesful
      
    }
    
    // function to get all Artist Entries
    
    function get_all_artists()
    {
    
      $query_string = " SELECT * FROM artists";
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
    
    function delete_artist_byId($id)
    {
      $query_string = "DELETE FROM artists WHERE id = '$id ' ";
      $query_result = $this->db->query( $query_string );
      
      return ( 1 == $this->db->affected_rows ); //returns true if delete was successful
    }  
    
    // function to edit an Artist Entry 
    
    function edit_artist_byId($id)
    {
      $query_string = "UPDATE artists SET name='$name', description='$description' WHERE id='$id'";
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows ); //returns true if delete was successful
    }  
    }
?>    