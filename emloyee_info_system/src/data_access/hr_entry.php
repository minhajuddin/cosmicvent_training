<?php

 require_once 'hr_class.php';
 
class Hrent
{

private $db;

function __construct(){{
 $this->db = new mysqli('localhost', 'root', '', 'management');
 }
 
//insert employee in database

function insert_employee($employee){
 $query_text = "INSERT INTO  businesses  ( employee_number,name,fathers_name,skills,location,salary,mobile_number) VALUES( '$employee->employee_number' , '$employee->name','$employee->father_name','$employee->skills','$employee->location','$employee->salary','$employee->mobile_number)";
     
      $query = $this->db->query( $query_text );
      return ( 1 == $this->db->affected_rows ); //returns true if insert was successful
    }
    }
   
    
    //function get_employee()
     ?>
    
    




