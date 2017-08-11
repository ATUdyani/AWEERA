<?php session_start() ?>

<?php 
   require_once ('../model/database.php');

   class Login{

      function Login(){
         // making connection
         $db = new Database();
         $connection = $db->connect();

         $data = json_decode(stripslashes($_POST['data']));
         $errors = array();

         // check if the username and password has been entered
         if (!isset($data[0]]) || strlen(trim($data[0])) < 1 ){
            $errors[] = 'Username is Missing / Invalid';
         }
         if (!isset($data[1]) || strlen(trim($data[1]) < 1 ){
            $errors[] = 'Password is Missing / Invalid';
         }

         // check if there are any errors in the form
         if (empty($errors)){

            // save username and password into variables
               // in here user can enter a sql statement to damage our database (sql injection), so we must remove this risk 

            $email = mysqli_real_escape_string($connection,$data[0]);
            $password = mysqli_real_escape_string($connection,$data[1]);
            $hashed_password = $password;

            //$hashed_password = sha1($password);

            // prepare database query
            $query = "SELECT * FROM user WHERE email ='{$email}' AND password = '{$hashed_password}' LIMIT 1";

            $result_set = $db->executeQuery($query);

            $db->verify_query($result_set);

            // query successful
            if (mysqli_num_rows($result_set) == 1){
               // valid user found
               $user =mysqli_fetch_assoc($result_set);
               $_SESSION['user_id'] = $user['id'];
               $_SESSION['first_name'] = $user['first_name'];
               $_SESSION['last_name'] = $user['last_name'];  

               // update last login
               $query = "UPDATE user SET last_login=NOW() WHERE id = {$_SESSION['user_id']} LIMIT 1";
               $result_set = $db->executeQuery($query);

               $db->verify_query($result_set);
               
               // redirect to user.php
               $type=$user["type"];
               if ($type =="Administrator"){
                  header('Location: ../view/admin-home.php');
               }
               
            }
            else{
               // username and password invalid
               $errors[] = 'Invalid Username / Password';
               echo "Invalid Username / Password";
            }
         }
         
      }
   }     
      echo "Hello";
      $login = new Login();
      $login->Login();
   
 ?>