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
	<button bg-teal ripple-color="tealA400" onclick="location.href='index.php'">Detail</button>
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
				if($project[6] >= 4)
				{
					echo "<button bg-Red500 ripple-color='tealA400' onclick=\"location.href='CPE03.php'\">CPE03</button>";
				}
				}
				
			?>
				
				
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
	
		<tr ><td> 1. ผลการดำเนินงาน</td>
		<td>
			<input type="radio" name="Number_of_students" id="Number_of_students1" value="0">
			<label for="Number_of_students1"></label>
			
		</td>
		<td>
			<input type="radio" name="Number_of_students" id="Number_of_students2" value="1">
			<label for="Number_of_students2"></label>
			
		</td>
		</tr>
		<tr ><td>2. ความสมบูรณ์ของรายงานโครงงาน</td>
		<td>
			<input type="radio" name="importance" id="importance1" value="0">
			<label for="importance1"></label>
			
		</td>
		<td>
			<input type="radio" name="importance" id="importance2" value="1">
			<label for="importance2"></label>
			
		</td>
		</tr>
		<tr ><td>3. ความรู้ความเข้าใจของนิสิตเกี่ยวกับโครงงาน</td>
		<td>
			<input type="radio" name="purpose" id="purpose1" value="0">
			<label for="purpose1"></label>
			
		</td>
		<td>
			<input type="radio" name="purpose" id="purpose2" value="1">
			<label for="purpose2"></label>
			
		</td>
		</tr>
		<tr ><td>4. การศึกษาเกี่ยวกับหลักการและทฤษฎีที่เกี่ยวข้อง</td>
		<td>
			<input type="radio" name="theories" id="theories1" value="0">
			<label for="theories1"></label>
			
		</td>
		<td>
			<input type="radio" name="theories" id="theories2" value="1">
			<label for="theories2"></label>
			
		</td>
		</tr>
		<tr ><td>5. ความเหมาะสมของวิธีการดำเนินงานที่นำเสนอ</td>
		<td>
			<input type="radio" name="Presentation" id="Presentation1" value="0">
			<label for="Presentation1"></label>
			
		</td>
		<td>
			<input type="radio" name="Presentation" id="Presentation2" value="1">
			<label for="Presentation2"></label>
			
		</td>
		</tr>
		<tr ><td>6. ขอบเขตของโครงงาน</td>
		<td>
			<input type="radio" name="scope" id="scope1" value="0">
			<label for="scope1"></label>
			
		</td>
		<td>
			<input type="radio" name="scope" id="scope2" value="1">
			<label for="scope2"></label>
			
		</td>
		</tr>
		
		
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
        <th><center>หัวข้อ</center></th>
        <th><center>ผ่าน</center></th>
		<th><center>สมควรแก้ไข</center></th>
		<th><center>ไม่ผ่าน</center></th>
		<th><center> </center></th>
		
      </tr>
    </thead>
	<tbody>
	<!--ส่วนสรุป-->
	<tr><td>ความเห็นของอาจารย์ผู้ประเมิน</td>
	<td align="center">
		<input type="radio" name="opinion_teacher" id="opinion_past1" value="11" >
		<label for="opinion_past1"></label></td>
	<td>
		<input type="radio" name="opinion_teacher" id="opinion_re-examine1" value="12" >
		<label for="opinion_re-examine1"></label>
		<br>
		<input type="radio" name="opinion_teacher"  id="opinion_non-exams1" value="13" >
		<label for="opinion_non-exams1"></label></td>
	<td>
		<input type="radio" name="opinion_teacher" id="opinion_fail1" value="10" >
		<label for="opinion_fail1"></label></td>
	</tr>
	
	<tr><td>มติกรรมการ</td>
	<td align="center">
		<input type="radio" name="board_resolution" id="board_past2" value="21" >
		<label for="board_past2"></label></td>
	<td>
		<input type="radio" name="board_resolution" id="board_re-examine2" value="22" >
		<label for="board_re-examine2"></label>
		<br>
		<input type="radio" name="board_resolution"  id="board_non-exams2" value="23" >
		<label for="board_non-exams2"></label></td>
	<td>
		<input type="radio" name="board_resolution" id="board_fail2" value="20" >
		<label for="board_fail2"></label></td>
	</tr>
	
	
	<!--	<tr ><td>ความเห็นของอาจารย์ผู้ประเมิน</td><td>
		<input type="radio" name="opinion_teacher" id="opinion_teacher1" value="0" onclick="CHECK()">
			<label for="opinion_teacher1"></label>
		</td><td>
		<input type="radio" name="opinion_teacherNEW" id="opinion_teacherNEW2" value="21" onclick="sub_CHECK()">
		<label for="opinion_teacherNEW2">สอบใหม่</label><br>
		<input type="radio" name="opinion_teacherNEW" id="opinion_teacherNEW3" value="22" onclick="sub_CHECK()">
		<label for="opinion_teacherNEW3">ไม่ต้องสอบใหม่</label>
		</td><td>
		<input type="radio" name="opinion_teacher" id="opinion_teacher2" value="1" onclick="CHECK()">
			<label for="opinion_teacher2"></label>
		</td></tr>
		
		<tr ><td>มติกรรมการ</td><td>
		<input type="radio" name="board_resolution" id="board_resolution1" value="0" onclick="CHECK2()">
			<label for="board_resolution1"></label>
		</td><td>
		<input type="radio" name="board_resolutionNEW" id="board_resolutionNEW2" value="21" onclick="sub_CHECK2()">
		<label for="board_resolutionNEW2">สอบใหม่</label><br>
		<input type="radio" name="board_resolutionNEW" id="board_resolutionNEW3" value="22" onclick="sub_CHECK2()">
		<label for="board_resolutionNEW3">ไม่ต้องสอบใหม่</label>
		</td><td>
		<input type="radio" name="board_resolution" id="board_resolution2" value="1" onclick="CHECK2()">
			<label for="board_resolution2"></label>
		</td></tr>   
		
		-->
		
	 </tbody>
	 </table >
			<br>
			
			<form name="formdata" id="formdata" onsubmit="return required()" method="post" action="saveCPE04.php" >
			
			<button bg-Red500 ripple-color="tealA400" type="submit"> SAVE DATA</button>
			
			</form>
			
			
<script type="text/javascript"> 

/*function CHECK()
{
if(document.getElementById('opinion_teacher1').checked) {
	
	document.getElementById("opinion_teacherNEW2").checked = false;
	document.getElementById("opinion_teacherNEW3").checked = false;
	
	 
}
}
function CHECK2()
{
if(document.getElementById('board_resolution1').checked) {
	
	document.getElementById("board_resolutionNEW2").checked = false;
	document.getElementById("board_resolutionNEW3").checked = false;
	
	 
}
}

function sub_CHECK()
{
	document.getElementById("opinion_teacher1").checked = false;
	document.getElementById("opinion_teacher2").checked = true;
}
function sub_CHECK2()
{
	document.getElementById("board_resolution1").checked = false;
	document.getElementById("board_resolution2").checked = true;
}*/

 function required()
{

	
	var Number_of_students = document.forms["formdata"]["Number_of_students"].value;
	var importance = document.forms["formdata"]["importance"].value;
	var purpose = document.forms["formdata"]["purpose"].value;
	var theories = document.forms["formdata"]["theories"].value;
	var Presentation = document.forms["formdata"]["Presentation"].value;
	var scope = document.forms["formdata"]["scope"].value;
	
	var suggestion = document.forms["formdata"]["suggestion"].value;
	var opinion_teacher = document.forms["formdata"]["opinion_teacher"].value;
	var board_resolution = document.forms["formdata"]["board_resolution"].value;
	
	
	if (Number_of_students == "" ||importance == "" ||purpose == "" ||theories == "" ||Presentation == "" ||scope == "" ||suggestion == "" || opinion_teacher == "" || board_resolution == "")
	{
		//alert("กรุณาป้อนข้อมูลช่องที่มี * ");
		swal({title: "กรุณาป้อนข้อมูลช่องที่มี * ",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		
		return false;
	}
	else 
	{
		if(document.getElementById('opinion_teacher2').checked) 
		{
			var opinion_teacherNEW = document.forms["formdata"]["opinion_teacherNEW"].value;
			if (opinion_teacherNEW == "")
			{
				//alert("กรุณาป้อน ความเห็นของอาจารย์ผู้ประเมิน");
				swal({title: "กรุณาป้อน ความเห็นของอาจารย์ผู้ประเมิน",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		
				return false;
			}
			else 
			{	if(document.getElementById('board_resolution2').checked) 
				{
					var board_resolutionNEW = document.forms["formdata"]["board_resolutionNEW"].value;
					if (board_resolutionNEW == "")
					{
						//alert("กรุณาป้อน ความเห็นของมติกรรมการ");
						swal({title: "กรุณาป้อน ความเห็นของมติกรรมการ",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		
						return false;
					}
					else
					{
						return true;
					}
				}
				else
				{
					return true;
				}
				
			}
		
		}
		else
		{
			if(document.getElementById('board_resolution2').checked) 
			{
				var board_resolutionNEW = document.forms["formdata"]["board_resolutionNEW"].value;
				if (board_resolutionNEW == "")
				{
					//alert("กรุณาป้อน ความเห็นของมติกรรมการ");
					swal({title: "กรุณาป้อน ความเห็นของมติกรรมการ",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		
					return false;
				}
				else
				{
					return true;
				}
		
			}
			else
			{
				return true;
			}
		}
		
		 
	}

}
 </script>
			
	
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
		<font color="white"> Page ID : 6 CPE 04 </font>
		</div>
	
        
	</div>

	
</div>


	
	
	
	<!-- load scripts at the end -->

  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>
</html>