<?php
  
  class EmployeeRepository{
    
    private $db;
    
    function __construct(){
      $this->db = new mysqli('localhost','root','','employee_management');
    }
    
    function get_employees(){
      $query_text = "SELECT employee_number, name, father_name, skills, location, salary, mobile_number FROM employees";
      $query = $this->db->prepare($query_text);
      if($query){
        echo 'success';
      } else {
        die('unable to connect to the database');
      }
    }
    
     function search_employee_by_name($keyword){
      $query_text="SELECT employee_number, name, father_name, skills, location, salary, mobile_number FROM employees WHERE name like ? ";
      
      $query = $this->db->prepare($query_text);
      if($query){
        echo 'success';
     

      
     
      $query = $this->db->prepare($query_text); 
    
   
      $query->execute();
      $query->bind_result($employee_number,$name,$father_name,$skills,$location,$salary,$mobile_number);
      $employeedetails = array();
      $i=0;
    
      print_r($employeedetails);
    
      while($query->fetch()){
        $employeedetails["$i"] = new Employee($employee_number,$name,$father_name,$skills,$location,$salary,$mobile_number);
        $i++;
                       }
          
         $query->close();
         return $employeedetails; //returns true if insert was successful
         } else {
        die('unable to connect to the database');
      } 
      }
   
    
  }

$employee_repositoryobj = new EmployeeRepository();
$employee_repositoryobj->search_employee_by_name('test');

?>


