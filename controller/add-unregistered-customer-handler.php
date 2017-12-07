<?php require_once '../controller/functions.php' ?>
<?php require_once '../model/Database.php' ?>
<?php require_once '../model/UnregisteredCustomer.php' ?>

<?php

	$db = new Database();
	$connection = $db->connect();

	$data = json_decode(stripslashes($_POST['data']));
	$errors = array();

	// checking required fields
	if (empty($data[0])){
		$errors[] = 'First Name is required.';
	}

	if (empty($data[2])){
		$errors[] = 'Phone Number is required.';
	}

	if (!empty($errors)){
 		echo '<h4>There were error(s) on your form.</h4><br>';
 		foreach ($errors as $error) {
 			echo "<h4>".$error."</h4><br>";
 		}
 	}
 	else{
 		// adding a new record
 		$first_name = mysqli_real_escape_string($connection,$data[0]); 
 		$last_name = mysqli_real_escape_string($connection,$data[1]);;
 		$cust_phone = mysqli_real_escape_string($connection,$data[2]);
        $cust_gender = mysqli_real_escape_string($connection,$data[3]);

        $unregistered_customer = new UnregisteredCustomer();
        $result = $unregistered_customer ->addUnregisteredCustomer($first_name,$last_name,$cust_phone,$cust_gender);
        echo json_encode($result);
 	}
 ?>
