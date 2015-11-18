<?php
	session_start();
	
		if (isset($_SESSION["login_state"]))
		{
			include_once dirname(__FILE__) . '/Config.php';
			mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
			mysql_select_db(DB_NAME);
			mysql_query("SET NAMES UTF8");
	
		//$_SESSION["ID_project"] = $_REQUEST['id'];
	
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
		
		$query_CPE04 = mysql_query ("SELECT * FROM `CPE04` WHERE ID_project = '".$_SESSION["ID_project"]."'  ");
		$dataquery_CPE04 = mysql_fetch_array($query_CPE04);
		
		$query_CPE07 = mysql_query ("SELECT * FROM `CPE07` WHERE ID_project = '".$_SESSION["ID_project"]."'  ");
		$dataquery_CPE07 = mysql_fetch_array($query_CPE07);
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
			echo "onclick=\"location.href='ViewCPE01.php?id=".$_SESSION["ID_project"]."'\"";
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
	  echo "onclick=\"location.href='ViewCPE02.php?id=".$_SESSION["ID_project"]."'\"";
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
  
  <!-------------------------------------------------------------------- CPE03 --------------------------------------------->
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
			echo "onclick=\"location.href='ViewCPE03.php?id=".$_SESSION["ID_project"]."'\"";
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
			echo "onclick=\"location.href='ViewCPE04.php?id=".$_SESSION["ID_project"]."'\"";
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
  
<!-------------------------------------------------------------------- CPE05 --------------------------------------------->
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
			echo "onclick=\"location.href='ViewCPE05.php?id=".$_SESSION["ID_project"]."'\"";
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
			echo "onclick=\"location.href='ViewCPE06.php?id=".$_SESSION["ID_project"]."'\"";
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
			echo "onclick=\"location.href='ViewCPE07.php?id=".$_SESSION["ID_project"]."'\"";
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
			<h4>ผลการประเมิน<font color="red">*</font></h4>
			<form name="formdata" id="formdata" onsubmit="return required()" method="post" action="saveCPE07.php?id=<?php echo $_SESSION["ID_project"];?>" >
			
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
			<input type="radio" name="Performance" id="Performance1" <?php if($dataquery_CPE07[2] == "1"){echo " checked ";} ?>value="1">
			<label for="Performance1"></label>
			
		</td>
		<td>
			<input type="radio" name="Performance" id="Performance2" <?php if($dataquery_CPE07[2] == "0"){echo " checked ";} ?>value="0">
			<label for="Performance2"></label>
			
		</td>
		</tr>
		<tr ><td>2. ความสมบูรณ์ของรายงานโครงงาน</td>
		<td>
			<input type="radio" name="completion" id="completion1" <?php if($dataquery_CPE07[3] == "1"){echo " checked ";} ?> value="1">
			<label for="completion1"></label>
			
		</td>
		<td>
			<input type="radio" name="completion" id="completion2"  <?php if($dataquery_CPE07[3] == "0"){echo " checked ";} ?> value="0">
			<label for="completion2"></label>
			
		</td>
		</tr>
		<tr ><td>3. ความรู้ความเข้าใจของนิสิตเกี่ยวกับโครงงาน</td>
		<td>
			<input type="radio" name="Knowledge" id="Knowledge1"  <?php if($dataquery_CPE07[4] == "1"){echo " checked ";} ?> value="1">
			<label for="Knowledge1"></label>
			
		</td>
		<td>
			<input type="radio" name="Knowledge" id="Knowledge2"  <?php if($dataquery_CPE07[4] == "0"){echo " checked ";} ?> value="0">
			<label for="Knowledge2"></label>
			
		</td>
		</tr>
		
	 </tbody>
	 </table >
			<hr>
			<h4>ข้อเสนอแนะ<font color="red">*</font></h4>
			<textarea placeholder="ข้อเสนอแนะ" name="suggestion" id="suggestion"  bg-White style="width: 700px" rows="6"><?php echo $dataquery_CPE07[5];?></textarea>
			
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
		<input type="radio" name="opinion_teacher" id="opinion_past1" <?php if($dataquery_CPE07[6] == "11"){echo " checked ";} ?> value="11" >
		<label for="opinion_past1"></label></td>
	<td >
		<input type="radio" name="opinion_teacher" id="opinion_re-examine1"  <?php if($dataquery_CPE07[6] == "12"){echo " checked ";} ?> value="12" >
		<label for="opinion_re-examine1">  สอบใหม่</label>
		<br>
		<input type="radio" name="opinion_teacher"  id="opinion_non-exams1"  <?php if($dataquery_CPE07[6] == "13"){echo " checked ";} ?> value="13" >
		<label for="opinion_non-exams1">  ไม่ต้องสอบใหม่</label></td>
	<td align="center">
		<input type="radio" name="opinion_teacher" id="opinion_fail1"  <?php if($dataquery_CPE07[6] == "10"){echo " checked ";} ?> value="10" >
		<label for="opinion_fail1"></label></td>
	</tr>
	
	<tr><td>มติกรรมการ</td>
	<td align="center">
		<input type="radio" name="board_resolution" id="board_past2"  <?php if($dataquery_CPE07[7] == "21"){echo " checked ";} ?> value="21" >
		<label for="board_past2"></label></td>
	<td >
		<input type="radio" name="board_resolution" id="board_re-examine2"  <?php if($dataquery_CPE07[7] == "22"){echo " checked ";} ?> value="22" >
		<label for="board_re-examine2">  สอบใหม่</label>
		<br>
		<input type="radio" name="board_resolution"  id="board_non-exams2" <?php if($dataquery_CPE07[7] == "23"){echo " checked ";} ?> value="23" >
		<label for="board_non-exams2">  ไม่ต้องสอบใหม่</label></td>
	<td align="center">
		<input type="radio" name="board_resolution" id="board_fail2" <?php if($dataquery_CPE07[7] == "20"){echo " checked ";} ?> value="20" >
		<label for="board_fail2"></label></td>
	</tr>
	</tbody>
	 </table >
			<br>
			
			<?php
			if($project [6] == 14 || $project [6] == 15 || $project [6] == 17)
			{
				
			}
			else
			{
				if($project[7] == $_SESSION["ID_USER"] || $project[8] == $_SESSION["ID_USER"] || $project[9] == $_SESSION["ID_USER"] || $project[10] == $_SESSION["ID_USER"])
				{
					if($project[6] == 13 || $project[6] == 16)
					{
						echo "<button bg-Red500 ripple-color=\"tealA400\" type=\"submit\"> SAVE DATA</button>";
					}
				
				}
			}
			
			?>
			
			
			</form>
			
			
<script type="text/javascript"> 
 function required()
{
	var Performance = document.forms["formdata"]["Performance"].value;
	var completion = document.forms["formdata"]["completion"].value;
	var Knowledge = document.forms["formdata"]["Knowledge"].value;
	
	var suggestion = document.forms["formdata"]["suggestion"].value;
	var opinion_teacher = document.forms["formdata"]["opinion_teacher"].value;
	var board_resolution = document.forms["formdata"]["board_resolution"].value;
	
	
	if (Performance == "" ||completion == "" ||Knowledge == "" ||suggestion == "" || opinion_teacher == "" || board_resolution == "")
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

		
		<font color="white">
		<center><a1>copyright © SuperStar Group | 305351 Computer System Engineering ภาคการศึกษาที่ 2  ปีการศึกษา 2557</a1></center>
			<br>
		<center><a1>copyright © 2015 Maximum Group | 305471 Software Engineering ภาคการศึกษาที่ 1  ปีการศึกษา  2558</a1></center>
        </font>
		
		<div align=right>
		<font color="white"> Page ID : 5 CPE 07 </font>
		</div>
        
	</div>

	
</div>


	
	
	
	<!-- load scripts at the end -->

  <script src="js/zepto.min.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/md-js.min.js"></script>
	
  
  </body>
</html>