<?php require_once '../model/Service.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 29-Aug-17
 * Time: 11:22 PM
 *
 */

// check whether service id is not empty
if (isset($_POST["service_id"])) {
    $service = new Service();
    $row = $service->getServiceData($_POST["service_id"]);
    echo json_encode($row);
}
?>