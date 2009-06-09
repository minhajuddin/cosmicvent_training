<html>
  <body>
    <div>
      <form action="search.php" method="POST">
        search<input type="text" name="keyword"/>
        <select name="keyword_type">
          <option value="1">Artist</option>
          <option value="2">Painting</option>
          <option value="3">Category</option>
        </select>
        <input type="submit" value="Go"/>
      </form>

      <?php

        require_once 'data_access/painting_repo.php';
        require_once 'data_access/artist_repo.php';
        require_once 'data_access/category_repo.php';

        if(isset($_POST['keyword']))
        {
          if( 1 == $_POST['keyword_type'])
            {

              $artist_obj = new ArtistRepo;
              $results = $artist_obj->search_artists($_POST['keyword']);
            }
        else if ( 2 == $_POST['keyword_type'])
          {
            $painting_obj = new PaintingRepo;
            $results = $painting_obj->search_paintings($_POST['keyword']);
          }
        else
          {
            $category_obj = new CategoryRepo;
            $results = $category_obj->search_categories($_POST['keyword']);
          }

        if($results)
          {

            if( 2 == $_POST['keyword_type'])
              {
                foreach($results as $result)
                  {
                    echo " Name: $result->subject <br/> Description: $result->description<br/><br/>";
                  }
              }
            else
              {
                foreach($results as $result)
                  {
                    echo " Name: $result->name <br/> Description: $result->description<br/><br/>";
                  }
              }
          }
      }
    ?>




    </div>
  </body>
</html>

