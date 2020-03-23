<?php 
include_once 'includes/config.php'; 

$page_title  = "Student's Information"; 
$page_header = "Student's Information"; 
$nav_active  = "list"; 

if(empty($_GET["stu_id"])) {
    header("Location: index.php"); 
}

include_once 'includes/header.php'; 
?>
<div class="container-fluid">
    <?php 
        include_once 'includes/sidebar.php'; 

        $stu_id = $_GET["stu_id"]; 
        $mode   = 3; // view single student mode
        $stu_ui->setStudentID($stu_id); 
        $stu_ui->setMode($mode); // view single student mode; the param value can refer to tbl_mode 
        include_once 'views/stu_form.php'; 
    ?>

</div>

<?php include_once 'includes/footer.php'; ?>