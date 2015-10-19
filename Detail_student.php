<?php
	session_start();
	
	if (isset($_SESSION["login_state"]))
		{
			include_once dirname(__FILE__) . '/Config.php';
			mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
			mysql_select_db(DB_NAME);
			mysql_query("SET NAMES UTF8");
	
	
		$query_project = mysql_query ("SELECT * FROM `Project` WHERE id = '".$_SESSION["ID_project"]."'");
		
		$project = mysql_fetch_array($query_project);
		
		$query_Advisors = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[7]."'");
		
		$Advisors = mysql_fetch_array($query_Advisors);
		
		if($project[8] != "")
		{
			$query_Co_Advisors = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[8]."'");
		
			$Co_Advisors = mysql_fetch_array($query_Co_Advisors);
		}
		
		
		$query_Committee = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[9]."'");
		
		$Committee = mysql_fetch_array($query_Committee);
			
		}
		else
		{
			session_destroy();
			header("location:load_balance.php");
		}
	
	
	
		
		

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>ระบบป้อนข้อมูลอะไรสักอย่าง</title>


<link rel="stylesheet" href="css/md-css.min.css">
<link rel="stylesheet" href="css/md-icons.min.css">
<link rel="stylesheet" href="css/progress.css">

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
			echo "<button bg-teal ripple-color='tealA400' onclick=\"location.href='ViewCPE01.php'\">View</button>";
			echo "<button bg-teal ripple-color='tealA400' onclick=\"location.href='about.php'\">About</button>";
			echo "<button bg-Red500 ripple-color='tealA400' onclick=\"location.href='logout.php'\">Log Out</button>";
		}
		else
		{
			echo "<button bg-teal ripple-color='tealA400' onclick=\"location.href='login.php'\">Log In</button>";
		}
	?>
		</div>
		
		
	
        
		
    </div>
      <div fluid card bg-Orange500="" align-center>
	  
	  
		<div card="" z-0="" align-center>
		
	
	    
			<?php 
				if($project[6] == 999)
				{
					echo "<button bg-Red500 ripple-color='tealA400' onclick=\"location.href='CPE01.php'\">CPE01</button>";
				}
				else
				{
				if($project[6] >= 1 || $project == NULL)
				{
					echo "<button bg-Red500 ripple-color='tealA400' onclick=\"location.href='CPE01.php'\">CPE01</button>";
				}
				if($project[6] >= 2)
				{
					echo "<button bg-Red500 ripple-color='tealA400' onclick=\"location.href='CPE02.php'\">CPE02</button>";
				}
				if($project[6] == 2)
				{
					echo "<button bg-Red500 ripple-color='tealA400' onclick=\"location.href='CPE03.php'\">CPE03</button>";
				}
				}
				
			?>
				
				
		

	
        </div>
		
		<br>
		
		<div card="" z-0="" align-left>
		
	
	     <div bg-grey100="" padded="">
		 
		 <?php 
			if($project[6] == 999)
			{
				echo "<div bg-Red500 card='' z-1='' style='width: 500px'><h4>ไม่ผ่านการเสนอหัวข้อโครงงาน</h4><p></p></div><br>";
			}
		 ?>
		 
			<div card="" z-1="" style="width: 500px">
				<h4>ชื่อ-นามสกุล : <?php echo $_SESSION["firstnameTH"]." ".$_SESSION["lastnameTH"]; ?></h4>
				<p></p>
			</div>
			<br>
			<div card="" z-1="" style="width: 500px">
				<h4>ชื่อโครงงาน : <?php echo $project[1]; ?></h4>
				<p></p>
			</div>
			<br>
			<div card="" z-1="" style="width: 500px">
				<h4>Name project : <?php echo $project[2]; ?></h4>
				<p></p>
			</div>
			<br>
			<div card="" z-1="" style="width: 500px">
				<h4>อาจารย์ที่ปรึกษา : <?php echo $Advisors[4]." ".$Advisors[5]; ?></h4>
				<p></p>
			</div>
			<br>
			<div card="" z-1="" style="width: 500px">
				<h4>อาจารย์ที่ปรึกษาร่วม : <?php echo $Co_Advisors[4]." ".$Co_Advisors[5]; ?></h4>
				<p></p>
			</div>
			<br>
			<div card="" z-1="" style="width: 500px">
				<h4>กรรมการ : <?php echo $Committee[4]." ".$Committee[5]; ?></h4>
				<p></p>
			</div>
			
		
	
		</div>

	
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