<?php
	
			include_once dirname(__FILE__) . '/Config.php';
			mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
			mysql_select_db(DB_NAME);
			mysql_query("SET NAMES UTF8");
	
		$ID = $_REQUEST['id'];
		$status = $_REQUEST['status'];
		
		$Update_project = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '".$status."' WHERE  `Project`.`id` = '".$ID."'");
		
		$var = array('check'=>true);
		
		echo json_encode($var);	
?>
