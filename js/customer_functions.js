function loadMyAppointments(){
    $('#content').load("manage-appointments.php");
}

function bookAppointment() {
    window.location.href = "customer-appointment.php";
}
