<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Payment.php' ?>

<?php
$data = json_decode(stripslashes($_POST['data']));
$payment = new Payment();
$payment -> doAppointmentPayments($data[0],$data[1],$data[2],$data[3]);

?>

