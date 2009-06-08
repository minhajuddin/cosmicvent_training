<html>
<head>
<title>this is hrs page</head><body>


      <form action='hrpage.php' method='post'>
         <h2>ADD an employee</h2>
         <p><label for='employee_number'></label><b>employee_number:</b></label><input type='text' id='employee_number' name='employee_number' size='35'/></p>
        <p><label for='name'></label><b>Name:</b></label><input type='text' id='name' name='name' size='35'/></p>
        <p><label for='father_name'><b>fathername:</b></label><input type='text' id='father_name' name='father_name' size='35'/></p>
        <p><label for='skills'></label><b>skills:</b></label><input type='text' id='skills' name='skills' size='35'/></p>
        <p><label for='location'></label><b>location:</b></label><input type='text' id='location' name='location' size='35'/></p>
        
        <p><label for='salary'><b>salary:</b></label><input type='text' id='salary' name='salary' size='35'/></p>
        <p><label for='mobile_number'><b>mobile_number:</label></b><input type='text' id='mobile_number' name='mobile_number' size='35'/></p>
        
                     
        <p><input type='submit' value='Add' /> &nbsp <input type='reset' value='reset' /></p>
      </form>
      
  
       
     <?php
    require_once 'data_access/hrentry.php';
  
    if(isset($_POST['name']))
    {
      //insert the information
      
      $employee_number = $_POST['employee_number'];
      $name = $_POST['name'];
      $father_name = $_POST['father_name'];
      
      $skills= $_POST['skills'];
      $location= $_POST['location'];
      $salary= $_POST['salary'];
      $mobile_number = $_POST['mobile_number'];
      
      //TODO: Do the validation for the input
      $hrobj = new Hr($employee_number,$name,$father_name,$skills,$location,$salary,$mobile_number);
     
     
      $hrenterobj = new Hrenter();
      $result = $hrenterobj->insert_employee( $hrobj);	
    echo "</ hr>";
      if( $result )
      {
        echo "<br><b>Congrats!! employee added Succesfully.
        </b><br><br><br><br>
        <b>The following are the  details:</b>
        <br><br>";
       echo"
      <table  border=1 width=\"50%\">
 <tr>
 <th>employee_number</th>
 <th>name</th>
 <th>father_name</th>
 <th>skills</th>
 <th>location</th>
 <th>salary</th>
 <th>mobile_number</th>
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
        echo "Sorry!! Addition of information  failed.. this employee number already exist
      <br>
      <h1>please apply once again</h1>";
      }
} 
 ?>
     </body>
     </html>