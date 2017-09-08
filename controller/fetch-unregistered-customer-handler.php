<?php require_once '../model/User.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 16-Aug-17
 * Time: 11:48 AM
 */

// check whether employee id is not empty
if (isset($_POST["reg_id"])){
    $user = new User();
    $row = $user -> getUnregisteredCustomerData($_POST["reg_id"]);
    echo json_encode($row);
}
?>