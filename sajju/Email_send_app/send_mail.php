<html>
 <head>
    <title>
   ADD BOOK
    </title>
    <link type="text/css" rel="stylesheet" href="style.css " />
  </head>
  <body>
<!--
<div id="header">
       <div id="search" align="right">
           <form action="index.php" method="post">
           <b>Search</b> 
           <input type="text" name="search" value="user name" id="search">
           <input type=submit name=submit value="GO" id=submit>
           </form>
        </div>

       <div id = "heading" align="center">
          <h2>ADD NEW BOOK</h2> 
       </div>
 </div>


<div id ="main_menu_link" align="right">
<a href="index.php"><b>Return to Main Menu</b></a>
</div>

<b>ADD NEW BOOK TO DATABASE</b>

<div id ="content">
<form action="send_mail.php" method="post">
<label for="name">NAME:</lable> &nbsp &nbsp &nbsp <input type="text" id="name" name="name" size="100"/><br/>
</br>
<label for="author">Author :</lable> &nbsp <input type="text" id="author" name="author" size="101" /><br/>
<label for="publisher">Publisher :</lable> &nbsp <input type="text" id="publisher" name="publisher" size="101" /><br/>
<label for="price">Price:</lable> &nbsp <input type="text" id="price" name="price" size="101" /><br/>
</br>
Description :&nbsp <br> <textarea rows=12 cols=84 id="description" name="description"></textarea><br/>
<input type="submit" value="ADD"> &nbsp <input type="reset" value="Reset">
</form>

</div>

<div id ="footer">
</div>

-->


<?php
/*

require_once 'data_access/book_class.php';
  
  if(isset($_POST['fromid']))
  
  {
  
  $mail_repo = new bookRepo();
$bookids = $book_repo->get_bookids();


if(!$bookids)
{
echo " <h3> There are no existing book entries </h3> ";
}
else
{

 
 
      $headers = "From:".$_POST['fromid'];
      $subject = $_POST['subject'];
      $message = $_POST['mbody'];
      
   
   $to = $_POST['fromid'] ;
   mail($to, $subject, $message, $headers) ;  
      
      
 foreach( $mailids as $mailid )
        {
 
  $to = $mailid->email_id ;
 // echo "$to <br/>";
 //echo "result".
  mail($to, $subject, $message, $headers) ;
 
         }
        
      echo " <h2 style= 'color :green'> 	Your message has been sent</h2> ";

  }    
     
    }
 */       
?> 

</body>
</html>
