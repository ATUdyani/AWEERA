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
            document.getElementById("msg_service").innerHTML = result;
        }
    });
}

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
            document.getElementById("msg_admin").innerHTML = result;
        }
    });
}

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
            document.getElementById("msg_receptionist").innerHTML = result;
        }
    });
}

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
            document.getElementById("msg_beautician").innerHTML = result;
        }
    });
}

// check employee update
function onclickUpdate() {
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
