<?php 
date_default_timezone_set('Asia/Kuala_Lumpur'); 

define('DEBUG', true);
error_reporting(E_ALL);
ini_set('display_errors', DEBUG ? 'On' : 'Off');

// load all classes
if(is_dir("../classes")) {
    spl_autoload_register(function ($class) {
        include "../classes/" . $class . ".php";
    });
} else {
    spl_autoload_register(function ($class) {
        include "classes/" . $class . ".php";
    });
}


// db connection
$db   = new Database(); // database object
$conn = $db->getConn(); // database connection

// student class
$stu_class = new Student($conn); 
$stu_ui    = new StudentUI($stu_class); 

?>