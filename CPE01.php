<?php
	session_start();
	
	if (isset($_SESSION["login_state"]))
		{
			include_once dirname(__FILE__) . '/Config.php';
			mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
			mysql_select_db(DB_NAME);
			mysql_query("SET NAMES UTF8");
	
	
		$Advisors = mysql_query ("SELECT * FROM `USER` WHERE status = 'teacher'");
		$Co_Advisors = mysql_query ("SELECT * FROM `USER` WHERE status = 'teacher'");
		$Committee = mysql_query ("SELECT * FROM `USER` WHERE status = 'teacher'");
		
		$query_project = mysql_query ("SELECT * FROM `Project` WHERE id = '".$_SESSION["ID_project"]."'");
		$project = mysql_fetch_array($query_project);
		
		
		
		$Student1 = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[3]."'");
		$Student2 = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[4]."'");
		$Student3 = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[5]."'");
		
		$Student1_data = mysql_fetch_array($Student1);
		$Student2_data = mysql_fetch_array($Student2);
		$Student3_data = mysql_fetch_array($Student3);
			
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
				if($project[6] >= 2 && $project[6] < 4 && $project[10] !="")
				{
					echo "<button bg-Red500 ripple-color='tealA400' onclick=\"location.href='CPE03.php'\">CPE03</button>";
				}
				
				}
				
			?>
				
				
		</div>

	
        </div>
		
		<br>
		
		<div card="" z-0="" align-left>
		
	
	     
		 
			<h4>ชื่อโครงงาน </h4>
			<form name="formdata" id="formdata" onsubmit="return required()" method="post" action="saveCPE01.php" >
		
			
				ภาษาไทย<font color="red"> *</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input value="<?php echo $project[1];?>" type="text" placeholder="ภาษาไทย" name="name_projectTH" id="name_projectTH" maxlength="300" size="300" onkeyup="isThaichar(this.value,this)" style="width: 500px">
			<br>
				ภาษาอังกฤษ<font color="red"> *</font>&nbsp;&nbsp;
				<input value="<?php echo $project[2];?>" type="text" placeholder="ภาษาอังกฤษ" name="name_projectEN" id="name_projectEN" maxlength="300" size="300" onkeyup="isENchar(this.value,this)" style="width: 500px">
			<br>
			
<script type="text/javascript">
function isThaichar(str,obj){
	var orgi_text="ๅภถุึคตจขชๆไำพะัีรนยบลฃฟหกดเ้่าสวงผปแอิืทมใฝ๑๒๓๔ู฿๕๖๗๘๙๐ฎฑธํ๊ณฯญฐฅฤฆฏโฌ็๋ษศซฉฮฺ์ฒฬฦ ().?";
	var str_length=str.length;
	var str_length_end=str_length-1;
	var isThai=true;
	var Char_At="";
	for(i=0;i<str_length;i++){
		Char_At=str.charAt(i);
		if(orgi_text.indexOf(Char_At)==-1){
			isThai=false;
		}   
	}
	if(str_length>=1){
		if(isThai==false){
			obj.value=str.substr(0,str_length_end);
		}
	}
	return isThai; // ถ้าเป็น true แสดงว่าเป็นภาษาไทยทั้งหมด
}
function isENchar(str,obj){
	var orgi_text="1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM?_ ().";
	//var orgi_text="ๅภถุึคตจขชๆไำพะัีรนยบลฃฟหกดเ้่าสวงผปแอิืทมใฝ๑๒๓๔ู฿๕๖๗๘๙๐ฎฑธํ๊ณฯญฐฅฤฆฏโฌ็๋ษศซฉฮฺ์ฒฬฦ ().";
	var str_length=str.length;
	var str_length_end=str_length-1;
	var isThai=true;
	var Char_At="";
	for(i=0;i<str_length;i++){
		Char_At=str.charAt(i);
		if(orgi_text.indexOf(Char_At)==-1){
			isThai=false;
		}   
	}
	if(str_length>=1){
		if(isThai==false){
			obj.value=str.substr(0,str_length_end);
		}
	}
	return isThai; // ถ้าเป็น true แสดงว่าเป็นภาษาไทยทั้งหมด
}

</script>
			<h4>รายชื่อนิสิตผู้ทำโครงงาน</h4>
			
			<table id="myTable1" class="order-list" style="width: 700px">
    <thead>
        <tr>
           <td style="width: 50px"><div align="center" >
			ที่
			</div></td>
			<td><div align="center">
			ชื่อ-นามสกุล
			</div></td>
			<td><div align="center">
			รหัสนิสิต<font color="red"> *</font>
			</div></td>
			<td><div align="center">
			เบอร์โทร
			</div></td>
			<td><div align="center">
			E-mail
			</div></td>
			<td><div align="center">
			ตรวจสอบ
			</div></td>
			
        </tr>
    </thead>
    <tbody>
	
	
		<tr>
			<td style="width: 50px"><div align="center" >
			1
			</div></td>
			<td><div align="center">
			
			<input   value="<?php echo $Student1_data[4]." ".$Student1_data[5];?>"  type="text" id="name_student1" name="name_student1"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input   value="<?php echo $Student1_data[8];?>"  type="text" id="ID_USER1" name="ID_USER1"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input   value="<?php echo $Student1_data[9];?>"  type="text" id="phone_number1" name="phone_number1"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input   value="<?php echo $Student1_data[2];?>"  type="text" id="email1" name="email1"   bg-White />
			
			</div></td>
			<td>
			<?php 
			if($project[3] != NULL)
			{
				echo "<button bg-Red500 ripple-color=\"tealA400\" onclick=\"return delete1()\">DELETE</button>";
			}
			else
			{
				echo "<button bg-Red500 ripple-color=\"tealA400\" onclick=\"return checkdata1()\">CHECK</button>";
			}
			?>
			
			</td>
			
			
		</tr>
		<tr>
			<td style="width: 50px"><div align="center" >
			2
			</div></td>
			<td><div align="center">
			
			<input  value="<?php echo $Student2_data[4]." ".$Student2_data[5];?>"  type="text" id="name_student2" name="name_student2"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input  value="<?php echo $Student2_data[8];?>"  type="text" id="ID_USER2" name="ID_USER2"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input  value="<?php echo $Student2_data[9];?>"  type="text" id="phone_number2" name="phone_number2"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input  value="<?php echo $Student2_data[2];?>"  type="text" id="email2" name="email2"   bg-White />
			
			</div></td>
			<td><div align="center">
			<?php 
			if($project[4] != NULL)
			{
				echo "<button bg-Red500 ripple-color=\"tealA400\" onclick=\"return delete2()\">DELETE</button>";
			}
			else
			{
				echo "<button bg-Red500 ripple-color=\"tealA400\" onclick=\"return checkdata2()\">CHECK</button>";
			}
			?>
			
			
			</div></td>
			
			
		</tr>
		<tr>
			<td style="width: 50px"><div align="center" >
			3
			</div></td>
			<td><div align="center">
			
			<input  value="<?php echo $Student3_data[4]." ".$Student3_data[5];?>"  type="text" id="name_student3" name="name_student3"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input  value="<?php echo $Student3_data[8];?>"  type="text" id="ID_USER3" name="ID_USER3"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input  value="<?php echo $Student3_data[9];?>"  type="text" id="phone_number3" name="phone_number3"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input  value="<?php echo $Student3_data[2];?>"  type="text" id="email3" name="email3"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<?php 
			if($project[5] != NULL)
			{
				echo "<button bg-Red500 ripple-color=\"tealA400\" onclick=\"return delete3()\">DELETE</button>";
			}
			else
			{
				echo "<button bg-Red500 ripple-color=\"tealA400\" onclick=\"return checkdata3()\">CHECK</button>";
			}
			?>
			
			</div></td>
			
			
		</tr>


      
    </tbody>
    <tfoot>
        
        
    </tfoot>
</table>


			<h4>อาจารย์ที่ปรึกษาและกรรมการ</h4>
			
			<table id="myTable2" class="order-list" style="width: 700px">
    <thead>
        <tr>
           <td style="width: 50px"><div align="center" >
			อาจารย์ที่ปรึกษา<font color="red"> *</font>
			</div></td>
			<td><div align="center">
			อาจารย์ที่ปรึกษาร่วม (    ถ้ามี  )  
			</div></td>
			<td><div align="center">
			เสนอรายชื่อกรรมการ 1 ท่าน<font color="red"> *</font>
			</div></td>
			
			
        </tr>
    </thead>
    <tbody>
	
		<tr>
			<td>
			<div align="center">
			<section >
				<div class="dropdown">
				<select class="dropdown-select" name="Advisors" id="Advisors">
					<option value="">ไม่เลือก</option>
					<?php
					while($dataAdvisors = mysql_fetch_array($Advisors))
					{
					?>
					<option value="<?php echo $dataAdvisors[8];?>"><?php echo $dataAdvisors[4]." ".$dataAdvisors[5];?></option>
					<?php
					}
					?>
					
				</select>
				
				</div>
			</section>
			</div>
			</td>
			
			<td>
			<div align="center">
			<section >
				<div class="dropdown">
				<select class="dropdown-select" name="Co_Advisors" id="Co_Advisors">
					<option value="">ไม่เลือก</option>
					<?php
					while($dataCo_Advisors = mysql_fetch_array($Co_Advisors))
					{
					?>
					<option value="<?php echo $dataCo_Advisors[8];?>"><?php echo $dataCo_Advisors[4]." ".$dataCo_Advisors[5];?></option>
					<?php
					}
					?>
					
				</select>
				</div>
			</section>
			
			</div>
			</td>
			
			<td>
			<div align="center">
			<section >
				<div class="dropdown">
				<select class="dropdown-select" name="Committee" id="Committee">
					<option value="">ไม่เลือก</option>
					<?php
					while($dataCommittee = mysql_fetch_array($Committee))
					{
					?>
					<option value="<?php echo $dataCommittee[8];?>"><?php echo $dataCommittee[4]." ".$dataCommittee[5];?></option>
					<?php
					}
					?>
					
				</select>
				</div>
			</section>
			
			</div>
		
			</td>
		
		</tr>
		
 <script type="text/javascript"> 

 var click1 = <?php if($Student1_data[8] != NULL) {echo "true";} else{echo "false";}?>;
 var click2 = <?php if($Student1_data[8] != NULL) {echo "true";} else{echo "false";}?>;
 var click3 = <?php if($Student1_data[8] != NULL) {echo "true";} else{echo "false";}?>;
  function   UPDATE_PROJECT()
{
var name_projectTH = document.forms["formdata"]["name_projectTH"].value;
var name_projectEN = document.forms["formdata"]["name_projectEN"].value;
var ID_USER1 = document.forms["formdata"]["ID_USER1"].value;
var ID_USER2 = document.forms["formdata"]["ID_USER2"].value;
var ID_USER3 = document.forms["formdata"]["ID_USER3"].value;

	
	$.getJSON('UPDATE_PROJECT.php?name_projectTH='+name_projectTH+"&name_projectEN="+name_projectEN+"&ID_USER1="+ID_USER1+"&ID_USER2="+ID_USER2+"&ID_USER3="+ID_USER3, function(jd1) {
				
				  
               });
				
	window.location.replace("CPE01.php?ijoijo=jhbjo");			  
     
	return false;
}

 function   delete1()
{
		
	$.getJSON('DeleteMember.php?idMember='+<?php if($Student1_data[0] != NULL){echo $Student1_data[0];}else {echo "000";}?>+"&number=1", function(jd1) {
				
				  
               });
				
	window.location.replace("CPE01.php");			  
     
	return false;
}
 function   delete2()
{
		
		$.getJSON('DeleteMember.php?idMember='+<?php if($Student2_data[0] != NULL){echo $Student2_data[0];}else {echo "000";}?>+"&number=2", function(jd1) {
				
				  
               });
	window.location.replace("CPE01.php");		
	return false;
}
 function   delete3()
{
		
		$.getJSON('DeleteMember.php?idMember='+<?php if($Student3_data[0] != NULL){echo $Student3_data[0];}else {echo "000";}?>+"&number=3", function(jd1) {
				
				  
               });
	window.location.replace("CPE01.php");		
	return false;
}

function   checkdata1()
{
	var ID_USER1 = document.forms["formdata"]["ID_USER1"].value;
	var ID_USER2 = document.forms["formdata"]["ID_USER2"].value;
	var ID_USER3 = document.forms["formdata"]["ID_USER3"].value;
	
	if(ID_USER1 == "")
	{
		swal({title: "กรุณาป้อนรหัสนิสิต",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		//alert("กรุณาป้อนรหัสนิสิต ");
	}
	else
	{
		//
		if(ID_USER1 == ID_USER2 || ID_USER1 == ID_USER3 )
		{
			swal({title: "รหัสนิสิตซ้ำซ้อน",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		}
		else
		{
			$.getJSON('GetUser.php?id='+ID_USER1, function(jd) {
				
				if( jd.firstnameTH == null)
				{
				  document.forms["formdata"]["name_student1"].value = "";
				  document.forms["formdata"]["ID_USER1"].value = "";
				  document.forms["formdata"]["phone_number1"].value = "";
				  document.forms["formdata"]["email1"].value = "";
				  click1 = false;
				  swal({title: "ไม่พบข้อมูล",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
				  //alert("ไม่พบข้อมูล ");
				}
				else
				{
				  swal("สำเร็จ", "เพิ่มเติมข้อมูลเรียบร้อย", "success");
				  document.forms["formdata"]["name_student1"].value = jd.firstnameTH+" "+jd.lastnameTH;
				  document.forms["formdata"]["ID_USER1"].value = jd.ID_USER;
				  document.forms["formdata"]["phone_number1"].value = jd.phone_number;
				  document.forms["formdata"]["email1"].value = jd.email;
				  click1 = true;
				}
                  
				  
               });
	
		}
			
	
	}
	return false;
}
function   checkdata2()
{
	var ID_USER1 = document.forms["formdata"]["ID_USER1"].value;
	var ID_USER2 = document.forms["formdata"]["ID_USER2"].value;
	var ID_USER3 = document.forms["formdata"]["ID_USER3"].value;
	
	if(ID_USER2 == "")
	{
		swal({title: "กรุณาป้อนรหัสนิสิต",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		//alert("กรุณาป้อนรหัสนิสิต ");
	}
	else
	{
		//
		if(ID_USER2 == ID_USER1 || ID_USER2 == ID_USER3 )
		{
			swal({title: "รหัสนิสิตซ้ำซ้อน",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		}
		else
		{
			$.getJSON('GetUser.php?id='+ID_USER2, function(jd) {
				
				if( jd.firstnameTH == null)
				{
				  document.forms["formdata"]["name_student2"].value = "";
				  document.forms["formdata"]["ID_USER2"].value = "";
				  document.forms["formdata"]["phone_number2"].value = "";
				  document.forms["formdata"]["email2"].value = "";
				  click2 = false;
				  swal({title: "ไม่พบข้อมูล",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
				  //alert("ไม่พบข้อมูล ");
				}
				else
				{
				  swal("สำเร็จ", "เพิ่มเติมข้อมูลเรียบร้อย", "success");
				  document.forms["formdata"]["name_student2"].value = jd.firstnameTH+" "+jd.lastnameTH;
				  document.forms["formdata"]["ID_USER2"].value = jd.ID_USER;
				  document.forms["formdata"]["phone_number2"].value = jd.phone_number;
				  document.forms["formdata"]["email2"].value = jd.email;
				  click2 = true;
				}
                  
				  
               });
	
		}
			
	
	}
	return false;
}
function   checkdata3()
{
	var ID_USER1 = document.forms["formdata"]["ID_USER1"].value;
	var ID_USER2 = document.forms["formdata"]["ID_USER2"].value;
	var ID_USER3 = document.forms["formdata"]["ID_USER3"].value;
	
	if(ID_USER3 == "")
	{
		swal({title: "ERROR 005 \nกรุณาป้อนรหัสนิสิต",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		//alert("ERROR กรุณาป้อนรหัสนิสิต ");
		
	}
	else
	{
		if(ID_USER3 == ID_USER1 || ID_USER3 == ID_USER2 )
		{
			swal({title: "รหัสนิสิตซ้ำซ้อน",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		}
		else
		{
		$.getJSON('GetUser.php?id='+ID_USER3, function(jd) {
				
				if( jd.firstnameTH == null)
				{
				  document.forms["formdata"]["name_student3"].value = "";
				  document.forms["formdata"]["ID_USER3"].value = "";
				  document.forms["formdata"]["phone_number3"].value = "";
				  document.forms["formdata"]["email3"].value = "";
				  click3 = false;
				  swal({title: "ไม่พบข้อมูล",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
				  //alert("ไม่พบข้อมูล ");
				}
				else
				{
					swal("สำเร็จ", "เพิ่มเติมข้อมูลเรียบร้อย", "success");
				  document.forms["formdata"]["name_student3"].value = jd.firstnameTH+" "+jd.lastnameTH;
				  document.forms["formdata"]["ID_USER3"].value = jd.ID_USER;
				  document.forms["formdata"]["phone_number3"].value = jd.phone_number;
				  document.forms["formdata"]["email3"].value = jd.email;
				  click3 = true;
				}
                  
				  
               });
	
		}
	}
	return false;
}
 
 function required()
{

var name_projectTH = document.forms["formdata"]["name_projectTH"].value;
var name_projectEN = document.forms["formdata"]["name_projectEN"].value;
var ID_USER1 = document.forms["formdata"]["ID_USER1"].value;
var Advisors = document.forms["formdata"]["Advisors"].value;
var Co_Advisors = document.forms["formdata"]["Co_Advisors"].value;
var Committee = document.forms["formdata"]["Committee"].value;


if (name_projectTH == "" || name_projectEN == "" || ID_USER1 == "" || Advisors == "" || Committee == "")
{
	//alert("กรุณาป้อนข้อมูลช่องที่มี * ");
	swal({title: "กรุณาป้อนข้อมูลช่องที่มี * ",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
				  
	return false;
}
else 
{
	if(Advisors == Co_Advisors || Advisors == Committee || Co_Advisors == Committee)
	{
		swal({title: "อาจารย์ที่ปรึกษา , อาจารย์ที่ปรึกษาร่วม , กรรมการ ห้ามเป็นบุคคลเดียวกัน ",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		//alert("อาจารย์ที่ปรึกษา  กับ อาจารย์ที่ปรึกษาร่วม ห้ามเป็นบุคคลเดียวกัน ");
		return false;
	}
	else
	{
		var ID_USER1 = document.forms["formdata"]["ID_USER1"].value;
		var ID_USER2 = document.forms["formdata"]["ID_USER2"].value;
		var ID_USER3 = document.forms["formdata"]["ID_USER3"].value;
		if(ID_USER2 == "")
		{
			if(ID_USER3 == "")
			{
				if(ID_USER1 == "")
				{
					return true;
				}
				else
				{
					if(click1 == true)
					{
					
						return true;
					}
					else
					{
						swal({title: "กรุณากดค้นหานิสิตลำดับที่ 1",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		
						//alert("กรุณากดค้นหานิสิตลำดับที่ 3");
						return false;
					}
				}
			}
			else
			{
				if(click3 == true)
				{
					
					if(ID_USER1 == "")
					{
						return true;
					}
					else
					{
						if(click1 == true)
						{
					
							return true;
						}
						else
						{
							swal({title: "กรุณากดค้นหานิสิตลำดับที่ 1",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		
							//alert("กรุณากดค้นหานิสิตลำดับที่ 3");
							return false;
						}
					}
				}
				else
				{
					swal({title: "กรุณากดค้นหานิสิตลำดับที่ 3",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		
					//alert("กรุณากดค้นหานิสิตลำดับที่ 3");
					return false;
				}
			}
			
		}
		else
		{
			if(click2 == true)
			{
				if(ID_USER3 == "")
				{
					if(ID_USER1 == "")
					{
						return true;
					}
					else
					{
						if(click1 == true)
						{
					
							return true;
						}
						else
						{
							swal({title: "กรุณากดค้นหานิสิตลำดับที่ 1",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		
							//alert("กรุณากดค้นหานิสิตลำดับที่ 3");
							return false;
						}
					}
				}
				else
				{
					if(click3 == true)
					{
					
						if(ID_USER1 == "")
						{
							return true;
						}
						else
						{
							if(click1 == true)
							{
					
								return true;
							}
							else
							{
								swal({title: "กรุณากดค้นหานิสิตลำดับที่ 1",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		
								//alert("กรุณากดค้นหานิสิตลำดับที่ 3");
								return false;
							}
						}
					}
					else
					{
						swal({title: "กรุณากดค้นหานิสิตลำดับที่ 3",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		
						//alert("กรุณากดค้นหานิสิตลำดับที่ 3");
						return false;
					}
				}
			}
			else
			{
				swal({title: "กรุณากดค้นหานิสิตลำดับที่ 2",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		
				//alert("กรุณากดค้นหานิสิตลำดับที่ 2");
				return false;
			}
			
		}
		
	}


}

}
 </script>
      
    </tbody>
    <tfoot>
        
        <tr>
            <td>
			<center>
				<?php 
				if($project[0] != NULL)
				{
					echo "<button bg-Green500 ripple-color=\"tealA400\" onclick=\"return UPDATE_PROJECT()\">UPDATE PROJECT</button>";
				}
				?>
				<button bg-Red500 ripple-color="tealA400" type="submit"> NEW PROJECT</button>
			</center>
            </td>
        </tr>
    </tfoot>
</table>

		</form>
		
	
		
	
        </div>
		
    </div>
	
	<div fluid card bg-Grey500="">

		
		<font color="white">
		<center><a1>copyright © SuperStar Group | 305351 Computer System Engineering ภาคการศึกษาที่ 2  ปีการศึกษา 2557</a1></center>
			<br>
		<center><a1>copyright © 2015 Maximum Group | 305471 Software Engineering ภาคการศึกษาที่ 1  ปีการศึกษา  2558</a1></center>
        </font>
        
		<div align=right>
		<font color="white"> Page ID : 6 CPE 01 </font>
		</div>
	</div>

	
</div>


	
	
	
	<!-- load scripts at the end -->

  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>
</html>