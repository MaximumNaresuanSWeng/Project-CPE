<?php
	session_start();
	
	if (isset($_SESSION["login_state"]))
		{
			 include_once dirname(__FILE__) . '/Config.php';
			mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
			mysql_select_db(DB_NAME);
			mysql_query("SET NAMES UTF8");
		
		$query_Advisors = mysql_query ("SELECT * FROM `Project` WHERE ID_Advisors = '".$_SESSION["ID_USER"]."'");
		
		//$Advisors = mysql_fetch_array($query_Advisors);
		
		
		$query_Co_Advisors = mysql_query ("SELECT * FROM `Project` WHERE ID_Co_Advisors = '".$_SESSION["ID_USER"]."'");
		
		//$Co_Advisors = mysql_fetch_array($query_Co_Advisors);
		
		
		$query_Committee = mysql_query ("SELECT * FROM `Project` WHERE Committee = '".$_SESSION["ID_USER"]."' ");
		
		$query_Special_Committee = mysql_query ("SELECT * FROM `Project` WHERE Special_Committee = '".$_SESSION["ID_USER"]."' ");
		
		//$Committee = mysql_fetch_array($query_Committee);
		
		$query_statuspj = mysql_query ("SELECT * FROM `CPE02` WHERE ID_project = '".$_SESSION["ID_USER"]."'");
		$statuspj = mysql_fetch_array($query_statuspj);
		
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
			
		 
			<div card="" z-1="" style="width: 700px">
				<h4>ชื่อ-นามสกุล : <?php echo $_SESSION["firstnameTH"]." ".$_SESSION["lastnameTH"]; ?></h4>
				<p></p>
			</div>
			
			<br>
			<h4>โครงงานที่เป็นอาจารย์ที่ปรึกษา</h4>
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
			สถานะการแจ้งเตือน
			</div></td>
			<td><div align="center">
			อ่านเพิ่มเติม
			</div></td>
        </tr>
    </thead>
    <tbody>
					<?php
					$data = 0;
					while($dataAdvisors = mysql_fetch_array($query_Advisors))
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
							<?php 
								if($dataAdvisors[6]==1)
								{
									echo "รอการยืนยัน  CPE01 ";
									echo "</div></td>";
									echo "<td><div align=\"center\">";
									echo "<button bg-teal ripple-color=\"tealA400\" onclick=\"location.href='ViewCPE01teacher.php?id=".$dataAdvisors[0]."&state=Committee'\">Read more</button>";
									echo "</div></td>";
								}
								else if($dataAdvisors[6]==2)
								{
									echo "ไม่มีสถานะการแจ้งเตือน";
								}
								else if($dataAdvisors[6]==3)
								{
									echo "รอยืนยัน  CPE02 ";
									echo "</div></td>";
									echo "<td><div align=\"center\">";
									echo "<button bg-teal ripple-color=\"tealA400\" onclick=\"location.href='ViewCPE02teacher.php?id=".$dataAdvisors[0]."&state=Committee'\">Read more</button>";
									echo "</div></td>";
								}
								else if($dataAdvisors[6] >=3 && $statuspj[5] == 1)
								{
									echo "รอยืนยัน  CPE02 ";
									echo "</div></td>";
									echo "<td><div align=\"center\">";
									echo "<button bg-teal ripple-color=\"tealA400\" onclick=\"location.href='ViewCPE02teacher.php?id=".$dataAdvisors[0]."&state=Committee'\">Read more</button>";
									echo "</div></td>";
								}
								else if($dataAdvisors[6]==5)
								{
									echo "รอยืนยัน  CPE03 ";
									echo "</div></td>";
									echo "<td><div align=\"center\">";
									echo "<button bg-teal ripple-color=\"tealA400\" onclick=\"location.href='ViewCPE03teacher.php?id=".$dataAdvisors[0]."&state=Committee'\">Read more</button>";
									echo "</div></td>";
								}
								else if($dataAdvisors[6]==999)
								{
									echo "ไม่ได้รับการยืนยัน ";
								}
								else
								{
										echo "ไม่มีสถานะการแจ้งเตือน";
								}
							?>
							
					</tr>
					<?php
					}
					?>
	
    </tbody>
    <tfoot>
        
        
    </tfoot>
</table>

	<br>
			<h4>โครงงานที่เป็นอาจารย์ที่ปรึกษาร่วม</h4>
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
			สถานะการแจ้งเตือน
			</div></td>
			<td><div align="center">
			อ่านเพิ่มเติม
			</div></td>
			
			
        </tr>
    </thead>
    <tbody>

			<?php
					$data = 0;
					while($dataCo_Advisors = mysql_fetch_array($query_Co_Advisors))
					{$data++;
					?>
					<tr>
						<td style="width: 50px"><div align="center" >
						<?php echo $data;?>
						</div></td>
						<td><div align="center">
						<?php echo $dataCo_Advisors[1];?>
						</div></td>
						<td><div align="center">
							<?php 
								if($dataAdvisors[6]==1)
								{
									echo "รอการยืนยัน  CPE01 ";
									echo "</div></td>";
									echo "<td><div align=\"center\">";
									echo "<button bg-teal ripple-color=\"tealA400\" onclick=\"location.href='ViewCPE01teacher.php?id=".$dataCo_Advisors[0]."&state=Committee'\">Read more</button>";
									echo "</div></td>";
								}
								else if($dataAdvisors[6]==2)
								{
									echo "ไม่มีสถานะการแจ้งเตือน";
								}
								else if($dataAdvisors[6]==3)
								{
									echo "รอยืนยัน  CPE02 ";
									echo "</div></td>";
									echo "<td><div align=\"center\">";
									echo "<button bg-teal ripple-color=\"tealA400\" onclick=\"location.href='ViewCPE02teacher.php?id=".$dataCo_Advisors[0]."&state=Committee'\">Read more</button>";
									echo "</div></td>";
								}
								else if($dataAdvisors[6] >=3 && $statuspj[5] == 1)
								{
									echo "รอยืนยัน  CPE02 ";
									echo "</div></td>";
									echo "<td><div align=\"center\">";
									echo "<button bg-teal ripple-color=\"tealA400\" onclick=\"location.href='ViewCPE02teacher.php?id=".$dataCo_Advisors[0]."&state=Committee'\">Read more</button>";
									echo "</div></td>";
								}
								else if($dataAdvisors[6]==5)
								{
									echo "รอยืนยัน  CPE03 ";
									echo "</div></td>";
									echo "<td><div align=\"center\">";
									echo "<button bg-teal ripple-color=\"tealA400\" onclick=\"location.href='ViewCPE03teacher.php?id=".$dataCo_Advisors[0]."&state=Committee'\">Read more</button>";
									echo "</div></td>";
								}
								else if($dataAdvisors[6]==999)
								{
									echo "ไม่ได้รับการยืนยัน ";
								}
								else
								{
										echo "ไม่มีสถานะการแจ้งเตือน";
								}
							?>
					</tr>
					<?php
					}
					?>
	
    </tbody>
    <tfoot>
        
        
    </tfoot>
</table>


<br>
			<h4>โครงงานที่เป็นกรรมการ</h4>
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
			สถานะการแจ้งเตือน
			</div></td>
			<td><div align="center">
			อ่านเพิ่มเติม
			</div></td>
			
			
        </tr>
    </thead>
    <tbody>
			<?php
					$data = 0;
					while($dataCommittee = mysql_fetch_array($query_Committee))
					{$data++;
					?>
					<tr>
						<td style="width: 50px"><div align="center" >
						<?php echo $data;?>
						</div></td>
						<td><div align="center">
						<?php echo $dataCommittee[1];?>
						</div></td>
						<td><div align="center">
							<?php 
								if($dataAdvisors[6]==1)
								{
									echo "รอการยืนยัน  CPE01 ";
									echo "</div></td>";
									echo "<td><div align=\"center\">";
									echo "<button bg-teal ripple-color=\"tealA400\" onclick=\"location.href='ViewCPE01teacher.php?id=".$dataCommittee[0]."&state=Committee'\">Read more</button>";
									echo "</div></td>";
								}
								else if($dataAdvisors[6]==2)
								{
									echo "ไม่มีสถานะการแจ้งเตือน";
								}
								else if($dataAdvisors[6]==3)
								{
									echo "รอยืนยัน  CPE02 ";
									echo "</div></td>";
									echo "<td><div align=\"center\">";
									echo "<button bg-teal ripple-color=\"tealA400\" onclick=\"location.href='ViewCPE02teacher.php?id=".$dataCommittee[0]."&state=Committee'\">Read more</button>";
									echo "</div></td>";
								}
								else if($dataAdvisors[6] >=3 && $statuspj[5] == 1)
								{
									echo "รอยืนยัน  CPE02 ";
									echo "</div></td>";
									echo "<td><div align=\"center\">";
									echo "<button bg-teal ripple-color=\"tealA400\" onclick=\"location.href='ViewCPE02teacher.php?id=".$dataCommittee[0]."&state=Committee'\">Read more</button>";
									echo "</div></td>";
								}
								else if($dataAdvisors[6]==5)
								{
									echo "รอยืนยัน  CPE03 ";
									echo "</div></td>";
									echo "<td><div align=\"center\">";
									echo "<button bg-teal ripple-color=\"tealA400\" onclick=\"location.href='ViewCPE03teacher.php?id=".$dataCommittee[0]."&state=Committee'\">Read more</button>";
									echo "</div></td>";
								}
								else if($dataAdvisors[6]==999)
								{
									echo "ไม่ได้รับการยืนยัน ";
								}
								else
								{
										echo "ไม่มีสถานะการแจ้งเตือน";
								}
							?>
						</div></td>
					</tr>
					<?php
					}
					?>
				<?php
					$data = 0;
					while($dataSpecial_Committee = mysql_fetch_array($query_Special_Committee))
					{$data++;
					?>
					<tr>
						<td style="width: 50px"><div align="center" >
						<?php echo $data;?>
						</div></td>
						<td><div align="center">
						<?php echo $dataSpecial_Committee[1];?>
						</div></td>
						<td><div align="center">
							สถานะการแจ้งเตือน
						</div></td>
						<td><div align="center">
						<button bg-teal ripple-color="tealA400" onclick="location.href='ViewCPE01teacher.php?id=<?php echo $dataSpecial_Committee[0]."&state=Special_Committee";?>'">Read more</button>
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

		
		<br>
		<font color="white">
		<center><a1>copyright © SuperStar Group | 305351 Computer System Engineering ภาคการศึกษาที่ 2  ปีการศึกษา 2557</a1></center>
			<br>
		<center><a1>copyright © 2015 Maximum Group | 305471 Software Engineering ภาคการศึกษาที่ 1  ปีการศึกษา  2558</a1></center>
        </font>
		
		<div align=right>
		<font color="white"> Page ID : 7 </font>
		</div>
	
        
	</div>

	
</div>


	
	
	
	<!-- load scripts at the end -->

  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>
</html>