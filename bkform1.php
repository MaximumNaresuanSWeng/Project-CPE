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
		<div id = "logoutloc"><a href="logout.php">Logout</a></div>
	</div>
	
	<div id = "paneltab">
		<div id = "paneltag1">
		<a href = "home.php"><center><h1>Home</h1></center></a>
		</div>
		
		<div id = "paneltag2">
		<a href = "checkproject.php"><center><h1>Project</h1></center></a>
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
	<?php echo $objResult["Name"];?>
	<br><div><center><font color = "#CCCC33" size = "5"><b>CPE01 แบบเสนอหัวข้อโครงงานวิศวกรรมคอมพิวเตอร์   </b></font></center></div>
	
	<form action="saved.php" method="post">
		<br><div><left><font color = "#CC9900" size = "4"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โครงการ</b></font></left></div>
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รหัสโครงการ
		<input type="text" name="codepr">
		ชื่อโครงการ(ไทย)
		<input type="text" name="nameprth">
		ชื่อโครงการ(อังกฤษ)
		<input type="text" name="namepren">

		<br><br><div><left><font color = "#CC9900" size = "4"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายชื่อนิสิต</b></font></left></div>
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ชื่อ -สกุล1</b>
		<?php
		$strSQLstudent1 = "SELECT * FROM student WHERE studentID = '".$_SESSION['userID']."' ";
		$objQuerystudent1 = mysql_query($strSQLstudent1);
		$objResultstudent1 = mysql_fetch_array($objQuerystudent1);
		echo "<i>".$objResultstudent1['s_firstname']."  ".$objResultstudent1['s_lastname']."</i>";
		?>	
		<b>รหัสนิสิต</b>
		<?php
		$strSQLstudent1 = "SELECT * FROM student WHERE studentID = '".$_SESSION['userID']."' ";
		$objQuerystudent1 = mysql_query($strSQLstudent1);
		$objResultstudent1 = mysql_fetch_array($objQuerystudent1);
		echo "<i>".$objResultstudent1['studentID']."</i>";
		?>
		<b>เบอร์โทร</b>
		<?php
		$strSQLstudent1 = "SELECT * FROM student WHERE studentID = '".$_SESSION['userID']."' ";
		$objQuerystudent1 = mysql_query($strSQLstudent1);
		$objResultstudent1 = mysql_fetch_array($objQuerystudent1);
		echo "<i>".$objResultstudent1['s_phone']."</i>";
		?>
		<b>อีเมล์</b>
			<?php
		$strSQLstudent1 = "SELECT * FROM student WHERE studentID = '".$_SESSION['userID']."' ";
		$objQuerystudent1 = mysql_query($strSQLstudent1);
		$objResultstudent1 = mysql_fetch_array($objQuerystudent1);
		echo "<i>".$objResultstudent1['s_email']."</i>";
		?>
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ-สกุล2
		<input type="text" name="nameid2" size="10"><input type="text" name="lnameid2" size="10">
		รหัสนิสิต
		<input type="text" name="codeid2" size="8">
		เบอร์โทร
		<input type="text" name="nameid1" size="10">
		อีเมล์
		<input type="text" name="nameid1" size="20">
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ-สกุล3
		<input type="text" name="nameid3" size="10"><input type="text" name="lnameid3" size="10">
		รหัสนิสิต
		<input type="text" name="codeid3" size="8">
		เบอร์โทร
		<input type="text" name="nameid1" size="10">
		อีเมล์
		<input type="text" name="nameid1" size="20">

		
		<br><br><div><left><font color = "#CC9900" size = "4"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อาจารย์ที่ปรึกษาและกรรมการ</b></font></left></div>
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อาจารย์ที่ปรึกษา
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="pro">
		<option value="">เลือกอาจารย์ที่ปรึกษา</option>
		<?php
		$strSQLteacher1 = "SELECT * FROM teacher_detail";
		$objQueryteacher1 = mysql_query($strSQLteacher1);
	//$objResultteacher = mysql_fetch_array($objQueryteacher);
	
		while($objResultteacher1 = mysql_fetch_array($objQueryteacher1)){
		?>	
		<option value="<?php echo $objResultteacher1["teacherID"];
		?>"><?php echo $objResultteacher1["t_firstname"]."  ".$objResultteacher1["t_lastname"];?></option>

			<?php
			}
			?>
		
		</select>
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อาจารย์ที่ปรึกษาร่วม (ถ้ามี)
		&nbsp;&nbsp;<select name="copro">
		<option value="">เลือกอาจารย์ที่ปรึกษาร่วม</option>
		<?php
		$strSQLteacher1 = "SELECT * FROM teacher_detail";
		$objQueryteacher1 = mysql_query($strSQLteacher1);
	//$objResultteacher = mysql_fetch_array($objQueryteacher);
	
		while($objResultteacher1 = mysql_fetch_array($objQueryteacher1)){
		?>	
		<option value="<?php echo $objResultteacher1["teacherID"];
		?>"><?php echo $objResultteacher1["t_firstname"]."  ".$objResultteacher1["t_lastname"];?></option>

			<?php
			}
			?>
		</select>
		<!--<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เสนอรายชื่อกรรมการ 1 ท่าน
		<input type="text" name="result3">

		
		
		
		<br><br><div><left><font color = "#CC9900" size = "4"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ</b></font></left></div>
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อาจารย์ผู้ประเมิน
		<input type="text" name="tsign">
		วันที่
		<input type="text" name="date">
		-->
		<br><br><br><br><br><br><br><br><center>
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