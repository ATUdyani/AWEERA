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
                url: "../controller/fetch-register-request-handler.php",
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
                url: "../controller/fetch-register-request-handler.php",
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

// load modal to edit customer register data
$(document).ready(function (){
    $(document).on('click','.edit_data',function(){
        var reg_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-unregistered-customer-handler.php",
            method: "post",
            data: {reg_id:reg_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#update_first_name').val(data.first_name);
                $('#update_last_name').val(data.last_name);
                $('#update_email').val(data.cust_email);
                $('#update_phone').val(data.cust_phone);
                $('#update_address').val(data.cust_address);
                $('#password').val(data.password);
                $('#update_id').val(data.reg_id);
                $('#add_data_Modal').modal('show');
            }
        });
    });
});

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
            $('#add_data_Modal').modal('hide');
            $('#msg_Modal').modal('show');
            $('#msg_result').html(result);
        }
    });
}

$('#msg_Modal').on('hidden.bs.modal', function () {
    $('#content').load('manage-register-requests.php');
});
