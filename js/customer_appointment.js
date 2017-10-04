// load service names for a particular service
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

// load particular beautician names for a particular service name
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

// enable calender
function enableCalender() {
    document.getElementById("appointment_date").disabled=false;
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    }
    if(mm<10){
        mm='0'+mm
    }

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("appointment_date").setAttribute("min", today);
}

// load free slots for a particualr beautician for a particular day
function loadSlots(){
    var appointmentDate = document.getElementById("appointment_date").value;
    var beauticianId = document.getElementById("select_beautician_name").value;
    var dataArray = [];
    dataArray.push(beauticianId);
    dataArray.push(appointmentDate);
    var jsonString = JSON.stringify(dataArray);
    $.ajax({
        url:"../controller/fetch-time-slots.php",
        method: "post",
        data: {data:jsonString},
        dataType: "json",
        cache:false,
        success: function( data ) {
            $('#time_slots').html(data);
            document.getElementById("time_slots").disabled=false;
        }
    });
}


