<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "project_comsystem";

// Create connection
$conn =  mysql_connect($servername, $username, $password, $dbname) or die(mysql_error());
mysql_query("SET NAMES UTF8");

$project = "INSERT INTO project_comsystem.project (projectID, projectnameTH, projectnameENG)
			VALUES ('" . $_POST["codepr"] . "', '" . $_POST["nameprth"] . "', '" . $_POST["namepren"] . "')";					 
$check = mysql_query($project) or die(mysql_error());					 

if ($check) {
		$name1 = "UPDATE project_comsystem.student SET student.projectID = '" . $_POST["codepr"] . "' 
		WHERE student.studentID = '".$_SESSION['studentID']."' ";			 
		$check1 = mysql_query($name1) or die(mysql_error());					 
		/*if ($check1) {
		header("location:form1.php");
					 } else {
			echo "Error: " . $name1 . "<br>" . $conn->error;
		}*/
		
	if($_POST["codeid2"]== ""){
	//header("location:form1.php");
	}else {
		$name2 = "INSERT INTO project_comsystem.student (projectID, studentID, s_firstname, s_lastname, s_phone, s_email)
		  VALUES ('" . $_POST["codepr"] . "','" . $_POST["codeid2"] . "', '" . $_POST["nameid2"] . "', '" . $_POST["lnameid2"] . "', '" . $_POST["phone2"] . "', '" . $_POST["mail2"] . "')";					 
		$check2 = mysql_query($name2) or die(mysql_error());		
					 
if ($check2) {
	if($_POST["codeid3"]== ""){
	//header("location:form1.php");
	}else {
		$name3 = "INSERT INTO project_comsystem.student (projectID, studentID, s_firstname, s_lastname, s_phone, s_email)
		  VALUES ('" . $_POST["codepr"] . "','" . $_POST["codeid3"] . "', '" . $_POST["nameid3"] . "', '" . $_POST["lnameid3"] . "', '" . $_POST["phone3"] . "', '" . $_POST["mail3"] . "')";					 
		$check3 = mysql_query($name3) or die(mysql_error());

} 
}else {
    echo "Error: " . $name2 . "<br>" . $conn->error;
}

					 
/*if ($check3) {
	header("location:form1.php");
} else {
    echo "Error: " . $name3 . "<br>" . $conn->error;

}*/
}

	/*$teacher1 = "INSERT INTO project_comsystem.teacher_status (projectID, professorID, coprofessorID)
		VALUES ('" . $_POST["codepr"] . "','" . $_POST["pro"] . "', '" . $_POST["copro"] . "')";					 
	$check4 = mysql_query($teacher1) or die(mysql_error());	*/
		
		
			header("location:form1.php");
			}
			else {
    echo "Error: " . $project . "<br>" . $conn->error;
}


mysql_close();
?>