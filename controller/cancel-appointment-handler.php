<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Appointment.php' ?>
<?php require_once '../model/Customer.php' ?>
<?php require_once '../model/Employee.php' ?>
<?php require_once '../model/Service.php' ?>
<?php require_once '../model/Email.php' ?>
<?php require_once '../model/SMS.php' ?>
<?php require_once '../model/ActivityLog.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 08-Oct-17
 * Time: 11:14 PM
 */
	$data = json_decode(stripslashes($_POST['data']));
    $appointment = new Appointment();

    // execute the query and extract the details of the particular appointment
    $row = $appointment->getAppointmentData($data[0]);
    $appointment_date = $row['appointment_date'];
    $start_time = $row['start_time'];
    $end_time = $row['end_time'];

    $emp_id = $row['emp_id'];
    $service_id = $row['service_id'];
    $cust_id = $row['cust_id'];

    // execute the query and extract the beautician name
    $beautician = new Employee();
    $row = $beautician->getEmployeeData($emp_id);
    $emp_first_name = $row['first_name'];
    $emp_last_name = $row['last_name'];

    // execute the query and extract the service name
    $service = new Service();
    $row = $service->getServiceData($service_id);
    $service_name = $row['service_name'];

    // execute the query and extract the email address of the customer
    $customer = new Customer();
    $row = $customer->getCustomerData($cust_id);
    $cust_email = $row['cust_email'];
    $cust_phone = $row['cust_phone'];

    // cancel the appointment
    $appointment->cancelAppointment($data[0]);

    $description = "Cancel Appointment";
    $activity_log = new ActivityLog();
    $activity_log->addActivityLogSession($data[0],$description);

    // send email confirmation
    $email = new Email();
    $email -> sendAppointmentCancelEmail($cust_email,$appointment_date,$start_time,$end_time,$service_name,$emp_first_name,$emp_last_name);


    // send confirmation sms
    $sms = new SMS();
    $sms -> sendAppointmentCancelSMS($cust_phone,$appointment_date,$start_time,$end_time,$emp_first_name,$emp_last_name,$service_name);


?>
