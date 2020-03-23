<?php 
include_once 'includes/config.php'; 


if(isset($_POST["submitRegisterBtn"])) {

    $data = array(); 
    
    $data["stu_name"]           = $_POST["stu_name"]; 
    $data["ic_num"]             = $_POST["ic_num"]; 
    $data["phone_no"]           = $_POST["phone_no"]; 
    $data["gender"]             = $_POST["gender"]; 
    $data["cls_id"]             = $_POST["cls_id"]; 
    $data["father_name"]        = $_POST["father_name"]; 
    $data["father_ic"]          = $_POST["father_ic"]; 
    $data["mother_name"]        = $_POST["mother_name"]; 
    $data["mother_ic"]          = $_POST["mother_ic"]; 
    $data["eme_name"]           = $_POST["eme_name"]; 
    $data["eme_relationship"]   = $_POST["eme_relationship"]; 
    $data["eme_phone"]          = $_POST["eme_phone"]; 

    // insert
    $stu_id = $stu_class->registerStudent($data); 

    if(!empty($_FILES["photo"]["name"])) {
        $stu_image = $_FILES["photo"]["name"]; 
        $file_basename = substr($stu_image, 0,strripos($stu_image, '.'));
        $file_ext = substr($stu_image, strripos($stu_image, '.'));
        //rename file
        $newfilename="student-".$stu_id.$file_ext;
        //upload location
        $location="media/images/".$newfilename;

        // update image location 
        $image_info["stu_image"] = $location; 
        $stu_class->updateStudent($stu_id, $image_info); 

        move_uploaded_file($_FILES["photo"]['tmp_name'], "$location"); 

    }

    header("Location: view.php?stu_id={$stu_id}"); 

} else if(isset($_POST["submitUpdateBtn"])) {

    $stu_id = $_POST["stu_id"]; 

    $data = array(); 
    
    $data["phone_no"]           =     $_POST["phone_no"]; 
    $data["cls_id"]             =     $_POST["cls_id"]; 
    $data["eme_name"]           =     $_POST["eme_name"]; 
    $data["eme_relationship"]   =     $_POST["eme_relationship"]; 
    $data["eme_phone"]          =     $_POST["eme_phone"]; 

    // update
    $stu_class->updateStudent($stu_id, $data); 

    if(!empty($_FILES["photo"]["name"])) {
        $stu_image = $_FILES["photo"]["name"]; 
        $file_basename = substr($stu_image, 0,strripos($stu_image, '.'));
        $file_ext = substr($stu_image, strripos($stu_image, '.'));
        //rename file
        $newfilename="student-".$stu_id.$file_ext;
        //upload location
        $location="media/images/".$newfilename;

        // update image location 
        $image_info["stu_image"] = $location; 
        $stu_class->updateStudent($stu_id, $image_info); 

        move_uploaded_file($_FILES["photo"]['tmp_name'], "$location"); 

    }

    header("Location: view.php?stu_id={$stu_id}"); 

}

$db->closeConn(); 
?>