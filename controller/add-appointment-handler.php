<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Appointment.php' ?>
<?php require_once '../model/Service.php' ?>
<?php require_once '../model/Employee.php' ?>
<?php require_once '../model/ActivityLog.php' ?>
<?php require_once '../model/RegisteredCustomer.php' ?>
<?php require_once '../model/Customer.php' ?>
<?php require_once('../model/SMS.php') ?>
<?php require_once('../model/Email.php') ?>

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
    $start_time = $appointment_time;
    $end_time = $appointment->getEndTime($start_time,$duration);

    $last_id=$db->getLastId('appointment_id','appointment');
    $new_id =$db->generateId($last_id,"APP");

    $appointment->makeAppointment($service_id,$emp_id,$appointment_date,$start_time,$end_time,$cust_id,$new_id);

    //add activity
    $description = "Add a new appointment";
    $activity_log = new ActivityLog();
    $activity_log->addActivityLog($new_id,$description);

    // get customer email
    $customer = new Customer();
    $row = $customer->getCustomerData($cust_id);
    $cust_email = $row['cust_email'];
    $cust_phone = $row['cust_phone'];

    // get beautician name
    $beautician = new Employee();
    $row = $beautician->getEmployeeData($emp_id);
    $emp_first_name = $row['first_name'];
    $emp_last_name = $row['last_name'];

    // get service name
    $service = new Service();
    $row = $service->getServiceData($service_id);
    $service_name = $row['service_name'];
    $service_charge = $row['service_charge'];

    // send email confirmation
    $email = new Email();
    //$email -> sendAppointmentSuccessEmail($cust_email,$appointment_date,$start_time,$end_time,$emp_first_name,$emp_last_name,$service_name,$service_charge);



    // send confirmation sms
    $sms = new SMS();
    $sms -> sendAppointmentSuccessSMS($cust_phone,$appointment_date,$start_time,$end_time,$emp_first_name,$emp_last_name,$service_name,$service_charge);


}

 ?>
