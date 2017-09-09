<?php require_once '../model/Database.php' ?>
<?php require_once '../model/RegisterRequest.php' ?>


<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 27-Aug-17
 * Time: 10:30 PM
 */

$data = json_decode(stripslashes($_POST['data']));

$register_request = new RegisterRequest();
$register_request -> searchRegisterRequests($data[0],$data[1]);
?>