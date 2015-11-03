<?php
	//header('Content-type: text/plain; charset=utf-8');
	session_start();
	
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	$ID = $_REQUEST['id'];
		
	$Special_Committee	= $_POST['Special_Committee'];			
		
	
	
	//$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `Special_Committee` =  '".$Special_Committee."' WHERE  `Project`.`id` = '".$ID."'");
	
	$UpdateProject = mysql_query ("UPDATE  `SWEN`.`Project` SET  `Special_Committee` =  '".$Special_Committee."' WHERE  `Project`.`id` = '".$ID."'");   
	
	header("location:load_balance.php");	
	
?>
