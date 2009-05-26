<html>
  <head>
    <title>MBlog -- Home</title>
  </head>
  <body>
    <div>
      <?php
  
        require_once 'data_access/post_repo.php';
        
        if(isset($_GET['id'])){
          //get the id
          $id = $_GET['id'];
          //get the post
          $post_repo = new PostRepo();
          $post = $post_repo->get_post_by_id( $id );
          //display it
          if($post){
          ?>
          
          <div class='post'>
            <h2><?php echo $post->title; ?></h2>
            <div>
              <?php echo $post->content; ?>
            </div>
            <p>
              <?php echo "$post->author &nbsp; $post->created_on"; ?>
            </p>
          </div>
          <?php
         } else { ?>
         <div class='error'>
          The post doesn't exist
        </div>
        <?php
         }         
        } else {
        ?>        
        <div class='error'>
          The post doesn't exist
        </div>
        <?php } ?>
    </div>
  </body>
</html>