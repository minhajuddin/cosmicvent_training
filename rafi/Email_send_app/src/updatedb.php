<html>
  <head>
    <title>Template</title>
    <link type="text/css" rel="stylesheet" href="home.css">
  </head>
  <body>
  
  <div class= "wrapper">
  
  
          <!-- hader -->
          
          
    <div class="header">
      
      <div class = "logo-text">Cosmicvent Emailer</div>
  </div>
      
          <!-- navigation bar -->
      
      
      <div class="navbar"> 
      <a href="home.php"> Home </a> &nbsp &nbsp
      <a href="updatedb.php"> Add User</a> &nbsp &nbsp
      <a href="searchdb.php"> Search</a> &nbsp &nbsp
      </div>
      
       <!-- PAGE -->
      
     
  <div class = " page" >
  
  <h4>Add New User</h4>
        <form action="updatedb.php" method="post">
          <lable for="uname">User Name <br/> <input style='width: 300px' type="text" id="uname" name="username"/></lable><br/><br/>
          <lable for="mailid">Email ID<br/> <input style='width: 300px' type="text" id="mailid" name="mailid"/></lable><br/><br/>
          <input type="submit" value="Submit"> &nbsp <input type="reset" value="Reset"><br/><br/><br/>
        </form>
        
   
   
   <!-- Handler to Add entry to DB -->
   
   <?php
  
    require_once 'data_access/email_repo.php';
  
    if(isset($_POST['mailid']))
     {
      
     $username = $_POST['username'];
     $mailid = $_POST['mailid'];
      
      $escp_username =    mysql_escape_string($username);
      $escp_mailid =  mysql_escape_string($mailid);
      
      if( (0==strlen($mailid->user_name)) || ( 0 == strlen($mailid->email_id) )) {
    echo " <p><span style='color : red'> Enter Both username and emailid</span></p> ";
    
    }
    
    else
    {
      
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
      }
      
   ?>     
   
   </div>
         <!-- footer -->
      
      <div class = "footer">Cosmicvent &copy; 2009 </div>
      
  </div>
  
  </body>
  
  </html>