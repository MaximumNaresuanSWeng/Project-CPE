<?php
	session_start();
	
		if (isset($_SESSION["login_state"]))
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
		
		$Advisors = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[7]."'");
		$dataAdvisors = mysql_fetch_array($Advisors);
		
		$Co_Advisors = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[8]."'");
		$dataCo_Advisors = mysql_fetch_array($Co_Advisors);
		
		$Committee = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[9]."'");
		$dataCommittee = mysql_fetch_array($Committee);
		
		$Special_Committee = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$project[10]."'");
		$dataSpecial_Committee = mysql_fetch_array($Special_Committee);
		
		$query_CPE02 = mysql_query ("SELECT * FROM `CPE02` WHERE ID_project = '".$_SESSION["ID_project"]."' AND status = '2' ");
		
		$query_CPE03 = mysql_query ("SELECT * FROM `CPE03` WHERE ID_project = '".$_SESSION["ID_project"]."'  ");
		$dataquery_CPE03 = mysql_fetch_array($query_CPE03);
		
		
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
		 
  <div class="progress">
  <!-------------------------------------------------- CPE01 ----------------------------------------------->
  <div class="<?php
		if($project[6]==1)
		{
			echo "circle active";
			
		}
		else if($project[6]>=2&&$project[6]<999&&$project[10]=="")
		{
			echo "circle done";
			
		}
		else if($project[6]>=2&&$project[6]<999&&$project[10]!="")
		{
			echo "circle done";			
		}
		else if($project[6]==999)
		{
			echo "circle fail ";			
		}
		else
		{
			echo "circle";
			
		}
		?>">
    <span class="label" 
	<?php
		if($project[6]>=1)
		{
			echo "onclick=\"location.href='ViewCPE01.php?id=".$ID."'\"";
		}	
	?>>
	<?php
		if($project[6]==1)
		{
			echo "✔";
			
		}
		else if($project[6]>=2&&$project[6]<999&&$project[10]=="")
		{
			echo " ";
			
		}
		else if($project[6]>=2&&$project[6]<999&&$project[10]!="")
		{
			echo "✔";		
		}
		else if($project[6]==999)
		{
			echo " ";			
		}
		else
		{
			echo "✖";
			
		}
	?>
	</span>
    <span class="title">CPE01</span>
  </div>
  <span <?php
		if($project[6]==1)
		{
			echo"class=\"bar active\"";
			
		}
		else if($project[6]>=2&&$project[6]<999&&$project[10]=="")
		{
			echo"class=\"bar done\"";
			
		}
		else if($project[6]>=2&&$project[6]<999&&$project[10]!="")
		{
			echo"class=\"bar done\"";		
		}
		else if($project[6]==999)
		{
			echo"class=\"bar\"";			
		}
		else
		{
			echo"class=\"bar\"";
			
		}
	?>>	
  </span>
  
  <!---------------------------------------------------------- CPE02 ----------------------------------------------------->
 <div class="<?php
  $query_project_CPE02 = mysql_query ("SELECT * FROM `CPE02` WHERE ID_project = '".$_SESSION["ID_project"]."'");
  $project_CPE02 = mysql_fetch_array($query_project_CPE02);
  $sum = true;
  if($project_CPE02)
  {
	  
	  
	  if($project_CPE02[5] == 1)
	  {
		  $sum = false;
	  }
	  else
	  {
		  while($project_CPE02 = mysql_fetch_array($query_project_CPE02))
			{
				if($project_CPE02[5] == 1)
				{
					$sum = false;
					break;
				}
			}
	  }
	  
	  if($sum == true)
	  {
		 echo "circle done";		
	  }
	  else
	  {
		 echo "circle active";
	  }
  }
  else
  {
	  echo "circle";
  }
		
	?>">
    <span class="label" 
	<?php
  $query_project_CPE02 = mysql_query ("SELECT * FROM `CPE02` WHERE ID_project = '".$_SESSION["ID_project"]."'");
  $project_CPE02 = mysql_fetch_array($query_project_CPE02);
  $sum = true;
  if($project_CPE02)
  {
	  echo "onclick=\"location.href='ViewCPE02.php?id=".$ID."'\"";
  }	
	?>>
  <?php
  $query_project_CPE02 = mysql_query ("SELECT * FROM `CPE02` WHERE ID_project = '".$_SESSION["ID_project"]."'");
  $project_CPE02 = mysql_fetch_array($query_project_CPE02);
  $sum = true;
  if($project_CPE02)
  {
	  
	  
	  if($project_CPE02[5] == 1)
	  {
		  $sum = false;
	  }
	  else
	  {
		  while($project_CPE02 = mysql_fetch_array($query_project_CPE02))
			{
				if($project_CPE02[5] == 1)
				{
					$sum = false;
					break;
				}
			}
	  }
	  
	  if($sum == true)
	  {
		 echo "✔";		
	  }
	  else
	  {
		 echo "✔";
	  }
  }
  else
  {
	  echo "✖";
  }
		
	?>
	</span>
    <span class="title">CPE02</span>
  </div>
  <span <?php
  $query_project_CPE02 = mysql_query ("SELECT * FROM `CPE02` WHERE ID_project = '".$_SESSION["ID_project"]."'");
  $project_CPE02 = mysql_fetch_array($query_project_CPE02);
  $sum = true;
  if($project_CPE02)
  {
	  
	  
	  if($project_CPE02[5] == 1)
	  {
		  $sum = false;
	  }
	  else
	  {
		  while($project_CPE02 = mysql_fetch_array($query_project_CPE02))
			{
				if($project_CPE02[5] == 1)
				{
					$sum = false;
					break;
				}
			}
	  }
	  
	  if($sum == true)
	  {
		 echo"class=\"bar done \"";		
	  }
	  else
	  {
		 echo"class=\"bar active \"";
	  }
  }
  else
  {
	  echo"class=\"bar \"";
  }		
	?>>  
  </span>
  
  <!------------------------------------------------------------- CPE03 ----------------------------------------------->
  <div class="<?php
  $query_project_CPE03 = mysql_query ("SELECT * FROM `CPE03` WHERE ID_project  = '".$_SESSION["ID_project"]."'");
  $project_CPE03 = mysql_fetch_array($query_project_CPE03);
  if($project_CPE03)
  {
		if((($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] =="") ))
		{
			echo "circle active";
			
		}
		
		else if((($project_CPE03[2] !="" && $project_CPE03[3] =="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] !="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] !="") ))
		{
			echo "circle done";			
		}
		else if((($project_CPE03[2] !="" && $project_CPE03[3] !="" && $project_CPE03[4] =="")||($project_CPE03[2] !="" && $project_CPE03[3] =="" && $project_CPE03[4] !="")||($project_CPE03[2] =="" && $project_CPE03[3] !="" && $project_CPE03[4] !="") ))
		{
			echo "circle done";			
		}
		else if(($project_CPE03[2] !="" && $project_CPE03[3] !="" && $project_CPE03[4] !=""))
		{
			echo "circle done";			
		}
  }
		else
		{
			echo "circle";			
		}
		?>">
    <span class="label" 
	<?php
		if($project[6]>=4)
		{
			echo "onclick=\"location.href='ViewCPE03.php?id=".$ID."'\"";
		}	
	?>>
	<?php
	$query_project_CPE03 = mysql_query ("SELECT * FROM `CPE03` WHERE ID_project  = '".$_SESSION["ID_project"]."'");
   $project_CPE03 = mysql_fetch_array($query_project_CPE03);
   if($project_CPE03)
   {
		if((($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] =="") ))
		{
			echo "✔";
			
		}
		else if((($project_CPE03[2] !="" && $project_CPE03[3] =="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] !="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] !="") ))
		{
			echo "1";			
		}
		else if((($project_CPE03[2] !="" && $project_CPE03[3] !="" && $project_CPE03[4] =="")||($project_CPE03[2] !="" && $project_CPE03[3] =="" && $project_CPE03[4] !="")||($project_CPE03[2] =="" && $project_CPE03[3] !="" && $project_CPE03[4] !="") ))
		{
			echo "2";			
		}
		else if(($project_CPE03[2] !="" && $project_CPE03[3] !="" && $project_CPE03[4] !=""))
		{
			echo "✔";			
		}
   }
		
	else
	{
		echo "✖";
			
	}
	?>
	</span>
    <span class="title">CPE03</span>
  </div>
  <span <?php
	$query_project_CPE03 = mysql_query ("SELECT * FROM `CPE03` WHERE ID_project  = '".$_SESSION["ID_project"]."'");
	$project_CPE03 = mysql_fetch_array($query_project_CPE03);
	if($project_CPE03)
	{
		if((($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] =="") ))
		{
			echo"class=\"bar active\"";
			
		}
		else if((($project_CPE03[2] !="" && $project_CPE03[3] =="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] !="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] !="") ))
		{
			echo"class=\"bar active\"";			
		}
		else if((($project_CPE03[2] !="" && $project_CPE03[3] !="" && $project_CPE03[4] =="")||($project_CPE03[2] !="" && $project_CPE03[3] =="" && $project_CPE03[4] !="")||($project_CPE03[2] =="" && $project_CPE03[3] !="" && $project_CPE03[4] !="") ))
		{
			echo"class=\"bar active\"";		
		}
		else if(($project_CPE03[2] !="" && $project_CPE03[3] !="" && $project_CPE03[4] !=""))
		{
			echo"class=\"bar done\"";		
		}
	}
	else
	{
		echo"class=\"bar\"";
			
	}
	?>>	
  </span>

 <!--------------------------------------------------------- CPE04 -------------------------------------------------------------------> 
 <div class="<?php
		if($project[6]==5)
		{
			echo "circle active";
			
		}
		else if($project[6]==6)	
		{
			echo "circle fail";
		}
		else if($project[6]==7)	
		{
			echo "circle active";
		}	
		else if($project[6]==8)	
		{
			echo "circle active";
		}	
		else if($project[6]==9)	
		{
			echo "circle done";
		}	
		else
		{
			echo "circle";			
		}
		?>">
    <span class="label" 
	<?php
		if($project[6]>=5&&$project[6]<999)
		{
			echo "onclick=\"location.href='ViewCPE04.php?id=".$ID."'\"";
		}	
	?>>
	<?php
		if($project[6]==5)
		{
			echo "✔";
			
		}
		else if($project[6]==6)	
		{
			echo "✖";
		}
		else if($project[6]==7)	
		{
			echo "&#9998;";
		}	
		else if($project[6]==8)	
		{
			echo "&#8634;";
		}	
		else if($project[6]==9)	
		{
			echo "✔";
		}			
		else
		{
			echo "✖";
			
		}
	?>
	</span>
    <span class="title">CPE04</span>
  </div>
  <span <?php
		if($project[6]==5)
		{
			echo"class=\"bar active\"";
			
		}
		else if($project[6]==6)	
		{
			echo"class=\"bar \"";
		}
		else if($project[6]==7)	
		{
			echo"class=\"bar active\"";
		}	
		else if($project[6]==8)	
		{
			echo"class=\"bar active\"";
		}	
		else if($project[6]==9)	
		{
			echo"class=\"bar done\"";
		}	
		else
		{
			echo"class=\"bar\"";
			
		}
	?>>	
  </span>   
  

  <div class="circle">
    <span class="label" >✖</span>
    <span class="title">CPE05</span>
  </div>
  <span class="bar"></span>
  <div class="circle">
    <span class="label" >✖</span>
    <span class="title">CPE06</span>
  </div>
  <span class="bar"></span>
  <div class="circle">
    <span class="label" >✖</span>
    <span class="title">CPE07</span>
  </div>
</div>
				
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
			<h4>ประเด็นปัญหาและขอบเขตของโครงงานโดยย่อ</font></h4>
			
			<textarea placeholder="ประเด็นปัญหาและขอบเขตของโครงงานโดยย่อ" name="works" id="works"  bg-White style="width: 700px" rows="6"><?php echo $dataquery_CPE03[1]; ?></textarea>
			
			<br>
			
			<h4>การดำเนินงานของอาจารย์ที่ปรึกษาและกรรมการ</h4>
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
		<tr>
			<td colspan="2">
			<div align="center">
			<?php 
				if($dataquery_CPE03[2] == 1)
				{
					echo "ยืนยันแล้ว";
				}
				else
				{
					echo "ยังไม่ยืนยัน";
				}
				
			?>
			
			 </div>
			</td>
			
			<td>
			<div align="center">
			<?php 
				if($dataquery_CPE03[3] == 1)
				{
					echo "ยืนยันแล้ว";
				}
				else
				{
					echo "ยังไม่ยืนยัน";
				}
				
			?>
			</div>
		
			</td>
		
			<td>
			<div align="center">
			<?php 
				if($dataquery_CPE03[4] == 1)
				{
					echo "ยืนยันแล้ว";
				}
				else
				{
					echo "ยังไม่ยืนยัน";
				}
				
			?>
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

		
		<font color="white">
		<center><a1>copyright © SuperStar Group | 305351 Computer System Engineering ภาคการศึกษาที่ 2  ปีการศึกษา 2557</a1></center>
			<br>
		<center><a1>copyright © 2015 Maximum Group | 305471 Software Engineering ภาคการศึกษาที่ 1  ปีการศึกษา  2558</a1></center>
        </font>
        
		<div align=right>
		<font color="white"> Page ID : 5 CPE 03 </font>
		</div>
	</div>

	
</div>


	
	
	
	<!-- load scripts at the end -->

  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>

</html>