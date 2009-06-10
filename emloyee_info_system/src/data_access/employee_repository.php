<?php

require_once 'employee.php';
 
 
class Employee_Repository{
  
  private $db;
  function __construct(){
    $this->db = new mysqli('localhost', 'root', '', 'employee_management');
  }
 
  function insert_employee($employee){
    $query_text = "INSERT INTO  employees  ( employee_number,name,father_name,skills,location,salary,mobile_number) 
    VALUES( '$employee->employee_number' , '$employee->name','$employee->father_name','$employee->skills','$employee->location','$employee->salary','$employee->mobile_number')";
    
    $query = $this->db->query( $query_text );
    return ( 1 == $this->db->affected_rows );  //returns true if insert was successful
  }
  
  
  
  
  // search employee by name 
     function search_employee_by_name($keyword){
      $query_text="SELECT employee_number, name, father_name, skills, location, salary, mobile_number FROM employees WHERE name like ? ";
      
      $query = $this->db->prepare($query_text);
      if($query){
      $keyword = $keyword . '%';
      $query->bind_param('s', $keyword);
      $query->execute();
      $query->bind_result($employee_number,$name,$father_name,$skills,$location,$salary,$mobile_number);
      $employeedetails = array();
      $i=0;


    
          while($query->fetch()){
            $employeedetails["$i"] = new Employee($employee_number,$name,$father_name,$skills,$location,$salary,$mobile_number);
            $i++;
         }
          
       $query->close();
       return $employeedetails; //returns true if insert was successful
     } 
      else {
        die('unable to connect to the database');
      } 
  }
      
      
       // search employee by advance search 
    function search_term($keyword,$search_by_type){
   
        if($search_by_type ==1){
      
          $query_text="SELECT employee_number, name, father_name, skills, location, salary, mobile_number FROM employees WHERE name like ?";
          $query = $this->db->prepare($query_text);
          $keyword = $keyword . '%';
          $query->bind_param('s', $keyword);
          }
                          
        if($search_by_type ==2){
          $query_text="SELECT employee_number, name, father_name, skills, location, salary, mobile_number FROM employees WHERE employee_number like ?";
          $query = $this->db->prepare($query_text);
          $keyword = $keyword . '%';
          $query->bind_param('i', $keyword);
          }
          
        if($search_by_type ==3){
      
          $query_text="SELECT employee_number, name, father_name, skills, location, salary, mobile_number FROM employees WHERE location like ?";
          
          
          $query = $this->db->prepare($query_text);
         
          $keyword = $keyword . '%';
          $query->bind_param('s', $keyword);
          }
          
        if($search_by_type ==4){
      
          $query_text="SELECT employee_number, name, father_name, skills, location, salary, mobile_number FROM employees WHERE skills like ?";
          
          
          $query = $this->db->prepare($query_text);
         
          $keyword = $keyword . '%';
          $query->bind_param('s', $keyword);
          }
          
          
    $query->execute();
    $query->bind_result($employee_number,$name,$father_name,$skills,$location,$salary,$mobile_number);
    $i=0;
           
          while($query->fetch()){ 
              $employeedetails[$i] = new Employee($employee_number,$name,$father_name,$skills,$location,$salary,$mobile_number);
              $i++;                       
            }

    $query->close();
    return $employeedetails; //returns true if insert was successful
              
      
   } 
       
      // update employee detais
      
      function update_employee($employee){
      
      $query_text = "UPDATE employees SET name='$employee->name', father_name='$employee->father_name', skills='$employee->skills', location='$employee->location', salary='$employee->salary', mobile_number='$employee->mobile_number' 
      WHERE employee_number='$employee->employee_number'";
       $query = $this->db->query( $query_text );
        return ( 1 == $this->db->affected_rows );
        }
        
        
      //delete employee from database
    
      function delete_employee($keyword ){
        $query_text = "DELETE FROM employees WHERE name='$keyword ' ";   
        $query = $this->db->query($query_text);
        return (1 == $this->db->affected_rows) ;      
      }
   
      
   // display list of all employees
     
     function list_employees(){
      $query_text = "SELECT employee_number,name,father_name,skills,location,salary,mobile_number FROM employees";
      $query = $this->db->prepare($query_text);
      $query->execute();
      $query->bind_result($employee_number,$name,$father_name,$skills,$location,$salary,$mobile_number);
      $employeedetails = array();
      $i=0;


    
          while($query->fetch()){
            $employeedetails["$i"] = new Employee($employee_number,$name,$father_name,$skills,$location,$salary,$mobile_number);
            $i++;
         }
          
       $query->close();
       return $employeedetails; //returns true if insert was successful
     }  
     
       
  
     
}
?>