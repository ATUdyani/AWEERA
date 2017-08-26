<?php require_once '../model/User.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 16-Aug-17
 * Time: 11:48 AM
 */

// check whether user id is not empty
if (isset($_POST["user_id"])){
    $user = new User();
    $row = $user -> getUserData($_POST["user_id"]);
    echo json_encode($row);
}
?>