$(function() {
    // not allow character except number 
    $("input[num_only]").on("keypress", function(event) {
        switch(Number(event.key)) {
            case 0: 
            case 1: 
            case 2: 
            case 3: 
            case 4: 
            case 5: 
            case 6: 
            case 7: 
            case 8: 
            case 9: return true; break
            default: return false; break; 
        }//--- end switch ---//
    });

    $("input[num_only]").on("paste", function(e){
        // access the clipboard using the api
        var pastedData = e.originalEvent.clipboardData.getData('text');
        if(isNaN(Number(pastedData))) {
            return false; 
        } else {
            return true; 
        }
    });


    // initialize datatable 
    $("table#list").DataTable(); 

    // tooltip 
    $("[data-toggle='tooltip'").tooltip(); 
}); 


function toggleSidebar() {
    $('#sidebar').toggleClass('d-none d-block'); 
}

//----- preview image before upload -----//
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function confirmSubmitForm() {
    var mode = $("#mode").val(); 

    var str_mode = "";
    if(mode == 1) {
        str_mode = "register"; 
    } else if(mode == 2) {
        str_mode = "update"; 
    }

    if(str_mode != "") {
        if(confirm("Confirm "+str_mode+"?")) {
            $(".btn_submit").click(function() {
                return false; 
            }); 
            return true; 
        } else {
            return false; 
        }
    } else {
        return true; 
    }

}


function confirmDeleteStudent(stu_id) {

    if(confirm("Are you sure to delete?")) {
        $.ajax({
            url: "/studentprofile/ajax/delete_student.php", 
            type: "POST", 
            data: {stu_id: stu_id}, 
            success: function() {
                window.alert("Delete success.");
                window.location.reload(); 
            }
        })
    }

}