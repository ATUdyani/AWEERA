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
                url: "../controller/search-register-request-handler.php",
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
                url: "../controller/search-register-request-handler.php",
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
            url:"../controller/fetch-register-request-handler.php",
            method: "post",
            data: {reg_id:reg_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#view_first_name').val(data.first_name);
                $('#view_last_name').val(data.last_name);
                $('#view_gender').val(data.cust_gender);
                $('#view_email').val(data.cust_email);
                $('#view_phone').val(data.cust_phone);
                $('#view_address').val(data.cust_address);
                $('#password').val(data.password);
                $('#view_id').val(data.reg_id);
                $('#view_data_Modal').modal('show');
            }
        });
    });
});

// accept register request
function onClickAcceptReject(status){
    document.getElementById('accept').disabled=true;
    document.getElementById('reject').disabled=true;
    var formArray = [];
    formArray.push(status);
    formArray.push(document.getElementById("view_first_name").value);
    formArray.push(document.getElementById("view_last_name").value);
    formArray.push(document.getElementById("view_phone").value);
    formArray.push(document.getElementById("view_address").value);
    formArray.push(document.getElementById("view_email").value);
    formArray.push(document.getElementById("password").value);
    formArray.push(document.getElementById("view_gender").value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url:'../controller/register-request-confirm-mail-handler.php',
        type: "POST", //request type
        data: {data : jsonString},
        cache: false,
        success:function(result){
            $('#view_data_Modal').modal('hide');
            $('#msg_Modal').modal('show');
            $('#msg_result').html(result);
        }
    });
}

$('#msg_Modal').on('hidden.bs.modal', function () {
    $('#content').load('manage-register-requests.php');
});
