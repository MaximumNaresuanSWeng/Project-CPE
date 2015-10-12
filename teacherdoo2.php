<?php
	session_start();
	if($_SESSION['userID'] == "")
	{
		echo "Please Login!";
		exit();
	}

	mysql_connect("localhost","root","1234");
	mysql_select_db("project_comsystem");
	mysql_query("SET NAME UTF8");
	mysql_query("SET character_set_results='UTF8'");
	
	$strSQLproject = "SELECT * FROM project"; //WHERE teacherID = '".$_SESSION['userID']."' ";
	$objQueryproject = mysql_query($strSQLproject);
	$objResultproject = mysql_fetch_array($objQueryproject);
	
	$strSQLteacher = "SELECT * FROM teacher_detail WHERE teacherID = '".$_SESSION['userID']."' ";
	$objQueryteacher = mysql_query($strSQLteacher);
	$objResultteacher = mysql_fetch_array($objQueryteacher);
	
	$strSQLteacherstatus = "SELECT * FROM teacher_status";// WHERE teacherID = '".$_SESSION['userID']."' ";
	$objQueryteacherstatus = mysql_query($strSQLteacherstatus);
	$objResultteacherstatus = mysql_fetch_array($objQueryteacherstatus);

	$strSQLstudent = "SELECT * FROM student";// WHERE studentID = '".$_SESSION['userID']."' ";
	$objQuerystudent = mysql_query($strSQLstudent);
	$objResultstudent = mysql_fetch_array($objQuerystudent);

?>

<!DOCTYPE html>
<html>
<head>
<!--<style>
table, th, td {
     border: 1px solid black;
}
</style>-->
<meta charset="utf-8" />
		<link rel="stylesheet" href="main.css" />
		<STYLE>
			A:link { color: #F7B810; text-decoration:none}
			A:visited {color: #F7B810; text-decoration: none}
			A:hover {color: #F7B810}
		</STYLE>
</head>

<body>
<div id = "panelheader">
	</div>
	
		<div id = "paneltab">
		
		<div id = "paneltag1">
		<a href = "home.php"><center><h1>Home</h1></center></a>
		</div>
		
		<div id = "paneltag2">
		<a href = "projectchooseteacher.php"><center><h1>Project</h1></center></a>
		</div>
		
		<div id = "paneltag3">
		<a href = "about.php"><center><h1>About</h1></center></a>
		</div>
		
		<div id = "paneltag4">
		<a href = "logout.php"><center><h1>Logout</h1></center></a>
		</div>
	</div>
	
	<div id = "panelbody">
		<div><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สวัสดีคุณ&nbsp;&nbsp;</i>
		
	<?php 	
		
		if($_SESSION['userID'] == $objResultteacher["teacherID"]){
				echo $objResultteacher["t_firstname"];
				echo "&nbsp;&nbsp;";
				echo $objResultteacher["t_lastname"];
				echo "&nbsp;";
				echo "<อาจารย์>";
				}
		else{
				echo $objResultstudent["s_firstname"];
				echo "&nbsp;&nbsp;";
				echo $objResultstudent["s_lastname"];
				echo "&nbsp;";
				echo "<นักเรียน>";
				}
		session_write_close();
		?>
		</div>
		
	<center>
	<br><br><br>
	
<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "project_comsystem";

	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
	$conn->query("set names utf8");
	
	if($_SESSION['teacherID'] == $objResultteacherstatus['professorID']){
		echo "Professor";
		echo "<br><br>";
		
	$sql = "SELECT projectID, projectnameTH, projectnameENG 
		FROM project 
		ORDER BY projectID";
		
	$sql2 = "SELECT * FROM teacher_status";
	
	$result = $conn->query($sql);
	
	$result2 = $conn->query($sql2);
	

	
	if ($result->num_rows > 0) {
     echo "<table>
	 <tr><th>ProjectID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 </th><th>NameThai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 </th><th>NameEnglish&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 </th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr>
		 <td><center>" . $row["projectID"]. "</center></td>
		 <td><center>" . $row["projectnameTH"]. "</center></td>
		 <td><center>" . $row["projectnameENG"]. "</center></td>
			</tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}
	$conn->close();		
	}
	/*else if($_SESSION['teacherID'] ==  $objResultteacherstatus['professorID']){
		echo "co";
	}else if($_SESSION['teacherID'] ==  $objResultteacherstatus['professorID']){
		echo "com";
	}

	
$sql = "SELECT projectID, projectnameTH, projectnameENG 
		FROM project 
		ORDER BY projectID";	
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<table>
	 <tr><th>ProjectID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 </th><th>NameThai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 </th><th>NameEnglish&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 </th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr>
		 <td><center>" . $row["IDProject"]. "</center></td>
		 <td><center>" . $row["NameTH"]. "</center></td>
		 <td><center>" . $row["NameENG"]. "</center></td>
			</tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}
$conn->close();	*/
?>  
	</center>
	</div>
	
	<center>
	@copyright SuperStar<br>
	เป็นส่วนหนึ่งของรายวิชา 305351 Computer System Engineering<br>
	ภาคการศึกษาที่ 2 ปีการศึกษา 2557
	</center>
	

</body>
</html>