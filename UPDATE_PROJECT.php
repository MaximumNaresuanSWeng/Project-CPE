<?php
	//header('Content-type: text/plain; charset=utf-8');
	session_start();
	
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	
	$name_projectTH	= $_REQUEST['name_projectTH'];			
	$name_projectEN	= $_REQUEST['name_projectEN'];			
	$ID_USER1	= $_REQUEST['ID_USER1'];			
	$ID_USER2	= $_REQUEST['ID_USER2'];			
	$ID_USER3	= $_REQUEST['ID_USER3'];		
	
	
	//$deleteProject = mysql_query ("DELETE FROM `SWEN`.`Project` WHERE `Project`.`id` = '".$_SESSION["ID_project"]."'");	
	
	if($ID_USER2 != "" && $ID_USER3 != "")
	{
		
		$Updatedata = mysql_query ("UPDATE  `SWEN`.`Project` SET  
		`name_projectTH` =  '".$name_projectTH."',
	`name_projectEN` =  '".$name_projectEN."',
	`ID_Student1` =  '".$ID_USER1."',
	`ID_Student2` =  '".$ID_USER2."',
	`ID_Student3` =  '".$ID_USER3."'
	WHERE  `Project`.`id` ='".$_SESSION["ID_project"]."'");
		
		
		
		$updateID1 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$_SESSION["ID_project"]."' WHERE  `USER`.`ID_USER` = '".$ID_USER1."'");
		$updateID2 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$_SESSION["ID_project"]."' WHERE  `USER`.`ID_USER` = '".$ID_USER2."'");
		$updateID3 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$_SESSION["ID_project"]."' WHERE  `USER`.`ID_USER` = '".$ID_USER3."'");
	
		
		
		
	
	}
	else if($ID_USER2 != "" && $ID_USER3 == "")
	{
		
		$Updatedata = mysql_query ("UPDATE  `SWEN`.`Project` SET  
		`name_projectTH` =  '".$name_projectTH."',
	`name_projectEN` =  '".$name_projectEN."',
	`ID_Student1` =  '".$ID_USER1."',
	`ID_Student2` =  '".$ID_USER2."'
	WHERE  `Project`.`id` ='".$_SESSION["ID_project"]."'");
		
		$updateID1 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$_SESSION["ID_project"]."' WHERE  `USER`.`ID_USER` = '".$ID_USER1."'");
		$updateID2 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$_SESSION["ID_project"]."' WHERE  `USER`.`ID_USER` = '".$ID_USER2."'");
	
			
	}
	else if($ID_USER2 == "" && $ID_USER3 != "")
	{
		
		$Updatedata = mysql_query ("UPDATE  `SWEN`.`Project` SET  
		`name_projectTH` =  '".$name_projectTH."',
	`name_projectEN` =  '".$name_projectEN."',
	`ID_Student1` =  '".$ID_USER1."',
	`ID_Student2` =  '".$ID_USER3."'
	WHERE  `Project`.`id` ='".$_SESSION["ID_project"]."'");
		
		$updateID1 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$_SESSION["ID_project"]."' WHERE  `USER`.`ID_USER` = '".$ID_USER1."'");
		$updateID3 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$_SESSION["ID_project"]."' WHERE  `USER`.`ID_USER` = '".$ID_USER3."'");
	
	
	
	}
	else
	{
		
		$Updatedata = mysql_query ("UPDATE  `SWEN`.`Project` SET  
		`name_projectTH` =  '".$name_projectTH."',
	`name_projectEN` =  '".$name_projectEN."',
	`ID_Student1` =  '".$ID_USER1."'
	WHERE  `Project`.`id` ='".$_SESSION["ID_project"]."'");
		
		$updateID1 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$_SESSION["ID_project"]."' WHERE  `USER`.`ID_USER` = '".$ID_USER1."'");
		
	
	
		
	
	}
	
	
	
	header("location:load_balance.php");	
	
?>
