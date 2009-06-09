
<html> 
<head> 


<title>delete employee from database</title> 

</head>

<body>


<?php
require_once 'data_access/employee_repository.php';

//show details and ask for confirmation


$keyword = $_POST['name'];



$employee_repositoryobj = new Employee_Repository();



$employeedetails= $employee_repositoryobj->search_employee_by_name($keyword);


if(!$employeedetails)
{ 
 echo " <h3> UNABLE TO DELETE </h3> ";
}

else
{
 echo "<h2>ARE YOU SURE YOU WANT TO DELETE THIS EMPLYEE???????:</h2>";
 foreach($employeedetails as $empoyeeobj )
 {
 echo"
 <form action='delete.php' method='POST'>
 <table>
 <tr><td><table border=1 width='70%'>
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
 <tr>
 <td>$empoyeeobj->employee_number</td>
 <td>$empoyeeobj->name</td>
 <td>$empoyeeobj->father_name</td>
 <td>$empoyeeobj->skills</td>
 <td>$empoyeeobj->location</td>
 <td>$empoyeeobj->salary</td>
 <td>$empoyeeobj->mobile_number</td><td>
 
  <td><input type='hidden' name='name' id='name' value='$empoyeeobj->name' ></td>
 </tr>
 </table>
 <input type='submit' name='delete' id='delete' value='Delete'>
 </form>";
      
      } 
      
      
     
} 
 ?>
 <br>
  <a href="hrpage.php">BACK TO HRPAGE </a>
 </body>
 </html>