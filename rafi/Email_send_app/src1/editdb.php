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
          
     
     
     <!-- Handler for update request   -->  
          <?php

require_once 'data_access/email_repo.php';
if(isset($_POST['mailid'])){



$mail_repo = new EmailRepo();
        
        
        
        $username = $_POST['username'];
      $mailid = $_POST['mailid'];
      $id = $_POST['id'];
      $enable_status = $_POST['enablestate'];
      
      
      if( (0==strlen($username)) || ( 0 == strlen($mailid) ) ) {
    echo " <h3> Enter user name and mailid </h3> <br/> <a href='edit_entry.php'>Edit Mail Entry</a>";
    die();
    }
      
   $escp_username =    mysql_escape_string($username);
    $escp_mailid =  mysql_escape_string($mailid);
      
      $mailid = new MailEntry($id, $escp_username, $escp_mailid,$enable_status);
      $mail_repo = new EmailRepo();
      
      $result = $mail_repo->update_by_id( $mailid );
      
      if( $result ){
      header('Location: searchdb.php');
      } else {
        echo "Mail insertion failed";
      }
      
      }

        ?>

<!-- Handler to handle request from parent page -->

<?php


if(isset($_GET['id'])){

require_once 'data_access/email_repo.php';

$mail_repo = new EmailRepo();
        

        $mailid = $mail_repo->get_mailid_by_id($_GET['id']);
        
        ?>
        
        <div class ="mesbody">
<form action="editdb.php" method="post">


<?php 




echo "<lable for='uname'>User Name <br/> <input type='text' id='uname' name='username' value='$mailid->user_name'/></lable>
<br/><br/>
<lable for='mailid'>Email ID<br/> <input type='text' id='mailid'name='mailid' value='$mailid->email_id'/></lable>
<br/><br/>

<select name='enablestate' > "; 

if( 0 == $mailid->enable_status)
{
echo "
<option value='1' >Enable</option>
<option value='0' selected = 'true'>Disable</option> ";}
else
{ echo"
<option value='1' selected = 'true'>Enable</option>
<option value='0' >Disable</option> ";
}

echo "
</select><br/><br/>

<input type='hidden' name='id' value='$mailid->id' /> ";

?>

<input type="submit" value="Submit"> &nbsp<input type="reset" value="Cancel">
</form>
</div>



<?php } ?>

          
          
          </div>
          
          
          
          <!-- footer -->
      
      <div class = "footer">Cosmicvent &copy; 2009 </div>
      
  </div>
  
  </body>
  
  </html>