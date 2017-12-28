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
                url: "../controller/view-customer-handler.php",
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
                url: "../controller/view-customer-handler.php",
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

// load modal to view customer data
$(document).ready(function (){
    $(document).on('click','.view_data',function(){
        var cust_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-registered-customer-handler.php",
            method: "post",
            data: {cust_id:cust_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                var img = '../img/profiles/'+data.profile_pic; // get image
                $('#profile_pic').attr('src' , img);

                $('#view_cust_id').val(data.cust_id);
                $('#view_first_name').val(data.first_name);
                $('#view_last_name').val(data.last_name);
                $('#view_cust_name').val(data.last_name);
                $('#view_cust_phone').val(data.cust_phone);
                $('#view_cust_address').val(data.cust_address);
                $('#view_cust_email').val(data.cust_email);
                $('#view_date_joined').val(data.date_joined);
                $('#view_data_Modal').modal('show');
            }
        });
    });
});

// load modal to delete customer data
$(document).ready(function (){
    $(document).on('click','.delete_data',function(){
        var id = $(this).attr("id");
        var table = 'customer';
        $('#table_name').val(table);
        $('#record_id').val(id);
        $('#delete_Modal').modal('show');
    });
});

$('#update_msg_Modal').on('hidden.bs.modal', function () {
   $('#content').load('view-customer.php');
});

function notDeleteRecord() {
    $('#delete_Modal').modal('hide');
    $('#warning_Modal').modal('hide');
}


// function to check whether customer can be deleted by checking the upcoming appointments
function deleteRecord(){
    $('#delete_Modal').modal('hide');
    var cust_id = document.getElementById('record_id').value;
    $.ajax({
        url:"../controller/appointment-count-handler.php", //the page containing php script
        type: "POST", //request type
        data: {cust_id : cust_id},
        cache: false,
        success:function(result){
            if (result==0){
                deleteCustomer(cust_id);
            }
            else{
                $('#warning_cust_id').val(cust_id);
                $('#warning_Modal').modal('show');
                $('#warning_msg_result').html("<h4>This Customer has "+result+" upcoming appointment(s)!<br><br>What do you want to do?</h4>");
            }
        }
    });
}

// function to delete a customer who does not have upcoming appointments
function deleteCustomer(cust_id){
    var formArray = [];
    formArray.push(cust_id,'customer');
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url:"../controller/delete-record-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data : jsonString},
        cache: false,
        success:function(result){
            $('#update_msg_Modal').modal('show');
            $('#update_msg_result').html(result+"<h4>User privileges removed!</h4>");
        }
    });
}

// function to delete a customer who has upcoming appointments
function deleteCustomerRecord(decision) {
    var cust_id = document.getElementById('warning_cust_id').value;
    $('#delete_all').prop("disabled",true);
    $('#delete_customer').prop("disabled",true);
    $('#not_delete').prop("disabled",true);
    if (decision=='all'){
        $.ajax({
            url:"../controller/cancel-appointment-customer-delete-handler.php", //the page containing php script
            type: "POST", //request type
            data: {cust_id : cust_id},
            cache: false,
            success:function(result){
                $('#update_msg_Modal').modal('show');
                $('#update_msg_result').html(result+"<h4>User privileges removed!</h4>");
                $('#warning_Modal').modal('hide');
            }
        });
    }
    else{
        deleteCustomer(cust_id);
        $('#warning_Modal').modal('hide');
    }

}