function bookAppointment() {
    window.location.href = "customer-home.php";
}

// load new appointments count
setInterval(function(){
    var cust_id = document.getElementById('user_reg_id').value;
    $.ajax({
        url:'../controller/appointment-count-handler.php',
        type: "POST",
        data: {cust_id:cust_id},
        success: function(data)
        {
            if (data!=0){
                $('#appointment_count').html(data+" NEW");
            }
            else {
                $('#appointment_count').html("");
            }
        }
    });
},3000);
