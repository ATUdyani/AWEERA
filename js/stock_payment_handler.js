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
    //console.log(id,stock_count);
    stockcount[i] = stock_count;

    document.getElementById("product_payment").classList.remove("hidden");
    document.getElementById("product_payment1").classList.remove("hidden");

    //document.getElementById("btn_"+id).classList.add("hidden");

    var product_brand = document.getElementById("pbrand_"+id).innerText;
    var product_type = document.getElementById("ptype_"+id).innerText;
    var description = document.getElementById("pdescription_"+id).innerText;
    price = document.getElementById("pprice_"+id).innerText;

    stock_id[i] = id;
    unit_total = price;
    unit_totalarr[i] = unit_total;



    var new_row = "<tr id="+i+"><td style=\"width: 15%\" id=paypbrand_"+id+"> " + product_brand
        +" </td><td style=\"width: 15%\" id=payptype_"+id+">" + product_type
        + "</td><td style=\"width: 25%\" id=paypdescription >"+description
        +"</td><td style='width: 20%;' id=paypprice>"+price
        +"</td><td style='width: 10%;' id=paypqut><input onkeyup='calculateTotal()' type='number' step='1' min='0' id=qty"+i+"><td style='width: 15%' id=unitTotal"+i+">"+price+"</td></tr>";
    $(".product_payment_tbody").append(new_row);

    i = i+1;
    j = j +1;

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

    unit_total = price * count;
    $('#unitTotal' + j).html(unit_total);

    unit_totalarr[j] = unit_total;

    sub_total = 0;
    for (var k = 0; k < unit_totalarr.length ; k++){
        sub_total = sub_total + unit_totalarr[k];
        //console.log(sub_total);
        //console.log("");
    }
    $("#product_subtotal_tbody .sub").html(sub_total);

    unit_total = 0;

}

function ppayment_cancel() {

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

function ppaybycash() {

    document.getElementById("product_payment").classList.add("hidden");
    document.getElementById("product_payment1").classList.add("hidden");
    var type = 'cash';
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

function ppaybycard() {

    document.getElementById("product_payment").classList.add("hidden");
    document.getElementById("product_payment1").classList.add("hidden");
    var type = 'card';
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


$('#msg_Modal').on('hidden.bs.modal', function () {
    $('#content').load("manage-payments.php");
});
