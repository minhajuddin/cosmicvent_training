<?php
                  $con = mysql_connect("localhost","root","");
                    if (!$con){
                      die('Could not connect: ' . mysql_error());
                     }
                  mysql_select_db("my_ash", $con);
                  $result=mysql_query("DELETE FROM catagoery WHERE cname='$_POST[cname]'");
                 
                 if(isset($_POST['cname']))
                 {
                                  
                  echo "catagoery deleted is: ".$_POST['cname'] ;
                  header("location: list_of_catagoery.php");
                  }
                  else{
                  
                  echo "deleting failed";
                  }
                   mysql_close($con);
               ?> 