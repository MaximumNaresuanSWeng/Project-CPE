<?php
	//header('Content-type: text/plain; charset=utf-8');
	session_start();
	
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
		$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '9' WHERE  `Project`.`id` = '".$_SESSION["ID_project"]."'");
	
?>
