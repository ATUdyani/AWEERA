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