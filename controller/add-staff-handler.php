<?php require_once '../controller/functions.php' ?>
<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Employee.php' ?>
<?php require_once '../model/Beautician.php' ?>

<?php
	$db = new Database();
	$connection = $db->connect();

	$data = json_decode(stripslashes($_POST['data']));
	$errors = array();

	// checking required fields
	if (empty($data[0])){
		$errors[] = 'First Name is required.';
	}

	if (empty($data[1])){
		$errors[] = 'Last Name is required.';
	}

	if (empty($data[2])){
		$errors[] = 'Email is required.';
	}
 	elseif(!is_email($data[2])){ // cheking email address
 		$errors[] = "Email Address is invalid.";
 	}
 	else{ // checking if email address already exists
 		$email = $data[2];
 		$query = "SELECT * FROM employee WHERE emp_email='{$email}' LIMIT 1";

 		$result_set = $db->executeQuery($query);

 		if($result_set){
 			if($db->getNumRows($result_set)==1){
 				$errors[] = 'Email Address already exists.';
 			}
 		}

 	}

	if (empty($data[3])){
		$errors[] = 'Phone Number is required.';
	}

	if (empty($data[4])){
		$errors[] = 'Address is required.';
	}

	if ($data[5]=="Beautician"){
		// if services are not selected
		if (empty($data[7])){
            $errors[] = 'Services are required.';
		}
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
 		$last_name = mysqli_real_escape_string($connection,$data[1]);
 		$emp_email = mysqli_real_escape_string($connection,$data[2]);
 		$emp_phone = mysqli_real_escape_string($connection,$data[3]);
 		$emp_address = mysqli_real_escape_string($connection,$data[4]);
        $emp_type = mysqli_real_escape_string($connection,$data[5]);
        $emp_gender = mysqli_real_escape_string($connection,$data[6]);
        if ($emp_type == "Beautician"){
            $emp_services = $data[7] ;
		}


        $employee = new Employee();
        $employee ->setEmployee($first_name,$last_name,$emp_email,$emp_phone,$emp_address,$emp_type,$emp_gender);
        $employee->addEmployee();

        // if employee is a beautician, beautician's service list has to be inserted to the database
		if ($emp_type == "Beautician"){
			$beautician = new Beautician();
            $beautician ->addBeauticianServices($emp_services);
		}

 	}

 	
 ?>
