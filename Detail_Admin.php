<?php
	session_start();
	
	if (isset($_SESSION["login_state"]))
		{
			 include_once dirname(__FILE__) . '/Config.php';
			mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
			mysql_select_db(DB_NAME);
			mysql_query("SET NAMES UTF8");
		
		$query_Project = mysql_query ("SELECT * FROM `Project` WHERE project_status < 7  AND Special_Committee = ''");
		
		
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
	  
	  
	
		<div card="" z-0="" align-left >
		
			<div bg-grey100="" padded="">
			
		 
			
			
			<br>
			<h4>โครงงานที่รอเพิ่มกรรมการ</h4>
			<table id="myTable1" class="order-list" style="width: 700px">
    <thead>
        <tr>
           <td style="width: 50px"><div align="center" >
			ที่
			</div></td>
			<td><div align="center">
			ชื่อโครงงาน
			</div></td>
			<td><div align="center">
			อ่านเพิ่มเติม
			</div></td>
        </tr>
    </thead>
    <tbody>
					<?php
					$data = 0;
					while($dataAdvisors = mysql_fetch_array($query_Project))
					{$data++;
					?>
					<tr>
						<td style="width: 50px"><div align="center" >
						<?php echo $data;?>
						</div></td>
						<td><div align="center">
						<?php echo $dataAdvisors[1];?>
						</div></td>
						<td><div align="center">
						<button bg-teal ripple-color="tealA400" onclick="location.href='ViewDetailProject.php?id=<?php echo $dataAdvisors[0];?>'">Read more</button>
						</div></td>
					</tr>
					<?php
					}
					?>
	
    </tbody>
    <tfoot>
        
        
    </tfoot>
</table>

	
	
		</div>

	
	
		</div>
		

	
        
		
    </div>
	
	<div fluid card bg-Grey500="">

		
		<font color="white">
		<center><a1>copyright © SuperStar Group | 305351 Computer System Engineering ภาคการศึกษาที่ 2  ปีการศึกษา 2557</a1></center>
			<br>
		<center><a1>copyright © 2015 Maximum Group | 305471 Software Engineering ภาคการศึกษาที่ 1  ปีการศึกษา  2558</a1></center>
        </font>
	
        
	</div>

	
</div>


	
	
	
	<!-- load scripts at the end -->

  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>
</html>