<?php require_once '../controller/functions.php' ?>
<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Service.php' ?>
<?php require_once '../model/ActivityLog.php' ?>

<?php
$db = new Database();
$connection = $db->connect();

$data = json_decode(stripslashes($_POST['data']));
$errors = array();

// checking required fields
if (empty($data[0])){
    $errors[] = 'Service Name is required.';
}

if (empty($data[1])){
    $errors[] = 'Service Charge is required.';
}

if (empty($data[2])){
    $errors[] = 'Description is required.';
}

if (empty($data[3])){
    $errors[] = 'Duration is required.';
}

if (empty($data[4])) {
    $errors[] = 'Commission Percentage is required.';
}
else{
    if($data[4]>=100){
        $errors[] = 'Invalid percentage';
    }
}

if (!empty($errors)){
    echo '<h4>There were error(s) on your form.</h4><br>';
    foreach ($errors as $error) {
        echo "<h4>".$error."</h4><br>";
    }
    echo "<h4>Service is not updated</h4>";
}
else{
    // adding a new record
    $service_name = mysqli_real_escape_string($connection,$data[0]);
    $service_charge = mysqli_real_escape_string($connection,$data[1]);
    $description = mysqli_real_escape_string($connection,$data[2]);
    $duration = mysqli_real_escape_string($connection,$data[3]);
    $commission_percentage = mysqli_real_escape_string($connection,$data[4]);
    $service_id = mysqli_real_escape_string($connection,$data[5]);

    $employee = new Service();
    $employee ->setService($service_id,$service_name,$service_charge,$description,$duration,$commission_percentage);
    $employee->updateService($service_id);

    $description = "Update Service Details";
    $activity_log = new ActivityLog();
    $activity_log->addActivityLogSession($service_id,$description);
}


?>
