<?php
	//header('Content-type: text/plain; charset=utf-8');
	session_start();
	
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	$ID = $_REQUEST['id'];
	
	$evaluate_no1	= $_POST['Performance'];			
	$evaluate_no2	= $_POST['completion'];			
	$evaluate_no3	= $_POST['Knowledge'];			
	
	$suggestion	= $_POST['suggestion'];	
	
	$opinion_teacher	= $_POST['opinion_teacher'];		
	$board_resolution	= $_POST['board_resolution'];		

	//1 = past
	//2 = re-examine
	//3 = non-exams
	//4 = fail
	
	$DeleteCPE07 = mysql_query ("DELETE FROM `SWEN`.`CPE07` WHERE `CPE07`.`ID_project` = '".$ID."'");
	
	if($opinion_teacher == "11" && $board_resolution == "21")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '1', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '17' WHERE  `Project`.`id` = '".$ID."'");
	
	}
	else if($opinion_teacher == "11" && $board_resolution == "22" )
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '2', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '16' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "11" && $board_resolution == "23")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '3', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '15' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "11" && $board_resolution == "20")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		 
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '14' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "12" && $board_resolution == "21")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '2', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '16' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "12" && $board_resolution == "22")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '2', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '16' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "12" && $board_resolution == "23")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '2', CURRENT_TIMESTAMP)");
		 
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '16' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "12" && $board_resolution == "20")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '14' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "13" && $board_resolution == "21")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '3', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '15' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "13" && $board_resolution == "22")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '2', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '16' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "13" && $board_resolution == "23")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '3', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '15' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "13" && $board_resolution == "20")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '14' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "10" && $board_resolution == "21")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '14' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "10" && $board_resolution == "22")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '14' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "10" && $board_resolution == "23")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '14' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "10" && $board_resolution == "20")
	{
		$insertCPE07 = mysql_query ("INSERT INTO `SWEN`.`CPE07` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$evaluate_no1."', '".$evaluate_no2."', '".$evaluate_no3."',  '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '14' WHERE  `Project`.`id` = '".$ID."'");
	}

	
	header("location:load_balance.php");	
	
?>
