<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Employee.php' ?>
<?php require_once '../model/Appointment.php' ?>
<?php require_once '../model/RegisteredCustomer.php' ?>
<?php require_once '../model/StockItem.php' ?>
<?php require_once '../model/Supplier.php' ?>
<?php require_once '../model/Service.php' ?>
<?php require_once '../model/User.php' ?>
<?php require_once '../model/RegisterRequest.php' ?>
<?php require_once '../model/ActivityLog.php' ?>


<?php

$result =0;
$data = json_decode(stripslashes($_POST['data']));
$record_id = $data[0];
$table_name = $data[1];

if ($table_name=='employee'){
    $employee = new Employee();
    $result_emp = $employee->getEmployeeData($record_id);
    $type = $result_emp['emp_type'];

    if ($type=="Receptionist"){
        $result = $employee -> deleteEmployee($record_id);
        $description = "Delete Employee Details";
    }
    else{
        $appointment = new Appointment();
        $result_appointment = $appointment->countAppointmentsBeautician($record_id);
        if ($result_appointment['appointment_count']!=0){
            echo "<h4>".$result_emp['first_name']." ".$result_emp['last_name']." has ".$result_appointment['appointment_count']
                ." Upcoming Appointment(s)<br><br>Please cancel them and try to delete!</h4>";
        }
        else{
         $result=1;
         //$result = $employee -> deleteEmployee($record_id);
        }
    }
}
elseif ($table_name=='customer'){
    $customer = new RegisteredCustomer();
    $result = $customer -> deleteRegisteredCustomer($record_id);
    $description = "Delete Customer Details";
}
elseif ($table_name=='user'){
    $user = new User();
    $result = $user -> deleteUser($record_id);
    $description = "Delete User Details";
}
elseif ($table_name=='service'){
    $service = new Service();
    $result = $service -> deleteService($record_id);
    $description = "Delete Service Details";
}
elseif ($table_name=='stock_item'){
    $stock = new StockItem();
    $result = $stock -> deleteStock($record_id);
    $description = "Delete Stock Details";
}
elseif ($table_name=='supplier'){
    $supplier = new Supplier();
    $result = $supplier -> deleteSupplier($record_id);
    $description = "Delete Supplier Details";
}
elseif ($table_name=='supplier'){
    $supplier = new Supplier();
    $result = $supplier -> deleteSupplier($record_id);
    $description = "Delete Supplier Details";
}
elseif ($table_name=='register_request'){
    $request = new RegisterRequest();
    $result = $request -> deleteRequest($record_id);
    $description = "Delete Register Request";
}

if ($result){
    echo "<h4>Record Deleted Successfully</h4>";

    $activity_log = new ActivityLog();
    $activity_log->addActivityLogSession($record_id,$description);
}
else{
    echo "<h4>Failed to Delete the Record</h4>";
}

?>
