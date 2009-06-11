<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Cosmicvent</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>

    <div id="header">
            <div id="logo">
              <h1><a href="index.html">Cosmicvent</a></h1>
            </div><!-- end #logo -->
    
    <div id="menu">
		<ul>
			<li class="first"><a href="index.html">Home</a></li>
			<li><a href="#">About Us</a></li>
			<li><a href="#">Services</a></li>
			<li><a href="#">Contact Us</a></li>
		</ul>
 	 </div>
	<!-- end #menu -->
  </div>
<!-- end #header -->


<div id="page">
	<div id="content">
		
		<?php
require_once 'data_access/user_repository.php';

if(isset($_POST['user_name'],$_POST['password']))
    {
      
      //insert the information
      
     $user_name = $_POST['user_name'];
      $password = $_POST['password'];
                 
    
    
      //TODO: Do the validation for the input
       
      $user_repositoryObj = new User_Repository();
    
      $result = $user_repositoryObj->search_pwd( $user_name);	
    
         
            if( !$result ){
            echo "<h3><font color='red'> *USERNAME OR PASSWORD INCORRECT</h3></font>
              <div id='login' align='center'>
          <form action='login.php' method='post'> 
            User Name:<input type='text' name='user_name' id= 'user_name' value='' /><br><br>
            Password:<input type='password' name='password' id= 'password' value='' /><br>
           <br><input type='submit' id= 'submit' value='submit' /> 
           <input type='reset' id= 'reset' value='reset' />
          </form><br>
           <form action='myregister.php' action='post'> 
            <input type='submit' id= 'register' value='register' />
          </form>
        
             </div>"; 
              
              
                         }
            
             else{ 

                     foreach($result as $userObj )
                      {
                                                 
                         if( $user_name == $userObj->user_name && $password == $userObj->password)
                         {
                           echo"AUTHENTICATION SUCCESSFULL";
                           header("location: hrpage.php");
                           
                         }
                         else{
                                     echo "<h3><font color='red'> *USERNAME OR PASSWORD INCORRECT</h3></font>
              <div id='login' align='center'>
          <form action='login.php' method='post'> 
            User Name:<input type='text' name='user_name' id= 'user_name' value='' /><br><br>
            Password:<input type='password' name='password' id= 'password' value='' /><br>
           <br><input type='submit' id= 'submit' value='submit' /> 
           <input type='reset' id= 'reset' value='reset' />
          </form><br>
           <form action='myregister.php' action='post'> 
            <input type='submit' id= 'register' value='register' />
          </form>
        
             </div>"; 
              

                         }
                                            
                      }
                 
                 
                     
                      
                 
                 } 
                      
                    
              } 
      
      
      
 

 ?>

		
		
		
	</div>
	<!-- end #content -->
	<div id="sidebar">
			<ul>
				<li id="search">
					<h2>Search</h2>
					<form method="get" action="search.php">
						<fieldset>
						<input type="text" id="name" name="name" value="" />
						<input type="submit" id="search" value="Search" />
						 <a href="advance_search.html"><b><i>Advance Search</i></b></a>
						</fieldset>
					 
					</form>
				  </li>
				<li>
					<h2>COSMICVENT</h2>
					<ul>
					
            <li><a href="#">Partner & Customer Solutions</a></li>
						<li><a href="#">Training & Events</a></li>
						<li><a href="#">About COsmicvent</a></li>
						<li><a href="#">All Products</a></li>
						<li><a href="#">Support</a></li>
					</ul>
				</li>
				
			</ul>
	</div>
	<!-- end #sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->
<div id="footer">
	<p>&copy; 2009. All Rights Reserved. </p>
</div>
<!-- end #footer -->
</body>
</html>
