<html>
<head>
<title>this is hrs page</head>
<body>
 <h2>ADD an employee</h2>
<table>
      <form action='hrpage.php' method='post'>
        
         <tr><td><p><label for='employee_number'></label><b>Employee_Number:</b></label></td><td><input type='text' id='employee_number' name='employee_number' size='35'/></p></td></tr>
       <tr><td> <p><label for='name'></label><b>Name:</td><td></b></label><input type='text' id='name' name='name' size='35'/></p></td></tr>
        <tr><td><p><label for='father_name'><b>Father_Name:</td><td></b></label><input type='text' id='father_name' name='father_name' size='35'/></p></td></tr>
        <tr><td><p><label for='skills'></label><b>Skills:</td><td></b></label><input type='text' id='skills' name='skills' size='35'/></p></td></tr>
        <tr><td><p><label for='location'></label><b>Location:</td><td></b></label><input type='text' id='location' name='location' size='35'/></p></td></tr>
        
        <tr><td><p><label for='salary'><b>Salary:</td><td></b></label><input type='text' id='salary' name='salary' size='35'/></p></td></tr>
        <tr><td><p><label for='mobile_number'><b>Mobile_Number:</td><td></label></b><input type='text' id='mobile_number' name='mobile_number' size='35'/></p></td></tr>
        
                     
        <tr><td></td><td><p><input type='submit' value='Add' /> &nbsp <input type='reset' value='reset' /></p></td></tr>
      </form></table>
           
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
      if( $result )
      {
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
 
 
 <!--
 search starts here 
 -->
  <form action='hrpage.php' method='get'>
      <p><input type='text' id='name' name='name' value='' /> &nbsp 
      <input type='submit' id='name' value='search' />
      </p>
  </form> 
  
 <?php


// display the search function
require_once 'data_access/employee_repository.php';
 
 if(isset($_GET['name'])){
$keyword = $_GET['name'];



$employee_repositoryObj = new Employee_Repository();
echo "<br>";


$employeedetails = $employee_repositoryObj->search_employee_by_name($keyword);
 echo "<br>";


if(!$employeedetails)
{ 
 echo " <h3> No result found </h3> ";
}

else
{
 echo "<h2>SEARCH RESULTS ARE:</h2>";
 
 echo"
 <table border=1 width='70%'>
 <tr>
 <th>Employee_Number</th>
 <th>Name</th>
 <th>Father_Name</th>
 <th>Skills</th>
 <th>Location</th>
 <th>Salary</th>
 <th>Mobile_Number</th>

 
 </tr>";
 

 foreach($employeedetails as $empoyeeobj )
  {
  
 echo 
 "<tr> 
 <td>$empoyeeobj->employee_number</td>
 <td>$empoyeeobj->name</td>
 <td>$empoyeeobj->father_name</td>
 <td>$empoyeeobj->skills</td>
 <td>$empoyeeobj->location</td>
 <td>$empoyeeobj->salary</td>
 <td>$empoyeeobj->mobile_number</td><td>
 
 <form action='edit.php' method='POST'>
<input type='hidden' name='name' id='name' value='$empoyeeobj->name'>
<input type='submit' name='edit' id='edit' value='Edit'>
</form>

<form action='delete_confirmation.php' method='POST'>
<input type='hidden' name='name' id='name' value='$empoyeeobj->name'>
<input type='submit' name='delete' id='delete' value='delete'>
</form></td>
 </tr>" ;
 }
 
 echo "</table>";
 
 }
} 
 
  


?>


 

     </body>
     </html>