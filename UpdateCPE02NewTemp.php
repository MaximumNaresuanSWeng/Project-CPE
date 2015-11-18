<?php  		
	include_once dirname(__FILE__) . '/Config.php';
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES UTF8");
	
	//header('Content-type: text/plain; charset=utf-8');
	
	$query_Error = mysql_query ("SELECT * FROM `Error` WHERE 1");
	mysql_set_charset('utf8',$$query_Error );
	
		$data = 0;
		$Error = mysql_fetch_array($query_Error);
?>

<?php echo $Error[1];?>