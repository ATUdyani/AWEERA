<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Appointment.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 04-Oct-17
 * Time: 10:34 PM
 */
$data = json_decode(stripslashes($_POST['data']));
$appointment = new Appointment();
$free_slots = $appointment -> getFreeSlots($data[0],$data[1]);
echo json_encode($free_slots);
?>