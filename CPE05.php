
<?php
	session_start();
	if (isset($_SESSION["login_state"]))
		{
			if($_SESSION["status"] == "student")
			{
				header("location:load_balance.php");
			}
			else
			{
		include_once dirname(__FILE__) . '/Config.php';
		mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
		mysql_select_db(DB_NAME);
		mysql_query("SET NAMES UTF8");
	
	
		$query_project = mysql_query ("SELECT * FROM `Project` WHERE id = '".$_SESSION["ID_project"]."'");
		$project = mysql_fetch_array($query_project);
		
		$query_Student_USER1 = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[3]."'");
		$Student_USER1 = mysql_fetch_array($query_Student_USER1);
		
		$query_Student_USER2 = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[4]."'");
		$Student_USER2 = mysql_fetch_array($query_Student_USER2);
		
		$query_Student_USER3 = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[5]."'");
		$Student_USER3 = mysql_fetch_array($query_Student_USER3);
			}
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
<title>ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์ คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร</title>


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
		 
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='CPE01.php'">CPE01</button>
				
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='CPE02.php'">CPE02</button>
				
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='CPE03.php'">CPE03</button>
				
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='CPE04.php'">CPE04</button>
				
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='CPE05.php'">CPE05</button>
				
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='CPE06.php'">CPE06</button>
				
				<button bg-Red500 ripple-color="tealA400" onclick="location.href='CPE07.php'">CPE07</button>
				
				
		</div>

	
        </div>
		
		<br>
		
		<div card="" z-0="" align-left>
		
	
	     
		 
			<h4>โครงงาน</h4>
			
			<table id="myTable1" class="order-list" style="width: 700px">
    <thead>
        <tr>
           <td style="width: 150px"><div align="center" >
			รหัสโครงงาน
			</div></td>
			<td><div align="center">
			ชื่อภาษาไทย
			</div></td>
			<td><div align="center">
			ชื่อภาษาอังกฤษ
			</div></td>
			
			
        </tr>
    </thead>
    <tbody>
	<tr>
           <td style="width: 150px"><div align="center" >
			<?php echo " ".$project[0];?>
			</div></td>
			<td><div align="center">
			<?php echo " ".$project[1];?>
			</div></td>
			<td><div align="center">
			<?php echo " ".$project[2];?>
			</div></td>
			
			
        </tr>
		
    </tbody>
    <tfoot>
       
    </tfoot>
</table>
<hr>
<h4>รายชื่อนิสิตผู้ทำโครงงาน</h4>
			
			<table id="myTable2" class="order-list" style="width: 700px">
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
			อีเมล์
			</div></td>
			
			
        </tr>
    </thead>
    <tbody>
		<tr>
           <td style="width: 50px"><div align="center" >
			1
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER1[4]." ".$Student_USER1[5]?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER1[8]?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER1[9]?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER1[2]?>
			</div></td>
        </tr>
		<tr>
           <td style="width: 50px"><div align="center" >
			2
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER2[4]." ".$Student_USER2[5]?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER2[8]?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER2[9]?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER2[2]?>
			</div></td>
        </tr>
		<tr>
           <td style="width: 50px"><div align="center" >
			3
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER3[4]." ".$Student_USER3[5]?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER3[8]?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER3[9]?>
			</div></td>
			<td><div align="center">
			<?php echo $Student_USER3[2]?>
			</div></td>
        </tr>
		
					
		
    </tbody>
    <tfoot>
       
    </tfoot>
</table>

<hr>
			
			<form name="formdata" id="formdata" onsubmit="return required()" method="post" action="saveCPE0388.php" >
			<h4>ผลการประเมิน<font color="red">*</font></h4>
			<table id="myTable3" class="order-list" style="width: 700px">
	<thead>
      <tr >
        <td>หัวข้อการประเมิน</td>
        <td>เหมาะสม</td>
		<td>ไม่เหมาะสม</td>
      </tr>
    </thead>
	<tbody>
	
		<tr ><td> 1. ความก้าวหน้าของการดำเนินงานเทียบกับแผน</td>
		<td>
			<input type="radio" name="Map" id="Map1" value="0">
			<label for="Map1"></label>
			
		</td>
		<td>
			<input type="radio" name="Map" id="Map2" value="1">
			<label for="Map2"></label>
			
		</td>
		</tr>
		<tr ><td>2. ความสมบูรณ์ของรายงานความก้าวหน้า</td>
		<td>
			<input type="radio" name="progress_report" id="progress_report1" value="0">
			<label for="progress_report1"></label>
			
		</td>
		<td>
			<input type="radio" name="progress_report" id="progress_report2" value="1">
			<label for="progress_report2"></label>
			
		</td>
		</tr>
		<tr ><td>3. ความรู้ความเข้าใจของนิสิตเกี่ยวกับโครงงาน</td>
		<td>
			<input type="radio" name="Knowledge" id="Knowledge1" value="0">
			<label for="Knowledge1"></label>
			
		</td>
		<td>
			<input type="radio" name="Knowledge" id="Knowledge2" value="1">
			<label for="Knowledge2"></label>
			
		</td>
		</tr>
		<tr ><td>4. การแบ่งงานและการทำงานเป็นทีม (กรณีมีนิสิตทำงานมากกว่า 1 คน)</td>
		<td>
			<input type="radio" name="team" id="team1" value="0">
			<label for="team1"></label>
			
		</td>
		<td>
			<input type="radio" name="team" id="team2" value="1">
			<label for="team2"></label>
			
		</td></tr>
		
		
	 </tbody>
	 </table >
	 <hr>
			
			<h4>ข้อเสนอแนะ<font color="red">*</font></h4>
			<textarea placeholder="ข้อเสนอแนะ" name="suggestion" id="suggestion"  bg-White style="width: 700px" rows="6"></textarea>
			
			<hr>
			
			<h4>สรุป<font color="red">*</font></h4>
			<table id="myTable4" class="order-list" style="width: 700px">
	<thead>
      <tr >
        <th>ความเห็นของอาจารย์ที่ปรึกษา</th>
        
		
      </tr>
    </thead>
	<tbody>
	
		<tr ><td>
		<input type="radio" name="opinion_teacher" id="opinion_teacher1" value="0" onclick="CHECK()">
			<label for="opinion_teacher1">ผ่าน</label>
		</td><td>
		<input type="radio" name="opinion_teacher" id="opinion_teacher2" value="1" onclick="CHECK()">
			<label for="opinion_teacher2">ไม่ผ่าน</label>
		</td></tr>
		
		
		
	 </tbody>
	 </table >
			<br>
			
			
			<button bg-Red500 ripple-color="tealA400" type="submit"> SAVE DATA</button>
			
			</form>
			
			
<script type="text/javascript"> 


 function required()
{

	
	var Map = document.forms["formdata"]["Map"].value;
	var progress_report = document.forms["formdata"]["progress_report"].value;
	var Knowledge = document.forms["formdata"]["Knowledge"].value;
	var team = document.forms["formdata"]["team"].value;
	
	var suggestion = document.forms["formdata"]["suggestion"].value;
	var opinion_teacher = document.forms["formdata"]["opinion_teacher"].value;
	
	
	
	if (Map == "" ||progress_report == "" ||Knowledge == "" ||team == "" ||suggestion == "" || opinion_teacher == "")
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

		
		<font color="white">
		<center><a1>copyright © SuperStar Group | 305351 Computer System Engineering ภาคการศึกษาที่ 2  ปีการศึกษา 2557</a1></center>
			<br>
		<center><a1>copyright © 2015 Maximum Group | 305471 Software Engineering ภาคการศึกษาที่ 1  ปีการศึกษา  2558</a1></center>
        </font>
        
		<div align=right>
		<font color="white"> Page ID : 6 CPE 05 </font>
		</div>
	</div>

	
</div>


	
	
	
	<!-- load scripts at the end -->

  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>
</html>