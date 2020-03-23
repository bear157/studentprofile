<?php 
include_once '../includes/config.php'; 
 

$stu_id = $_POST["stu_id"]; 

// delete action 
$stu_class->deleteStudent($stu_id); 


$db->closeConn(); 
?>