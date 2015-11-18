<?php  		
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	//header('Content-type: text/plain; charset=utf-8');
	$query_Error1 = mysql_query ("SELECT * FROM `Error` WHERE id_error=1");
		$Error1 = mysql_fetch_array($query_Error1);
	$query_Error2 = mysql_query ("SELECT * FROM `Error` WHERE id_error=2");
		$Error2 = mysql_fetch_array($query_Error2);
	$query_Error3 = mysql_query ("SELECT * FROM `Error` WHERE id_error=3");
		$Error3 = mysql_fetch_array($query_Error3);
	$query_Error4 = mysql_query ("SELECT * FROM `Error` WHERE id_error=4");
		$Error4 = mysql_fetch_array($query_Error4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
<xml version="1.0" encoding="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์ คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร</title>


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
				var error40 = "<?php echo "ERROR Code : ".$Error4[0];?>";
				var error42 = "<?php echo $Error4[1];?>";
				swal({title: error40+"\n"+error42 +"\n",type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false });
			}
		//header("location:login.php");

	
	
	
		 function required()
		{
			
			var user = document.forms["form1"]["user"].value;
			var password = document.forms["form1"]["password"].value;
			
			
			if ((user == "" && password == ""))
			{
				//alert("กรุณาใส่ \nusername และ password");
				var error10 = "<?php echo "ERROR Code : ".$Error1[0];?>";
				var error12 = "<?php echo $Error1[1];?>";
				swal({title: error10+"\n"+error12 +"\n",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false }); 
				return false;
			}
			
			else if(user != "" && password == "" )
			{
				var error20 = "<?php echo "ERROR Code : ".$Error2[0];?>";
				var error22 = "<?php echo $Error2[1];?>";
				swal({title: error20+"\n"+error22 +"\n",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false }); 
				return false;
			}
			
			else if(user == "" && password != "" )
			{
				var error = "<?php echo "ERROR Code : ".$Error3[0];?>";
				var error2 = "<?php echo $Error3[1];?>";
				swal({title: error+"\n"+error2 +"\n",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false }); 
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
		
		<div align=right>
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