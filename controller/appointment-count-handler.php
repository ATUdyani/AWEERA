<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Appointment.php' ?>

<?php


    $comment = new Appointment();
    $count = $comment ->countAppointmentsCustomer($_POST['cust_id']);
    echo $count['appointment_count']
?>
