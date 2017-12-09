<?php require_once '../controller/functions.php' ?>
<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Customer.php' ?>


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
    $query = "SELECT * FROM customer WHERE cust_email='{$email}' LIMIT 1";

    $result_set = $db->executeQuery($query);
    $row = mysqli_fetch_array($result_set);

    // check whether the returned records cust_id is same as the editing record's cust_id. Then the email addresses can be same. Otherwise there will be a problem
    if($result_set){
        if($db->getNumRows($result_set)==1){
            if ($row['cust_id'] != $data[7]){
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
    echo '<h4>There were error(s) on your form.<br>';
    foreach ($errors as $error) {
        echo $error."<br></h4>";
    }
    echo "<h4>Customer is not updated</h4>";
}
else{
    // adding a new record
    $first_name = mysqli_real_escape_string($connection,$data[0]);
    $last_name = mysqli_real_escape_string($connection,$data[1]);
    $cust_gender=mysqli_real_escape_string($connection,$data[2]);
    $cust_phone = mysqli_real_escape_string($connection,$data[3]);
    $cust_address = mysqli_real_escape_string($connection,$data[4]);
    $cust_email = mysqli_real_escape_string($connection,$data[5]);
    $date_joined = mysqli_real_escape_string($connection,$data[6]);
    $cust_id = mysqli_real_escape_string($connection,$data[7]);

    $customer = new Customer();
    $customer ->setCustomer($first_name,$last_name,$cust_gender,$cust_phone,$cust_address,$cust_email,$date_joined);
    $customer->updateCustomer($cust_id);
}


?>
