<html>
  <head>
    <title>Template</title>
    <link type="text/css" rel="stylesheet" href="new.css">
  </head>
  <body>
  
    <div class='wrapper'>
      <div class='header'>
        <div class='logo'>
          Cosmicvent
        </div>
        <div class='logo-text'>
          Emailer
        </div>
        <div style="clear:both;"></div>
      </div>
      
      <div class='content'>
        
        <div class='navbar'>
          <a href="compose_mail.php"><h3> Compose Mail </h3></a>
      <h4>Add Email ID</h4>
        <form action="index.php" method="post">
          <lable for="uname">User Name <br/> <input type="text" id="uname" name="username"/></lable><br/>
          <lable for="mailid">Email ID<br/> <input type="text" id="mailid" name="mailid"/></lable><br/><br/>
          <input type="submit" value="Submit"> &nbsp <input type="reset" value="Reset"><br/><br/><br/>
        </form>
  
    <h4> Search </h4>
      <form action="index.php" method="post">
        <input type="text" name="search" value="user/id name" id="search">
        <input type="submit" name="submit" value="GO" id="submit">
    </form>
        </div>
        
        <div class='page'>
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
                echo " $mailid->email_id &nbsp <a href='edit_entry.php?id=$mailid->id'> Edit </a> <br/>" ;
               }
        }
        
    }

  ?>
  
  <?php
  
    require_once 'data_access/email_repo.php';
  
    if(isset($_POST['mailid']))
     {
      
     $username = $_POST['username'];
     $mailid = $_POST['mailid'];
      
      $escp_username =    mysql_escape_string($username);
      $escp_mailid =  mysql_escape_string($mailid);
      
      $mailid = new MailEntry(0, $escp_username, $escp_mailid,1);
      $mail_repo = new EmailRepo();
      
      $result = $mail_repo->insert_mailid( $mailid );
      
      if( $result )
        {
      //  echo "Entry inserted  successfully";
        } 
      else 
        {
        echo "Mail insertion failed";
        }
      
      }
      
   ?>
        </div>
        
        <div style="clear:both;"></div>
      </div>
      
      
      <div class='footer'>
        Cosmicvent &copy; 2009
      </div>
      
    </div>
  </body>
</html>