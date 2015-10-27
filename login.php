<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>ระบบป้อนข้อมูลอะไรสักอย่าง</title>


<link rel="stylesheet" href="css/md-css.min.css">
<link rel="stylesheet" href="css/md-icons.min.css">
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
	<button bg-teal ripple-color="tealA400" onclick="location.href='login.php'">Log In</button>
	<button bg-teal ripple-color="tealA400" onclick="location.href='about.php'">About</button>
		</div>
		
		</center>
	
        
		
    </div>
      <div fluid card bg-Orange500="" align-center>
	  
	  
	
		<div card="" z-0="" align-left >
		
	<form name="form1" method="post" onsubmit="return required()" action="Check_login.php" >
		
			<div control>
				Username
				<input type="text" placeholder="Username or Email" name="user" id="user">
			</div>
			
			<div control>
				Password
				<input type="password" placeholder="Password" name="password" id="password">
			</div>
			
			
			<div control >
			<button bg-teal ripple-color="tealA400">Log In</button>
			</div>
		</form>
	
		</div>
		

	
        
		
    </div>
	
<script type="text/javascript"> 
//$idMember = false;
var check_login = "<?php  $idMember = $_REQUEST['check']; echo $idMember;?>";

	if(check_login=="false")	
	{	
		swal({title: "ล็อกอินผิดพลาด \nusername หรือ Password\nไม่ถูกต้อง",type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
	}
//header("location:login.php");

 function required()
{
	
	var user = document.forms["form1"]["user"].value;
	var password = document.forms["form1"]["password"].value;
	
	
	if ((user == "" && password == ""))
	{
		//alert("กรุณาใส่ \nusername และ password");
		swal({title: "กรุณาใส่ \nusername และ password",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false }); 
		return false;
	}
	
	else if(user != "" && password == "" )
	{
		swal({title: "กรุณาใส่ \npassword",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false }); 
		return false;
	}
	
	else if(user == "" && password != "" )
	{
		swal({title: "กรุณาใส่ \nusername",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false }); 
		return false;
	}
	else 
	{
		return true;
	}
	

}


 </script>
	<div fluid card bg-Grey500="">

		
		<font color="white">
		<center><a1>copyright © SuperStar Group | 305351 Computer System Engineering ภาคการศึกษาที่ 2  ปีการศึกษา 2557</a1></center>
			<br>
		<center><a1>copyright © 2015 Maximum Group | 305471 Software Engineering ภาคการศึกษาที่ 1  ปีการศึกษา  2558</a1></center>
        </font>	
		
		<div>
		<font color="white"> Page ID : 3 </font>
		</div>
        
	</div>

	
</div>


	
	
	
	<!-- load scripts at the end -->

  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>
</html>