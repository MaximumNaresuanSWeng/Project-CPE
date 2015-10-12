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
</head>

<body>

	<div id = "panelheader">
		
	</div>
	
	<div id = "paneltab">
		<div id = "paneltag1">
		<a href = "home.php"><center><h1>Home</h1></center></a>
		</div>
		
		<div id = "paneltag2">
		<a href = "project.php"><center><h1>Project</h1></center></a>
		</div>
		
		<div id = "paneltag3">
		<a href = "aboutsecond.php"><center><h1>About</h1></center></a>
		</div>
		
		<div id = "paneltag4">
		<a href = "logout.php"><center><h1>Logout</h1></center></a>
		</div>
		
	</div>
	
	<div id = "panelbody">
	<div id = "intextform3">
	
	<br><div><center><font color = "#CCCC33" size = "5"><b>Computer Engineering Form 05</b></font></center></div>
	
	<form action="saved.php" method="post">
		<br><div><left><font color = "#CC9900" size = "4"><b>โครงการ</b></font></left></div>
		รหัสโครงการ
		<input type="text" name="codepr">
		ชื่อโครงการ(ไทย)
		<input type="text" name="nameprth">
		ชื่อโครงการ(อังกฤษ)
		<input type="text" name="namepren">

		<br><div><left><font color = "#CC9900" size = "4"><b>รายชื่อนิสิต</b></font></left></div>
		ชื่อ-สกุล1
		<input type="text" name="nameid1">
		รหัสนิสิต
		<input type="text" name="codeid1">
		<br>ชื่อ-สกุล2
		<input type="text" name="nameid2">
		รหัสนิสิต
		<input type="text" name="codeid2">
		<br>ชื่อ-สกุล3
		<input type="text" name="nameid3">
		รหัสนิสิต
		<input type="text" name="codeid3">

		
		<br><div><left><font color = "#CC9900" size = "4"><b>ผลการประเมิน</b></font></left></div>
		ผลการดำเนินงาน
		<input type="text" name="result1">
		<br>ความสมบูรณ์ของรายงานโครงการ
		<input type="text" name="result2">
		<br>ความรู้ความเข้าใจของนิสิตเกี่ยวกับโครงงาน
		<input type="text" name="result3">

		
		<br><div><left><font color = "#CC9900" size = "4"><b>ข้อเสนอแนะ</b></font></left></div>
		<textarea name="textboxdes" cols="50" rows="5">
		</textarea>
		

		<br><div><left><font color = "#CC9900" size = "4"><b>สรุป</b></font></left></div>
		<div><font color = "#CCCC33" size = "3"><b>ความเห็นของอาจารย์ผู้ประเมิน</b></font></div>
		    <input type="radio" name="group1" value="pass">ผ่าน
		<br><input type="radio" name="group1" value="notpass">ไม่ผ่าน
		<br>สมควรแก้ไข
		<br><input type="radio" name="group1" value="newtest">สอบใหม่
		<br><input type="radio" name="group1" value="notest">ไม่ต้องสอบใหม่
		
		<br><br><div><font color = "#CCCC33" size = "3"><b>มติกรรมการ</b></font></div>
		    <input type="radio" name="group2" value="pass">ผ่าน
		<br><input type="radio" name="group2" value="notpass">ไม่ผ่าน
		<br>สมควรแก้ไข
		<br><input type="radio" name="group2" value="newtest">สอบใหม่
		<br><input type="radio" name="group2" value="notests">ไม่ต้องสอบใหม่

		
		<br><div><left><font color = "#CC9900" size = "4"><b>ลงชื่อ</b></font></left></div>
		อาจารย์ผู้ประเมิน
		<input type="text" name="tsign">
		วันที่
		<input type="text" name="date">
		
		<br><br><center>
		<input type="submit" value="บันทึก">
		<br><br>
		</center>
		</form>	
		</div>
		
		<center><br>
			@copyright SuperStar<br>
			เป็นส่วนหนึ่งของรายวิชา 305351 Computer System Engineering<br>
			ภาคการศึกษาที่ 2 ปีการศึกษา 2557
			<br><br>
			@2015 copyright Maximum <br>
			เป็นส่วนหนึ่งของรายวิชา 305471 Software Engineering<br>
			ภาคการศึกษาที่ 1 ปีการศึกษา 2558
		</center>
	</div>
	
	

</body>
</html>