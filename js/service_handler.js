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
                url: "../controller/search-service-handler.php",
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
                url: "../controller/search-service-handler.php",
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

// load modal to edit service data
$(document).ready(function (){
    $(document).on('click','.edit_service',function(){
        var service_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-service-handler.php",
            method: "post",
            data: {service_id:service_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#update_service_name').val(data.service_name);
                $('#update_service_charge').val(data.service_charge);
                $('#update_service_description').val(data.description);
                $('#update_service_duration').val(data.duration);
                $('#update_commission').val(data.commission_percentage);
                $('#update_service_id').val(data.service_id);
                $('#add_data_Modal').modal('show');
            }
        });
    });
});

// function to activate the first tab
$(function () {
    $('#myTab a:first').tab('show')
});

// onClick save Service
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
            $('#msg_Modal').modal('show');
            $('#msg_result').html(result);
        }
    });
}

// check service update
function onclickUpdateService() {
    var formArray = [];
    formArray.push(document.getElementById("update_service_name").value);
    formArray.push(document.getElementById("update_service_charge").value);
    formArray.push(document.getElementById("update_service_description").value);
    formArray.push(document.getElementById("update_service_duration").value);
    formArray.push(document.getElementById("update_commission").value);
    formArray.push(document.getElementById("update_service_id").value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url:"../controller/update-service-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data : jsonString},
        cache: false,
        success:function(data){
            $('#insert_form')[0].reset();
            $('#add_data_Modal').modal('hide');
            $('#update_msg_Modal').modal('show');
            $('#update_msg_result').html(data);
        }
    });
}


$('#update_msg_Modal').on('hidden.bs.modal', function () {
    $('#content').load('manage-service.php');
});