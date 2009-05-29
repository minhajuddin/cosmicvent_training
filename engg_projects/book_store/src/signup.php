<html>
<head>
<title>
this is a sign up page</title> <style type="text/css">
<!--
a:link {color: #400000; text-decoration: underline; }
a:active {color: #0000ff; text-decoration: underline; }
a:visited {color: #000000; text-decoration: underline; }
a:hover {color: #ff0000; text-decoration: none; }
-->

.search_result{
background-color:#00BFFF;
}
#header_table{
width:100%;
background-color:#000066;
color:#ffffff;
}

#header{
background-color:#000066;
color:#ffffff;
}
   </style>
   
</head>
<body>
	<div id="header">

<div id="search" align="right">
<form action="admin.php" method="GET">
<input type=submit name=submit value="LOGOUT" id=submit>
</form>
</div>
 
<div id = "heading" align="center">
<h1>Welcome to Admin's Home Page</h1>
</div>

</div>

<div id="searchbar" align="center">
<form action="admin.php" method="GET">
 SEARCH:<input type="text" name="search" id="search" value="" size="50">
<input type="submit"  value="GO">&nbsp <a href="advance_search.php"><b><i>ADVANCE SEARCH</i></b></a>
</form>
</div>


<div id="header">
<div id="signup" align="middle">
<h1>welcome to signup</h1>
<form action="index.php" method="post">
<br> 
<b>userid:</b>
<input type="text" name="userid" value="" id="signup"></br>
<b>password:</b>
<input type="password" name="password" value="" id="signup"></br>
<b>Confirm password:</b>
<input type="password" name="password" value="" id="signup"></br>
<b>gender:</b>&nbsp&nbsp&nbsp&nbsp&nbsp
<b>male</b><input type="radio" name="male" value="" id="signup">&nbsp&nbsp
<b>female</b><input type="radio" name="female" value="" id="signup"><br>
<b>firstname:</b>
<input type="text" name="first ame" value="" id="signup"></br>
<b>lastname:</b>
<input type="text" name="lastname" value="" id="signup"></br>


<input type="button" name="submit" value="signup" id="submit">
<input type="reset" name="reset" value="reset" id="submit">
</form>
</div></div>
</body></html>


