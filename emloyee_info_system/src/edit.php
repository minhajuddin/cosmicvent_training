

<html> 
<head> 


<title>this is existing products</title> 

</head>

<body>


<?php
require_once 'data_access/employee_repository.php';

// display the old content of emplyee to update


$keyword = $_POST['name'];
$employee_repositoryobj = new Employee_Repository();
$employeedetails= $employee_repositoryobj->search_employee_by_name($keyword);


if(!$employeedetails)
{ 
 echo " <h3> No result found </h3> ";
}

else
{
 echo "<h2>edit follwing contents:</h2>";
 foreach($employeedetails as $empoyeeobj )
 {
 echo"
 <form action='update.php' method='POST'>
 <table>
 <tr><td><table class='search_result' width='70%'>
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
 <td><input type='hidden' name='employee_number' id='employee_number' value='$empoyeeobj->employee_number'></td>
 <td><input type='text' name='name' id='name' value='$empoyeeobj->name' ></td>
 <td><input type='text' name='father_name' id='father_name' value='$empoyeeobj->father_name'></td>
 <td><input type='text' name='skills' id='skills' value='$empoyeeobj->skills'></td>
 <td><input type='text' name='location' id='location' value='$empoyeeobj->location'></td>
 <td><input type='text' name='salary' id='salary' value='$empoyeeobj->salary'></td>
 <td><input type='text' name='mobile_number' id='mobile_number' value='$empoyeeobj->mobile_number'></td>
 </tr>
 </table></td><td>
 </td></tr></table>
 <input type='submit' name='update' id='update' value='update'>
 </form>";
 }}
  ?>
  
  
  
  
 
  


</body>
</html> 

