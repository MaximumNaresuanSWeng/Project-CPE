<?php
	header('Content-type: text/plain; charset=utf-8');
	
	session_start();

	$user		= $_POST['user'];	
	$password		= $_POST['password'];	
	
	
	
	
	
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	
	$query = mysql_query ("SELECT * FROM `USER` WHERE (username = '".$user."' OR email = '".$email."')AND password = '".$password."'");
		
	$query1 = mysql_fetch_array($query);
	
	if($query1)
	{
		$_SESSION["id"] = $query1[0];
		$_SESSION["email"] = $query1[2];
		$_SESSION["firstnameTH"] = $query1[4];
		$_SESSION["lastnameTH"] = $query1[5];
		$_SESSION["firstnameEN"] = $query1[6];
		$_SESSION["lastnameEN"] = $query1[7];
		$_SESSION["ID_USER"] = $query1[8];
		$_SESSION["phone_number"] = $query1[9];
		$_SESSION["ID_project"] = $query1[10];
		$_SESSION["status"] = $query1[11];
		$_SESSION["login_state"] = "true";
		
	
		
		session_write_close();
		header("location:load_balance.php");
		
	}
	else
	{	
		
		session_write_close();
		header("location:login.php?check=false");
	}
	
	
?>
