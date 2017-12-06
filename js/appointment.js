// load service names for a particular service
function loadServiceNames(val) {
    var passedVal = val;
    $.ajax({
        url:"../controller/fetch-service-names.php",
        method: "post",
        data: {data:passedVal},
        dataType: "json",
        cache:false,
        success: function( data ) {
            $('#select_service_name').html(data);
            document.getElementById("select_service_name").disabled=false;
        }
    });
}

// load particular beautician names for a particular service name
function loadBeauticianNames(val) {
    var passedVal = val;
    $.ajax({
        url:"../controller/fetch-beautician-names.php",
        method: "post",
        data: {data:passedVal},
        dataType: "json",
        cache:false,
        success: function( data ) {
            $('#select_beautician_name').html(data);
            document.getElementById("select_beautician_name").disabled=false;
        }
    });
}

// enable calender
function enableCalender() {
    document.getElementById("appointment_date").disabled=false;
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    }
    if(mm<10){
        mm='0'+mm
    }

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("appointment_date").setAttribute("min", today);
}

// load free slots for a particualr beautician for a particular day
function loadSlots(){
    var appointmentDate = document.getElementById("appointment_date").value;
    var beauticianId = document.getElementById("select_beautician_name").value;
    var serviceId = document.getElementById("select_service_name").value;
    var dataArray = [];
    dataArray.push(beauticianId,appointmentDate,serviceId);
    var jsonString = JSON.stringify(dataArray);
    $.ajax({
        url:"../controller/fetch-time-slots.php",
        method: "post",
        data: {data:jsonString},
        dataType: "json",
        cache:false,
        success: function( data ) {
            $('#time_slots').html(data);
            document.getElementById("time_slots").disabled=false;
        }
    });
}

// make an appointment
function makeAppointment() {
    var serviceId = document.getElementById("select_service_name").value;
    var beauticianId = document.getElementById("select_beautician_name").value;
    var appointmentDate = document.getElementById("appointment_date").value;
    var customerId = document.getElementById("cust_id").value;

    // extracting hours and minutes separately from start time and concatenate them
    var hoursSTime = document.getElementById('time_slots').value.substr(0,2);
    var minutesSTime = document.getElementById('time_slots').value.substr(2,2);
    var appointmentTime = hoursSTime.concat(minutesSTime);

    var dataArray = [];
    dataArray.push(serviceId,beauticianId,appointmentDate,appointmentTime,customerId);
    var jsonString = JSON.stringify(dataArray);
    $.ajax({
        url:"../controller/add-appointment-handler.php",
        method: "post",
        data: {data:jsonString},
        cache:false,
        success: function( data ) {
            $('#msg_Modal').modal('show');
            $('#msg_result').html(data);
        }
    });
}

// cancel appointment - only the rececptionist can invoke this
function cancelAppointment(appointementId){
    var dataArray = [];
    dataArray.push(appointementId);
    var jsonString = JSON.stringify(dataArray);
    $.ajax({
        url:"../controller/cancel-appointment-handler.php",
        method: "post",
        data: {data:jsonString},
        cache:false,
        success: function( data ) {
            $('#msg_Modal').modal('show');
            $('#msg_result').html(data);
            $('#content').load("manage-appointments.php");
        }
    });
}

// load modal to view customer data
$(document).ready(function (){
    $(document).on('click','.customer_check',function(){
        var cust_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-customer-handler.php",
            method: "post",
            data: {cust_id:cust_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#view_cust_first_name').val(data.first_name);
                $('#view_cust_last_name').val(data.last_name);
                $('#view_cust_email').val(data.cust_email);
                $('#view_cust_phone').val(data.cust_phone);
                $('#view_cust_address').val(data.cust_address);
                $('#view_date_joined').val(data.date_joined);
                $('#view_customer_Modal').modal('show');
            }
        });
    });
});

// load modal to view service data
$(document).ready(function (){
    $(document).on('click','.service_check',function(){
        var service_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-service-handler.php",
            method: "post",
            data: {service_id:service_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#view_service_name').val(data.service_name);
                $('#view_service_charge').val(data.service_charge);
                $('#view_service_description').val(data.description);
                $('#view_service_duration').val(data.duration);
                $('#view_commission').val(data.commission_percentage);
                $('#view_service_id').val(data.service_id);
                $('#view_service_Modal').modal('show');
            }
        });
    });
});

// load modal to view employee data
$(document).ready(function (){
    $(document).on('click','.emp_check',function(){
        var emp_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-employee-handler.php",
            method: "post",
            data: {emp_id:emp_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#view_emp_first_name').val(data.first_name);
                $('#view_emp_last_name').val(data.last_name);
                $('#view_emp_email').val(data.emp_email);
                $('#view_emp_phone').val(data.emp_phone);
                $('#view_emp_address').val(data.emp_address);
                $('#view_emp_gender').val(data.emp_gender);
                $('#view_emp_type').val(data.emp_type);
                $('#view_emp_id').val(data.emp_id);
                $('#view_staff_Modal').modal('show');
            }
        });
    });
});


// function to activate the first tab
$(function () {
    $('#myTab a:first').tab('show')
});


// load suitable results on keyup
$(document).ready(function(){
    $('#search_text').keyup(function (){
        var dataArray =[];
        var filter = document.getElementById("search_param").value;
        var txt = $(this).val().trim();
        dataArray.push(filter);
        dataArray.push(txt);
        var jsonString = JSON.stringify(dataArray);
        if (txt != ''){
            $.ajax({
                url: "../controller/search-customer-handler.php",
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
                url: "../controller/search-customer-handler.php",
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

// load customer appointment book page with cust_id auto loaded
function loadBookCustomerAppointment(cust_id) {
    $('#content').load("receptionist-book-appointment.php",{'cust_id': cust_id});
}

// onClick save Unregistered Customer
function checkFormCust() {
    var formArray = [];
    formArray.push(document.getElementById("first_name_cust").value);
    formArray.push(document.getElementById("last_name_cust").value);
    formArray.push(document.getElementById("cust_phone").value);
    formArray.push(document.querySelector('input[name = "gender_cust"]:checked').value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url:"../controller/add-unregistered-customer-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data : jsonString},
        dataType: "json",
        cache: false,
        success:function(result){
            if (result[0]=="<h4>Unregistered Customer added.</h4>"){
                loadBookCustomerAppointment(result[1]);
            }
            else{
                $('#msg_Modal').modal('show');
                $('#msg_result').html(result[0]);
            }
        }
    });
}

// reset all the fields in Add Unregistered Customer form
function resetCustForm() {
    document.getElementById("first_name_cust").value = "";
    document.getElementById("last_name_cust").value = "";
    document.getElementById("male_radio_button").checked = true;
    document.getElementById("cust_phone").value = "";
}