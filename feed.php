<?php
header('Content-type: application/json');
$ID = $_REQUEST['id'];
$var = array('code'=>$ID,'field1'=>100,'field2'=>200,'field3'=>300,'field4'=>400,'field5'=>500,'field6'=>600,'field7'=>700,'field8'=>250);
echo json_encode($var);
?>