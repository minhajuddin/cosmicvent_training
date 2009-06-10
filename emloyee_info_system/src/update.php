  <html>
  <head>
  <title>updating a page</title></head><body>
  
  <?php
    require_once 'data_access/employee_repository.php';
  
      if(isset($_POST['name'])){
     
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
        $result = $employee_repositoryobj->update_employee( $employeeobj);	
        echo "</ hr>";
        
           if( $result ){
             echo "<br><b>Congrats!! employee updation is Succesfull.
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
            echo "Sorry!! updating of information  failed.." ;
          }
      } 
 ?>
 </br>
  <a href="hrpage.php">BACK TO HRPAGE </a></br>
 <a href="index.html">BACK TO Home </a></body></html>
</body></html>