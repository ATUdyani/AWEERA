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
                url: "../controller/search-stock-handler.php",
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
                url: "../controller/search-stock-handler.php",
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

//add new stock
function checkFormStock() {
    var formArray = [];
    formArray.push(document.getElementById("stock_brand").value);
    formArray.push(document.getElementById("type").value);
    formArray.push(document.getElementById("stock_count").value);
    formArray.push(document.getElementById("price").value);
    formArray.push(document.getElementById("description").value);
    formArray.push(document.getElementById("supplier_id").value);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url: "../controller/add-stock-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data: jsonString},
        cache: false,
        success: function (result) {
            $('#msg_Modal').modal('show');
            $('#msg_result').html(result);
        }
    });
}

// load modal to edit stock data
$(document).ready(function (){
    $(document).on('click','.edit_data',function(){
        var stock_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-stock-handler.php",
            method: "post",
            data: {stock_id:stock_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#update_stock_brand').val(data.stock_brand);
                $('#update_type').val(data.type);
                $('#update_stock_count').val(data.stock_count);
                $('#update_price').val(data.price);
                $('#update_description').val(data.description);
                $('#update_supplier_id').val(data.supplier_id);
                $('#update_stock_id').val(data.stock_id);
                $('#update_stock_Modal').modal('show');
            }
        });
    });
});

// check supplier update
function onclickUpdateStock() {
    var formArray = [];
    formArray.push(document.getElementById("update_stock_brand").value);
    formArray.push(document.getElementById("update_type").value);
    formArray.push(document.getElementById("update_stock_count").value);
    formArray.push(document.getElementById("update_price").value);
    formArray.push(document.getElementById("update_description").value);
    formArray.push(document.getElementById("update_supplier_id").value);
    formArray.push(document.getElementById("update_stock_id").value);
    var jsonString = JSON.stringify(formArray);

    $.ajax({

        url:"../controller/update-stock-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data : jsonString},
        cache: false,
        success:function(data){
            $('#insert_form')[0].reset();
            $('#update_stock_Modal').modal('hide');
            $('#update_msg_Modal').modal('show');
            $('#update_msg_result').html(data);
        }
    });
}

/*// add stock
$(document).ready(function (){
    $(document).on('click','add_stock',function(){
        var stock_id = $(this).attr("id");
        $.ajax({
            url:"../controller/fetch-stock-handler.php",
            method: "post",
            data: {stock_id:stock_id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#add_stock_brand').val(data.stock_brand);
                $('#add_type').val(data.type);
                $('#add_stock_count').val(data.stock_count);
                $('#add_price').val(data.price);
                $('#add_description').val(data.description);
                $('#add_supplier_id').val(data.supplier_id);
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
    $('#content').load('manage-stock.php');
});

// load modal to delete stock data
$(document).ready(function (){
    $(document).on('click','.delete_data',function(){
        var id = $(this).attr("id");
        var table = 'stock_item';
        $('#table_name').val(table);
        $('#record_id').val(id);
        $('#delete_Modal').modal('show');
    });
});