<html>
  <head>
    <title>MBlog -- Create Post</title>
  </head>
  <body>
  <?php
  
  require_once 'data_access/post_repo.php';
  
    if(isset($_POST['title'])){
      //insert the post
      $title = $_POST['title'];
      $content = $_POST['content'];
      $author = $_POST['author'];
      
      //TODO: Do the validation for the input
      
      $post = new Post(0, $title, $content, $author, '' );
            
      $post_repo = new PostRepo();
      $result = $post_repo->insert_post( $post );
      if( $result ){
        echo "Created successfully";
      } else {
        echo "Post creation failed";
      }
    }
  ?>
    <div>
      <form action='create_post.php' method='post'>
        <p><label for='title'>Title</label><input type='text' id='title' name='title' /></p>
        <p><label for='content'>Content</label><textarea id='content' name='content'></textarea></p>
        <p><label for='author'>Author</label><input type='text' id='author' name='author' /></p>
        <p><input type='submit' value='Publish' /></p>
      </form>
    </div>
  </body>
</html>