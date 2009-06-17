<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html> 
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>ADD CATAGOERY</title> 
<link type="text/css" rel="stylesheet" href="design.css" />
</head>



      <body>


          <form action="catagoery_repository.php" method="post">
            <table>
                <tr>
                  <th>CNAME:</th>
                  <td><input type="text" name="cname" value="" size="30"></td>
                </tr>
                <tr>
                  <td>
                  <input type="submit" value="submit"> &nbsp
                  <input type="reset" value="reset" >
                  </td> 
                </tr>
            </table>
          </form> 

      <hr>
          <form action="delete_catagoery.php" method="post">
          <h3>Enter the name of the product which you want to delete :</h3>
          <input type="text" name="cname" value="" ></br>
          <input type="submit"  value="delete" >
          
              
          
          </form>



      <hr>
      <br>

      <a href="home.php"><b>Go back to main menu</b></a>


      </body>
</html>