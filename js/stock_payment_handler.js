var stockCount = 0;
var i = 0;
var arr = []; // input
var stock_id = [];
var stockcount = [];
var new_stockcount = [];
var sub_total = 0;
var unit_total = 0;
var price = 0;
var j = -1; // get td data
var countarr = [];
var unit_totalarr = [];
var count = 0;
var btn_id = [];

$(document).ready(function(){
    $('#search_text1').keyup(function () {
        var dataArray =[];
        var filter = document.getElementById("search_param").value;
        var txt = $(this).val().trim();
        dataArray.push(filter);
        dataArray.push(txt);
        var jsonString = JSON.stringify(dataArray);
        if (txt != ''){
            $.ajax({
                url: "../controller/search-product-payment-details.php",
                method: "post",
                data:{data:jsonString},
                cache: false,
                success: function (data) {
                    $('#product_result').html(data);
                }
            });
        }
        else{
            $.ajax({
                url: "../controller/search-product-payment-details.php",
                method: "post",
                data:{data:jsonString},
                cache: false,
                success: function (data) {
                    $('#product_result').html(data);
                }
            });
        }
    });
});

function addToProductCart(id,stock_count) {

    var product_brand = document.getElementById("pbrand_"+id).innerText;
    var product_type = document.getElementById("ptype_"+id).innerText;
    var description = document.getElementById("pdescription_"+id).innerText;
    price = document.getElementById("pprice_"+id).innerText;

    stockcount[i] = stock_count;
    btn_id[i] = id;
    stock_id[i] = id;
    unit_total = price;
    unit_totalarr[i] = unit_total;

    document.getElementById("product_payment").classList.remove("hidden");


    var classList = document.getElementById("product_payment1").classList;

    if(classList == "col-md-12 hidden"){
        document.getElementById("product_payment").classList.remove("hidden");
        document.getElementById("product_payment1").classList.remove("hidden");

        //console.log(i);

        var new_row = "<tr id="+i+"><td style=\"width: 15%\" id=paypbrand_"+id+"> " + product_brand
            +" </td><td style=\"width: 15%\" id=payptype_"+id+">" + product_type
            + "</td><td style=\"width: 25%\" id=paypdescription >"+description
            +"</td><td style='width: 20%;' id=paypprice>"+price
            +"</td><td style='width: 10%;' id=paypqut><input onkeyup='calculateTotal()' value='1' type='number' step='1' min='0' id=qty"+i+"><td style='width: 15%' id=unitTotal"+i+">"+price+"</td>" +
            "<td><button onclick='removeProduct(id)' id="+i+"  class = \"btn btn-danger btn-sm\" value =\"remove\"><span class=\"glyphicon glyphicon-remove\"></span> Remove</button></td></tr>";

        $(".product_payment_tbody").append(new_row);

        sub_total = price;
        $("#product_subtotal_tbody .sub").html("Rs. "+sub_total);

        i = i+1;
        j = j +1;

        count = 1;
        new_stockcount[j] = stockcount[j] - count;
        countarr[j] = count;
        unit_totalarr[j] = parseFloat(price);

        // sub_total = 0;
        // for (var k = 0; k < unit_totalarr.length ; k++){
        //     sub_total = sub_total + unit_totalarr[k];
        //     //console.log(sub_total);
        //     //console.log("");
        // }
        // $("#product_subtotal_tbody .sub").html(sub_total);

    }else {

        var new_row = "<tr id="+i+"><td style=\"width: 15%\" id=paypbrand_"+id+"> " + product_brand
            +" </td><td style=\"width: 15%\" id=payptype_"+id+">" + product_type
            + "</td><td style=\"width: 25%\" id=paypdescription >"+description
            +"</td><td style='width: 20%;' id=paypprice>"+price
            +"</td><td style='width: 10%;' id=paypqut><input onkeyup='calculateTotal()' value='1' type='number' step='1' min='0' id=qty"+i+"><td style='width: 15%' id=unitTotal"+i+">"+price+"</td>" +
            "<td><button onclick='removeProduct(id)' id="+i+" class = \"btn btn-danger btn-sm\" value =\"remove\"><span class=\"glyphicon glyphicon-remove\"></span> Remove</button></td></tr>";

        $(".product_payment_tbody").append(new_row);

        document.getElementById("qty"+j).disabled = true;
        //$('#product_subtotal_tbody .sub').clear();
        i = i+1;
        j = j +1;

        count = 1;
        new_stockcount[j] = stockcount[j] - count;
        countarr[j] = count;
        unit_totalarr[j] = price;

        sub_total = 0;
        for (var k = 0; k < unit_totalarr.length ; k++){
            sub_total = sub_total + parseFloat(unit_totalarr[k]);
            //console.log(sub_total);
            //console.log("");
        }
        console.log(sub_total);
        $("#product_subtotal_tbody .sub").html("Rs. "+sub_total+".00");
    }

    $('#btn_'+id).prop("disabled",true);
    //document.getElementById("btn_"+id).classList.add("hidden");

}


function removeProduct(id) {
    //console.log(id);
    //document.getElementById("btn_"+stock_id[id]).classList.remove("hidden");
    $('#btn_'+stock_id[id]).prop("disabled",false);

    var q = 1;
    for(var p=0;p<stock_id.length;p++){
        if(stock_id[p] == ""){
            q = q +1;
        }
    }
    if (stock_id.length == 1 || q == stock_id.length){
        $('#'+id).remove();
        document.getElementById("product_payment").classList.add("hidden");
        document.getElementById("product_payment1").classList.add("hidden");
        stockCount = 0;
        i = 0;
        arr = [];
        stock_id = [];
        stockcount = [];
        sub_total = 0;
        unit_total = 0;
        price = 0;
        j = -1;
        countarr = [];
        unit_totalarr = [];
        new_stockcount = [];
    }else{
        sub_total = sub_total - unit_totalarr[id];
        stock_id[id] = "";
        new_stockcount[id] = stockcount[id];
        unit_totalarr[id] = 0;
        $('#'+id).remove();
        var new_subtotal = sub_total;
        $("#product_subtotal_tbody .sub").html("Rs.  "+new_subtotal+".00");
    }
}

function calculateTotal() {
    count = document.getElementById("qty"+j).value;
    //console.log("qty"+j);
    //console.log(count);

    if(count == ""){
        count = 0;
    }

    //console.log(stockcount[j]);

    if (stockcount[j] < parseInt(count)){
        $('#update_msg_Modal').modal('show');
        $('#update_msg_result').html("<h4>SORRY OUT OF STOCK</h4>");
    }
    new_stockcount[j] = stockcount[j] - count;
    countarr[j] = count;

    //console.log(count);
    //console.log(price);

    unit_total = parseFloat(price * count);
    $('#unitTotal' + j).html(unit_total+".00");

    unit_totalarr[j] = unit_total;

    sub_total = 0;
    for (var k = 0; k < unit_totalarr.length ; k++){
        sub_total = sub_total + unit_totalarr[k];
        //console.log(sub_total);
        //console.log("");
    }
    $("#product_subtotal_tbody .sub").html("Rs. "+sub_total+".00");

    unit_total = 0;

}

function ppayment_cancel() {
    for (var k = 0; k < stock_id.length ; k++){
        //document.getElementById("btn_"+btn_id[k]).classList.remove("hidden");
        $('#btn_'+stock_id[k]).prop("disabled",false);
    }
    document.getElementById("product_payment").classList.add("hidden");
    document.getElementById("product_payment1").classList.add("hidden");
    $('#product_payment_tbody tr').remove();
    $('#product_subtotal_tbody .sub').html(price);
    stockCount = 0;
    i = 0;
    arr = [];
    stock_id = [];
    stockcount = [];
    sub_total = 0;
    unit_total = 0;
    price = 0;
    j = -1;
    countarr = [];
    unit_totalarr = [];
    new_stockcount = [];
}


function doProductPayment() {
    document.getElementById("product_payment").classList.add("hidden");
    document.getElementById("product_payment1").classList.add("hidden");
    var type = $('#payment_method_1').val();
    var dataArray = [];
    dataArray.push(stock_id);
    dataArray.push(new_stockcount);
    dataArray.push(sub_total);
    dataArray.push(type);
    dataArray.push(countarr);
    var jsonString = JSON.stringify(dataArray);
    //console.log("hi");
    $.ajax({
        url: "../controller/product-payment-handler.php",
        method: "post",
        data:{data:jsonString},
        cache: false,
        success: function (data) {
            $('#msg_Modal').modal('show');
            $('#msg_result').html(data);
            sub_total = 0;
            app_id = [];
            app_charge = [];
            btn_id = [];
            i = 0;
            generateReceiptPurchase(jsonString);
        }
    });
}


function generateReceiptPurchase(data) {
    var mywindow = window.open(
        '../controller/purchase-payment-receipt-handler.php?data='+data,
        '_blank' // <- This is what makes it open in a new window.
    );
}


$('#msg_Modal').on('hidden.bs.modal', function () {
    $('#content').load("manage-payments.php");
});
