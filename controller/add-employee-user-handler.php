<?php require_once '../model/Database.php' ?>
<?php require_once '../model/User.php' ?>
<?php require_once 'functions.php' ?>

<?php
	$db = new Database();
	$connection = $db->connect();

	$data = json_decode(stripslashes($_POST['data']));
	$errors = array();

	$first_name = mysqli_real_escape_string($connection,$data[0]);
	$last_name = mysqli_real_escape_string($connection,$data[1]);
	$emp_email = mysqli_real_escape_string($connection,$data[2]);
	$emp_type = mysqli_real_escape_string($connection,$data[3]);
	$emp_password = mysqli_real_escape_string($connection,$data[4]);
	$emp_id = mysqli_real_escape_string($connection,$data[5]);

if (empty($emp_password)){
    $errors[] = 'Password is required.';
}
if(!isValidEmail($emp_email)){
    $errors[] = 'Invalid email address';
}


if (!empty($errors)){
 		echo '<h4>There were error(s) on your form.</h4><br>';
 		foreach ($errors as $error) {
 			echo "<h4>".$error."</h4><br>";
 		}
    echo "<h4>User is not inserted</h4>";
 	}
 	else{

        $employee = new User();
        $employee ->addEmployeeUser($first_name,$last_name,$emp_email,$emp_type,$emp_password,$emp_id);
 	}

 	
 ?>
