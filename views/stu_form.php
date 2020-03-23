<?php 
// get element of student section
$stu_section = $stu_ui->getStudentSectionElement(); 
// get element of parents section
$par_section = $stu_ui->getParentSectionElement(); 
// get element of student section
$eme_section = $stu_ui->getEmergencySectionElement(); 

// get submit button 
$btn_submit = $stu_ui->getFormSubmitBtn(); 
// view mode setting 
$onsubmit      = ($mode == 3) ? "return false;" : "return confirmSubmitForm();"; 
$form_disabled = ($mode == 3) ? "disabled" : ""; 
$btn_hide      = ($mode == 3) ? "d-none" : ""; 
?>
<div class="col-12 col-sm-10 offset-sm-2 py-3 content-box">
<form method="POST" action="stu_form_submit.php" enctype="multipart/form-data" onsubmit="<?= $onsubmit; ?>">
<fieldset <?= $form_disabled; ?>>
    <input type="hidden" name="mode" id="mode" value="<?= $mode; ?>" />

    <h3 class="page_header"><?= $page_header; ?></h3>

    <hr>

    <h5 class="seciton_header text-primary"><i class="fas fa-user text-dark"></i> <?= $stu_section["header"]; ?></h5>

    <hr class="border-dark">

    <table class="table table-borderless table-sm">
        <tr class="row no-gutters">
            <td class="col-12 col-sm-6">
                <table class="table table-sm mb-0">
                    <tr class="row no-gutters">
                        <th class="col-12 col-sm-4"><label for="stu_name">Name: </label></th>
                        <td class="col-12 col-sm-8"><?= $stu_section["stu_name"]; ?></td>
                    </tr>

                    <tr class="row no-gutters">
                        <th class="col-12 col-sm-4"><label for="ic_num">IC Number: </label></th>
                        <td class="col-12 col-sm-8"><?= $stu_section["ic_num"]; ?></td>
                    </tr>

                    <tr class="row no-gutters">
                        <th class="col-12 col-sm-4"><label for="phone_no">Tel No.: </label></th>
                        <td class="col-12 col-sm-8"><?= $stu_section["phone_no"]; ?></td>
                    </tr>

                    <tr class="row no-gutters">
                        <th class="col-12 col-sm-4"><label for="gender">Gender: </label></th>
                        <td class="col-12 col-sm-8"><?= $stu_section["gender"]; ?></td>
                    </tr>

                    <tr class="row no-gutters">
                        <th class="col-12 col-sm-4"><label for="cls_id">Class: </label></th>
                        <td class="col-12 col-sm-8"><?= $stu_section["class"]; ?></td>
                    </tr>
                </table>
            </td>

            <td class="col-12 col-sm-6">
                <table class="table table-sm mb-0">
                    <tr class="row no-gutters">
                        <th class="col-12 col-sm-3 pr-3">
                            <label class="text-left d-block d-sm-none" for="photo">Photo: </label>
                            <label class="text-right d-none d-sm-block" for="photo">Photo: </label>
                        </th>
                        <td class="col-12 col-sm-4 pr-3">
                            <div class="border" style="min-height: 150px;">
                                <img id="preview" src="<?= $stu_section["photo_url"]; ?>" />
                            </div>
                        </td>
                        <td class="col-12 col-sm-4">
                            <button class="btn btn-sm btn-secondary <?= $btn_hide; ?>" type="button" onclick="$('#photo').click();">Select File</button>
                            <input class="form-control d-none" type="file" name="photo" id="photo" accept="image/*" onchange="readURL(this);" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <hr>

    <h5 class="seciton_header text-primary"><i class="fas fa-user text-dark"></i> <?= $par_section["header"]; ?></h5>

    <hr class="border-dark">
    
    <table class="table table-borderless table-sm">
        <tr class="row no-gutters">
            <td class="col-12 col-sm-6">
                <table class="table table-sm mb-0">
                    <tr class="row no-gutters">
                        <th class="col-12 col-sm-4"><label for="father_name">Father's Name: </label></th>
                        <td class="col-12 col-sm-7"><?= $par_section["father_name"]; ?></td>
                    </tr>

                    <tr class="row no-gutters">
                        <th class="col-12 col-sm-4"><label for="father_ic">Father's IC: </label></th>
                        <td class="col-12 col-sm-7"><?= $par_section["father_ic"]; ?></td>
                    </tr>
                </table>
            </td>

            <td class="col-12 col-sm-6">
                <table class="table table-sm mb-0">
                    <tr class="row no-gutters">
                        <th class="col-12 col-sm-4"><label for="mother_name">Mother's Name: </label></th>
                        <td class="col-12 col-sm-7"><?= $par_section["mother_name"]; ?></td>
                    </tr>

                    <tr class="row no-gutters">
                        <th class="col-12 col-sm-4"><label for="mother_ic">Mother's IC: </label></th>
                        <td class="col-12 col-sm-7"><?= $par_section["mother_ic"]; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <hr>

    <h5 class="seciton_header text-primary"><i class="fas fa-user text-dark"></i> <?= $eme_section["header"]; ?></h5>

    <hr class="border-dark">
    
    <table class="table table-sm table-borderless">
        <tr class="row no-gutters">
            <td class="col-12 col-sm-4 p-0">
                <table class="table table-sm mb-0">
                    <tr class="table-secondary">
                        <th class="border border-dark"><label for="eme_name">Name: </label></th>
                    </tr>
                    <tr>
                        <td class="border border-dark"><?= $eme_section["eme_name"]; ?><br></td>
                    </tr>
                </table>
            </td>

            <td class="col-12 col-sm-4 p-0">
                <table class="table table-sm mb-0">
                    <tr class="table-secondary">
                        <th class="border border-dark"><label for="eme_relationship">Relationship: </label></th>
                    </tr>
                    <tr>
                        <td class="border border-dark"><?= $eme_section["eme_relationship"]; ?></td>
                    </tr>
                </table>
            </td>

            <td class="col-12 col-sm-4 p-0">
                <table class="table table-sm mb-0">
                    <tr class="table-secondary">
                        <th class="border border-dark"><label for="eme_phone">Tel No.: </label></th>
                    </tr>
                    <tr>
                        <td class="border border-dark"><?= $eme_section["eme_phone"]; ?><br></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <hr>

    <?= $btn_submit; ?>
</fieldset>
</form>
</div>