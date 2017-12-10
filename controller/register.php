<?php session_start() ?>

<?php
require_once ('../model/Database.php');
require_once ('../model/RegisterRequest.php');
require_once ('functions.php');

// making connection
$db = new Database();
$connection = $db->connect();

$data = json_decode(stripslashes($_POST['data']));
$rg_first_name = $data[0];
$rg_last_name = $data[1];
$rg_contact_number = $data[2];
$rg_address = $data[3];
$rg_email = $data[4];
$rg_gender = $data[5];
$rg_password = $data[6];
$rg_cpassword = $data[7];

// check for submission
$result =array();
$errors =null;

// check if the username and password has been entered
if (!isset($rg_first_name) || strlen(trim($rg_first_name)) < 1){
    $errors = 'Fill first name';
}

if (!isset($rg_last_name) || strlen(trim($rg_last_name)) < 1 ){
    $errors = 'Fill last name';
}

if (!isset($rg_contact_number) || strlen(trim($rg_contact_number)) < 1 ){
    $errors = 'Fill contact number';
}

if(!isValidPhoneNumber($rg_contact_number)){
    $errors = 'Invalid phone number';
}

if (!isset($rg_address) || strlen(trim($rg_address)) < 1 ){
    $errors = 'Fill Address';
}

if (!isset($rg_email) || strlen(trim($rg_email)) < 1 ){
    $errors = 'Fill email';
}

if(!is_email($rg_email)){
    $errors= 'Invalid email';
}

if (!isset($rg_password) || strlen(trim($rg_password)) < 1 ){
    $errors= 'Invalid user registration';
}

if(strcmp($rg_password, $rg_cpassword) != 0){
    $errors = 'password doesnt match';
}

$query = "SELECT * FROM register_request WHERE cust_email='{$rg_email}' LIMIT 1";

$result_set = $db->executeQuery($query);

$emailFlag = false;
if ($result_set) {
    if ($db->getNumRows($result_set) == 1) {
        $errors = 'Your request already send.';
        $emailFlag=true;
    }
}

if (!$emailFlag){
    $query = "SELECT * FROM registered_customer WHERE cust_email='{$rg_email}' LIMIT 1";

    $result_set = $db->executeQuery($query);

    if ($result_set) {
        if ($db->getNumRows($result_set) == 1) {
            $errors = 'You are already user.';
        }
    }
}

// if (!isset($rg_cpassword) || strlen(trim($rg_cpassword)) < 1 ){
//    $errors[] = 'Invalid user registration';
// }


// check if there are any errors in the form
if ($errors == null){

    // save username and password into variables
    // in here user can enter a sql statement to damage our database (sql injection), so we must remove this risk

    $rg_first_name = mysqli_real_escape_string($connection,$rg_first_name);
    $rg_last_name = mysqli_real_escape_string($connection,$rg_last_name);
    $rg_contact_number = mysqli_real_escape_string($connection,$rg_contact_number);
    $rg_address = mysqli_real_escape_string($connection,$rg_address);
    $rg_email = mysqli_real_escape_string($connection,$rg_email);
    $rg_gender=mysqli_real_escape_string($connection,$rg_gender);
    $rg_password = mysqli_real_escape_string($connection,$rg_password);
    $hashed_password = md5($rg_password);

    //$hashed_password = sha1($password);

    // insert new register request
    $register_request = new RegisterRequest();
    $result_set = $register_request ->addRegisterRequest($rg_first_name,$rg_last_name,$rg_contact_number,$rg_address,$rg_email,$rg_gender,$hashed_password);

    if($result_set){
        array_push($result,"success");
        array_push($result, "Successfully registered");
        echo json_encode($result);
        //echo "done";
    }
    else{
        array_push($result,"failure", "Not successfully registered,db error");
        echo json_encode($result);
        //echo "undone";
    }
}
else{
    array_push($result,"failure", $errors);
    echo json_encode($result);
    //echo "error";
}

?>