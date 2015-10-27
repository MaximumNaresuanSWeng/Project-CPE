<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>ระบบป้อนข้อมูลอะไรสักอย่าง</title>


<link rel="stylesheet" href="css/md-css.min.css">
<link rel="stylesheet" href="css/md-icons.min.css">
<link rel="stylesheet" type="text/css" href="homecss/css/tilteffect.css" />
<link rel="stylesheet" type="text/css" href="homecss/css/demo.css" />
      
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
	
			
				<ul class="grid grid--examples" style="width: 700px">
					
					<li class="grid__item">
						<div class="grid__img grid__img--example-2">
							<img src="img/2014_03_17_15_46_55.jpg" class="tilt-effect" alt="grid02"  data-tilt-options='{ "movement": { "perspective" : 700, "translateX" : -15, "translateY" : -15, "translateZ" : 10, "rotateX" : 2, "rotateY" : 10 } }' />
						</div>
					</li>
					
					
				</ul>
		</div>
		

	
        
		
    </div>
	
	<div fluid card bg-Grey500="">

			
				 
		<font color="white">
		<center><a1>copyright © SuperStar Group | 305351 Computer System Engineering ภาคการศึกษาที่ 2  ปีการศึกษา 2557</a1></center>
			<br>
		<center><a1>copyright © 2015 Maximum Group | 305471 Software Engineering ภาคการศึกษาที่ 1  ปีการศึกษา  2558</a1></center>
        </font>
		
		
		<div align=right> 
					<font color="white">Page ID : 1 </font>					
		</div>
		
	</div>

	
	
</div>

 
	
	
	
	<!-- load scripts at the end -->
	<script src="js/tiltfx.js"></script>
	
	
  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>
</html>