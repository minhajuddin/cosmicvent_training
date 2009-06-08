<html>
  <body>

    <div>
      <?php
          
        require_once 'data_access/category_repo.php';
        $category_obj = new CategoryRepo;
        
        if(isset($_POST['name']))
        {
        $category = new Category(0,$_POST['name'],$_POST['description']);
        $result=$category_obj->insert_category($category);
        if(!$result)
        echo "insertion failed";
        }
        else
        {
        $categories = $category_obj->get_all_categories();

        if(!$categories)
        {
          echo " <h3> There are no existing categories  </h3> ";
        }
        else 
        {
          foreach($categories as $category)
          {
            echo "Artist Name: $category->name <br/> Description: $category->description <br/><br/>";
          }
        }
        }
      ?>

    </div>
    
    <div>
    
      <form action="display_categories.php" method="POST">
        <p>Category Name</p> <input type="text" name="name"/><br/><br/>
        <p>Description</p> <textarea rows=10 cols=48 name="description"></textarea><br/>
        <input type="submit" value="Submit"/>&nbsp <input type="reset" value="Reset"/>
      </form>
      
    </div>

  </body>
</html>