 <html> 
 <head>
 <title>this is search page</title>
<link rel='stylesheet' href='design.css' />
 </head><body>
  
 <?php


      // display the search function by name
          require_once 'data_access/employee_repository.php';
 
  if(isset($_GET['search_term'])){
     $keyword = $_GET['search_term'];
     $search_by_type = $_GET['search_by_type'];
     $employee_repositoryObj = new Employee_Repository();
     $employeedetails = $employee_repositoryObj->search_term($keyword,$search_by_type);
       if(!$employeedetails){ 
          echo " <h3> No result found </h3> ";
         }

        else{
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
         <td>$empoyeeobj->mobile_number</td><td>";
         
         }
         
         echo "</table>";
         
        }
  } 
   
?>
   
   
   
   
   
      </br>
      <a href="index.html">BACK TO HOME</a>
      </body>
      </html>
