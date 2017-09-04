function loadServiceNames(val) {
    var passedVal = val;
    $.ajax({
        url:"../controller/fetch-service-names.php",
        method: "post",
        data: {data:passedVal},
        dataType: "json",
        cache:false,
        success: function( data ) {
            $('#select_service_name').html(data);
            document.getElementById("select_service_name").disabled=false;
        }
    });
}

function loadBeauticianNames(val) {
    var passedVal = val;
    $.ajax({
        url:"../controller/fetch-beautician-names.php",
        method: "post",
        data: {data:passedVal},
        dataType: "json",
        cache:false,
        success: function( data ) {
            $('#select_beautician_name').html(data);
            document.getElementById("select_beautician_name").disabled=false;
        }
    });
}


