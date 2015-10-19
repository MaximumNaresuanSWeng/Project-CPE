<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>ระบบป้อนข้อมูลอะไรสักอย่าง</title>


<link rel="stylesheet" href="css/md-css.min.css">
<link rel="stylesheet" href="css/md-icons.min.css">
<link rel="stylesheet" href="css/news.css">

 <script type="text/javascript"> 

 </script>
      
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
	  
	  
	
		<div card="" z-0="" align-left >
		
	หน้าหลัก
		<br>
		<!--	<ul class="bxslider">
			  <li><img src="img/027.jpg" title="Funky roots" /></li>
			  <li><img src="img/NU Award 2015.jpg" title="The long and winding road" /></li>
			  <li><img src="img/PromotionYecc2015.jpg" title="Happy trees" /></li>
			</ul-->
			<img src = "img/027.jpg" width="100%"/>
		</div>
		<!--div class="wrapper">
		<br><a1>-ข่าวประชาสัมพันธ์...</a1><br>
				<!-- /comment  <ul id="sb-slider" class="sb-slider">
					<li>
						<a href="#" target="_blank"><img src="img/all3.png" /></a>
						
					</li>
					<li>
						<a href="#" target="_blank"><img src="img/NU Award 2015.jpg" /></a>
						
					</li><li>
						<a href="#" target="_blank"><img src="img/icesit2015.png" /></a>
						
					</li><li>
						<a href="#" target="_blank"><img src="img/PromotionYecc2015.jpg" /></a>
						
					</li><li>
						<a href="#" target="_blank"><img src="img/027.jpg" /></a>
						
					<!--/li>
					
					
				</ul>

				<div id="shadow" class="shadow"></div>

				<div id="nav-arrows" class="nav-arrows">
					<a href="#">Next</a>
					<a href="#">Previous</a>
				</div -->
		</div><!-- /wrapper -->

	
        
		
    </div>
	
	<div fluid card bg-Grey500="">

		
		<br>
		<font color="white">
		<center><a1>เว็บไซต์นี้เป็นส่วนหนึ่งของ รายวิชา 305351 Computer System Engineering อาจารย์ผู้สอน ดร.สุรเดช จิตประไพกุลศาล</a1></center>
		<center><a1>2015 © Copyright nu.ac.th . All rights reserved.</a1></center>
		 </font>
	
        
	</div>

	
</div>


	
	
	
	<!-- load scripts at the end -->

  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>
</html>