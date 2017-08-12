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