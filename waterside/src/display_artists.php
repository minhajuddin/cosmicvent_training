<html>
  <body>

    <div>
      <?php
          
        require_once 'data_access/artist_repo.php';
        $artist_obj = new ArtistRepo;
        
        if(isset($_POST['name']))
        {
        
        //upload code
        
        $target_path = "images/";
        $picture = basename( $_FILES['picture']['name']);
        $target_path = $target_path . $picture; 

        if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) {
        echo "The file ".  $picture . 
        " has been uploaded";
        } 
        else{
          echo "There was an error uploading the file, please try again!";
        }   

        
        
        
        $artist = new Artist(0,$_POST['name'],$picture, $_POST['description'],$_POST['show_status']);
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
            echo "Artist Name: $artist->name <br/><img src='images/$artist->picture'/><br/> Description: $artist->description <br/>status: $artist->show_status<br/><br/>";
          }
        }
        }
      ?>

    </div>
    
    <div>
    
      <form enctype="multipart/form-data" action="display_artists.php" method="POST">
        <input type="text" name="name"/><br/>
        <textarea rows=10 cols=48 name="description"></textarea><br/>
        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
      Choose picture: <input name="picture" type="file" /><br />

        <input type="radio" name="show_status" value="1"> Show<br>
        <input type="radio" name="show_status" value="0" checked> Hide<br>
        <input type="submit" value="Submit"/>&nbsp <input type="reset" value="Reset"/>
      </form>
      
    </div>

  </body>
</html>