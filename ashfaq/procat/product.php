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
						<li class="current_page_item">
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
					
						<li><a href="catagoery_enter.php">Add new products categoery</a></li>
						
					</ul>
				</li>
      </ul>
		</div>
		<!-- start content -->
		<div id="content">

          <form action="add.php" method="post">
               <table class="mytable">
                  <tr>
                    <th  colspan="2">
                    <h1>Please fill the product details </th>
                  </tr>
                  <tr>
                    <th align="right">ID: </th>
                    <td align="left"> <input type="text" name="id" value="" size="30"></td>
                  </tr>
                  <tr>
                    <th align="right">NAME:</th>
                    <td align="left"><input type="text" name="name" value="" size="30"></td>
                  </tr>
                  <tr>
                    <th align="right">DISCRIPTION:</th>
                    <td align="left"> <textarea rows = 6 cols = 23 name="discription" value="" ></textarea></td>
                  </tr>
                  <tr>
                    <th align="right">PRICE:</th>
                    <td align="left"><input type="text" name="price" value="" size="30" ></td>
                  </tr>

                  <tr>
                    <th align="right">catagoeryid:</th>
                    <td> 
                        <?php

                            $con = mysql_connect("localhost","root","");
                            if (!$con){
                              die('Could not connect: ' . mysql_error());
                             }
                            mysql_select_db("my_ash", $con);
                            $result = mysql_query("SELECT * FROM catagoery");
                            mysql_close($con)
                        ?> 
                        <?php
                            echo "<select name='catagoeryid'  width=90>";
                            while($row = mysql_fetch_array($result)){
                              echo "<option value='$row[cid]'>$row[cname]</option>";
                             }
                            echo  "</select>";
                   ?>

                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <input type="submit" value="Add" "> &nbsp
                      </td><td align="left">
                      <input type="reset" value="reset" >
                    </td>
                  </tr>
              </table>
          </form> 
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



