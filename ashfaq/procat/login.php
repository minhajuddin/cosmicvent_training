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
			<li class="current_page_item"><a href="index.html">Homepage</a></li>
			<li><a href="list_user.php">Products</a></li>
			<li><a href="#">Services</a></li>
			<li><a href="#">About Us</a></li>
			<li><a href="#">Contact Us</a></li>
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
		<!-- start content -->
		<div id="content">

      <?php
          $con = mysql_connect("localhost","root","");
          if (!$con){
            die('Could not connect: ' . mysql_error());
          }

          mysql_select_db("my_ash", $con);
          if(isset($_POST['user_name'],$_POST['password'])){
              $user_name = $_POST['user_name'];
              $password = $_POST['password'];
              if($user_name =='cosmicvent' && $password == '123456' ) {
                 echo"AUTHENTICATION SUCCESSFULL";
                 header("location: product.php");
               } 
                        
               else{
                  echo "<h3><font color='red'> *USERNAME OR PASSWORD INCORRECT</h3>";
                       
                }
               
            }
          mysql_close($con);
      ?>
        <FONT COLOR='GREEN'>CLICK HERE TO<a href="index.html">login</a>AGAIN</FONT>
     </div>
		<!-- end content -->
		<!-- start sidebars -->
		<div id="sidebar2" class="sidebar">
			<ul>
			<li>
			<h2>search</h2>
			</li>
				<li>
					<form action="search_user.php" method="post">&nbsp&nbsp&nbsp
            <input type="text" name="name" value=""  align="left">
          </form>
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