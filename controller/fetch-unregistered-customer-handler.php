<?php require_once '../model/RegisterRequest.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 16-Aug-17
 * Time: 11:48 AM
 */

// check whether employee id is not empty
if (isset($_POST["reg_id"])){
    $register_request = new RegisterRequest();
    $row = $register_request -> getUnregisteredCustomerData($_POST["reg_id"]);
    echo json_encode($row);
}
?>