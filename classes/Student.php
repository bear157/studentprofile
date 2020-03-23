<?php 

class Student {

    private $conn = null; 

    public function __construct($conn) {
        $this->conn = $conn; 
    }

    public function getSingleStudent($stu_id) {
        $sql = "SELECT * FROM tbl_student stu WHERE stu.stu_id = :stu_id"; 
        $query = $this->conn->prepare($sql);
        $query->execute([
            "stu_id" => $stu_id
        ]);  

        return $query->fetch(PDO::FETCH_ASSOC); 
    }

    public function getStudentList() {
        // get only active student 
        $sql = "SELECT stu.*, cls.cls_name FROM tbl_student stu 
                LEFT JOIN tbl_class cls ON stu.cls_id = cls.cls_id 
                WHERE stu.status_id = 1 "; 
        $query = $this->conn->query($sql);
        
        return $query->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function getClassList() {
        $sql = "SELECT * FROM tbl_class cls WHERE cls.status_id = 1"; 
        $query = $this->conn->query($sql);
        
        return $query->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function registerStudent($info) {
        $sql = "INSERT INTO tbl_student (".implode(',', array_keys($info)).") 
            VALUES (:".implode(',:', array_keys($info)).")"; 
        $query = $this->conn->prepare($sql); 
        $query->execute($info); 

        // return inserted stu_id 
        return $this->conn->lastInsertId(); 
    }

    public function updateStudent($stu_id, $info) {
        $sql = "UPDATE tbl_student SET ";
        foreach ($info as $key => $value) {
            $sql .= "$key = :$key,"; 
        }
        $sql = substr($sql, 0, -1);
        $sql .= " WHERE stu_id = :stu_id "; 
echo $sql; 
        $query = $this->conn->prepare($sql); 
        $info["stu_id"] = $stu_id; 
        $query->execute($info); 
    }

    public function deleteStudent($stu_id) {
        $data = array(); 
        $data["status_id"] = 2; 

        $this->updateStudent($stu_id, $data); 
    }

} //--- end class Student ---//


class StudentUI {

    private $stu_class = null; 
    private $stu_id = null; 
    private $stu_info = array(); 
    private $mode = 1; // can refer to tbl_mode

    public function __construct($stu_class) {
        $this->stu_class = $stu_class; 
    }
    
    public function setStudentID($stu_id) {
        $this->stu_id = $stu_id;
        
        // if stu_id not null, then fetch its info  
        if(!is_null($this->stu_id)) {
            $this->stu_info = $this->stu_class->getSingleStudent($this->stu_id); 
        }
    }
    
    public function setMode($mode) {
        $this->mode = $mode;
    }

    public function getStudentSectionElement() {

        $output = array(); 
        switch ($this->mode) {
            //----- register mode -----//
            case 1:
                $output["header"] = "Register Information"; 

                $output["stu_name"] = "<input class='form-control' type='text' name='stu_name' id='stu_name' placeholder=\"Student's Name\" required />"; 
                $output["ic_num"]   = "<input class='form-control' type='text' name='ic_num' id='ic_num' maxlength='12' placeholder=\"IC Number\" num_only required />"; 
                $output["phone_no"] = "<input class='form-control' type='text' name='phone_no' id='phone_no' maxlength='15' placeholder=\"Tel No.\" num_only required />"; 
                $output["gender"]   = $this->getGenderSelectList();
                $output["class"]    = $this->getClassSelectList(); 
                $output["photo_url"] = ""; 

                break;
            //----- edit mode -----//
            case 2:
                $output["header"] = "Student's Information"; 

                $output["stu_name"] = $this->stu_info["stu_name"]; 
                $output["stu_name"] .= " <input type='hidden' name='stu_id' id='stu_id' value='".$this->stu_info["stu_id"]."' />"; 
                $output["ic_num"]  = $this->stu_info["ic_num"]; 

                $output["phone_no"] = "<input class='form-control' type='text' name='phone_no' id='phone_no' value='".$this->stu_info["phone_no"]."' maxlength='15' placeholder=\"Tel No.\" num_only required />"; 

                $output["gender"]   = $this->getGenderSelectList($this->stu_info["gender"]);
                $output["class"]    = $this->getClassSelectList($this->stu_info["cls_id"]); 
                $output["photo_url"] = $this->stu_info["stu_image"]; 

                break;
            //----- view single student mode -----//
            case 3: 
                $output["header"] = "Student's Information"; 

                $output["stu_name"] = $this->stu_info["stu_name"]; 
                $output["ic_num"]   = $this->stu_info["ic_num"]; 
                $output["phone_no"] = $this->stu_info["phone_no"]; 
                $output["gender"]   = $this->getGenderSelectList($this->stu_info["gender"]);
                $output["class"]    = $this->getClassSelectList($this->stu_info["cls_id"]); 
                $output["photo_url"] = $this->stu_info["stu_image"]."?d=".date("YmdHis"); 
                break; 
        } //--- end switch ---//

        return $output; 
    }

    public function getParentSectionElement() {
        
        $output = array(); 
        switch ($this->mode) {
            //----- register mode -----//
            case 1:
                $output["header"] = "Parents' Information"; 

                $output["father_name"] = "<input class='form-control' type='text' name='father_name' id='father_name' placeholder=\"Father's Name\" required />"; 
                $output["father_ic"]   = "<input class='form-control' type='text' name='father_ic' id='father_ic' maxlength='12' placeholder=\"IC Number\" num_only required />"; 

                $output["mother_name"] = "<input class='form-control' type='text' name='mother_name' id='mother_name' placeholder=\"Mother's Name\" required />"; 
                $output["mother_ic"]   = "<input class='form-control' type='text' name='mother_ic' id='mother_ic' maxlength='12' placeholder=\"IC Number\" num_only required />"; 

                break;
            //----- edit mode -----//
            case 2:
                $output["header"] = "Parents' Information"; 

                $output["father_name"] = $this->stu_info["father_name"]; 
                $output["father_ic"]   = $this->stu_info["father_ic"]; 

                $output["mother_name"] = $this->stu_info["mother_name"]; 
                $output["mother_ic"]   = $this->stu_info["mother_ic"]; 

                break;
            //----- view single student mode -----//
            case 3: 
                $output["header"] = "Parents' Information"; 

                $output["father_name"] = $this->stu_info["father_name"]; 
                $output["father_ic"]   = $this->stu_info["father_ic"]; 

                $output["mother_name"] = $this->stu_info["mother_name"]; 
                $output["mother_ic"]   = $this->stu_info["mother_ic"]; 
                break; 
        } //--- end switch ---//

        return $output; 
    }

    public function getEmergencySectionElement() {
        $output = array(); 
        switch ($this->mode) {
            //----- register mode -----//
            case 1:
                $output["header"] = "Emergency Contact Details"; 

                $output["eme_name"]         = "<input class='form-control' type='text' name='eme_name' id='eme_name' placeholder=\"Name\" required />"; 
                $output["eme_relationship"] = "<input class='form-control' type='text' name='eme_relationship' id='eme_relationship' placeholder=\"Relationship\" required /><small>* Ex: Mother / Father / Aunt / Friend</small>"; 
                $output["eme_phone"]        = "<input class='form-control' type='text' name='eme_phone' id='eme_phone' maxlength='15' placeholder=\"Tel No.\" num_only required />"; 

                break;
            //----- edit mode -----//
            case 2:
                $output["header"] = "Emergency Contact Details"; 

                $output["eme_name"] = "<input class='form-control' type='text' name='eme_name' id='eme_name' value='".$this->stu_info["eme_name"]."' placeholder=\"Name\" required />"; 

                $output["eme_relationship"] = "<input class='form-control' type='text' name='eme_relationship' id='eme_relationship' value='".$this->stu_info["eme_relationship"]."' placeholder=\"Relationship\" required /><small>* Ex: Mother / Father / Aunt / Friend</small>"; 

                $output["eme_phone"] = "<input class='form-control' type='text' name='eme_phone' id='eme_phone' value='".$this->stu_info["eme_phone"]."'  maxlength='15' placeholder=\"Tel No.\" num_only required />"; 

                break;
            //----- view single student mode -----//
            case 3:
                $output["header"] = "Emergency Contact Details"; 

                $output["eme_name"]         = $this->stu_info["eme_name"]; 
                $output["eme_relationship"] = $this->stu_info["eme_relationship"]; 
                $output["eme_phone"]        = $this->stu_info["eme_phone"]; 
                break;
        } //--- end switch ---//

        return $output; 
    }

    public function getGenderSelectList($selected_gender = null) {
        if($this->mode == 3 || $this->mode == 2) {
            switch($selected_gender) {
                case 1: $html = "Male"; break;  
                case 2: $html = "Female"; break; 
                case 3: $html = "Other"; break; 
            } //--- end switch ---//
        } else {
            $html = "<select class='form-control' name='gender' id='gender' required>"; 
            $html .= "<option value='' disabled selected>-- Select gender --</option>"; 
            $html .= "<option value='1' ".(($selected_gender == 1) ? "selected" : "").">Male</option>"; 
            $html .= "<option value='2' ".(($selected_gender == 2) ? "selected" : "").">Female</option>"; 
            $html .= "<option value='3' ".(($selected_gender == 3) ? "selected" : "").">Other</option>"; 
            $html .= "</select>"; 
        }
        
        return $html; 
    }

    public function getClassSelectList($selected_cls_id = null) {
        
        $html = "<select class='form-control' name='cls_id' id='cls_id' required>"; 
        $html .= "<option value='' disabled selected>-- Select class --</option>"; 
        $cls_row = $this->stu_class->getClassList(); 
        foreach ($cls_row as $row) {
            $cls_id   = $row["cls_id"]; 
            $cls_name = $row["cls_name"]; 

            $selected = ""; 
            if($selected_cls_id == $cls_id) {
                $selected = "selected"; 
                if($this->mode == 3) 
                    return $cls_name; 
            }
             
            $html .= "<option value='$cls_id' $selected>$cls_name</option>"; 
        } //--- end foreach ---// 
        $html .= "</select>"; 
        return $html; 
    }

    public function getFormSubmitBtn() {
        $output = ""; 
        switch ($this->mode) {
            //----- register mode -----//
            case 1:
                $output = '<button class="btn btn-primary btn_submit" name="submitRegisterBtn" type="submit"><i class="fas fa-check"></i> Register</button>';
                break;
            //----- edit mode -----//
            case 2:
                $output = '<button class="btn btn-primary btn_submit" name="submitUpdateBtn" type="submit"><i class="fas fa-check"></i> Update</button>';
                break;
        } //--- end switch ---//

        return $output; 
    }


} //--- end class Student ---//

?>