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
                $('#update_supplier_id').val(data.supplier_id);
                $('#update_supplier_Modal').modal('show');
            }
        });
    });
});

function checkFormSupplier() {
    var formArray = [];
    formArray.push(document.getElementById("supplier_name").value);
    formArray.push(document.getElementById("supplier_phone").value);
    formArray.push(document.getElementById("supplier_address").value);
    formArray.push(document.getElementById("supplier_email").value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url: "../controller/add-supplier-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data: jsonString},
        cache: false,
        success: function (result) {
            $('#msg_Modal').modal('show');
            $('#msg_result').html(result);
        }
    });
}

// check supplier update
function onclickUpdateSupplier() {
    var formArray = [];
    formArray.push(document.getElementById("update_supplier_name").value);
    formArray.push(document.getElementById("update_supplier_phone").value);
    formArray.push(document.getElementById("update_supplier_address").value);
    formArray.push(document.getElementById("update_supplier_email").value);
    formArray.push(document.getElementById("update_supplier_id").value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url:"../controller/update-supplier-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data : jsonString},
        cache: false,
        success:function(data){
            $('#insert_form')[0].reset();
            $('#update_supplier_Modal').modal('hide');
            $('#update_msg_Modal').modal('show');
            $('#update_msg_result').html(data);
        }
    });
}

/*// add supplier
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
});*/

// function to activate the first tab
$(function () {
    $('#myTab a:first').tab('show');
});

$('#update_msg_Modal').on('hidden.bs.modal', function () {
    $('#content').load('manage-supplier.php');
});

// load modal to delete stock data
$(document).ready(function (){
    $(document).on('click','.delete_data',function(){
        var id = $(this).attr("id");
        var table = 'supplier';
        $('#table_name').val(table);
        $('#record_id').val(id);
        $('#delete_Modal').modal('show');
    });
});
