<?php
	//header('Content-type: text/plain; charset=utf-8');
	session_start();
	
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	$ID = $_REQUEST['id'];
	
	
	$suggestion	= $_REQUEST['suggestion'];
	
	$conclude	= $_REQUEST['opinion_teacher'];			
			
	
	
	
	$DeleteCPE05 = mysql_query ("DELETE FROM `SWEN`.`CPE06` WHERE `CPE06`.`ID_project` = '".$ID."'");
	
	$insertCPE05 = mysql_query ("INSERT INTO `SWEN`.`CPE06` (`id`, `ID_project`, `suggestion`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$suggestion."', '".$conclude."', CURRENT_TIMESTAMP)");
	
	if($conclude == 13)
	{
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '13' WHERE  `Project`.`id` = '".$ID."'");
	}
	else
	{
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '12' WHERE  `Project`.`id` = '".$ID."'");
	}
	
	
	header("location:load_balance.php");	
	
?>
