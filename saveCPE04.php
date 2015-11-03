<?php
	//header('Content-type: text/plain; charset=utf-8');
	session_start();
	
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	$ID = $_REQUEST['id'];
	
	$Number_of_students	= $_POST['Number_of_students'];			
	$importance	= $_POST['importance'];			
	$purpose	= $_POST['purpose'];			
	$theories	= $_POST['theories'];			
	$Presentation	= $_POST['Presentation'];			
	$scope	= $_POST['scope'];			
	$suggestion	= $_POST['suggestion'];			
	$opinion_teacher	= $_POST['opinion_teacher'];		
	$board_resolution	= $_POST['board_resolution'];		

	//1 = past
	//2 = re-examine
	//3 = non-exams
	//4 = fail
	
	$DeleteCPE04 = mysql_query ("DELETE FROM `SWEN`.`CPE04` WHERE `CPE04`.`ID_project` = '".$ID."'");
	
	if($opinion_teacher == "11" && $board_resolution == "21")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '1', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '9' WHERE  `Project`.`id` = '".$ID."'");
	
	}
	else if($opinion_teacher == "11" && $board_resolution == "22" )
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '2', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '8' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "11" && $board_resolution == "23")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '3', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '7' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "11" && $board_resolution == "20")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		 
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '6' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "12" && $board_resolution == "21")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '2', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '8' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "12" && $board_resolution == "22")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '2', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '8' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "12" && $board_resolution == "23")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '2', CURRENT_TIMESTAMP)");
		 
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '8' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "12" && $board_resolution == "20")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '6' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "13" && $board_resolution == "21")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '3', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '7' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "13" && $board_resolution == "22")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '2', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '8' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "13" && $board_resolution == "23")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '3', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '7' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "13" && $board_resolution == "20")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '6' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "10" && $board_resolution == "21")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '6' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "10" && $board_resolution == "22")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '6' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "10" && $board_resolution == "23")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '6' WHERE  `Project`.`id` = '".$ID."'");
	}
	else if($opinion_teacher == "10" && $board_resolution == "20")
	{
		$insertCPE04 = mysql_query ("INSERT INTO `SWEN`.`CPE04` (`id`, `ID_project`, `evaluate_no1`, `evaluate_no2`, `evaluate_no3`, `evaluate_no4`, `evaluate_no5`, `evaluate_no6`, `suggestion`, `teacher_conclude`, `board_resolution`, `conclude`, `created_at`) 
		VALUES (NULL, '".$ID."', '".$Number_of_students."', '".$importance."', '".$purpose."', '".$theories."', '".$Presentation."', '".$scope."', '".$suggestion."', '".$opinion_teacher."', '".$board_resolution."', '4', CURRENT_TIMESTAMP)");
		
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '6' WHERE  `Project`.`id` = '".$ID."'");
	}

	
	header("location:load_balance.php");	
	
?>
