 <html>
 <head>
 <title>deletes employee</title>
 </head>
 <body>
    <?php
    require_once 'data_access/employee_repository.php';
      //POST the NAME TO DELETE
      $name = $_POST['name'];
      //TODO: Do the validation for the input
      $employeeobj = new Employee($employee_number,$name,$father_name,$skills,$location,$salary,$mobile_number);
      $employee_repositoryobj = new Employee_Repository();
      $result = $employee_repositoryobj->delete_employee( $name);	
   
      if( $result ){
          echo "<br><b>Congrats!! Book Succesfully Deleted .</b><br><br>";
       } 
            
      else {
        echo "Sorry!! Deleting of employee failed.. ";
      }
        
     ?>
 <br>
 <a href="hrpage.php">BACK TO HRPAGE </a>
  </body>
  </html>