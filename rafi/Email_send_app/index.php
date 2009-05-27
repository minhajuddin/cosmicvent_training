
<?php
  
  require_once 'data_access/email_class.php';
  
  if(isset($_POST['mailid'])){
      //insert the post
      $username = $_POST['username'];
      $mailid = $_POST['mailid'];
      
   $escp_username =    mysql_escape_string($username);
    $escp_mailid =  mysql_escape_string($mailid);
      
      $mailid = new MailEntry(0, $escp_username, $escp_mailid,1);
      $mail_repo = new EmailRepo();
      
      $result = $mail_repo->insert_mailid( $mailid );
      
      if( $result ){
      //  echo "Entry inserted  successfully";
      } else {
        echo "Mail insertion failed";
      }
      
      }
      
      ?>





<html>
 <head>
  <title>Email ID DataBase</title>
  <link type="text/css"
 </head>

 <body>
 
 <div id="header"></div>
 
 <a href="send_mail.php">Send Mail</a>
 
 <div id="content">
   <h1>Email ID DataBase</h1>

<div id="result">

<?php

if(isset($_POST['search'])){

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
 
 foreach( $mailids as $mailid ){ 
 
 echo " $mailid->email_id <br/>";
 
 
 }
 
 } }

?>

</div>



<div id="add">
<h3>Add Email ID</h3>
<form action="main.php" method="post">
<lable for="uname">User Name <br/> <input type="text" id="uname" name="username"/></lable><br/>
<lable for="mailid">Email ID<br/> <input type="text" id="mailid" name="mailid"/></lable><br/>
<input type="submit" value="Submit"> &nbsp <input type="reset" value="Reset">
</form>
</div>



  <dev id="search">
    <h3> Search </h3>
  <form action="main.php" method="post">
  <input type="text" name="search" value="" id="search">
  <input type=submit name=submit value="GO" id=submit>
    </form>
  </div>
  
  </div>
 </body>
</html>