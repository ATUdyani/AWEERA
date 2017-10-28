<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Appointment.php' ?>
<?php require_once '../model/Service.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 08-Oct-17
 * Time: 9:32 PM
 */

	$db = new Database();
	$connection = $db->connect();

	$data = json_decode(stripslashes($_POST['data']));
	$errors = array();

	$service_id = mysqli_real_escape_string($connection,$data[0]);
	$emp_id = mysqli_real_escape_string($connection,$data[1]);
	$appointment_date = mysqli_real_escape_string($connection,$data[2]);
	$appointment_time = mysqli_real_escape_string($connection,$data[3]);
	$cust_id = mysqli_real_escape_string($connection,$data[4]);

	if ($service_id==""){
	    $errors[] = "Please Select a Service";
    }

    if($emp_id==""){
        $errors[] = "Please Select a Beautician";
    }

    if($appointment_date==""){
        $errors[] = "Please Select a Date";
    }
    else if(strlen($appointment_date)!=10){
        $errors[] = "Please Check the Date";
    }

    if($appointment_time==""){
        $errors[] = "Please Select a Time";
    }


if (!empty($errors)){
    echo '<h4>There were error(s) on your form.</h4><br>';
    foreach ($errors as $error) {
        echo "<h4>".$error."</h4><br>";
    }
}
else{
    $service = new Service();
    $duration = $service->fetchServiceDuration($service_id);
    $appointment = new Appointment();
    $appointment->makeAppointment($service_id,$emp_id,$appointment_date,$appointment_time,$duration,$cust_id);
}

 ?>
