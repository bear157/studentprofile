<?php 
include_once 'includes/config.php'; 

$page_title  = "Student Registration"; 
$page_header = "Student Registration"; 
$nav_active  = "index"; 

include_once 'includes/header.php'; 
?>
<div class="container-fluid">
    <?php 
        include_once 'includes/sidebar.php'; 

        $stu_id = null; 
        $mode   = 1; // register mode
        $stu_ui->setStudentID($stu_id); 
        $stu_ui->setMode($mode); // register mode; the param value can refer to tbl_mode 
        include_once 'views/stu_form.php'; 
    ?>

</div>

<?php include_once 'includes/footer.php'; ?>