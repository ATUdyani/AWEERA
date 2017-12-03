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
                url: "../controller/search-employee-user-handler.php",
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
                url: "../controller/search-employee-user-handler.php",
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

// load modal change password
$(document).ready(function (){
    $(document).on('click','.change_password',function(){
        var user_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-user-handler.php",
            method: "post",
            data: {user_id:user_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#add_first_name').val(data.first_name);
                $('#add_last_name').val(data.last_name);
                $('#add_emp_email').val(data.email);
                $('#add_emp_type').val(data.type);
                $('#add_password').val("");
                $('#add_confirm_password').val("");
                $('#message').html("");
                $('#add_emp_id').val(data.id);
                $('#change_password_Modal').modal('show');
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
