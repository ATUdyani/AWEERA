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

$emp_password = mysqli_real_escape_string($connection,$data[1]);
$user_id = mysqli_real_escape_string($connection,$data[0]);

if (!empty($errors)){
    echo 'There were error(s) on your form.<br>';
    foreach ($errors as $error) {
        echo $error."<br>";
    }
}
else{

    $user = new User();
    $user ->changeUserPassword($emp_password,$user_id);
}


?>
