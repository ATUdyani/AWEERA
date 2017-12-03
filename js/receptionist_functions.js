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

// load new comments count
setInterval(function(){
    $.ajax({
        url:'../controller/comment-count-handler.php',
        type: "POST",
        data : "",
        success: function(data)
        {
            $('#comment_count').html(data+" NEW");
            //alert(data);
        }
    });
},3000);


// load register requests
function displayRegisterRequests() {
    $('#content').load("../view/manage-register-requests.php");
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

// test comment email
function sendTestCommentEmail(){
    appointment_id = document.getElementById('app_id').value;
    var formArray = [];
    formArray.push(appointment_id);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url:'../controller/send-comment-email-handler.php',
        type: "POST", //request type
        data: {data : jsonString},
        cache: false,
        success:function(result){
            $('#msg_Modal').modal('show');
            $('#msg_result').html(result);
        }
    });
}