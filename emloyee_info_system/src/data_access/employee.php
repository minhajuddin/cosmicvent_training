<?php
class Employee{


   public $employee_number;
   public $name;
   public $father_name;
   public $skills;
   public $location;
   public $salary;
   public $mobile_number;
   
       
    
    function Employee($employee_number,$name,$father_name,$skills,$location,$salary,$mobile_number){
      $this->employee_number=$employee_number;
      $this->name=$name;
      $this->father_name=$father_name;
      $this->skills=$skills;
      $this->location=$location;
      $this->salary=$salary;
      $this->mobile_number=$mobile_number;
      }
      }
      ?>