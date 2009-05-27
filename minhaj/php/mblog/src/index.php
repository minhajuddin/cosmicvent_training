<html>
  <head>
    <title>MBlog -- Home</title>
  </head>
  <body>
    <div>
      <?php
  
        require_once 'data_access/post_repo.php';
        
        //get the posts
        $post_repo = new PostRepo();
        

        $posts = $post_repo->get_posts();
        
        echo "<ul>";

        //loop through them
        foreach( $posts as $post ){
          echo "<li><a href='display_post.php?id=$post->id' title='$post->title'>$post->title</a></li>";
        }
        echo "</ul>";
      ?>
    </div>
  </body>
</html>