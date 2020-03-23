<?php 
include_once 'includes/config.php'; 

$page_title  = "Student List"; 
$page_header = "Student List"; 
$nav_active  = "list"; 

include_once 'includes/header.php'; 
?>
<div class="container-fluid">
    <?php 
        include_once 'includes/sidebar.php'; 

        $stu_id = null; 
        $mode   = 4; // view single student mode
        $stu_ui->setStudentID($stu_id); 
        $stu_ui->setMode($mode); // view single student mode; the param value can refer to tbl_mode 
        // include_once 'views/stu_form.php'; 
    ?>
    <div class="col-12 col-sm-10 offset-sm-2 py-3 content-box">

        <h3 class="page_header"><?= $page_header; ?></h3>

        <hr>

        <table class="table table-sm table-bordered" id="list">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $stu_row = $stu_class->getStudentList(); 
                foreach ($stu_row as $key => $row) {
                    $stu_id   = $row["stu_id"]; 
                    $stu_name = $row["stu_name"]; 
                    $cls_name = $row["cls_name"]; 

                    $action   = "<a class='mr-2' href='/studentprofile/view.php?stu_id={$stu_id}' data-toggle='tooltip' title='View'><i class='fas fa-info-circle'></i></a> "; // view 
                    $action   .= "<a class='mr-2' href='/studentprofile/edit.php?stu_id={$stu_id}' data-toggle='tooltip' title='Edit'><i class='fas fa-pen-square'></i></a> "; // edit 
                    $action   .= "<a class='mr-2' href='javascript:void(0);' data-toggle='tooltip' title='Delete' onclick='confirmDeleteStudent({$stu_id});'><i class='fas fa-trash-alt'></i></a> "; // delete 

                    ?>

                    <tr>
                        <td><?= ++$key; ?></td>
                        <td><?= $stu_name; ?></td>
                        <td><?= $cls_name; ?></td>
                        <td><?= $action; ?></td>
                    </tr>

                    <?php
                } //--- end foreach ---//
                
            ?>
            </tbody>
        </table>

    </div>
</div>

<?php include_once 'includes/footer.php'; ?>