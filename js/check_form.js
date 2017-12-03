// onClick save Service
function checkFormService() {
    var formArray = [];
    formArray.push(document.getElementById("service_name").value);
    formArray.push(document.getElementById("service_charge").value);
    formArray.push(document.getElementById("description").value);
    formArray.push(document.getElementById("duration").value);
    formArray.push(document.getElementById("commission_percentage").value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url:"../controller/add-service-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data : jsonString},
        cache: false,
        success:function(result){
            $('#msg_Modal').modal('show');
            $('#msg_result').html(result);
        }
    });
}

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
            $('#msg_Modal').modal('show');
            $('#msg_result').html(data);
        }
    });
}

// check service update
function onclickUpdateService() {
    var formArray = [];
    formArray.push(document.getElementById("update_service_name").value);
    formArray.push(document.getElementById("update_service_charge").value);
    formArray.push(document.getElementById("update_service_description").value);
    formArray.push(document.getElementById("update_service_duration").value);
    formArray.push(document.getElementById("update_commission").value);
    formArray.push(document.getElementById("update_service_id").value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url:"../controller/update-service-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data : jsonString},
        cache: false,
        success:function(data){
            $('#insert_form')[0].reset();
            $('#add_data_Modal').modal('hide');
            $('#msg_Modal').modal('show');
            $('#msg_result').html(data);
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


// change user password
function onclickChangePassword() {
    var formArray = [];
    formArray.push(document.getElementById("add_emp_id").value);
    formArray.push(document.getElementById("add_password").value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url: "../controller/change-user-password-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data: jsonString},
        cache: false,
        success: function (data) {
            $('#insert_form')[0].reset();
            $('#change_password_Modal').modal('hide');
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
