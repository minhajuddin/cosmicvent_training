<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>welcome to admin page</title>
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
 <h2>ADD an employee</h2>
        <div  id="insert_employee" align="center">
      <form action='hrpage.php' method='post'>
        
         <label for='employee_number'></label><b>Employee_Number:</b></label><input type='text' id='employee_number' name='employee_number' size='35'/><br>
       <label for='name'></label><b>Name:</b></label><input type='text' id='name' name='name' size='35'/><br><br>
       <label for='father_name'><b>Father_Name:</b></label><input type='text' id='father_name' name='father_name' size='35'/><br>
       <label for='skills'></label><b>Skills:</b></label><input type='text' id='skills' name='skills' size='35'/><br>
       <label for='location'></label><b>Location:</b></label><input type='text' id='location' name='location' size='35'/><br>
        
       <label for='salary'><b>Salary:</b></label><input type='text' id='salary' name='salary' size='35'/><br>
       <label for='mobile_number'><b>Mobile_Number:</label></b><input type='text' id='mobile_number' name='mobile_number' size='35'/><br>
        
                     
       <input type='submit' value='Add' /> &nbsp <input type='reset' value='reset' />
      </form>
      <form action='myregister.php' action='post'> 
            <input type='submit' id= 'register' value='register' />
          </form>
           
     <?php
    require_once 'data_access/employee_repository.php';
  
    if(isset($_POST['name']))
    {
      //insert the information
      
      $employee_number = $_POST['employee_number'];
      $name = $_POST['name'];
      $father_name = $_POST['father_name'];
      
      $skills= $_POST['skills'];
      $location= $_POST['location'];
      $salary= $_POST['salary'];
      $mobile_number = $_POST['mobile_number'];
      
      //TODO: Do the validation for the input
      $employeeobj = new Employee($employee_number,$name,$father_name,$skills,$location,$salary,$mobile_number);
      $employee_repositoryobj = new Employee_Repository();
      $result = $employee_repositoryobj->insert_employee( $employeeobj);	
    echo "</ hr>";
            if( $result ){
               echo "<br><b>Congrats!! employee added Succesfully.
               </b><br><br>
               <b>The following are the  details:</b>
               <br>";
               echo"
               <table  border=1 width='50%'>
               <tr>
               <th>Employee_Number</th>
               <th>Name</th>
               <th>Father_Name</th>
               <th>Skills</th>
               <th>Location</th>
               <th>Salary</th>
               <th>Mobile_Number</th>
               </tr>
               <tr>
               <td>$employee_number</td>
               <td>$name</td>
               <td>$father_name</td>
               <td>$skills</td>
               <td>$location</td>
               <td>$salary</td>
               <td>$mobile_number</td>
               </tr>
               
               
               
          </table>";
         }
      
      
          else {
              echo "Sorry!! Addition of information  failed.. this employee number already exist
              <br>
              <h1>please apply once again</h1>";
            }
} 


 ?>
 </div></div>
	<!-- end #content -->
	<div id="sidebar">
			<ul>
				<li id="search">
					<h2>Search</h2>
					<form method="get" action="hr_search.php">
						<fieldset>
						<input type="text" id="name" name="name" value="" />
						<input type="submit" id="search" value="Search" />
						 <a href="hr_advance_search.html"><b><i>Advance Search</i></b></a>
						</fieldset>
					 
					</form>
				  </li>
				<li>
					<h2>COSMICVENT</h2>
					<ul>
					
            <li><a href="#">Partner & Customer Solutions</a></li>
						<li><a href="#">Training & Events</a></li>
						<li><a href="#">About COsmicvent</a></li>
						<li><a href="hr_list.php">list of all employees</a></li>
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
