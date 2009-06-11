<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Welcome to Cosmicvent</title>
<link rel='stylesheet' type='text/css' href='style.css' media='screen' />
</head>
<body>

    <div id='header'>
            <div id='logo'>
              <h1><a href='index.html'>Cosmicvent</a></h1>
            </div><!-- end #logo -->
    
    <div id='menu'>
		<ul>
			<li class='first'><a href='index.html'>Home</a></li>
			<li><a href='#'>About Us</a></li>
			<li><a href='#'>Services</a></li>
			<li><a href='#'>Contact Us</a></li>
		</ul>
 	 </div>
	<!-- end #menu -->
  </div>
<!-- end #header -->


<div id='page'>
	<div id='content'>
		<div class=''>
			<h2 class='title'> &nbsp &nbsp &nbsp Welcome,Here you can register for a new account</h2>
						<div id='signup' align='center'>
              <form  action='myregister.php' method="post"> 
                  User Name:<input type='text' name='user_name' id= 'user_name' value='' /><br><br>
                  Password:<input type='password' name='password' id= 'password' value='' /><br>
                  Confirm pwd:<input type='password' name='confirm_password' value='' id='confirm_password'><br>
                  firstname:<input type='text' name='firstname' value='' id='firstname'><br>
                  lastname:<input type='text' name='lastname' value='' id='lastname'><br>
                  gender:</b>&nbsp&nbsp&nbsp&nbsp&nbsp
                  Male:<Input type = 'Radio' Name ='gender' value= 'male' >&nbsp&nbsp
                  female:<Input type = 'Radio' Name ='gender' value= 'female'><br>
                  <input type='submit' id= 'submit' value='submit' /> 
                  <input type='reset' id= 'reset' value='reset' />
              </form><br>
           
            </div> 
						
				</div>
		
	</div>
	<!-- end #content -->
	<div id='sidebar'>
			<ul>
				<li id='search'>
					<h2>Search</h2>
					<form method='get' action='search.php'>
						<fieldset>
						<input type='text' id='name' name='name' value='' />
						<input type='submit' id='search' value='Search' />
						 <a href='advance_search.html'><b><i>Advance Search</i></b></a>
						</fieldset>
					 
					</form>
				  </li>
				<li>
					<h2>COSMICVENT</h2>
					<ul>
					
            <li><a href='#'>Partner & Customer Solutions</a></li>
						<li><a href='#'>Training & Events</a></li>
						<li><a href='#'>About COsmicvent</a></li>
						<li><a href='#'>All Products</a></li>
						<li><a href='#'>Support</a></li>
					</ul>
				</li>
				
			</ul>
	</div>
	<!-- end #sidebar -->
	<div style='clear: both;'>&nbsp;</div>
</div>
<!-- end #page -->
<div id='footer'>
	<p>&copy; 2009. All Rights Reserved. </p>
</div>
<!-- end #footer -->

<?php
require_once 'data_access/user_repository.php';
if(isset($_POST['user_name'],$_POST['password'],$_POST['confirm_password'],$_POST['firstname'],$_POST['lastname'],$_POST['gender']))
    {
      
      //insert the information
      
     $user_name = $_POST['user_name'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $gender = $_POST['gender'];

      print_r($gender);   
  
    if($password != $confirm_password)
    {
      echo" PASSWORD AND CONFIRM PASSWORD DONT MATCH";
      
    }
  else
     {
    
      //TODO: Do the validation for the input
      $userobj = new User($user_name,$password, $firstname,$lastname, $gender );
      $user_repositoryobj = new User_Repository();
      $result = $employee_repositoryobj->signup_user( $userobj);	
    echo "</ hr>";
            if( $result ){
               echo "<br><b>Congrats!! registration is Succesfully.
               </b><br><br>";
              
                    
              } 
      
      
          else {
              echo "Sorry!!  exist
              <br>
              <h1>please apply once again</h1>";
            
            }
      }
 }

 ?>


</body>
</html>
