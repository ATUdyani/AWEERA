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

function displayRegisterRequests() {
    $('#content').load("../view/manage-register-requests.php");
}