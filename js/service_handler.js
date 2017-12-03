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