<?php

	header('Content-type: text/plain; charset=utf-8');
	session_start();
	
	$ID = $_REQUEST['id'];
	//$ID = "55361281";
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	$query_Student_USER = mysql_query ("SELECT * FROM `USER` WHERE ID_USER = '".$ID."' ");
	$Student_USER = mysql_fetch_array($query_Student_USER);
	

	
	$var = array('emtry'=>$emtry,'email'=>$Student_USER[2],'firstnameTH'=>$Student_USER[4],'lastnameTH'=>$Student_USER[5],'firstnameEN'=>$Student_USER[6],'lastnameEN'=>$Student_USER[7],'ID_USER'=>$Student_USER[8],'phone_number'=>$Student_USER[9],'ID_project'=>$Student_USER[10]);
	
	echo json_encode($var);	
	

	
?>

