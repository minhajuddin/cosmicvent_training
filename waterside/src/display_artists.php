<html>
  <body>

    <div>
      <?php
          
        require_once 'data_access/artist_repo.php';
        $artist_obj = new ArtistRepo;
        
        if(isset($_POST['name']))
        {
        $artist = new Artist(0,$_POST['name'],$_POST['description']);
        $result=$artist_obj->insert_artist($artist);
        if(!$result)
        echo "insertion failed";
        }
        else
        {
        $artists = $artist_obj->get_all_artists();

        if(!$artists)
        {
          echo " <h3> There are no existing artists </h3> ";
        }
        else 
        {
          foreach($artists as $artist)
          {
            echo "Artist Name: $artist->name <br/> Description: $artist->description <br/><br/>";
          }
        }
        }
      ?>

    </div>
    
    <div>
    
      <form action="display_artists.php" method="POST">
        <input type="text" name="name"/><br/>
        <textarea rows=10 cols=48 name="description"></textarea><br/>
        <input type="submit" value="Submit"/>&nbsp <input type="reset" value="Reset"/>
      </form>
      
    </div>

  </body>
</html>