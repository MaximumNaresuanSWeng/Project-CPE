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
		
	
	     
		 
			<h4>ชื่อโครงงาน</h4>
			<form name="formdata" id="formdata" onsubmit="return required()" method="post" action="saveCPE01.php" >
		
			
				ภาษาไทย<font color="red"> *</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" placeholder="ภาษาไทย" name="name_projectTH" id="name_projectTH" maxlength="300" size="300" onkeyup="isThaichar(this.value,this)" style="width: 500px">
			<br>
				ภาษาอังกฤษ<font color="red"> *</font>&nbsp;&nbsp;
				<input type="text" placeholder="ภาษาอังกฤษ" name="name_projectEN" id="name_projectEN" maxlength="300" size="300" onkeyup="isENchar(this.value,this)" style="width: 500px">
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
	var orgi_text="1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM? ().";
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
			
			<input   value="<?php echo $_SESSION["firstnameTH"]." ".$_SESSION["lastnameTH"];?>"  type="text" id="name_student1" name="name_student1"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input   value="<?php echo $_SESSION["ID_USER"];?>"  type="text" id="ID_USER1" name="ID_USER1"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input   value="<?php echo $_SESSION["phone_number"];?>"  type="text" id="phone_number1" name="phone_number1"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input   value="<?php echo $_SESSION["email"];?>"  type="text" id="email1" name="email1"   bg-White />
			
			</div></td>
			<td>
			
			</td>
			
			
		</tr>
		<tr>
			<td style="width: 50px"><div align="center" >
			2
			</div></td>
			<td><div align="center">
			
			<input  value=""  type="text" id="name_student2" name="name_student2"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input  value=""  type="text" id="ID_USER2" name="ID_USER2"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input  value=""  type="text" id="phone_number2" name="phone_number2"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input  value=""  type="text" id="email2" name="email2"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<button bg-Red500 ripple-color="tealA400" onclick="return checkdata2()">CHECK</button>
			
			</div></td>
			
			
		</tr>
		<tr>
			<td style="width: 50px"><div align="center" >
			3
			</div></td>
			<td><div align="center">
			
			<input  value=""  type="text" id="name_student3" name="name_student3"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input  value=""  type="text" id="ID_USER3" name="ID_USER3"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input  value=""  type="text" id="phone_number3" name="phone_number3"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<input  value=""  type="text" id="email3" name="email3"   bg-White />
			
			</div></td>
			<td><div align="center">
			
			<button bg-Red500 ripple-color="tealA400" onclick="return checkdata3()">CHECK</button>
			
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

 var click2 = false;
 var click3 = false;
 
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
		if(ID_USER1 == ID_USER2 || ID_USER1 == ID_USER3 || ID_USER2 == ID_USER3)
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
		swal({title: "กรุณาป้อนรหัสนิสิต",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
		//alert("กรุณาป้อนรหัสนิสิต ");
		
	}
	else
	{
		if(ID_USER1 == ID_USER2 || ID_USER1 == ID_USER3 || ID_USER2 == ID_USER3)
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
		var ID_USER2 = document.forms["formdata"]["ID_USER2"].value;
		var ID_USER3 = document.forms["formdata"]["ID_USER3"].value;
		if(ID_USER2 == "")
		{
			if(ID_USER3 == "")
			{
				return true;
			}
			else
			{
				if(click3 == true)
				{
					
					return true;
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
					return true;
				}
				else
				{
					if(click3 == true)
					{
					
						return true;
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
			
				<button bg-Red500 ripple-color="tealA400" type="submit"> SAVE DATA</button>

            </td>
        </tr>
    </tfoot>
</table>

		</form>
		
	
		
	
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