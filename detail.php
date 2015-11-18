<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์ คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร</title>


<link rel="stylesheet" href="css/md-css.min.css">
<link rel="stylesheet" href="css/md-icons.min.css">

</head>
<body material fluid >

	
	
	
<div bg-grey100="" padded="">
	
	<div content>
	 <div fluid card bg-Grey500 align-center>

		<div card="" z-0="" >
	<button bg-teal ripple-color="tealA400" onclick="location.href='index.php'">Home</button>
	<button bg-teal ripple-color="tealA400" onclick="location.href='detail.php'">Detail</button>
	
	<?php
		session_start();
		if (isset($_SESSION["login_state"]))
		{
			echo "<button bg-teal ripple-color='tealA400' onclick=\"location.href='load_balance.php'\">Data</button>";
			if($_SESSION["status"] == "student")
			{
				echo "<button bg-teal ripple-color='tealA400' onclick=\"location.href='ViewCPE01.php'\">View</button>";
			}
			if($_SESSION["status"] == "Admin")
			{
				echo"<button bg-teal ripple-color='tealA400' onclick=\"location.href='Add_news.php'\">Add News</button>";
			}
			echo "<button bg-teal ripple-color='tealA400' onclick=\"location.href='about.php'\">About</button>";
			echo "<button bg-Red500 ripple-color='tealA400' onclick=\"location.href='logout.php'\">Log Out</button>";
		}
		else
		{
			
			echo "<button bg-teal ripple-color='tealA400' onclick=\"location.href='login.php'\">Log In</button>";
			echo "<button bg-teal ripple-color='tealA400' onclick=\"location.href='about.php'\">About</button>";
		}
	?>
	
		</div>
		
		</center>
	
        
		
    </div>
      <div fluid card bg-Orange500="" align-center>
	  
	  
	
		<div card="" z-0="" align-left >
		
	
				
					<h3>การดำเนินงานวิชาโครงงานวิศวกรรมคอมพิวเตอร์</h3>
					<a1>1. กรรมการสอบโครงงาน</a1><br>
						&nbsp;&nbsp;&nbsp;&nbsp- แต่ละโครงงานมีกรรมการสอบอย่างน้อย 3 คน (รวมอาจารย์ที่ปรึกษา) <br>
						&nbsp;&nbsp;&nbsp;&nbsp- อาจารย์ที่ปรึกษาเสนอรายชื่อกรรมการ 1 ท่าน (ผ่านแบบ CPE01) และผู้ประสานงานรายวิชาโครงงานเสนอรายชื่อกรรมการอีก 1 ท่าน <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp(จะประกาศรายชื่อให้ทราบ)<br>
						&nbsp;&nbsp;&nbsp;&nbsp- แต่ละโครงงานต้องส่งแบบ CPE03 ซึ่งมีกรรมการลงนามครบทั้ง 3 คน เพื่อยืนยันรายชื่อกรรมการ <br><br>
					<a1>2. การดำเนินงานโครงงาน และ การเขียนรายงานโครงงาน</a1><br>
						&nbsp;&nbsp;&nbsp;&nbsp- ระหว่างดำเนินโครงงาน แต่ละกลุ่มจะต้องส่ง logbook (แบบ CPE02) ให้กับผู้ประสานงานรายวิชาตามกำหนดการ<br>
						&nbsp;&nbsp;&nbsp;&nbsp- ใช้รูปแบบตามที่คู่มือกำหนด (คู่มือการเขียนปริญญานิพนธ์) แต่ให้ใช้ฟอนต์ Th Sarabun<br><br>
					<a1>3. การสอบข้อเสนอโครงงาน</a1><br>
						&nbsp;&nbsp;&nbsp;&nbsp- ใช้แบบฟอร์ม CPE04 โดยนิสิตกรอกข้อมูลให้เรียบร้อยแล้วส่งให้ผู้ประสานงานรายวิชาตามเวลาที่กำหนด<br>
						&nbsp;&nbsp;&nbsp;&nbsp- ผลการสอบหัวข้อโครงงานจะยึดตามมติกรรมการโดยมี 3 กรณีคือ<br>
						&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;- ผ่าน คือ สามารถดำเนินโครงงานต่อไปได้<br>
						&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;- สมควรแก้ไข แบ่งเป็น 2 กรณี คือ<br>
						&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp&nbsp;- สมควรแก้ไขโดยต้องสอบใหม่ คือ ให้แก้ไขตามคำแนะนำของกรรมการแล้วนัดสอบหัวข้อใหม่อีกครั้ง<br>
						&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp&nbsp;- สมควรแก้ไขโดยไม่ต้องสอบใหม่ คือ ให้แก้ไขรายงานและรายละเอียดโครงงานตามคำแนะนำของกรรมการแต่ไม่ต้องสอบหัวข้อใหม่<br>
						&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;- ไม่ผ่าน คือ ให้เปลี่ยนหัวข้อ และ นัดสอบหัวข้อใหม่อีกครั้ง<br><br>
					<a1>4. การสอบโครงงาน (สอบจบ)</a1><br>
						&nbsp;&nbsp;&nbsp;&nbsp- ผู้ประสานงานรายวิชาจะทำการจัดตารางสอบเฉพาะกลุ่มที่ส่งแบบขอสอบโครงงานวิศวกรรมภายในเวลาที่กำหนด (CPE06)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp และอาจารย์ที่ปรึกษาให้ความเห็นว่าสมควรให้สอบได้ โดยจะจัดสอบ 2 รอบ <br><br>
					<a1>5. การเปลี่ยนแปลงรายละเอียดโครงงาน</a1><br>
						&nbsp;&nbsp;&nbsp;&nbsp 5.1 การเปลี่ยนกรรมการ<br>
						&nbsp;&nbsp;&nbsp;&nbsp 5.2 การเปลี่ยนอาจารย์ที่ปรึกษา<br>
						&nbsp;&nbsp;&nbsp;&nbsp 5.3 การเปลี่ยนหัวข้อโครงงาน<br>
						&nbsp;&nbsp;&nbsp;&nbsp 5.4 การเปลี่ยนชื่อหัวข้อโครงงานโดยไม่เปลี่ยนแปลงรายละเอียด<br><br>
					<a1>6. การแก้ P</a1><br>

	
			
			<br>
		</div>
		

	
        
		
    </div>
	
	<div fluid card bg-Grey500="">

		
		<font color="white">
		<center><a1>copyright © SuperStar Group | 305351 Computer System Engineering ภาคการศึกษาที่ 2  ปีการศึกษา 2557</a1></center>
			<br>
		<center><a1>copyright © 2015 Maximum Group | 305471 Software Engineering ภาคการศึกษาที่ 1  ปีการศึกษา  2558</a1></center>
        </font>
		
		<div align=right> 
				<font color="white"> Page ID : 2 </font>
			
		</div>
        
	</div>

	
</div>


	
	
	
	<!-- load scripts at the end -->

  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>
</html>