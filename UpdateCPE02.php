<?php
	
			include_once dirname(__FILE__) . '/Config.php';
			mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
			mysql_select_db(DB_NAME);
			mysql_query("SET NAMES UTF8");
	
		$ID = $_REQUEST['id'];
		$IDproject = $_REQUEST['idproject'];
		//$ID = 99;
		$query_project = mysql_query ("SELECT * FROM `Project` WHERE id = '".$ID."'");
		$project = mysql_fetch_array($query_project);
		
		
			
			$Update_project = mysql_query ("UPDATE  `SWEN`.`CPE02` SET  `status` =  '2' WHERE  `CPE02`.`id` ='".$ID."'");
			
			//$Update_project_status = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '6' WHERE  `Project`.`id` = '".$IDproject."'");
	
		
		
		$var = array('check'=>true);
		
		echo json_encode($var);	
?>
