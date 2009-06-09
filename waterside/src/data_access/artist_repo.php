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
      
      $query_string = "INSERT INTO artists(name, picture, description, show_status) VALUES ('$ArtistEntry->name', '$ArtistEntry->picture', '$ArtistEntry->description', '$ArtistEntry->show_status')";
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows);       //  true if insertion is succesful
      
    }
    
    // function to get all Artist Entries
    
    function get_all_artists()
    {
    
      $query_string = " SELECT id, name, picture, description, show_status FROM artists";
      $query = $this->db->prepare($query_string);
      $query->bind_result($id, $name, $picture, $description, $show_status);
      $query->execute();
      
      $artists = array();
      $i = 0;
      
      while($query->fetch())
      {
        $artists["$i"] = new Artist($id, $name, $picture, $description, $show_status);
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
      $query_string = "UPDATE artists SET name='$name', description='$description', picture=$picture, show_status=$show_status WHERE id='$id'";
      $query_result = $this->db->query($query_string);
      
      return ( 1 == $this->db->affected_rows ); //returns true if delete was successful
    }  
    
    // function to search an artist
    
    function search_artists($keyword)
    
    {
    
      $query_string = "SELECT * FROM artists WHERE name LIKE '%$keyword%' ";
      $query = $this->db->prepare( $query_string );
      $query->bind_result( $id, $name, $description);
      $query->execute();
      
      $artists = array( );
      
      $i=0;
      
      while($query->fetch())
      {
        $artists["$i"] = new Artist( $id, $name, $description);
        $i++;
      }
      
      $query->close();
      return $artists;
    
    }
    
  }
?>    