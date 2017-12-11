<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Appointment.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: dwnad
 * Date: 12/6/2017
 * Time: 2:47 PM
 */

$data = json_decode(stripslashes($_POST['data']));
$appointment = new Appointment();
$appointment -> viewAppointmentPaymentDetails($data[0],$data[1]);
?>
