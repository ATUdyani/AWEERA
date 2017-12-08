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
            url:"../controller/fetch-customer-handler.php",
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
                $('#view_cust_phone').val(data.cust_phone);
                $('#view_cust_address').val(data.cust_address);
                $('#view_cust_email').val(data.cust_email);
                $('#view_date_joined').val(data.date_joined);
                $('#view_data_Modal').modal('show');
            }
        });
    });
});
