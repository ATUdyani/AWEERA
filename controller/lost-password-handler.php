<?php session_start() ?>

<?php 
   require_once('../model/Database.php');
   require_once('../model/Email.php');
   require_once('functions.php');

   // making connection
    $db = new Database();
    $connection = $db->connect();


    $entered_email = $_POST['ls_email'];


    // check for submission
    $result =array();
    $errors =null;

    // check if the email has been entered
    if (!isset($entered_email) || strlen(trim($entered_email)) < 1){
       $errors = 'Email is Missing / Invalid';
    }

    if(!is_email($entered_email)){
        $errors = 'Invalid email';
    }

    // check if there are any errors in the form
    if ($errors==null) {

        // save email into variables
        // in here user can enter a sql statement to damage our database (sql injection), so we must remove this risk

        $email = mysqli_real_escape_string($connection, $entered_email);

        // prepare database query
        $query = "SELECT * FROM user WHERE email ='{$email}' AND is_deleted='0' LIMIT 1";

        $result_set = $db->executeQuery($query);

        $db->verifyQuery($result_set);

        // query successful
        if ($db->getNumRows($result_set) == 1) {

            $user = mysqli_fetch_assoc($result_set);
            $user_reg_id = $user['user_reg_id'];

            // valid user found
            // update lost password status
            $query = "UPDATE user SET is_lost_password =1 WHERE email='".$email."'";
            $result_set = mysqli_query($connection, $query);

            $db->verifyQuery($result_set);


            $new_email = new Email();
            $returned_result = $new_email->sendChangePasswordLink($user_reg_id,$email);


            if ($returned_result=="success"){
                $errors = 'You will receive an email';
                array_push($result,"success", $errors);
                echo json_encode($result);
                return;
            }
            else{
                $errors = 'Invalid email';
                array_push($result,"failure", $errors);
                echo json_encode($result);
                return;
            }
        } else {
            // username and password invalid
            $errors = 'Not a user';
            array_push($result,"failure", $errors);
            echo json_encode($result);
            return;
        }
    }
       else{
           array_push($result,"failure", $errors);
           echo json_encode($result);
           return;
        }


?>