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