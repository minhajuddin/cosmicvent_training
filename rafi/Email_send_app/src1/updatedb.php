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
      <a href="home"> Home </a> &nbsp &nbsp
      <a href="home"> update DB </a> &nbsp &nbsp
      <a href="home"> Search DB </a> &nbsp &nbsp
      </div>
      
       <!-- PAGE -->
      
     
  <div class = " page" >
  
  <h4>Add Email ID</h4>
        <form action="index.php" method="post">
          <lable for="uname">User Name <br/> <input type="text" id="uname" name="username"/></lable><br/>
          <lable for="mailid">Email ID<br/> <input type="text" id="mailid" name="mailid"/></lable><br/><br/>
          <input type="submit" value="Submit"> &nbsp <input type="reset" value="Reset"><br/><br/><br/>
        </form>
        
   </div>
   
   <!-- Handler to Add entry to DB -->
   
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
         <!-- footer -->
      
      <div class = "footer">Cosmicvent &copy; 2009 </div>
      
  </div>
  
  </body>
  
  </html>