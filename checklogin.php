<?php
	session_start();
	mysql_connect("localhost","root","1234");
	mysql_select_db("project_comsystem");
	
	$strSQL = "SELECT * FROM users_login WHERE userID = '".mysql_real_escape_string($_POST['txtUsername'])."' 
	and Password = '".mysql_real_escape_string($_POST['txtPassword'])."'";
	$objQueryuser = mysql_query($strSQL);
	$objResultuser = mysql_fetch_array($objQueryuser);
	
	$getnameteacher = "select * from teacher_detail";
	$objQueryteacher = mysql_query($getnameteacher);
	$objResultteacher = mysql_fetch_array($objQueryteacher);
	
	$getnamestudent = "select * from student";
	$objQuerystudent = mysql_query($getnamestudent);
	$objResultstudent = mysql_fetch_array($objQuerystudent);
	
	if(!$objResultuser)
	{
			echo "Username and Password Incorrect!";
	}else
	{
			$_SESSION["userID"] = $objResultuser["userID"];
			$_SESSION["teacherID"] = $objResultuser["userID"];
			$_SESSION["studentID"] = $objResultuser["userID"];
			if($objResultuser["userID"] == $objResultteacher["teacherID"])
			{
				header("location:home.php");
			}
			else
			{
				header("location:home.php");
			}
	}
	session_write_close();
	mysql_close();
?>