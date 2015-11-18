<?php
			include_once dirname(__FILE__) . '/Config.php';
			mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
			mysql_select_db(DB_NAME);
			mysql_query("SET NAMES UTF8");
			
			$LMF  = $_REQUEST['LMF']+0;
			$LML  = $LMF+12;
			
			$query_News = mysql_query ("SELECT * FROM `NewsHome` ORDER BY id DESC LIMIT ".$LMF." , 12");
			$query3 = mysql_query ("SELECT COUNT(*) FROM  `NewsHome` WHERE 1 ");
			$query3data = mysql_fetch_array($query3);
			

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์ คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร</title>


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
			<h4>ข่าวประชาสัมพันธิ์</h4>
				<ul class="grid grid--examples" style="width: 700px">
				<table id="NewTable1" class="order-list" style="width: 700px">	
				<thead>
				<tr bg-Green500>
					<td style="width: 100px"><div align="center" >
						วันที่
					</div></td>
					<td style="width: 200px"><div align="center" >
						หัวเรื่อง
					</div></td>
					<td><div align="center">
						ข่าวประชาสัมพันธิ์
					</div></td>
				</tr>
				</thead>
				<tbody>
				
				<?php
				
				$number = 0;
				while($dataquery_News = mysql_fetch_array($query_News))
				{
					if($number%2 == 0)
					{
					
				?>
							<tr bg-IndigoA700>
								<td style="width: 100px"><div align="left" >
								<?php echo $dataquery_News[3]?>
								</div></td>
								<td style="width: 200px"><div align="left">
								<?php echo $dataquery_News[1]?>
								</div></td>
								<td><div align="left">
								<?php echo $dataquery_News[2]?>
								</div></td>
							</tr>
				<?php
					}
					else
					{
						
					?>
						<tr bg-IndigoA100>
							<td style="width: 100px"><div align="left" >
							<?php echo $dataquery_News[3]?>
							</div></td>
							<td style="width: 200px"><div align="left">
							<?php echo $dataquery_News[1]?>
							</div></td>
							<td><div align="left">
							<?php echo $dataquery_News[2]?>
							</div></td>
						</tr>
				<?php
				
				
					}
				$number++;
				}
				?>
				</tbody>
				</table>
				</ul>
				
				<center>
	<?php 
	if($LMF > 0)
	{
		$LMF = $LMF - 12 ;
		echo "<button bg-Red500 ripple-color=\"tealA400\" onclick=\"location.href='index.php?LMF=".$LMF."'\"><--กลับ</button>";
	}
	
	if($query3data[0] >  ($LML))
	{
		echo "<button bg-Red500 ripple-color=\"tealA400\" onclick=\"location.href='index.php?LMF=".$LML."'\">ต่อไป--></button>";
	}
	
	?>
		</center>	
		
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