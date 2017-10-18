<?php require_once "../model/Appointment.php"?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 09-Sep-17
 * Time: 8:18 PM
 */

$data = json_decode(stripslashes($_POST['data']));
$appointment = new Appointment();
$result = $appointment ->searchAppointmentDetails($data[0],$data[1]);
echo $result;
?>