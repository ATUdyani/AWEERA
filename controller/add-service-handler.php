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
	else{
        if($data[3]>=100){
            $errors[] = 'Invalid percentage';
        }
	}

	if (empty($data[4])){
		$errors[] = 'Percentage is required.';
	}

	if (!empty($errors)){
 		echo '<h4>There were error(s) on your form.</h4><br>';
 		foreach ($errors as $error) {
 			echo "<h4>".$error."</h4><br>";
 		}
        echo "<h4>Service is not inserted</h4>";
 	}
 	else{

        $last_id=$db->getLastId('service_id','service');
        $new_id =$db->generateId($last_id,"SER");

 		// adding a new record
 		$service_name = mysqli_real_escape_string($connection,$data[0]);
 		$service_charge = mysqli_real_escape_string($connection,$data[1]);
 		$description = mysqli_real_escape_string($connection,$data[2]);
 		$duration = mysqli_real_escape_string($connection,$data[3]);
        $commission_percentage = mysqli_real_escape_string($connection,$data[4]);

        $service = new Service();
 		$service ->setService($new_id,$service_name,$service_charge,$description,$duration,$commission_percentage);
 		$result = $service->addService();

        $description = "Add New Service";
        $activity_log = new ActivityLog();
        $activity_log->addActivityLogSession($new_id,$description);

 	}
 	
 ?>
