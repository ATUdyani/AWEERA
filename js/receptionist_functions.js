// load register request count
setInterval(function(){
    $.ajax({
        url:'../controller/request-count-handler.php',
        type: "POST",
        data : "",
        success: function(data)
        {
            $('#request_count').html(data+" NEW");
            //alert(data);
        }
    });
},3000);

// load register requests
function displayRegisterRequests() {
    $('#content').load("../view/manage-register-requests.php");
}

// accept register request
function onClickAcceptReject(status){
    var formArray = [];
    formArray.push(status);
    formArray.push(document.getElementById("update_first_name").value);
    formArray.push(document.getElementById("update_last_name").value);
    formArray.push(document.getElementById("update_phone").value);
    formArray.push(document.getElementById("update_address").value);
    formArray.push(document.getElementById("update_email").value);
    formArray.push(document.getElementById("password").value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url:'../controller/register-request-confirm-mail-handler.php',
        type: "POST", //request type
        data: {data : jsonString},
        cache: false,
        success:function(result){
            jQuery.noConflict();
            $('#add_data_Modal').modal('hide');
            $('#msg_Modal').modal('show');
            $('#msg_result').html(result);
        }
    });
}

// get appointment details for a particular date/for a particular beautician
function getAppointments(decision) {
    var formArray = [];
    date = document.getElementById("date_picker").value;
    beautician = document.getElementById("select_beautician_name").value;
    if (decision=="all"){
        formArray.push("*"); // all dates
        formArray.push("*"); // all beauticians
        document.getElementById("date_picker").value = "";
    }
    else if (date=="" && beautician==""){
        formArray.push("*"); // all dates
        formArray.push("*"); // all beauticians
    }
    else if (date=="" && beautician!=""){
        formArray.push("*"); // all dates
        formArray.push(beautician); // beautician is specified
    }
    else if (date!="" && beautician==""){
        formArray.push(date); // date is specified
        formArray.push("*"); // all beauticians
    }
    else{
        formArray.push(date);  // date is specified
        formArray.push(beautician); // beautician is specified
    }

    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url:'../controller/fetch-appointment-details-handler.php',
        type: "POST", //request type
        data: {data : jsonString},
        cache: false,
        success:function(result){
            $('#table_results').html(result);
        }
    });

}