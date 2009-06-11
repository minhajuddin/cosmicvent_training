 <?php
 require_once 'user.php';
 
 class User_Repository{
 
      private $db;
      
        function __construct(){
           $this->db = new mysqli('localhost', 'root', '', 'employee_management');
        }
        
 
  // login informatiom of users
      
      function signup_user($user){   
    $query_text = "INSERT INTO  login  (user_name,password,firstname,lastname,gender) 
    VALUES($user->'user_name',$user->'password',$user->'firstname',$user->'lastname',$user->'gender' )";
    
    $query = $this->db->query( $query_text );
    return ( 1 == $this->db->affected_rows );  //returns true if insert was successful
  }
  }
  ?>