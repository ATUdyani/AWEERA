<?php require_once '../controller/functions.php' ?>
<?php require_once '../model/database.php' ?>
<?php require_once '../model/employee.php' ?>


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
    //$email = $db->removeSqlInjection($data[2]);
    $email = $data[2];
    $query = "SELECT * FROM employee WHERE emp_email='{$email}' LIMIT 1";

    $result_set = $db->executeQuery($query);
    $row = mysqli_fetch_array($result_set);

    // check whether the returned records emp_id is same as the editing record's emp_id. Then the email addresses can be same. Otherwise there will be a problem
    if($result_set){
        if($db->getNumRows($result_set)==1){
            if ($row['emp_id'] != $data[7]){
                $errors[] = 'Email Address already exists.';
            }
        }
    }

}

if (empty($data[3])){
    $errors[] = 'Phone Number is required.';
}

if (empty($data[4])){
    $errors[] = 'Address is required.';
}


if (!empty($errors)){
    echo 'There were error(s) on your form.<br>';
    foreach ($errors as $error) {
        echo $error."<br>";
    }
    echo "Employee is not updated";
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
    $emp_id = mysqli_real_escape_string($connection,$data[7]);

    $employee = new Employee();
    $employee ->setEmployee($first_name,$last_name,$emp_email,$emp_phone,$emp_address,$emp_type,$emp_gender);
    $employee->updateEmployee($emp_id);
}


?>
