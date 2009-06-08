<?php

require_once 'hr.php';
 
class Hrenter{
  
  private $db;
  function __construct(){
    $this->db = new mysqli('localhost', 'root', '', 'management');
  }
 
  function insert_employee($employee){
    $query_text = "INSERT INTO  businesses  ( employee_number,name,father_name,skills,location,salary,mobile_number) 
    VALUES( '$employee->employee_number' , '$employee->name','$employee->father_name','$employee->skills','$employee->location','$employee->salary','$employee->mobile_number')";
    
    $query = $this->db->query( $query_text );
    return ( 1 == $this->db->affected_rows );  //returns true if insert was successful
  }
}
?>