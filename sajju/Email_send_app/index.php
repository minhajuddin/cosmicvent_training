
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
  <title><h>Email ID DataBase</title>
  <link href="style.css" rel="stylesheet" type="text/css">
 </head>

 <body>
 

 <div id="header">
       <div id="search" align="right">
           <form action="main.php" method="post">
           <b>Search</b> 
           <input type="text" name="search" value="user name" id="search">
           <input type=submit name=submit value="GO" id=submit>
           </form>
        </div>

       <div id = "heading" align="center">
          <h1>Email ID DataBase</h1> 
       </div>
 </div>



 <div id="content">
 


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


 
<table id = "table_index">

<tr>
<td><a href="send_mail.php"><b>COMPOSE MAIL</b></a>
    
     <!-- <table>
      <tr><td>Send to ALL</td></tr>
      <tr><td>Send to Signle ID</td></tr>
      </table>
      */ -->
</td>

   <td>
      <b>Delete from Database</b>
      <table>
      <tr><td><a href="delete_by_id.php"><b>Delete by ID</b></a></td></tr>
      <tr><td><a href="delete_by_username.php"><b>Delete by UserName</b></a></td></tr>
      
      </table>
   </td>
   <td>
      <b>Search Database</b>
      <table>
      <tr><td><a href="search_by_id.php"><b>Search by ID</b></a></td></tr>
      <tr><td><a href="search_by_username.php"><b>Search by UserName</b></a></td></tr>
      
      </table>
   </td>

<td> 
    <div id="add" align="right">
     <form action="main.php" method="post">
        <table>      
        <tr><td colspan="2" align="center"><b>ADD EMAIL ID</b></td></tr>
        <tr><td><lable for="uname"><b>User Name:</b></td>        <td><input type="text" id="uname" name="username" size="30" value=""/></label></td></tr>
        <tr><td><lable for="mailid"><b>Email ID:</b></td>        <td><input type="text" id="mailid" name="mailid" size="30"/></lablel></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" value="Submit"> &nbsp<input type="reset" value="Reset"></td></tr>
        </table>
     </form>
    </div>
</td>
</table> 


  
  </div>
 </body>
</html>