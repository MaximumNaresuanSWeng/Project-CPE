<?php
	session_start();
	
	if (isset($_SESSION["login_state"]))
		{
			include_once dirname(__FILE__) . '/Config.php';
			mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
			mysql_select_db(DB_NAME);
			mysql_query("SET NAMES UTF8");
		
		//$query_Project = mysql_query ("SELECT * FROM `Project` WHERE project_status >= 2 ");
		
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
  
  <link rel="stylesheet" href="css/progress.css">
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
		}
	?>
		</div>
		
		</center>
		
    </div>
      <div fluid card bg-Orange500="" align-center>
	  
	  
	
		<div card="" z-0="" align-left >
		
			<div bg-grey100="" padded="">
			
		 
			
			
			<br>
		<h4>เพิ่มข่าวสารประชาสัมพันธิ์</h4>
		<table id="myTableNews" class="order-list" style="width: 700px">
			<form name="form1" id="form1" onsubmit="return required()" method="post" action="saveNews.php" >
		
				<br><h6>Title: </h6><input type="text" name="titleNews" placeholder="หัวเรื่อง"  id="titleNews" style="width: 700px"><br>
				<textarea placeholder="ข่าวสารประชาสัมพันธิ์" name="NewsHome" id="NewsHome"  bg-White style="width: 700px" rows="6"></textarea>
			
				<div control >
				<center><button bg-Red500 ripple-color="tealA400" type="submit">SAVE DATA</button></center>
				</div>
			</table>
			</form>
		</div>

	
	
		</div>
		

	
        
		
    </div>
<script type="text/javascript"> 
 function required()
{
	
	var titleNews = document.forms["form1"]["titleNews"].value;
	var NewsHome = document.forms["form1"]["NewsHome"].value;
	
	
	if ((titleNews == "" && NewsHome == ""))
	{
		//alert("กรุณาใส่หัวเรื่อง และ ข่าวสารประชาสัมพันธิ์");
		swal({title: "กรุณาใส่หัวเรื่อง \nและข่าวสารประชาสัมพันธิ์",     type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false }); 
		return false;
	}
	
	else if(titleNews != "" && NewsHome == "" )
	{
		swal({title: "กรุณาใส่ \nข่าวสารประชาสัมพันธิ์",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false }); 
		return false;
	}
	
	else if(titleNews == "" && NewsHome != "" )
	{
		swal({title: "กรุณาใส่ \nหัวเรื่อง	"+" ",      type: "warning",confirmButtonColor: "#F44336",   confirmButtonText: "OK",   closeOnConfirm: false }); 
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
	
        
	</div>

	
</div>


	
	
	
	<!-- load scripts at the end -->

  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>
</html>