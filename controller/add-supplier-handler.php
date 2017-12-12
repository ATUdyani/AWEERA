<!--/**
 * Created by PhpStorm.
 * User: Thilakshika-PC
 * Date: 2017-10-08
 * Time: 9:55 AM
 */-->
<?php require_once '../controller/functions.php' ?>
<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Supplier.php' ?>

<?php
$db = new Database();
$connection = $db->connect();

$data = json_decode(stripslashes($_POST['data']));
$errors = array();

// checking required fields
if (empty($data[0])){
    $errors[] = 'Name is required.';
}

if (empty($data[1])){
    $errors[] = 'Phone Number is required.';
}
else{
    if(!isValidPhoneNumber($data[1])){
        $errors[] = 'Invalid phone number';
    }
}

if (empty($data[2])){
    $errors[] = 'Address is required.';
}

if (empty($data[3])){
    $errors[] = 'Email is required.';
}
elseif(!is_email($data[3])){ // cheking email address
    $errors[] = "Email Address is invalid.";
}
else{ // checking if email address already exists
    $email = $data[3];
    $query = "SELECT * FROM supplier WHERE supplier_email='{$email}' LIMIT 1";

    $result_set = $db->executeQuery($query);

    if($result_set){
        if($db->getNumRows($result_set)==1){
            $errors[] = 'Email Address already exists.';
        }
    }

}

if (!empty($errors)){
    echo '<h4>There were error(s) on your form.</h4><br>';
    foreach ($errors as $error) {
        echo "<h4>".$error."</h4><br>";
    }
    echo "<h4>Supplier is not inserted</h4>";
}
else{
    // adding a new record
    $supplier_name = mysqli_real_escape_string($connection,$data[0]);
    $supplier_phone = mysqli_real_escape_string($connection,$data[1]);
    $supplier_address = mysqli_real_escape_string($connection,$data[2]);
    $supplier_email = mysqli_real_escape_string($connection,$data[3]);

    $supplier = new Supplier();
    $supplier ->setSupplier($supplier_name,$supplier_phone,$supplier_address,$supplier_email);
    $supplier->addSupplier();

}


?>
