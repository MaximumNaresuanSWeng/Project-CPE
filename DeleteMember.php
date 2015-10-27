<?php
	
	session_start();
	
	$idMember = $_REQUEST['idMember'];
	$number = $_REQUEST['number'];
	
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	$DeleteMember_ID_project = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '' WHERE  `USER`.`id` = '".$idMember."'");
	
	if($number == 1)
	{
		$query_project = mysql_query ("SELECT * FROM `Project` WHERE id = '".$_SESSION["ID_project"]."'");
		$project = mysql_fetch_array($query_project);
		
		$Update_project = mysql_query ("UPDATE  `SWEN`.`Project` SET  `ID_Student1` =  '".$project[4]."',
																	  `ID_Student2` =  '".$project[5]."',
																	  `ID_Student3` =  '' 
																	  WHERE  `Project`.`id` = '".$_SESSION["ID_project"]."'");
																	  
		$_SESSION["ID_project"]  = "" ;
	}
	else if($number == 2)
	{
		$query_project = mysql_query ("SELECT * FROM `Project` WHERE id = '".$_SESSION["ID_project"]."'");
		$project = mysql_fetch_array($query_project);
		
		$Update_project = mysql_query ("UPDATE  `SWEN`.`Project` SET  `ID_Student1` =  '".$project[3]."',
																	  `ID_Student2` =  '".$project[5]."',
																	  `ID_Student3` =  '' 
																	  WHERE  `Project`.`id` = '".$_SESSION["ID_project"]."'");
	}
	else
	{
		$query_project = mysql_query ("SELECT * FROM `Project` WHERE id = '".$_SESSION["ID_project"]."'");
		$project = mysql_fetch_array($query_project);
		
		$Update_project = mysql_query ("UPDATE  `SWEN`.`Project` SET  `ID_Student1` =  '".$project[3]."',
																	  `ID_Student2` =  '".$project[4]."',
																	  `ID_Student3` =  '' 
																	  WHERE  `Project`.`id` = '".$_SESSION["ID_project"]."'");
	}
	
		
		
		$var = array('check'=>true);
		
		echo json_encode($var);	
		
?>
