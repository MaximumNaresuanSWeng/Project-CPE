<?php
	session_start();
	
		if (isset($_SESSION["login_state"]))
		{
			 include_once dirname(__FILE__) . '/Config.php';
			mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
			mysql_select_db(DB_NAME);
			mysql_query("SET NAMES UTF8");
		
		$ID = $_REQUEST['id'];
		
			$query_project = mysql_query ("SELECT * FROM `Project` WHERE id = '".$ID."'");
			$project = mysql_fetch_array($query_project);
		
	
	
		$query_Student_USER1 = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[3]."'");
		$Student_USER1 = mysql_fetch_array($query_Student_USER1);
		
		$query_Student_USER2 = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[4]."'");
		$Student_USER2 = mysql_fetch_array($query_Student_USER2);
		
		$query_Student_USER3 = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[5]."'");
		$Student_USER3 = mysql_fetch_array($query_Student_USER3);
		
		$Advisors = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[7]."'");
		$dataAdvisors = mysql_fetch_array($Advisors);
		
		$Co_Advisors = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[8]."'");
		$dataCo_Advisors = mysql_fetch_array($Co_Advisors);
		
		$Committee = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[9]."'");
		$dataCommittee = mysql_fetch_array($Committee);
		
		$Special_Committee = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[10]."'");
		$dataSpecial_Committee = mysql_fetch_array($Special_Committee);
		
		$query_CPE02 = mysql_query ("SELECT * FROM `CPE02` WHERE ID_project = '".$ID."' ");
		
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
		}
	?>
		</div>
		
		</center>
	
        
		
    </div>
      <div fluid card bg-Orange500="" align-center>
	  
	  
		<div card="" z-0="" align-center>
		
	
	     <div bg-grey100="" padded="">
		 
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='ViewCPE01teacher.php?id=<?php echo $ID;?>'">VIEW CPE01</button>
				
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='ViewCPE02teacher.php?id=<?php echo $ID;?>'">VIEW CPE02</button>
				
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='ViewCPE03teacher.php?id=<?php echo $ID;?>'">VIEW CPE03</button>
				
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='ViewCPE04teacher.php?id=<?php echo $ID;?>'">VIEW CPE04</button>
		
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='ViewCPE05teacher.php?id=<?php echo $ID;?>'">VIEW CPE05</button>
				
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='ViewCPE06teacher.php?id=<?php echo $ID;?>'">VIEW CPE06</button>
				
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='ViewCPE07teacher.php?id=<?php echo $ID;?>'">VIEW CPE07</button>
				
				
		</div>

	
        </div>
		
		<br>
		
		<div card="" z-0="" align-left>
		
	
	     
		 
			<h4>ชื่อโครงงาน</h4>
			
				ภาษาไทย&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php echo $project[1];?>
			<br>
				ภาษาอังกฤษ&nbsp;&nbsp;
				<?php echo $project[2];?>
			<hr>
			<h4>รายชื่อนิสิตผู้ทำโครงงาน</h4>
			
			
			<table id="myTable1" class="order-list" style="width: 1000px">
    <thead>
        <tr>
           <td style="width: 50px"><div align="center" >
			ที่
			</div></td>
			<td><div align="center">
			ชื่อ-นามสกุล
			</div></td>
			<td><div align="center">
			รหัสนิสิต
			</div></td>
			<td><div align="center">
			เบอร์โทร
			</div></td>
			<td><div align="center">
			E-mail
			</div></td>
			
			
        </tr>
    </thead>
    <tbody>
	
	
		<tr>
           <td style="width: 50px"><div align="center" >
			1
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER1[4]." ".$Student_USER1[5];?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER1[8];?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER1[9];?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER1[2];?>
			</div></td>
        </tr>
		<tr>
           <td style="width: 50px"><div align="center" >
			2
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER2[4]." ".$Student_USER2[5];?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER2[8];?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER2[9];?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER2[2];?>
			</div></td>
        </tr>
		<tr>
           <td style="width: 50px"><div align="center" >
			3
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER3[4]." ".$Student_USER3[5];?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER3[8];?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER3[9];?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER3[2];?>
			</div></td>
        </tr>
		
		
    </tbody>
    <tfoot>
        
        
    </tfoot>
</table>

			<hr>
			<h4>การดำเนินงานโครงงานวิศวกรรมคอมพิวเตอร์</h4>
			<table id="myTable2" class="order-list" style="width: 1000px">
    <thead>
        <tr>
           <td style="width: 50px"><div align="center" >
			ที่
			</div></td>
			<td><div align="center">
			วันที่
			</div></td>
			<td><div align="center">
			ประเด็น/หัวข้อ/งานที่มอบหมาย
			</div></td>
			<td><div align="center">
			ข้อสรุป/ความคืบหน้าของงาน
			</div></td>
			<td style="width: 200px"><div align="center" >
			หมายเหตุ
			</div></td>
			<td style="width: 200px"><div align="center" >
			สถานะ
			</div></td>
			
			
        </tr>
    </thead>
    <tbody>
	
		<?php
		$number = 0 ;
		while($CPE02 = mysql_fetch_array($query_CPE02))
		{$number++;
		?>
			<tr>
				<td style="width: 50px"><div align="center" >
				<?php echo $number;?>
				</div></td>
				<td><div align="center">
				<?php echo $CPE02[1];?>
				</div></td>
				<td><div align="center">
				<?php echo $CPE02[2];?>
				</div></td>
				<td><div align="center">
				<?php echo $CPE02[3];?>
				</div></td>
				<td style="width: 200px"><div align="center">
				<?php echo $CPE02[4];?>
				</div></td>
				<td style="width: 200px"><div align="center">
				<?php 
					if($CPE02[5] == 1)
					{
						echo "<button bg-Red500 ripple-color='tealA400' onclick=\"confirm2(".$CPE02[0].",".$ID.")\">ยืนยัน</button>";
					}
					else
					{
						echo "ยืนยันแล้ว";
					}
				?>
				</div></td>
				
			</tr>
		<?php
		}
		?>
	
		
		
		
    </tbody>
    <tfoot>
     <script type="text/javascript"> 

 var click2 = false;
 var click3 = false;
 
 function   confirm2(id,id2)
 {
	 
			$.getJSON('UpdateCPE02.php?id='+id, function(jd) {
				
					
                   //swal("สำเร็จ", "ยืนยันแล้ว", "success");
				    window.location.replace("ViewCPE02teacher.php?id="+id2);
				  
               });
 }
 
</script>
      
      
        
    </tfoot>
</table>
<hr>

			<h4>อาจารย์ที่ปรึกษาและกรรมการ</h4>
			<table id="myTable2" class="order-list" style="width: 700px">
    <thead>
        <tr>
           <td style="width: 50px"><div align="center" >
			อาจารย์ที่ปรึกษา
			</div></td>
			<td><div align="center">
			อาจารย์ที่ปรึกษาร่วม    
			</div></td>
			<td><div align="center">
			กรรมการ
			</div></td>
			<td><div align="center">
			กรรมการ
			</div></td>
			
			
        </tr>
    </thead>
    <tbody>
	
		<tr>
			<td>
			<div align="center">
			 <?php echo $dataAdvisors[4]." ".$dataAdvisors[5];?>
			 </div>
			</td>
			
			<td>
			<div align="center">
			<?php echo $dataCo_Advisors[4]." ".$dataCo_Advisors[5];?>
			</div>
			</td>
			
			<td>
			<div align="center">
			<?php echo $dataCommittee[4]." ".$dataCommittee[5];?>
			</div>
		
			</td>
		
			<td>
			<div align="center">
			<?php echo $dataSpecial_Committee[4]." ".$dataSpecial_Committee[5];?>
			</div>
		
			</td>
			
		</tr>
		
    
    </tbody>
    <tfoot>
      
    </tfoot>
</table>

		
		
	
		
	
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