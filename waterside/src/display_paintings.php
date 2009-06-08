<html>
  <body>

    <div>
      <?php
          
        require_once 'data_access/painting_repo.php';
        require_once 'data_access/category_repo.php';
        require_once 'data_access/artist_repo.php';
        
        $painting_obj = new PaintingRepo;
        
        if(isset($_POST['subject']))
        {
        $painting = new Painting(0,$_POST['subject'],$_POST['description'],$_POST['categoryid'],$_POST['artistid']);
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
            echo "subject: $painting->subject <br/> Description: $painting->description <br/> categoryId: $painting->categoryId<br/>AuthorId: $painting->artistId<br/><br/><br/>";
          }
        }
        }
      ?>

    </div>
    
    <div>
    
      <form action="display_paintings.php" method="POST">
        <input type="text" name="subject"/><br/>
        <textarea rows=10 cols=48 name="description"></textarea><br/>
        
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