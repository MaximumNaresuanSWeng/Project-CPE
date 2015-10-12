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
	
	$strSQLproject = "SELECT * FROM project"; //WHERE teacherID = '".$_SESSION['userID']."' ";
	$objQueryproject = mysql_query($strSQLproject);
	$objResultteacher = mysql_fetch_array($objQueryproject);
	
	$strSQLteacher = "SELECT * FROM teacher_detail WHERE teacherID = '".$_SESSION['userID']."' ";
	$objQueryteacher = mysql_query($strSQLteacher);
	$objResultteacher = mysql_fetch_array($objQueryteacher);
	
	$strSQLteacherstatus = "SELECT * FROM teacher_status";// WHERE teacherID = '".$_SESSION['userID']."' ";
	$objQueryteacherstatus = mysql_query($strSQLteacherstatus);
	$objResultteacherstatus = mysql_fetch_array($objQueryteacherstatus);

	$strSQLstudent = "SELECT * FROM student";// WHERE studentID = '".$_SESSION['userID']."' ";
	$objQuerystudent = mysql_query($strSQLstudent);
	$objResultstudent = mysql_fetch_array($objQuerystudent);

?>
	<?php 	
		
		if($_SESSION['teacherID'] == $objResultteacherstatus["teacherID"]){
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
		<a href = "projectchooseteacher.php"><center><h1>Project</h1></center></a>
		</div>
		
		<div id = "paneltag3">
		<a href = "about.php"><center><h1>About</h1></center></a>
		</div>
		
		<div id = "paneltag4">
		<a href = "logout.php"><center><h1>Logout</h1></center></a>
		</div>
	</div>
	
	<div id = "panelbody">
	<div id = "intextform">
	<br><div><center><font color = "#CCCC33" size = "5"><b>CPE06 แบบขอสอบโครงงาน</b></font></center></div>
	
	<form action="saved.php" method="post">
		<br><div><left><font color = "#CC9900" size = "4"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โครงการ</b></font></left></div>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รหัสโครงการ   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        ชื่อโครงการ
		

		<br><div><left><font color = "#CC9900" size = "4"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายชื่อนิสิต</b></font></left></div>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ-สกุล1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รหัสนิสิต
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ-สกุล2
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รหัสนิสิต
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ-สกุล3
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รหัสนิสิต
		

		
		<br><div><left><font color = "#CC9900" size = "4"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ความคิดเห็นของอาจารย์ที่ปรึกษา</b></font></left></div>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="textboxdes" cols="50" rows="5">
		</textarea>

		<br><div><left><font color = "#CC9900" size = "4"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สรุป</b></font></left></div>
		<div><font color = "#CCCC33" size = "3"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ความเห็นของอาจารย์ที่ปรึกษา</b></font></div>
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="group1" value="pass">เห็นสมควรให้สอบโครงงานได้
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="group1" value="notpass">ยังไม่สมควรให้สอบโครงงานได้
		<br>
		
		<br><div><left><font color = "#CC9900" size = "4"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ</b></font></left></div>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อาจารย์ที่ปรึกษา
		<input type="text" name="tsign">
		วันที่
		<input type="text" name="date">
		
		<br><br><center>
		<input type="submit" value="บันทึก">
		</center>
		</form>	
		
		<form action="projectteacher.php" method="post">
		<br>
		<center><input type="submit" value="กลับ"></center>
		</form>
		
		</div>
		
		<center><br>
			@copyright SuperStar<br>
			เป็นส่วนหนึ่งของรายวิชา 305351 Computer System Engineering<br>
			ภาคการศึกษาที่ 2 ปีการศึกษา 2557
		</center>
	</div>
	
	

</body>
</html>