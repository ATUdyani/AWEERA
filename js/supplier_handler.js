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
                url: "../controller/search-supplier-handler.php",
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
                url: "../controller/search-supplier-handler.php",
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

// load modal to edit supplier data
$(document).ready(function (){
    $(document).on('click','.edit_data',function(){
        var supplier_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-supplier-handler.php",
            method: "post",
            data: {supplier_id:supplier_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#update_supplier_name').val(data.supplier_name);
                $('#update_supplier_phone').val(data.supplier_phone);
                $('#update_supplier_address').val(data.supplier_address);
                $('#update_supplier_email').val(data.supplier_email);
                $('#update-supplier-Modal').modal('show');
            }
        });
    });
});

// add supplier
$(document).ready(function (){
    $(document).on('click','.add_user1',function(){
        var supplier_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-supplier-handler.php",
            method: "post",
            data: {supplier_id:supplier_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#add_supplier_name').val(data.supplier_name);
                $('#add_supplier_phone').val(data.supplier_phone);
                $('#add_supplier_address').val(data.supplier_address);
                $('#add_supplier_email').val(data.supplier_email);
                $('#add_user_Modal').modal('show');
            }
        });
    });
});

// function to activate the first tab
$(function () {
    $('#myTab a:first').tab('show');
});