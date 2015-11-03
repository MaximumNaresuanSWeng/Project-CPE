<?php
	
	
	
			include_once dirname(__FILE__) . '/Config.php';
			mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
			mysql_select_db(DB_NAME);
			mysql_query("SET NAMES UTF8");
	
		$ID = $_REQUEST['id'];
		$ID_USER = $_REQUEST['ID_USER'];
		$STATUS = $_REQUEST['status'];
		
		
		
		$select_project = mysql_query ("SELECT * FROM  `Project` WHERE id = '".$ID."' AND (ID_Advisors = '".$ID_USER."' OR ID_Co_Advisors = '".$ID_USER."') ");
		$project = mysql_fetch_array($select_project);
		
		
		
		
		if($project)
		{
			$update_project = mysql_query ("UPDATE  `SWEN`.`CPE03` SET  `Committee1` =  '".$STATUS."' WHERE  `CPE03`.`ID_project` = '".$ID."' ");
			
			$query_CPE03 = mysql_query ("SELECT * FROM `CPE03` WHERE ID_project = '".$ID."' ");
			$dataquery_CPE03 = mysql_fetch_array($query_CPE03);
			
			$sum = $dataquery_CPE03[2] + $dataquery_CPE03[3] + $dataquery_CPE03[4];
			
			if($sum == 3)
			{
				$Update_project_status = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '5' WHERE  `Project`.`id` = '".$ID."'");
			}
		
		}
		else
		{
			$select_project = mysql_query ("SELECT * FROM  `Project` WHERE id = '".$ID."' AND Committee = '".$ID_USER."' ");
			$project = mysql_fetch_array($select_project);
			
			if($project)
			{
				$update_project = mysql_query ("UPDATE  `SWEN`.`CPE03` SET  `Committee2` =  '".$STATUS."' WHERE  `CPE03`.`ID_project` = '".$ID."' ");
				
				$query_CPE03 = mysql_query ("SELECT * FROM `CPE03` WHERE ID_project = '".$ID."' ");
				$dataquery_CPE03 = mysql_fetch_array($query_CPE03);
			
				$sum = $dataquery_CPE03[2] + $dataquery_CPE03[3] + $dataquery_CPE03[4];
			
				if($sum == 3)
				{
					$Update_project_status = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '5' WHERE  `Project`.`id` = '".$ID."'");
				}
				
			}
			else
			{
				$select_project = mysql_query ("SELECT * FROM  `Project` WHERE id = '".$ID."' AND Special_Committee = '".$ID_USER."' ");
				$project = mysql_fetch_array($select_project);
			
				if($project)
				{
					$update_project = mysql_query ("UPDATE  `SWEN`.`CPE03` SET  `Committee3` =  '".$STATUS."' WHERE  `CPE03`.`ID_project` = '".$ID."' ");
					
					$query_CPE03 = mysql_query ("SELECT * FROM `CPE03` WHERE ID_project = '".$ID."' ");
					$dataquery_CPE03 = mysql_fetch_array($query_CPE03);
			
					$sum = $dataquery_CPE03[2] + $dataquery_CPE03[3] + $dataquery_CPE03[4];
			
					if($sum == 3)
					{
						$Update_project_status = mysql_query ("UPDATE  `SWEN`.`Project` SET  `project_status` =  '5' WHERE  `Project`.`id` = '".$ID."'");
					}
					
				}
			}
		}
		
		
		
		//$var = array('check'=>true);
		
		//echo json_encode($var);	
?>
