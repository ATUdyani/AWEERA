var stockCount = 0;
var i = 0;
var arr = []; // input
var stock_id = [];
var stock_count = [];
var sub_total = 0;
var unit_total = 0;
var price = 0;
var j = -1;
var countarr = [];

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
    j = j + 1;
    console.log(id,stock_count);
    stockCount = stock_count;
    document.getElementById("product_payment").classList.remove("hidden");
    document.getElementById("product_payment1").classList.remove("hidden");

    //document.getElementById("btn_"+id).classList.add("hidden");

    var product_brand = document.getElementById("pbrand_"+id).innerText;
    var product_type = document.getElementById("ptype_"+id).innerText;
    var description = document.getElementById("pdescription_"+id).innerText;
    price = document.getElementById("pprice_"+id).innerText;

    stock_id[i] = id;

    var new_row = "<tr id="+i+"><td id=paypbrand_"+id+"> "+ product_brand +" </td><td id=payptype_"+id+">" + product_type + "</td><td id=paypdescription >"+description+"</td><td id=paypprice>"+price+"</td><td id=paypqut><input onkeyup='calculateTotal()' type='text' value='1' id=qty"+i+"><td id=unitTotal"+i+">"+price+"</td></td></tr>";
    $(".product_payment_tbody").append(new_row);

    i = i+1;
}
function calculateTotal() {
  var count = document.getElementById("qty"+j).value;
  //console.log("qty"+j);
  //console.log(count);

    if(count == ""){
        count = 0;
    }
    console.log(count);
    console.log(price);
    unit_total = price * count;
    $('#unitTotal' + j).html(unit_total);


    sub_total = sub_total + unit_total;
    $("#product_subtotal_tbody .sub").html(sub_total);

    unit_total = 0;

}

function ppayment_cancel() {
     stockCount = 0;
     i = 0;
     arr = []; // input
     stock_id = [];
     stock_count = [];
     sub_total = 0;
     unit_total = 0;
     price = 0;
     j = -1;
     countarr = [];

    document.getElementById("product_payment").classList.add("hidden");
    document.getElementById("product_payment1").classList.add("hidden");

    for (var k = 0; k < stock_id.length ; k++){
        document.getElementById("btn_"+stock_id[k]).classList.remove("hidden");
        $("#product_payment_tbody tr").remove();
    }


}

function ppaybycash() {
    var c = 2;
    document.getElementById("product_payment").classList.add("hidden");
    document.getElementById("product_payment1").classList.add("hidden");
    var type = 'cash';
    var dataArray = [];
    dataArray.push(stock_id);
    dataArray.push(c);
   // dataArray.push(app_charge);
   dataArray.push(sub_total);
   dataArray.push(type);
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
        }
    });
    //document.getElementById("btn_"+id).classList.remove("hidden");
}