<?php
	session_start();
	if($_SESSION['userID'] == "")
	{
		echo "Please Login!";
		exit();
	}

	mysql_connect("localhost","root","1234");
	mysql_select_db("project_comsystem");
	mysql_query("SET NAME UTF8");
	mysql_query("SET character_set_results='UTF8'");
	
	$strSQLteacher = "SELECT * FROM teacher_detail WHERE teacherID = '".$_SESSION['userID']."' ";
	$objQueryteacher = mysql_query($strSQLteacher);
	$objResultteacher = mysql_fetch_array($objQueryteacher);

	$strSQLstudent = "SELECT * FROM student WHERE studentID = '".$_SESSION['userID']."' ";
	$objQuerystudent = mysql_query($strSQLstudent);
	$objResultstudent = mysql_fetch_array($objQuerystudent);

?>
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
		<div id = "paneltag1">
		<a href = "home.php"><center><h1>Home</h1></center></a>
		</div>
		
		<div id = "paneltag2">
		<a href = "checkproject.php"><center><h1>Project</h1></center></a>
		</div>
		
		<div id = "paneltag3">
		<a href = "aboutsecond.php"><center><h1>About</h1></center></a>
		</div>
		
		<div id = "paneltag4">
		<a href = "logout.php"><center><h1>Logout</h1></center></a>
		</div>
		
	</div>
	
	<div id = "panelbody">
		<div id = "intextpro">
		<div><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สวัสดีคุณ&nbsp;&nbsp;</i>
		
	<?php 	
		
		if($_SESSION['userID'] == $objResultteacher["teacherID"]){
				echo $objResultteacher["t_firstname"];
				echo "&nbsp;&nbsp;";
				echo $objResultteacher["t_lastname"];
				echo "&nbsp;";
				echo "<อาจารย์>";
				}
		else{
				echo $objResultstudent["s_firstname"];
				echo "&nbsp;&nbsp;";
				echo $objResultstudent["s_lastname"];
				echo "&nbsp;";
				echo "<นักเรียน>";
				}
		session_write_close();
		?>
		</div>
		<br><div><center><font color = "#CCCC33" size = "5"><b>Computer Enginerring Project Form</b></font></center></div>
		<br>
		
		<center>
		<form action="form1.php">
		<input type="submit" value="CPE01 แบบเสนอหัวข้อโครงงาน">
		</form>
		<br>
		
		<form action="form2.php">
		<input type="submit" value="CPE02 แบบบันทึกการดำเนินงานโครงงาน">
		</form>
		<br>		
		
		<form action="form3.php">
		<input type="submit" value="CPE03 แบบขอสอบข้อเสนอโครงงาน">
		</form>
		<br>
		
		<form action="form4.php">
		<input type="submit" value="CPE04 แบบประมาณเมินข้อเสนอโครงงาน">
		</form>
		<br>
		
		<form action="form5.php">
		<input type="submit" value="CPE05 แบบประเมินความก้าวหน้าโครงงาน">
		</form>
		<br>
		
		<form action="form6.php">
		<input type="submit" value="CPE06 แบบขอสอบโครงงาน">
		</form>
		<br>
		
		<form action="form7.php">
		<input type="submit" value="CPE07 แบบประเมินโครงงาน">
		</form>
		<br>
		
		</div>
		<center>
		@copyright SuperStar<br>
		เป็นส่วนหนึ่งของรายวิชา 305351 Computer System Engineering<br>
		ภาคการศึกษาที่ 2 ปีการศึกษา 2557
		<br><br>
		@2015 copyright Maximum <br>
		เป็นส่วนหนึ่งของรายวิชา 305471 Software Engineering<br>
		ภาคการศึกษาที่ 1 ปีการศึกษา 2558 <br>
		
		</center>
	</div>
	

</body>
</html>