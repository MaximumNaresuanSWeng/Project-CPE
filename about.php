
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>ระบบป้อนข้อมูลอะไรสักอย่าง</title>


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
	  
	  <div card="" z-1="" bg-Red500 align-center >
		
				<h1>TEAM SUPER STAR</h1>
	
			</div>
			
			<br>
	
		<div card="" z-0="" align-center >
		
			<div card="" z-1="" bg-Lime500 align-center >
		
				<img src="img/jom2.jpg" alt="Smiley face" align-center height="197" width="148">
	
			</div>
			
					<br>
					&nbsp;&nbsp;&nbsp;ID: 55361922
					<br>
					  &nbsp;&nbsp;&nbsp;Name: Mr.Nattapoom Kamhanghan
					<br>
					 &nbsp;&nbsp;&nbsp;E-mail: Nattapoomk55@email.nu.ac.th
	
		</div>
		
		<br>
		
		<div card="" z-0="" align-center >
		
			<div card="" z-1="" bg-Lime500 align-center >
		
				<img src="img/boom2.jpg" alt="Smiley face" align-center height="197" width="148">
	
			</div>
			
					<br>
					&nbsp;&nbsp;&nbsp;ID: 55362028
					<br>
					  &nbsp;&nbsp;&nbsp;Name: Mr.Tarawee Pubpatong
					<br>
					 &nbsp;&nbsp;&nbsp;E-mail: Taraweep55@email.nu.ac.th
	
		</div>
		<div card="" z-0="" align-center >
		
			<div card="" z-1="" bg-Lime500 align-center >
		
				<img src="img/ant2.jpg" alt="Smiley face" align-center height="197" width="148">
	
			</div>
			
					<br>
					&nbsp;&nbsp;&nbsp;ID: 55362394
					<br>
					  &nbsp;&nbsp;&nbsp;Name: Mr.Sarayut Ruangsaeng
					<br>
					 &nbsp;&nbsp;&nbsp;E-mail: Sarayutr55@email.nu.ac.th
	
		</div>
		<div card="" z-0="" align-center >
		
			<div card="" z-1="" bg-Lime500 align-center >
		
				<img src="img/may2.jpg" alt="Smiley face" align-center height="197" width="148">
	
			</div>
			
					<br>
					&nbsp;&nbsp;&nbsp;ID: 55362363
					<br>
					  &nbsp;&nbsp;&nbsp;Name: Miss.Wijittha	Ratthanason
					<br>
					 &nbsp;&nbsp;&nbsp;E-mail: Wijitthar55@email.nu.ac.th
	
		</div>
		<div card="" z-0="" align-center >
		
			<div card="" z-1="" bg-Lime500 align-center >
		
				<img src="img/pang2.jpg" alt="Smiley face" align-center height="197" width="148">
	
			</div>
			
					<br>
					&nbsp;&nbsp;&nbsp;ID: 55362295
					<br>
					  &nbsp;&nbsp;&nbsp;Name: Miss.Malulee Potha
					<br>
					 &nbsp;&nbsp;&nbsp;E-mail: Maluleep55@email.nu.ac.th
	
		</div>
		
		<br>
		
		<div card="" z-1="" bg-Red500 align-center >
		
				<h1>TEAM MAXXIMUM</h1>
	
			</div>
			
			<br>
	
		<div card="" z-0="" align-center >
		
			<div card="" z-1="" bg-Lime500 align-center >
		
				<img src="img/1.jpg" alt="Smiley face" align-center height="197" width="148">
	
			</div>
			
					<br>
					&nbsp;&nbsp;&nbsp;ID: 55361281
					<br>
					  &nbsp;&nbsp;&nbsp;Name: Mr.Assanee Saksiritantawan
					<br>
					 &nbsp;&nbsp;&nbsp;E-mail: assanepoi@hotmail.com
	
		</div>
		
		<br>
		
		<div card="" z-0="" align-center >
		
			<div card="" z-1="" bg-Lime500 align-center >
		
				<img src="img/2.jpg" alt="Smiley face" align-center height="197" width="148">
	
			</div>
			
					<br>
					&nbsp;&nbsp;&nbsp;ID: 55361878
					<br>
					  &nbsp;&nbsp;&nbsp;Name: Miss.Chalitta Khampachua
					<br>
					 &nbsp;&nbsp;&nbsp;E-mail: chalittak55@email.nu.ac.th
	
		</div>
		<div card="" z-0="" align-center >
		
			<div card="" z-1="" bg-Lime500 align-center >
		
				<img src="img/3.jpg" alt="Smiley face" align-center height="197" width="148">
	
			</div>
			
					<br>
					&nbsp;&nbsp;&nbsp;ID: 55361953
					<br>
					  &nbsp;&nbsp;&nbsp;Name: Mr.Danusorn Salabsee
					<br>
					 &nbsp;&nbsp;&nbsp;E-mail: danusorns55@email.nu.ac.th
	
		</div>
		<div card="" z-0="" align-center >
		
			<div card="" z-1="" bg-Lime500 align-center >
		
				<img src="img/4.jpg" alt="Smiley face" align-center height="197" width="148">
	
			</div>
			
					<br>
					&nbsp;&nbsp;&nbsp;ID: 55362059
					<br>
					  &nbsp;&nbsp;&nbsp;Name: Mr.Theeraphong Seefong
					<br>
					 &nbsp;&nbsp;&nbsp;E-mail: theeraphongs55@email.nu.ac.th
	
		</div>
		<div card="" z-0="" align-center >
		
			<div card="" z-1="" bg-Lime500 align-center >
		
				<img src="img/5.jpg" alt="Smiley face" align-center height="197" width="148">
	
			</div>
			
					<br>
					 &nbsp;&nbsp;&nbsp;ID: 55362103
					<br>
					  &nbsp;&nbsp;&nbsp;Name: Miss.Nitipat Thadsanapoom
					<br>
					 &nbsp;&nbsp;&nbsp;E-mail: nitipatt55@email.nu.ac.th
	
		</div>
		
		

	
        
		
    </div>
	
	<div fluid card bg-Grey500="">

		
		<br>
		<center><a1>เว็บไซต์นี้เป็นส่วนหนึ่งของ รายวิชา 305351 Computer System Engineering</a1></center>
		<center><a1>อาจารย์ผู้สอน ดร.สุรเดช จิตประไพกุลศาล</a1></center>
		<center><a1>2015 © Copyright nu.ac.th . All rights reserved.</a1></center>
		
	
        
	</div>

	
</div>


	
	
	
	<!-- load scripts at the end -->

  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>
</html>