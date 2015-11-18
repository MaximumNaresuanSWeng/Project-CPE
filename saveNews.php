<?php
	header('Content-type: text/plain; charset=utf-8');
	session_start();
	
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	
	$titleNews	= $_POST['titleNews'];			
	$NewsHome	= $_POST['NewsHome'];	
	
	if($titleNews != "" && $NewsHome != "")
	{
		$insertNews = mysql_query ("INSERT INTO `SWEN`.`NewsHome` (`id`, `title`, `news`, `created_at`) 
		VALUES (NULL, '".$titleNews."', '".$NewsHome."', CURRENT_TIMESTAMP)");

	}
	

	header("location:load_balance.php");	
	
?>