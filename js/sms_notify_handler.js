// send sms before 1 hour
setInterval(function(){
    $.ajax({
        url:'../controller/sms-notify-handler.php',
        type: "POST",
        data : "",
        success: function(data) {
            //alert(data);
        }
    });
},3000);