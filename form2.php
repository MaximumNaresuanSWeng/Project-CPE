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
	<div id = "intextform">
	<br><div><center><font color = "#CCCC33" size = "5"><b> CPE02 แบบบันทึกการดำเนินงานโครงงาน</b></font></center></div>
	
	<form action="save2.php" method="post">
		<br><div><left><font color = "#CC9900" size = "4"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โครงการ</b></font></left></div>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รหัสโครงการ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<?php
		$strSQLproject1 = "SELECT * FROM project join student 
		on project.projectID = student.projectID
		WHERE student.studentID = '".$_SESSION['userID']."' ";
		$objQueryproject1 = mysql_query($strSQLproject1);
		$objResultproject1 = mysql_fetch_array($objQueryproject1);
		echo "<i>".$objResultproject1['projectID']."  ".$objResultproject1['projectnameTH']." (".$objResultproject1['projectnameENG'].")</i>";
		$_SESSION['cpe02'] = $objResultproject1['projectID'];
		//echo $_SESSION['cpe02'] ;
		?>	
		

		<p><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่
		<?php
		echo date('d-m-Y');
		//echo "&nbsp;&nbsp;";
		//echo "เวลา";
		//echo "&nbsp;&nbsp;";
		//echo date('H:i:s');
		?>
		
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประเด็น/หัวข้อ/งานที่มอบหมาย<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<textarea name="title" cols="50" rows="5">
		</textarea>
		
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อสรุป/ความคืบหน้าของงาน<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<textarea name="conclude" cols="50" rows="5">
		</textarea>

		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หมายเหตุ<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<textarea name="note" cols="50" rows="5">
		</textarea>
		
		

		<!--
		<br><div><left><font color = "#CC9900" size = "4"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ</b></font></left></div>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อาจารย์ผู้ประเมิน
		<input type="text" name="tsign">
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่
		<input type="text" name="date">
		-->
		
		<br><br><center>
		<input type="submit" value="บันทึก">
		</center>
		</form>
		
		<form action="projectstudent.php" method="post">
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