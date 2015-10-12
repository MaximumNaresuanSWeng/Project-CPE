<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "project_comsystem";

// Create connection
$conn =  mysql_connect($servername, $username, $password, $dbname) or die(mysql_error());
mysql_query("SET NAMES UTF8");


$project = "INSERT INTO project_comsystem.cpe02 (projectID)
			VALUES ('".$_SESSION['cpe02']."')";					 
$check0 = mysql_query($project) or die(mysql_error());	
				 
if ($check0) {		
			$detail = "INSERT INTO project_comsystem.cpe02_detail (projectID, work_title, work_flow, work_note)
			VALUES ('".$_SESSION['cpe02']."', '" . $_POST["title"] . "', '" . $_POST["conclude"] . "', '" . $_POST["note"] . "')";					 
			$check = mysql_query($detail) or die(mysql_error());	


			header("location:form2.php");
			}
			else {
    echo "Error: " . $project . "<br>" . $conn->error;
}


				 

/*if ($check) {		
			header("location:form1.php");
			}
			else {
    echo "Error: " . $project . "<br>" . $conn->error;
}*/


mysql_close();
?>