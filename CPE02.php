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
<link rel="stylesheet" href="css/dropdown2.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

  <!-- This is what you need -->
  <script src="sweetalert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">


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
		
		</center>
	
        
		
    </div>
      <div fluid card bg-Orange500="" align-center>
	  
	  
		<div card="" z-0="" align-center>
		
	
	     <div bg-grey100="" padded="">
		 
				<?php 
				if($project[6] == 999)
				{
					
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

	
        </div>
		
		<br>
		
		<div card="" z-0="" align-left>
		
	
	     
		 
			<h4>โครงงาน<?php echo " ".$project[1];?></h4>
			
			<form name="formdata" id="formdata" onsubmit="return required()" method="post" action="saveCPE02.php" >
			<hr>
			วัน/เดือน/ปี 	<font color="red">*</font>
			<br>
			<input  placeholder="วัน/เดือน/ปี " title="วัน/เดือน/ปี " type="date"  name="date" id="date" style="width: 700px" bg-White/>
			
			<hr>
			ประเด็น/หัวข้อ/งานที่มอบหมาย	<font color="red">*</font>
			<br>
			<textarea placeholder="ประเด็น/หัวข้อ/งานที่มอบหมาย" name="works" id="works"  bg-White style="width: 700px" rows="4"></textarea>
		
			<hr>
			ข้อสรุป/ความคืบหน้าของงาน<font color="red">*</font>
			<br>
			<textarea placeholder="ข้อสรุป/ความคืบหน้าของงาน" name="summary" id="summary"  bg-White style="width: 700px" rows="4"></textarea>
			
			<hr>
			หมายเหตุ
			<br>
			<textarea placeholder="หมายเหตุ" name="Notes" id="Notes"  bg-White style="width: 700px" rows="4"></textarea>
			
			<hr>
			<button bg-Red500 ripple-color="tealA400" type="submit"> SAVE DATA</button>
			
			</form>
			
<script type="text/javascript"> 

 function required()
{

	var date = document.forms["formdata"]["date"].value;
	var works = document.forms["formdata"]["works"].value;
	var summary = document.forms["formdata"]["summary"].value;

	if (date == "" || works == "" || summary == "" || Notes == "" )
	{
		//alert("กรุณาป้อนข้อมูลช่องที่มี * ");
		swal({title: "กรุณาป้อนข้อมูลช่องที่มี * ",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		
		return false;
	}
	else 
	{
		return true; 
	}

}
 </script>
			
	
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