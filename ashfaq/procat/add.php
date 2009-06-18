<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Application for adding a product</title>
<meta name="keywords" content="" />
<meta name="Premium Series" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="#"><span>Cosmic</span>Vent</a></h1>
		<p>Designed By cosmicvent administrator</p>
	</div>
	<div id="menu">
		<ul id="main">
			<li class="current_page_item"><a href="product.php">Homepage</a></li>
			<li><a href="list.php">Products</a></li>
			<li><a href="#">Services</a></li>
			<li><a href="#">About Us</a></li>
			<li><a href="#">Contact Us</a></li>
			<li><a href="index.html">logout</a></li>
			&nbsp &nbsp &nbsp &nbsp <font color=#ffff00><b>Hi,Administrator</b></font>
		</ul>
		
	</div>
	
</div>
<!-- end header -->
<div id="wrapper">
	<!-- start page -->
	<div id="page">
		<div id="sidebar1" class="sidebar">
			<ul>
				
				<li>
          <h2>Admins use</h2>
					<ul>
						<li><a href="product.php">Add new product</a></li>
						<li><a href="catagoery_enter.php">Add new products categoery</a></li>
               
					</ul>
				</li>
      </ul>
		</div>
		<!-- start content -->
		<div id="content">

          <?php
          $con = mysql_connect("localhost","root","");
          if (!$con)
            {
            die('Could not connect: ' . mysql_error());
            }
          // Execute query
          mysql_select_db("my_ash", $con);
          $sql="INSERT INTO catalogue (id, name, discription, price,catagoeryid)
          VALUES('$_POST[id]','$_POST[name]','$_POST[discription]','$_POST[price]','$_POST[catagoeryid]')";
          if (!mysql_query($sql,$con)){
             die( '<strong>THERE IS ALREADY A RECORD WITH THE ENTERED ID.
             <a href ="product.php"> CLICK HERE TO ENTER SOME OTHER ID</a>
             or ID cannt be string</strong> '.mysql_error() );
          }
          echo "<H1>SUCCESSFULLY ADDED PRODUCT IS:: <h1>";
          $result=mysql_query("SELECT * FROM catalogue WHERE id=$_POST[id]" );
          echo 
            "<table border= 1 bgcolor = #00ff7f width=70%>
                <tr>
                  <th>id</th>
                  <th>name</th>
                  <th>discription</th>
                  <th>price</th>
                </tr>";
                $row = mysql_fetch_array($result);
                echo "<tr>";
                  echo "<td>" .$row[id] . "</td>";
                  echo "<td>" .$row[name] . "</td>";
                  echo "<td>" .$row[discription] . "</td>";
                  echo "<td>" .$row[price] . "</td>";
                echo "</tr>";
           echo "</table>";
          mysql_close($con)
          ?>
         
   </div>
		<!-- end content -->
		<!-- start sidebars -->
		<div id="sidebar2" class="sidebar">
			<ul>
			<li>
			<h2>search</h2>
			</li>
				<li>
					<form action="search.php" method="post">&nbsp&nbsp&nbsp
            <input type="text" name="name" value=""  align="left">
          </form>
				</li>
				
				
				<li>
					<h2>Categories</h2>
					<ul>
						
						<li><a href="#">Metus aliquam pellentesque</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- end sidebars -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end page -->
</div>
<div id="footer">
	<p class="copyright">&copy;&nbsp;&nbsp;2009 All Rights Reserved 
</div>
</body>
</html>


