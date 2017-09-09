<?php require_once "../model/RegisterRequest.php"?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 09-Sep-17
 * Time: 8:18 PM
 */

$data = json_decode(stripslashes($_POST['data']));
$register_request = new RegisterRequest();
$register_request ->setData($data[1],$data[2],$data[3],$data[4],$data[5],$data[6]);
$result = $register_request -> sendRegisterConfirmationMail($data[0]);
echo $result;
?>