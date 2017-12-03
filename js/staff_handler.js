
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
                url: "../controller/search-employee-handler.php",
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
                url: "../controller/search-employee-handler.php",
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

// load modal to edit employee data
$(document).ready(function (){
    $(document).on('click','.edit_data',function(){
        var emp_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-employee-handler.php",
            method: "post",
            data: {emp_id:emp_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#update_first_name').val(data.first_name);
                $('#update_last_name').val(data.last_name);
                $('#update_emp_email').val(data.emp_email);
                $('#update_emp_phone').val(data.emp_phone);
                $('#update_emp_address').val(data.emp_address);
                $('#update_emp_gender').val(data.emp_gender);
                $('#update_emp_type').val(data.emp_type);
                $('#update_emp_id').val(data.emp_id);
                $('#add_data_Modal').modal('show');
            }
        });
    });
});

// load modal to add employee as a user
$(document).ready(function (){
    $(document).on('click','.add_user',function(){
        var emp_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-employee-handler.php",
            method: "post",
            data: {emp_id:emp_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#add_first_name').val(data.first_name);
                $('#add_last_name').val(data.last_name);
                $('#add_emp_email').val(data.emp_email);
                $('#add_emp_type').val(data.emp_type);
                $('#add_password').val("");
                $('#add_confirm_password').val("");
                $('#message').html("");
                $('#add_emp_id').val(data.emp_id);
                $('#add_user_Modal').modal('show');
            }
        });
    });
});

// matching password
$('#add_confirm_password').on('keyup', function () {
    if($(this).val() == ' '){
        $('#message').html("");
    }
    if ($(this).val() == $('#add_password').val()) {
        $('#message').html('Password Match').css('color', 'green');
    }
    else {
        $('#message').html('Password does not match. Please Re-Enter!').css('color', 'red');

    }
});

// function to activate the first tab
$(function () {
    $('#myTab a:first').tab('show')
});
