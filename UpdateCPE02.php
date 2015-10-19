<?php
	
			include_once dirname(__FILE__) . '/Config.php';
			mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
			mysql_select_db(DB_NAME);
			mysql_query("SET NAMES UTF8");
	
		$ID = $_REQUEST['id'];
		//$ID = 99;
		
		
		$Update_project = mysql_query ("UPDATE  `SWEN`.`CPE02` SET  `status` =  '2' WHERE  `CPE02`.`id` ='".$ID."';");
		$project = mysql_fetch_array($Update_project);
		
		$var = array('check'=>true);
		
		echo json_encode($var);	
?>
