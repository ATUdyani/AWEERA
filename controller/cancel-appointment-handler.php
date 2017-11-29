<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Appointment.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 08-Oct-17
 * Time: 11:14 PM
 */
	$data = json_decode(stripslashes($_POST['data']));
    $appointment = new Appointment();
    $result = $appointment->cancelAppointment($data[0]);
 ?>
