<?php
	header('Content-type: text/plain; charset=utf-8');
	session_start();
	
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	
	$name_projectTH	= $_POST['name_projectTH'];			
	$name_projectEN	= $_POST['name_projectEN'];			
	$ID_USER1	= $_POST['ID_USER1'];			
	$ID_USER2	= $_POST['ID_USER2'];			
	$ID_USER3	= $_POST['ID_USER3'];			
	$Advisors	= $_POST['Advisors'];			
	$Co_Advisors	= $_POST['Co_Advisors'];			
	$Committee	= $_POST['Committee'];			
	

	
	
	$deleteProject = mysql_query ("DELETE FROM `SWEN`.`Project` WHERE `Project`.`id` = '".$_SESSION["ID_project"]."'");
	
	
	if($ID_USER2 != "" && $ID_USER3 != "")
	{
		
		$INSERTdata = mysql_query ("INSERT INTO `SWEN`.`Project` (`id`, `name_projectTH`, `name_projectEN`, `ID_Student1`, `ID_Student2`, `ID_Student3`, `project_status`, `ID_Advisors`, `ID_Co_Advisors`, `Committee`, `created_at`) 
		VALUES (NULL, '".$name_projectTH."', '".$name_projectEN."', '".$ID_USER1."', '".$ID_USER2."', '".$ID_USER3."', '1', '".$Advisors."', '".$Co_Advisors."', '".$Committee."', CURRENT_TIMESTAMP)");
		
		$getMAX = mysql_query ("SELECT MAX(id) FROM Project");
		
		$MAX = mysql_fetch_array($getMAX);
		
		$updateID1 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$MAX[0]."' WHERE  `USER`.`ID_USER` = '".$ID_USER1."'");
		$updateID2 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$MAX[0]."' WHERE  `USER`.`ID_USER` = '".$ID_USER2."'");
		$updateID3 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$MAX[0]."' WHERE  `USER`.`ID_USER` = '".$ID_USER3."'");
	
		$_SESSION["ID_project"] = $MAX[0];
		
	
	
	}
	else if($ID_USER2 != "" && $ID_USER3 == "")
	{
		
		$INSERTdata = mysql_query ("INSERT INTO `SWEN`.`Project` (`id`, `name_projectTH`, `name_projectEN`, `ID_Student1`, `ID_Student2`, `ID_Student3`, `project_status`, `ID_Advisors`, `ID_Co_Advisors`, `Committee`, `created_at`) 
		VALUES (NULL, '".$name_projectTH."', '".$name_projectEN."', '".$ID_USER1."', '".$ID_USER2."', '', '1', '".$Advisors."', '".$Co_Advisors."', '".$Committee."', CURRENT_TIMESTAMP)");
		
		$getMAX = mysql_query ("SELECT MAX(id) FROM Project");
		
		$MAX = mysql_fetch_array($getMAX);
		
		$updateID1 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$MAX[0]."' WHERE  `USER`.`ID_USER` = '".$ID_USER1."'");
		$updateID2 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$MAX[0]."' WHERE  `USER`.`ID_USER` = '".$ID_USER2."'");
	
		$_SESSION["ID_project"] = $MAX[0];
		
		
	}
	else if($ID_USER2 == "" && $ID_USER3 != "")
	{
		
		$INSERTdata = mysql_query ("INSERT INTO `SWEN`.`Project` (`id`, `name_projectTH`, `name_projectEN`, `ID_Student1`, `ID_Student2`, `ID_Student3`, `project_status`, `ID_Advisors`, `ID_Co_Advisors`, `Committee`, `created_at`) 
		VALUES (NULL, '".$name_projectTH."', '".$name_projectEN."', '".$ID_USER1."', '".$ID_USER3."', '', '1', '".$Advisors."', '".$Co_Advisors."', '".$Committee."', CURRENT_TIMESTAMP)");
		
		$getMAX = mysql_query ("SELECT MAX(id) FROM Project");
		
		$MAX = mysql_fetch_array($getMAX);
		
		$updateID1 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$MAX[0]."' WHERE  `USER`.`ID_USER` = '".$ID_USER1."'");
		$updateID3 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$MAX[0]."' WHERE  `USER`.`ID_USER` = '".$ID_USER3."'");
	
		$_SESSION["ID_project"] = $MAX[0];
		
		
	}
	else
	{
		
		$INSERTdata = mysql_query ("INSERT INTO `SWEN`.`Project` (`id`, `name_projectTH`, `name_projectEN`, `ID_Student1`, `ID_Student2`, `ID_Student3`, `project_status`, `ID_Advisors`, `ID_Co_Advisors`, `Committee`,`Special_Committee` , `created_at`) 
		VALUES (NULL, '".$name_projectTH."', '".$name_projectEN."', '".$ID_USER1."', '', '', '1', '".$Advisors."', '".$Co_Advisors."', '".$Committee."','', CURRENT_TIMESTAMP)");
		
		
		$getMAX = mysql_query ("SELECT MAX(id) FROM Project");
		
		$MAX = mysql_fetch_array($getMAX);
		
		$updateID1 = mysql_query ("UPDATE  `SWEN`.`USER` SET  `ID_project` =  '".$MAX[0]."' WHERE  `USER`.`ID_USER` = '".$ID_USER1."'");
		
	
		$_SESSION["ID_project"] = $MAX[0];
		
		
	}
	
	
	

	
	header("location:load_balance.php");	
	
?>
