<?php
	header('Content-type: text/plain; charset=utf-8');
		include_once dirname(__FILE__) . '/Config.php';
		mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
		mysql_select_db(DB_NAME);
		mysql_query("SET NAMES UTF8");
		
		//echo "1 ".$_REQUEST["id"]."\n";
		//echo "2 ".$_POST["subject0"]."\n";
		//echo "3 ".$_POST["subject1"]."\n";
		//echo "4 ".$_POST["subject2"]."\n";
		//echo "5 ".$_POST["subject3"]."\n";
		
		
		
			$Update_project = mysql_query ("UPDATE `SWEN`.`CPE02` SET `date` = '".$_POST["subject0"]."', `works` = '".$_POST["subject1"]."', `summary` = '".$_POST["subject2"]."', `Notes` = '".$_POST["subject3"]."' WHERE `CPE02`.`id` = '".$_REQUEST["id"]."'");
			
			//$Update_project_status = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '6' WHERE  `Project`.`id` = '".$IDproject."'");
	
		
		header("location:ViewCPE02.php");
		
?>
