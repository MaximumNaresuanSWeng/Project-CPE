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
		
		$query_CPE04 = mysql_query ("SELECT * FROM `CPE04` WHERE ID_project = '".$ID."'  ");
		$dataquery_CPE04 = mysql_fetch_array($query_CPE04);
		
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
				echo "<button bg-teal ripple-color='tealA400' onclick=\"location.href='ViewCPE01Admin.php'\">View</button>";
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
  <!-------------------------------------------------------------------- CPE01 --------------------------------------------->
  <div class="<?php
		if($project[6]==1)
		{
			echo "circle active";
			
		}
		else if($project[6]>=2&&$project[6]<999&&$project[10]=="")
		{
			echo "circle wait";
			
		}
		else if($project[6]>=2&&$project[6]<999&&$project[10]!="")
		{
			echo "circle done";
			
		}
		else if($project[6]==999)
		{
			echo "circle fail";			
		}
		else
		{
			echo "circle";			
		}
		?>">
    <span class="label" 
	<?php
		if($project[6]>=1&&$project[6]<999)
		{
			echo "onclick=\"location.href='ViewCPE01Admin.php?id=".$ID."'\"";
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
			echo "✖";
			
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
  
  <!-------------------------------------------------------------------- CPE02 --------------------------------------------->
   <div class="<?php
  $query_project_CPE02 = mysql_query ("SELECT * FROM `CPE02` WHERE ID_project = '".$ID."'");
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
  $query_project_CPE02 = mysql_query ("SELECT * FROM `CPE02` WHERE ID_project = '".$ID."'");
  $project_CPE02 = mysql_fetch_array($query_project_CPE02);
  $sum = true;
  if($project_CPE02)
  {
	  echo "onclick=\"location.href='ViewCPE02Admin.php?id=".$ID."'\"";
  }	
	?>>
  <?php
  $query_project_CPE02 = mysql_query ("SELECT * FROM `CPE02` WHERE ID_project = '".$ID."'");
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
  $query_project_CPE02 = mysql_query ("SELECT * FROM `CPE02` WHERE ID_project = '".$ID."'");
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
  
  <!-------------------------------------------------------------------- CPE03 --------------------------------------------->
  <div class="<?php
  $query_project_CPE03 = mysql_query ("SELECT * FROM `CPE03` WHERE ID_project  = '".$ID."'");
  $project_CPE03 = mysql_fetch_array($query_project_CPE03);
  if($project_CPE03)
  {
		if((($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] =="") ))
		{
			echo "circle active";
			
		}
		
		else if((($project_CPE03[2] !="" && $project_CPE03[3] =="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] !="" && $project_CPE03[4] =="")||($project_CPE03[2] =="" && $project_CPE03[3] =="" && $project_CPE03[4] !="") ))
		{
			echo "circle wait";			
		}
		else if((($project_CPE03[2] !="" && $project_CPE03[3] !="" && $project_CPE03[4] =="")||($project_CPE03[2] !="" && $project_CPE03[3] =="" && $project_CPE03[4] !="")||($project_CPE03[2] =="" && $project_CPE03[3] !="" && $project_CPE03[4] !="") ))
		{
			echo "circle wait";			
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
			echo "onclick=\"location.href='ViewCPE03Admin.php?id=".$ID."'\"";
		}	
	?>>
	<?php
	$query_project_CPE03 = mysql_query ("SELECT * FROM `CPE03` WHERE ID_project  = '".$ID."'");
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
	$query_project_CPE03 = mysql_query ("SELECT * FROM `CPE03` WHERE ID_project  = '".$ID."'");
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
  
 <!-------------------------------------------------------------------- CPE04 --------------------------------------------->
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
			echo "circle wait";
		}	
		else if($project[6]==8)	
		{
			echo "circle wait";
		}	
		else if($project[6]>=9&&$project[6]<999)	
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
			echo "onclick=\"location.href='ViewCPE04Admin.php?id=".$ID."'\"";
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
		else if($project[6]>=9&&$project[6]<999)	
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
		else if($project[6]>=9&&$project[6]<999)	
		{
			echo"class=\"bar done\"";
		}	
		else
		{
			echo"class=\"bar\"";
			
		}
	?>>	
  </span> 
  
<!--------------------------------------------------------- CPE05 -------------------------------------------------------------------> 
 <div class="<?php
		if($project[6]==9)
		{
			echo "circle active";
			
		}
		else if($project[6]==10)	
		{
			echo "circle fail";
		}
		else if($project[6]>=11&&$project[6]<999)	
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
		if($project[6]>=9&&$project[6]<999)
		{
			echo "onclick=\"location.href='ViewCPE05Admin.php?id=".$ID."'\"";
		}	
	?>>
	<?php
		if($project[6]==9)
		{
			echo "✔";
			
		}
		else if($project[6]==10)	
		{
			echo "✖";
		}
		else if($project[6]>=11&&$project[6]<999)	
		{
			echo "✔";
		}			
		else
		{
			echo "✖";
			
		}
	?>
	</span>
    <span class="title">CPE05</span>
  </div>
  <span <?php
		if($project[6]==9)
		{
			echo"class=\"bar active\"";
			
		}
		else if($project[6]==10)	
		{
			echo"class=\"bar \"";
		}	
		else if($project[6]>=11&&$project[6]<999)	
		{
			echo"class=\"bar done\"";
		}	
		else
		{
			echo"class=\"bar\"";
			
		}
	?>>	
  </span> 
  <!--------------------------------------------------------- CPE06 -------------------------------------------------------------------> 
 <div class="<?php
		if($project[6]==11 || $project[6]==14)
		{
			echo "circle active";
			
		}
		else if($project[6]==12)	
		{
			echo "circle fail";
		}
		else if($project[6]>=13&&$project[6]<999)	
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
		if($project[6]>=11&&$project[6]<999)
		{
			echo "onclick=\"location.href='ViewCPE06Admin.php?id=".$ID."'\"";
		}	
	?>>
	<?php
		if($project[6]==11 || $project[6]==14)
		{
			echo "✔";
			
		}
		else if($project[6]==12)	
		{
			echo "✖";
		}	
		else if($project[6]>=13&&$project[6]<999)	
		{
			echo "✔";
		}			
		else
		{
			echo "✖";
			
		}
	?>
	</span>
    <span class="title">CPE06</span>
  </div>
  <span <?php
		if($project[6]==11 || $project[6]==14)
		{
			echo"class=\"bar active\"";
			
		}
		else if($project[6]==12)	
		{
			echo"class=\"bar \"";
		}
		else if($project[6]>=13&&$project[6]<999)	
		{
			echo"class=\"bar done\"";
		}	
		else
		{
			echo"class=\"bar\"";
			
		}
	?>>	
  </span> 
  
<!--------------------------------------------------------- CPE07 -------------------------------------------------------------------> 
 <div class="<?php
		if($project[6]==13)
		{
			echo "circle active";			
		}		
		else if($project[6]==14)	
		{
			echo "circle fail";
		}
		else if($project[6]==15)	
		{
			echo "circle wait";
		}	
		else if($project[6]==16)	
		{
			echo "circle wait";
		}	
		else if($project[6]>=17&&$project[6]<999)	
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
		if($project[6]>=13&&$project[6]<999)
		{
			echo "onclick=\"location.href='ViewCPE07Admin.php?id=".$ID."'\"";
		}	
	?>>
	
	
	<?php
		if($project[6]==13)
		{
			echo "✔";			
		}
		else if($project[6]==14)	
		{
			echo "✖";
		}
		else if($project[6]==15)	
		{
			echo "&#9998;";
		}	
		else if($project[6]==16)	
		{
			echo "&#8634;";
		}	
		else if($project[6]>=17&&$project[6]<999)	
		{
			echo "✔";
		}			
		else
		{
			echo "✖";			
		}
	?>
	</span>
	<span class="title">CPE07</span>
</div>

</div>
				
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
			<br>
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

		<hr>
			
			<h4>ผลการประเมิน</h4>
			<table id="myTable3" class="order-list" style="width: 700px">
	<thead>
      <tr >
        <td>หัวข้อการประเมิน</td>
        <td>เหมาะสม</td>
		<td>ไม่เหมาะสม</td>
      </tr>
    </thead>
	<tbody>
	
		<tr ><td> 1. จำนวนนิสิตที่ทำโครงงาน</td>
		<td>
			<input type="radio" name="Number_of_students" id="Number_of_students1" <?php if($dataquery_CPE04[2] == 1){echo " checked ";} ?>value="1">
			<label for="Number_of_students1"></label>
			
		</td>
		<td>
			<input type="radio" name="Number_of_students" id="Number_of_students2" <?php if($dataquery_CPE04[2] == 0){echo " checked ";} ?>value="0">
			<label for="Number_of_students2"></label>
			
		</td>
		</tr>
		<tr ><td>2. ที่มาและความสำคัญของปัญหา</td>
		<td>
			<input type="radio" name="importance" id="importance1" <?php if($dataquery_CPE04[3] == 1){echo " checked ";} ?> value="1">
			<label for="importance1"></label>
			
		</td>
		<td>
			<input type="radio" name="importance" id="importance2"  <?php if($dataquery_CPE04[3] == 0){echo " checked ";} ?> value="0">
			<label for="importance2"></label>
			
		</td>
		</tr>
		<tr ><td>3. วัตถุประสงค์ของโครงงาน</td>
		<td>
			<input type="radio" name="purpose" id="purpose1"  <?php if($dataquery_CPE04[4] == 1){echo " checked ";} ?> value="1">
			<label for="purpose1"></label>
			
		</td>
		<td>
			<input type="radio" name="purpose" id="purpose2"  <?php if($dataquery_CPE04[4] == 0){echo " checked ";} ?> value="0">
			<label for="purpose2"></label>
			
		</td>
		</tr>
		<tr ><td>4. การศึกษาเกี่ยวกับหลักการและทฤษฎีที่เกี่ยวข้อง</td>
		<td>
			<input type="radio" name="theories" id="theories1"  <?php if($dataquery_CPE04[5] == 1){echo " checked ";} ?> value="1">
			<label for="theories1"></label>
			
		</td>
		<td>
			<input type="radio" name="theories" id="theories2"  <?php if($dataquery_CPE04[5] == 1){echo " checked ";} ?> value="0">
			<label for="theories2"></label>
			
		</td>
		</tr>
		<tr ><td>5. ความเหมาะสมของวิธีการดำเนินงานที่นำเสนอ</td>
		<td>
			<input type="radio" name="Presentation" id="Presentation1"  <?php if($dataquery_CPE04[6] == 1){echo " checked ";} ?> value="1">
			<label for="Presentation1"></label>
			
		</td>
		<td>
			<input type="radio" name="Presentation" id="Presentation2"  <?php if($dataquery_CPE04[6] == 0){echo " checked ";} ?> value="0">
			<label for="Presentation2"></label>
			
		</td>
		</tr>
		<tr ><td>6. ขอบเขตของโครงงาน</td>
		<td>
			<input type="radio" name="scope" id="scope1"  <?php if($dataquery_CPE04[7] == 1){echo " checked ";} ?> value="1">
			<label for="scope1"></label>
			
		</td>
		<td>
			<input type="radio" name="scope" id="scope2"  <?php if($dataquery_CPE04[7] == 0){echo " checked ";} ?> value="0">
			<label for="scope2"></label>
			
		</td>
		</tr>
		
		
	 </tbody>
	 </table >
			<hr>
			<h4>ข้อเสนอแนะ</h4>
			<textarea placeholder="ข้อเสนอแนะ" name="suggestion" id="suggestion"  bg-White style="width: 700px" rows="6"><?php echo $dataquery_CPE04[8];?></textarea>
			
			<hr>
			
			<h4>สรุป</h4>
			<table id="myTable4" class="order-list" style="width: 700px">
	<thead>
      <tr >
        <th><center>ความเห็นของอาจารย์ผู้ประเมิน</center></th>
        <th><center>มติกรรมการ</center></th>
		
		
      </tr>
    </thead>
	<tbody>
	<!--ส่วนสรุป-->
	<center>
	<tr>
		<td>
		<?php 
			if($dataquery_CPE04[9] == 11)
			{
				echo "<div align=\"center\">ผ่าน</div>";
			}
			else if($dataquery_CPE04[9] == 12)
			{
				echo "<div align=\"center\">สมควร สอบใหม่</div>";
			}
			else if($dataquery_CPE04[9] == 13)
			{
				echo "<div align=\"center\">สมควรแก้ไข ไม่ต้องสอบใหม่</div>";
			}
			else
			{
				echo "<div align=\"center\">ไม่ผ่าน</div>";
			}
			
		
		?></td>
		<td>
		<?php 
			if($dataquery_CPE04[10] == 21)
			{
				echo "<div align=\"center\">ผ่าน</div>";
			}
			else if($dataquery_CPE04[10] == 22)
			{
				echo "<div align=\"center\">สมควร สอบใหม่</div>";
			}
			else if($dataquery_CPE04[10] == 23)
			{
				echo "<div align=\"center\">สมควรแก้ไข ไม่ต้องสอบใหม่</div>";
			}
			else
			{
				echo "<div align=\"center\">ไม่ผ่าน</div>";
			}
			
		
		?>
		</td>
	</tr>
	</center>
	
	</tbody>
	 </table >
			
			
		
	
		
	
        </div>
		
    </div>
	
	<div fluid card bg-Grey500="">

		
		<font color="white">
		<center><a1>copyright © SuperStar Group | 305351 Computer System Engineering ภาคการศึกษาที่ 2  ปีการศึกษา 2557</a1></center>
			<br>
		<center><a1>copyright © 2015 Maximum Group | 305471 Software Engineering ภาคการศึกษาที่ 1  ปีการศึกษา  2558</a1></center>
        </font>
		
		<div align=right>
		<font color="white"> Page ID : 11 CPE 04 </font>
		</div>
	
        
	</div>

	
</div>


	
	
	
	<!-- load scripts at the end -->

  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>
</html>