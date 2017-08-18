<?php session_start() ?>

<?php 
   require_once ('../model/database.php');

   // making connection
    $db = new Database();
    $connection = $db->connect();


    $data = json_decode(stripslashes($_POST['data']));
    $entered_email = $data[0];
    $entered_password = $data[1];

    // check for submission
    $errors =array();

    // check if the username and password has been entered
    if (!isset($entered_email) || strlen(trim($entered_email)) < 1){
       $errors[] = 'Username is Missing / Invalid';
    }

    if (!isset($entered_password) || strlen(trim($entered_password)) < 1 ){
       $errors[] = 'Password is Missing / Invalid';
    }

    // check if there are any errors in the form
    if (empty($errors)){

       // save username and password into variables
          // in here user can enter a sql statement to damage our database (sql injection), so we must remove this risk

       $email = mysqli_real_escape_string($connection,$entered_email);
       $password = mysqli_real_escape_string($connection,$entered_password);
       $hashed_password = $password;

       //$hashed_password = sha1($password);

       // prepare database query
       $query = "SELECT * FROM user WHERE email ='{$email}' AND password = '{$hashed_password}' LIMIT 1";

       $result_set = $db -> executeQuery($query);

       $db -> verifyQuery($result_set);

       // query successful
       if ($db -> getNumRows($result_set) == 1){
          // valid user found
          $user = mysqli_fetch_assoc($result_set);
          $_SESSION['user_id'] = $user['id'];
          $_SESSION['first_name'] = $user['first_name'];
          $_SESSION['last_name'] = $user['last_name'];

          // update last login
          $query = "UPDATE user SET last_login=NOW() WHERE id = {$_SESSION['user_id']} LIMIT 1";
          $result_set = mysqli_query($connection,$query);

          $db->verifyQuery($result_set);

          // redirect to userhome.php
          $type = $user["type"];
          if ($type == "Administrator"){
              echo 'view/admin-home.php';
          }

       }
       else{
          // username and password invalid
          $errors[] = 'Invalid Username / Password';
          echo "error";
       }
     }

?>