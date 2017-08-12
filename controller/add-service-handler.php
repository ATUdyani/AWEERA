<?php require_once '../controller/functions.php' ?>
<?php require_once '../model/database.php' ?>
<?php require_once '../model/service.php' ?>

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

	if (empty($data[4])){
		$errors[] = 'Percentage is required.';
	}

	if (!empty($errors)){
 		echo 'There were error(s) on your form.<br>';
 		foreach ($errors as $error) {
 			echo $error."<br>";
 		}
 	}
 	else{
 		// adding a new record
 		$service_name = mysqli_real_escape_string($connection,$data[0]);
 		$service_charge = mysqli_real_escape_string($connection,$data[1]);
 		$description = mysqli_real_escape_string($connection,$data[2]);
 		$duration = mysqli_real_escape_string($connection,$data[3]);
        $commission_percentage = mysqli_real_escape_string($connection,$data[4]);


 		$service = new Service();
 		$service ->setService($service_name,$service_charge,$description,$duration,$commission_percentage);
 		$service->addService();

 	}
 	
 ?>
