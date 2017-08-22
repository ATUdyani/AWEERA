<?php require_once '../controller/functions.php' ?>
<?php require_once '../model/Database.php' ?>
<?php require_once '../model/User.php' ?>

<?php
	$db = new Database();
	$connection = $db->connect();

	$data = json_decode(stripslashes($_POST['data']));
	$errors = array();

	if (empty($data[1])){
		$errors[] = 'Password is required.';
	}

	$first_name = mysqli_real_escape_string($connection,$data[0]);
	$last_name = mysqli_real_escape_string($connection,$data[1]);
	$emp_email = mysqli_real_escape_string($connection,$data[2]);
	$emp_type = mysqli_real_escape_string($connection,$data[3]);
	$emp_password = mysqli_real_escape_string($connection,$data[4]);
	$emp_id = mysqli_real_escape_string($connection,$data[5]);

if (!empty($errors)){
 		echo 'There were error(s) on your form.<br>';
 		foreach ($errors as $error) {
 			echo $error."<br>";
 		}
 	}
 	else{

        $employee = new User();
        $employee ->addEmployeeUser($first_name,$last_name,$emp_email,$emp_type,$emp_password,$emp_id);
 	}

 	
 ?>
