<?php
	session_start();
	
	session_destroy();

	
	header("location:load_balance.php");
		
?>
