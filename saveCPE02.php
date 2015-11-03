<?php
	//header('Content-type: text/plain; charset=utf-8');
	session_start();
	
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	
	$date	= $_POST['date'];			
	$works	= $_POST['works'];			
	$summary	= $_POST['summary'];			
	$Notes	= $_POST['Notes'];		

		$query_project = mysql_query ("SELECT * FROM `Project` WHERE id = '".$_SESSION["ID_project"]."'");
		$project = mysql_fetch_array($query_project);
		
		if($project[6]>=3)
		{
			$insertCPE02 = mysql_query ("INSERT INTO `SWEN`.`CPE02` (`id`, `date`, `works`, `summary`, `Notes`, `ID_project`,`status`, `created_at`) 
			VALUES (NULL, '".$date."', '".$works."', '".$summary."', '".$Notes."', '".$_SESSION["ID_project"]."','1', CURRENT_TIMESTAMP)");
	
		}
		else
		{
			//$Update_project = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '3' WHERE  `Project`.`id` = '".$_SESSION["ID_project"]."'");
	
			$insertCPE02 = mysql_query ("INSERT INTO `SWEN`.`CPE02` (`id`, `date`, `works`, `summary`, `Notes`, `ID_project`,`status`, `created_at`) 
			VALUES (NULL, '".$date."', '".$works."', '".$summary."', '".$Notes."', '".$_SESSION["ID_project"]."','1', CURRENT_TIMESTAMP)");
	
		}
		
	
	//$Update_project = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '3' WHERE  `Project`.`id` = '".$_SESSION["ID_project"]."'");
	
	
	header("location:load_balance.php");	
	
?>
