 <?php
    require_once 'data_access/employee_repository.php';
  
    if(isset($_POST['user_name']))
    {
      //insert the information
      
     $user_name = $_POST['user_name'];
      $password = $_POST['password'];
      
      //TODO: Do the validation for the input
      $employeeobj = new Employee($user_name,$password);
      $employee_repositoryobj = new Employee_Repository();
      $result = $employee_repositoryobj->signup_user( $employeeobj);	
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


 ?>