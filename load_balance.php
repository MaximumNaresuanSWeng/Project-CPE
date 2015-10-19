<?php
	//header('Content-type: text/plain; charset=utf-8');

		session_start();
		
		
		if (isset($_SESSION["login_state"]))
		{
			
			if($_SESSION["status"] == "student")
			{
				header("location:Detail_student.php");
			}
			else if($_SESSION["status"] == "teacher")
			{
				header("location:Detail_teacher.php");
			}
			else if($_SESSION["status"] == "Admin")
			{
				header("location:Detail_Admin.php");
			}
			
		}
		else
		{
			session_destroy();
			header("location:index.php");
		}
		
		
		
?>