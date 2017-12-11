var sub_total = 0;
var app_id = [];
var app_charge = [];
var btn_id = [];
var i = 0;
// load suitable appointment results on keyup
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
                url: "../controller/search-appointment-payment-handler.php",
                method: "post",
                data:{data:jsonString},
                cache: false,
                success: function (data) {
                    $('#appointment_result').html(data);
                }
            });
        }
        else{
            $.ajax({
                url: "../controller/search-appointment-payment-handler.php",
                method: "post",
                data:{data:jsonString},
                cache: false,
                success: function (data) {
                    $('#appointment_result').html(data);
                }
            });
        }
    });
});


function addToCart(id) {


    document.getElementById("appointment_payment").classList.remove("hidden");
    document.getElementById("appointment_payment1").classList.remove("hidden");

    document.getElementById("btn_"+id).classList.add("hidden");

    var Service_name = document.getElementById("sname_"+id).innerText;
    var Service_charge = document.getElementById("scharge_"+id).innerText;

    var appId = id;

    var arr = Service_charge.split("_"); /////////////////////////////
    var price = parseFloat(arr[0]);

    app_id[i] = appId;
    btn_id[i] = appId;
    app_charge[i] = price;
    sub_total = sub_total + price;

    var new_row = "<tr id="+i+"><td id=paysname_"+id+"> "+ Service_name +" </td><td id=payscharge_"+id+">" + Service_charge + "</td><td><button onclick='remove_appointment(id)' id="+i+" class = \"btn btn-danger btn-sm fa fa-minus-circle\" value = \"remove\"><span> Remove </span></button></td></tr>";
    $(".payment_tbody").append(new_row);

    var new_subtotal = sub_total;
    $("#subtotal_tbody .sub").html(new_subtotal);

    i = i +1;



}

function paybycard() {

    document.getElementById("appointment_payment").classList.add("hidden");
    document.getElementById("appointment_payment1").classList.add("hidden");
    var type = 'card';
    var dataArray = [];
    dataArray.push(app_id);
    dataArray.push(app_charge);
    dataArray.push(sub_total);
    dataArray.push(type);
    var jsonString = JSON.stringify(dataArray);
    //console.log("hi");
    $.ajax({
        url: "../controller/appointment-payment-handler.php",
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



    //window.location = document.url;
    //window.location.reload(true);

}

function paybycash() {
    //var value = document.getElementById("sub_total_"+id).innerText;
    document.getElementById("appointment_payment").classList.add("hidden");
    document.getElementById("appointment_payment1").classList.add("hidden");
    var type = 'cash';
    var dataArray = [];
    dataArray.push(app_id);
    dataArray.push(app_charge);
    dataArray.push(sub_total);
    dataArray.push(type);
    var jsonString = JSON.stringify(dataArray);
    //console.log("hi");
    $.ajax({
        url: "../controller/appointment-payment-handler.php",
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



    //window.location = document.url;
    //window.location.reload(true);


}

function payment_cancel() {

    for (var k = 0; k < app_id.length ; k++){
        document.getElementById("btn_"+btn_id[k]).classList.remove("hidden");
        $("#payment_tbody tr").remove();
    }
    document.getElementById("appointment_payment").classList.add("hidden");
    document.getElementById("appointment_payment1").classList.add("hidden");

    sub_total = 0;
    app_id = [];
    app_charge = [];
    btn_id = [];
    i = 0;




}

function remove_appointment(id) {
    //console.log(id);
    document.getElementById("btn_"+app_id[id]).classList.remove("hidden");
    if (app_id.length == 1){
        $('#'+id).remove();
        document.getElementById("appointment_payment").classList.add("hidden");
        document.getElementById("appointment_payment1").classList.add("hidden");
        sub_total = 0;
        app_id = [];
        app_charge = [];
        i = 0;
    }else{
        sub_total = sub_total - app_charge[id];
        app_id[id] = "";
        app_charge[id] = 0;
        $('#'+id).remove();
        var new_subtotal = sub_total;
        $("#subtotal_tbody .sub").html(new_subtotal);
    }


}

// function to activate the first tab
$(function () {
    $('#myTab a:first').tab('show');
});

$('#msg_Modal').on('hidden.bs.modal', function () {
    $('#content').load("manage-payments.php");
});