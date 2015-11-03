<?php
		include_once dirname(__FILE__) . '/Config.php';
		mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
		mysql_select_db(DB_NAME);
		mysql_query("SET NAMES UTF8");
		echo "Hello";
?>
