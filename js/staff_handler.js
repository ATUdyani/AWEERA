
// load suitable results on keyup
$(document).ready(function(){
    $('#search_text').keyup(function () {
        var dataArray =[];
        var filter = document.getElementById("search_param").value;
        var txt = $(this).val().trim();
        dataArray.push(filter);
        dataArray.push(txt);
        var jsonString = JSON.stringify(dataArray);
        if (txt != ''){
            $.ajax({
                url: "../controller/search-employee-handler.php",
                method: "post",
                data:{data:jsonString},
                cache: false,
                success: function (data) {
                    $('#result').html(data);
                }
            });
        }
        else{
            //$('#result').html('');
            $.ajax({
                url: "../controller/search-employee-handler.php",
                method: "post",
                data:{data:jsonString},
                cache: false,
                success: function (data) {
                    $('#result').html(data);
                }
            });
        }
    });
});

// load modal to edit employee data
$(document).ready(function (){
    $(document).on('click','.edit_data',function(){
        var emp_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-employee-handler.php",
            method: "post",
            data: {emp_id:emp_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#update_first_name').val(data.first_name);
                $('#update_last_name').val(data.last_name);
                $('#update_emp_email').val(data.emp_email);
                $('#update_emp_phone').val(data.emp_phone);
                $('#update_emp_address').val(data.emp_address);
                $('#update_emp_gender').val(data.emp_gender);
                $('#update_emp_type').val(data.emp_type);
                $('#update_emp_id').val(data.emp_id);
                $('#add_data_Modal').modal('show');
            }
        });
    });
});

// load modal to add employee as a user
$(document).ready(function (){
    $(document).on('click','.add_user',function(){
        var emp_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-employee-handler.php",
            method: "post",
            data: {emp_id:emp_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#add_first_name').val(data.first_name);
                $('#add_last_name').val(data.last_name);
                $('#add_emp_email').val(data.emp_email);
                $('#add_emp_type').val(data.emp_type);
                $('#add_password').val("");
                $('#add_confirm_password').val("");
                $('#message').html("");
                $('#add_emp_id').val(data.emp_id);
                $('#add_user_Modal').modal('show');
            }
        });
    });
});

// matching password
$('#add_confirm_password').on('keyup', function () {
    if($(this).val() == ' '){
        $('#message').html("");
    }
    if ($(this).val() == $('#add_password').val()) {
        $('#message').html('Password Match').css('color', 'green');
    }
    else {
        $('#message').html('Password does not match. Please Re-Enter!').css('color', 'red');

    }
});

// function to activate the first tab
$(function () {
    $('#myTab a:first').tab('show')
});

// onClick save Admin
function checkFormAdmin() {
    var formArray = [];
    formArray.push(document.getElementById("first_name_admin").value);
    formArray.push(document.getElementById("last_name_admin").value);
    formArray.push(document.getElementById("emp_email_admin").value);
    formArray.push(document.getElementById("emp_phone_admin").value);
    formArray.push(document.getElementById("emp_address_admin").value);
    formArray.push(document.getElementById("emp_type_button_admin").value);
    formArray.push(document.querySelector('input[name = "gender_admin"]:checked').value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url:"../controller/add-staff-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data : jsonString},
        cache: false,
        success:function(result){
            $('#msg_Modal').modal('show');
            $('#msg_result').html(result);
        }
    });
}

// onClick save Receptionist
function checkFormReceptionist() {
    var formArray = [];
    formArray.push(document.getElementById("first_name_receptionist").value);
    formArray.push(document.getElementById("last_name_receptionist").value);
    formArray.push(document.getElementById("emp_email_receptionist").value);
    formArray.push(document.getElementById("emp_phone_receptionist").value);
    formArray.push(document.getElementById("emp_address_receptionist").value);
    formArray.push(document.getElementById("emp_type_button_receptionist").value);
    formArray.push(document.querySelector('input[name = "gender_receptionist"]:checked').value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url: "../controller/add-staff-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data: jsonString},
        cache: false,
        success: function (result) {
            $('#msg_Modal').modal('show');
            $('#msg_result').html(result);
        }
    });
}

// onClick save Beautician
function checkFormBeautician() {
    var formArray = [];
    formArray.push(document.getElementById("first_name_beautician").value);
    formArray.push(document.getElementById("last_name_beautician").value);
    formArray.push(document.getElementById("emp_email_beautician").value);
    formArray.push(document.getElementById("emp_phone_beautician").value);
    formArray.push(document.getElementById("emp_address_beautician").value);
    formArray.push(document.getElementById("emp_type_button_beautician").value);
    formArray.push(document.querySelector('input[name = "gender_beautician"]:checked').value);
    var services = document.getElementsByName('services');
    var serviceArray = [];
    for(var i = 0; i < services.length; i++){
        if(services[i].checked){
            serviceArray.push(services[i].value);
        }
    }
    formArray.push(serviceArray);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url: "../controller/add-staff-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data: jsonString},
        cache: false,
        success: function (result) {
            $('#msg_Modal').modal('show');
            $('#msg_result').html(result);
        }
    });
}

// check employee update
function onclickUpdateEmployee() {
    var formArray = [];
    formArray.push(document.getElementById("update_first_name").value);
    formArray.push(document.getElementById("update_last_name").value);
    formArray.push(document.getElementById("update_emp_email").value);
    formArray.push(document.getElementById("update_emp_phone").value);
    formArray.push(document.getElementById("update_emp_address").value);
    formArray.push(document.getElementById("update_emp_type").value);
    formArray.push(document.getElementById("update_emp_gender").value);
    formArray.push(document.getElementById("update_emp_id").value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url:"../controller/update-employee-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data : jsonString},
        cache: false,
        success:function(data){
            $('#insert_form')[0].reset();
            $('#add_data_Modal').modal('hide');
            $('#update_msg_Modal').modal('show');
            $('#update_msg_result').html(data);
        }
    });
}

// enter employee as a user
function onclickAddUser() {
    var formArray = [];
    formArray.push(document.getElementById("add_first_name").value);
    formArray.push(document.getElementById("add_last_name").value);
    formArray.push(document.getElementById("add_emp_email").value);
    formArray.push(document.getElementById("add_emp_type").value);
    formArray.push(document.getElementById("add_password").value);
    formArray.push(document.getElementById("add_emp_id").value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url: "../controller/add-employee-user-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data: jsonString},
        cache: false,
        success: function (data) {
            $('#insert_form')[0].reset();
            $('#add_user_Modal').modal('hide');
            $('#msg_Modal').modal('show');
            $('#msg_result').html(data);
        }
    });
}

// reset all the fields in Add Administrator form
function resetAdminForm() {
    document.getElementById("first_name_admin").value = "";
    document.getElementById("last_name_admin").value = "";
    document.getElementById("male_radio_button").checked = true;
    document.getElementById("emp_email_admin").value = "";
    document.getElementById("emp_phone_admin").value = "";
    document.getElementById("emp_address_admin").value = "";
}

// reset all the fields in Add Receptionist form
function resetReceptionistForm() {
    document.getElementById("first_name_receptionist").value = "";
    document.getElementById("last_name_receptionist").value = "";
    document.getElementById("male_radio_button2").checked = true;
    document.getElementById("emp_email_receptionist").value = "";
    document.getElementById("emp_phone_receptionist").value = "";
    document.getElementById("emp_address_receptionist").value = "";
}

// reset all the fields in Add Beautician form
function resetBeauticianForm() {
    document.getElementById("first_name_beautician").value = "";
    document.getElementById("last_name_beautician").value = "";
    document.getElementById("male_radio_button3").checked = true;
    document.getElementById("emp_email_beautician").value = "";
    document.getElementById("emp_phone_beautician").value = "";
    document.getElementById("emp_address_beautician").value = "";
    $('input:checkbox').removeAttr('checked');
}


$('#update_msg_Modal').on('hidden.bs.modal', function () {
    $('#content').load('manage-staff.php');
});

