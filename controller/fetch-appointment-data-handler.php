<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Appointment.php' ?>


<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 27-Aug-17
 * Time: 10:30 PM
 */

    $appointment = new Appointment();
    $result = $appointment -> getAppointmentData($_POST['appointment_id']);
    echo json_encode($result);
?>