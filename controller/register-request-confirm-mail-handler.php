<?php require_once "../model/Email.php"?>

<?php
    /**
     * Created by PhpStorm.
     * User: Wasura Dananjith
     * Date: 09-Sep-17
     * Time: 8:18 PM
     */

    $data = json_decode(stripslashes($_POST['data']));

    $register_request_confirm_mail = new Email();

    $status = $data[0];
    $first_name = $data[1];
    $last_name = $data[2];
    $cust_phone = $data[3];
    $cust_address = $data[4];
    $cust_email = $data[5];
    $password = $data[6];

    $result = $register_request_confirm_mail->sendRegisterConfirmationMail($status,$first_name,$last_name,$cust_phone,$cust_address,$cust_email,$password);


    echo $result;
?>