<?php
	//header('Content-type: text/plain; charset=utf-8');
	session_start();
	
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	$ID = $_REQUEST['id'];
	
	$progress_operations	= $_REQUEST['progress_operations'];			
	$completion	= $_REQUEST['completion'];			
	$Knowledge	= $_REQUEST['Knowledge'];			
	$teamwork	= $_REQUEST['teamwork'];	
	
	$suggestion	= $_REQUEST['suggestion'];
	
	$conclude	= $_REQUEST['opinion_teacher'];			
			
	
	
	
	$DeleteCPE05 = mysql_query ("DELETE FROM `SWEN`.`CPE05` WHERE `CPE05`.`ID_project` = '".$ID."'");
	
	$insertCPE05 = mysql_query ("INSERT INTO `SWEN`.`CPE05` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `suggestion`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$progress_operations."', '".$completion."', '".$Knowledge."', '".$teamwork."', '".$suggestion."', '".$conclude."', CURRENT_TIMESTAMP)");
	
	if($conclude == 11)
	{
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '11' WHERE  `Project`.`id` = '".$ID."'");
	}
	else
	{
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '10' WHERE  `Project`.`id` = '".$ID."'");
	}
	
	
	header("location:load_balance.php");	
	
?>
