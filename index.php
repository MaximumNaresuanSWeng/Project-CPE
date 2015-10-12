<!DOCTYPE HTML>
<html>
<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="main.css" />
		<STYLE>
			A:link { color: #F7B810; text-decoration:none}
			A:visited {color: #F7B810; text-decoration: none}
			A:hover {color: #F7B810}
		</STYLE>

</head>

<body>

	<div id = "panelheader">
	</div>
	
	<div id = "paneltab">
		<div id = "panellogin">
		<a href = "index.php"><center><h1>Login</h1></center></a>
		</div>	
		<div id = "panelabout">
		<a href = "about.php"><center><h1>About</h1></center></a>
		</div>
	</div>
	
	<div id = "panelbody">	
	<br><br><br><br><br>
	<div><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please Login</center></div>
	<br>
	<center><form name="form1" method="post" action="checklogin.php">
	<center>
	<label for="username">Username&nbsp;&nbsp;</label>
	<input type="text" name="txtUsername" id="txtUsername" class="placeholder" placeholder="ID">
	<br><label for="password">Password&nbsp;&nbsp;&nbsp;</label>
	<input type="password" name="txtPassword" id="txtPassword" class="placeholder" placeholder="Password">
	<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Log In">
	</center>
	</form>
	
	</div>
	
	
	<center>
			@copyright SuperStar<br>
			เป็นส่วนหนึ่งของรายวิชา 305351 Computer System Engineering<br>
			ภาคการศึกษาที่ 2 ปีการศึกษา 2557
			<br><br>
			@2015 copyright Maximum <br>
			เป็นส่วนหนึ่งของรายวิชา 305471 Software Engineering<br>
			ภาคการศึกษาที่ 1 ปีการศึกษา 2558
	</center>
	
</body>
</html>