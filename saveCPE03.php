<?php
	//header('Content-type: text/plain; charset=utf-8');
	session_start();
	
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	
		
	$works	= $_POST['works'];			
		
		
	$DeleteCPE03 = mysql_query ("DELETE FROM `SWEN`.`CPE03` WHERE `CPE03`.`ID_project` = '".$_SESSION["ID_project"]."'");
	
	$insertCPE03 = mysql_query ("INSERT INTO `SWEN`.`CPE03` (`id`, `scope_project`, `Committee1`, `Committee2`, `Committee3`, `ID_project`, `created_at`) 
	VALUES (NULL, '".$works."', '', '', '', '".$_SESSION["ID_project"]."', CURRENT_TIMESTAMP)");
	
	$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '4' WHERE  `Project`.`id` = '".$_SESSION["ID_project"]."'");
	
	
	
	header("location:load_balance.php");	
	
?>
