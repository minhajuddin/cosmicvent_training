<html>
  <head>
    <title>Template</title>
    <link type="text/css" rel="stylesheet" href="home.css">
  </head>
  <body>
  
  <div class= "wrapper">
  
  
          <!-- hader -->
  
  
  <div class="header">
      <div class="logo">Cosmicvent</div>
      <div class = "logo-text">Emailer</div>
  </div>
      
          <!-- navigation bar -->
      
      
      <div class="navbar"> 
      <a href="home.php"> Home </a> &nbsp &nbsp
      <a href="updatedb.php"> update DB </a> &nbsp &nbsp
      <a href="searchdb.php"> Search DB </a> &nbsp &nbsp
      </div>
      
      
          <!-- PAGE -->
      
      <div class = " page" >
      <h4> Search </h4>
      <form action="searchdb.php" method="post">
        <input type="text" name="search" value="user/id name" id="search">
        <input type="submit" name="submit" value="GO" id="submit">
    </form>
    
    <!-- Handler for searching the given id -->
     <?php

   if(isset($_POST['search']))
    {
    require_once 'data_access/email_repo.php';
    $keyword = $_POST['search'];
    $escp_keyword = mysql_escape_string($keyword);
    $mail_repo = new EmailRepo();
    $mailids = $mail_repo->search_ids($escp_keyword);

    if(!$mailids)
      {
      echo " <h3> No result found </h3> ";
      }
    else
        {
        foreach( $mailids as $mailid )
               { 
                echo " $mailid->email_id &nbsp <a href='editdb.php?id=$mailid->id'> Edit </a> <br/>" ;
               }
        }
        
    }

  ?>
      
      </div>
      
      
      
       <!-- footer -->
      
      <div class = "footer">Cosmicvent &copy; 2009 </div>
      
  </div>
  
  </body>
  
  </html>