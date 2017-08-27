<?php require_once '../model/Service.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 27-Aug-17
 * Time: 1:02 AM
 * */

// check whether service id is not empty
if (isset($_POST["service_id"])){
    $service = new Service();
    $row = $service -> getServiceData($_POST["service_id"]);
    echo json_encode($row);
}

echo "Hello";
?>