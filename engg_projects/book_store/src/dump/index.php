<?php
  
  require_once 'data_access/book_class.php';
  
 /* if(isset($_POST['mailid'])){
      //insert the post
      $username = $_POST['username'];
      $mailid = $_POST['mailid'];
      
   $escp_username = mysql_escape_string($username);
    $escp_mailid = mysql_escape_string($mailid);
      
      $mailid = new MailEntry(0, $escp_username, $escp_mailid,1);
      $mail_repo = new EmailRepo();
      
      $result = $mail_repo->insert_mailid( $mailid );
      
      if( $result ){
      // echo "Entry inserted successfully";
      } else {
        echo "Mail insertion failed";
      }
      
      }
   */   
      ?>
 
 
 
 
 
<html>
<head>
<title><h>BOOK MANAGEMENT</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
 
<body>
 
<div id="header">
<div id="search" align="right">
<form action="index.php" method="post">
<b>Search</b>
<input type="text" name="search" value="user name" id="search">
<input type=submit name=submit value="GO" id=submit>
</form>
</div>
 
<div id = "heading" align="center">
<h1>MANAGE BOOKS</h1>
</div>
</div>
 
 
 
<div id="content">
 
 
<div id="result">
 
<?php
 
if(isset($_POST['search'])){
 
$keyword = $_POST['search'];
      
$escp_keyword = mysql_escape_string($keyword);
$book_repo = new bookRepo();
$booknames = $book_repo->search_books($escp_keyword);
 
if(!$booknames)
{
echo " <h3> No result found </h3> ";
}
else
{
 
 foreach( $booknames as $bookname ){
 
 echo " $bookname->book_name <br/>";
  
 }
 
 } }
 
?>
 
</div>
 
 
<table id = "table_index">
 
<tr>
<td><a href="add_book.php"><b>ADD A BOOK</b></a>
<!-- <table>
<tr><td>Send to ALL</td></tr>
<tr><td>Send to Signle ID</td></tr>
</table>
*/ -->
</td>
 
<td>
<b>Delete BOOK</b>
<table>
<tr><td><a href="delete_by_name.php"><b>Delete by name</b></a></td></tr>
<tr><td><a href="delete_by_author.php"><b>Delete by author</b></a></td></tr>
</table>
</td>
<td>
<b>Search BOOK</b>
<table>
<tr><td><a href="search_by_name.php"><b>Search by name</b></a></td></tr>
<tr><td><a href="search_by_author.php"><b>Search by author</b></a></td></tr>
</table>
</td>


<td>
<div id="add" align="right">
<form action="main.php" method="post">
<!--
<table>
<tr><td colspan="2" align="center"><b>ADD BOOK ID</b></td></tr>
<tr><td><lable for="uname"><b>User Name:</b></td> <td><input type="text" id="uname" name="username" size="30" value=""/></label></td></tr>
<tr><td><lable for="mailid"><b>Email ID:</b></td> <td><input type="text" id="mailid" name="mailid" size="30"/></lablel></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Submit"> &nbsp<input type="reset" value="Reset"></td></tr>
</table>
</form>
</div>
</td>
-->

</tr>
</table>
 
 
</div>
</body>
</html>
 