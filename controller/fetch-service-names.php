<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Service.php' ?>


<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 02-Sep-17
 * Time: 8:02 PM
 */

    $service = new Service();
    $service_names = $service -> fetchServiceNames($_POST['data']);
    echo json_encode($service_names);
?>