<html>
  <body>

    <div>
      <?php
          
        require_once 'data_access/painting_repo.php';
        require_once 'data_access/category_repo.php';
        require_once 'data_access/artist_repo.php';
        
        $painting_obj = new PaintingRepo;
        
        if(isset($_POST['title']))
        {
        
        $target_path = "paintings/";
        $image = basename( $_FILES['image']['name']);
        $target_path = $target_path . $image; 

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
        echo "The file ".  $image . 
        " has been uploaded";
        } 
        else{
          echo "There was an error uploading the file, please try again!";
        }
        
        
        
        
        
        
        $painting = new Painting(0,$_POST['title'],$_POST['description'],$_POST['price'],$_POST['status'],$image,$_POST['categoryid'],$_POST['artistid']);
        $result=$painting_obj->insert_painting($painting);
        if(!$result)
        echo "insertion failed";
        }
        else
        {
        $paintings = $painting_obj->get_all_paintings();

        if(!$paintings)
        {
          echo " <h3> There are no existing paintings  </h3> ";
        }
        else 
        {
          foreach($paintings as $painting)
          {
            echo "subject: $painting->title <br/> price: $painting->price <br/> status: $painting->status <br/> <image src='paintings/$painting->image'/>,Description: $painting->description <br/> categoryId: $painting->categoryId<br/>AuthorId: $painting->artistId<br/><br/><br/>";
          }
        }
        }
      ?>

    </div>
    
    <div>
    
      <form enctype="multipart/form-data" action="display_paintings.php" method="POST">
       <p> name</p><input type="text" name="title"/><br/>
       <p>price</p> <input type="text" name="price"/><br/>
       <p>description </p><textarea rows=10 cols=48 name="description"></textarea><br/>
        <input type="radio" name="status" value="1"> Available<br/><br/>
        <input type="radio" name="status" value="0" checked> Not Available<br/><br/>
        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
      Upload image: <input name="image" type="file" /><br />
        
        <select name="categoryid">
        <?PHP
        $category_obj = new CategoryRepo;
        $categories = $category_obj->get_all_categories();

        if(!$categories)
        {
          echo " <option value=''> None </option>";
        }
        else 
        {
          foreach($categories as $category)
          {
            echo "<option value='$category->id'>$category->name</option>";
          }
        }
        ?>
        </select><br/>
        
        <select name="artistid">
        <?PHP
        $artist_obj = new ArtistRepo;
        $artists = $artist_obj->get_all_artists();

        if(!$artists)
        {
          echo " <option value=''> None </option>";
        }
        else 
        {
          foreach($artists as $artist)
          {
            echo "<option value='$artist->id'>$artist->name</option>";
          }
        }
        ?>
        </select><br/>
        <input type="submit" value="Submit"/>&nbsp <input type="reset" value="Reset"/>
        
      </form>
     
      
      
      
    </div>

  </body>
</html>