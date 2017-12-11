<?php require_once '../model/RegisteredCustomer.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 16-Aug-17
 * Time: 11:48 AM
 */

// check whether customer id is not empty
if (isset($_POST["cust_id"])){
    $customer = new RegisteredCustomer();
    $row = $customer -> getCustomerData($_POST["cust_id"]);
    echo json_encode($row);
}
?>