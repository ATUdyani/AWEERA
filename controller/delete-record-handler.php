<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Employee.php' ?>
<?php require_once '../model/RegisteredCustomer.php' ?>
<?php require_once '../model/Service.php' ?>
<?php require_once '../model/User.php' ?>

<?php

$result =0;
$data = json_decode(stripslashes($_POST['data']));
$record_id = $data[0];
$table_name = $data[1];

if ($table_name=='employee'){
    $employee = new Employee();
    $result = $employee -> deleteEmployee($record_id);
}
elseif ($table_name=='customer'){
    $customer = new RegisteredCustomer();
    $result = $customer -> deleteRegisteredCustomer($record_id);
}
elseif ($table_name=='user'){
    $user = new User();
    $result = $user -> deleteUser($record_id);
}
elseif ($table_name=='service'){
    $service = new Service();
    $result = $service -> deleteService($record_id);
}

if ($result){
    echo "<h4>Record Deleted Successfully</h4>";
}
else{
    echo "<h4>Failed to Delete the Record</h4>";
}

?>