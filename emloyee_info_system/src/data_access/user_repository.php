 <?php
 require_once 'user.php';
 
 class User_Repository{
 
      private $db;
      
        function __construct(){
           $this->db = new mysqli('localhost', 'root', '', 'employee_management');
        }
        
 
  // login informatiom of users
      
      function signup_user($user){   
    $query_text = "INSERT INTO  login(user_name,password,firstname,lastname,gender) VALUES('$user->user_name','$user->password','$user->firstname','$user->lastname','$user->gender')";

   
    $query = $this->db->query( $query_text );
    return ( 1 == $this->db->affected_rows );  //returns true if insert was successful
  }
  
  
    // validate username from database 
    
     
  
     function search_pwd($user_name){
      $query_text="SELECT * FROM login WHERE user_name='$user_name'";
      
      $query = $this->db->prepare($query_text);
      if($query){
      $query->execute();
      $query->bind_result($user_name,$password,$firstname,$lastname,$gender);
      $pwd = array();
      $i=0;


    
          while($query->fetch()){
            $pwd["$i"] = new User($user_name,$password,$firstname,$lastname,$gender);
            $i++;
         }
          
       $query->close();
       return $pwd; //returns true if insert was successful
     } 
      else {
        die('unable to connect to the database');
      } 
  }
      
  
  
  }
  ?>