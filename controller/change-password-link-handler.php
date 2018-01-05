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

$password = mysqli_real_escape_string($connection,$data[1]);
$user_id = mysqli_real_escape_string($connection,$data[0]);

if (!empty($errors)){
    echo '<h4>There were error(s) on your form.<br>';
    foreach ($errors as $error) {
        echo $error."<br></h4>";
    }
}
else{
    $user = new User();
    $result = $user->getUserData($user_id);
    if ($result['is_lost_password']=='0'){
        echo "<h4>Failed to Change the Password. <br> Password change request was not made!</h4>";
    }
    else{
        $user ->changeUserPasswordLink($password,$user_id);
    }
}


?>
