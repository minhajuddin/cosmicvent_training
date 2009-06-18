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
			&nbsp &nbsp &nbsp &nbsp <font color=#ffff00><b>Hi,Administrator<b></font>
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
          if (!$con){
              die('Could not connect: ' . mysql_error());
           }

          mysql_select_db("my_ash", $con);

         
          $result = mysql_query("SELECT * FROM catalogue");
          echo "<table border='1' bgcolor=#00ff7f width='70%'>
          <tr>
          <th>id</th>
          <th>name</th>
          <th>discription</th>
          <th>price</th>
         


          <th>edit</th>
          <th>delete</th>

          </tr>";


          while($row = mysql_fetch_array($result)){
            
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['discription'] . "</td>";
              echo "<td>" . $row['price'] . "</td>";
             
              
              echo "<td>
              <form action='edit.php' method='post'>
              <input type='hidden' name='id' value='$row[id] '/>
              <input type='hidden' name='name' value='$row[name]' />
              <input type='hidden' name='discription' value=' $row[discription]' />
              <input type='hidden' name='price' value=' $row[price]' />
             
              <input type='submit' value='edit'  />
              </form></td>";
                   
              echo "<td>
              <form action='delete.php' method='post'>
              <input type='hidden' name='id' value='$row[id] '/>
              <input type='hidden' name='name' value='$row[name]' />
              <input type='hidden' name='discription' value=' " . $row['discription'] ."' />
              <input type='hidden' name='price' value='  ". $row['price'] ."' />
              
              
              <input type='submit' value='delete'  />
              </form> </td>";
              echo "</tr>";
           }
          echo "</table>";

          mysql_close($con);
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
						
						
						<li><a href="#">Mp3 players</a></li>
						<li><a href="#">Books</a></li>
						<li><a href="#">Movies</a></li>
						<li><a href="#">Sports</a></li>
						<li><a href="#">Games</a></li>
						<li><a href="#">Softwares</a></li>
					
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

