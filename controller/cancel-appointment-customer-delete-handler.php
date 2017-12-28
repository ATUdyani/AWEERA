<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Appointment.php' ?>

<?php


    $appointment = new Appointment();
    $result_set = $appointment->getCustomerAppointments($_POST['cust_id']);

        while($appointments = mysqli_fetch_array($result_set)) {
            $appointment->cancelAppointment($appointments['appointment_id']);
        }

    $customer = new RegisteredCustomer();
    $result = $customer -> deleteRegisteredCustomer($_POST['cust_id']);

    if ($result){
        echo "<h4>Record Deleted Successfully</h4>";
    }
    else{
        echo "<h4>Failed to Delete the Record</h4>";
    }
 ?>
