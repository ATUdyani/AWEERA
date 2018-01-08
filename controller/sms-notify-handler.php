<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Appointment.php' ?>

<?php

    date_default_timezone_set('Asia/Colombo');

    $current_time = date("H:i");
    echo $current_time;

    $appointment = new Appointment();
    $result_set=$appointment->getAppointmentsToday();

    while($appointments = mysqli_fetch_array($result_set)) {
        echo $appointments['start_time'];
    }

?>
