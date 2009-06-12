<html>
 <head>
 <title>list of employees</title>
<link rel='stylesheet' href='design.css' />
 </head>
 <body>
    <?php
    require_once 'data_access/employee_repository.php';
      
     $employee_repositoryobj = new Employee_Repository();
     echo "<br>";
     $employeedetails =  $employee_repositoryobj->list_employees();
     echo "<br>";

        if(!$employeedetails){ 
          echo " <h3> No result found </h3> ";
         }

        else{
          echo "<h2>LIST OF ALL EMPLOYEES:</h2>";
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
         
     foreach( $employeedetails as $empoyeeobj)
         
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
        <input type='hidden' name='employee_number' id='employee_number' value='$empoyeeobj->employee_number'>
        <input type='submit' name='edit' id='edit' value='Edit'>
        </form>

        <form action='delete_confirmation.php' method='POST'>
        <input type='hidden' name='employee_number' id='employee_number' value='$empoyeeobj->employee_number'>
        <input type='submit' name='delete' id='delete' value='delete'>
        </form></td>
         </tr>";
         }
         
         echo "</table>";
         
        }
   
     ?>
 <br>
 <a href="hrpage.php">BACK TO HRPAGE </a>
  </body>
  </html>