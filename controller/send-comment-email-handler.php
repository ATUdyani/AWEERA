<?php require_once "../model/Email.php"?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 09-Sep-17
 * Time: 8:18 PM
 */

$data = json_decode(stripslashes($_POST['data']));
$email = new Email();
$result = $email ->sendCommentEmail($data[0]);
echo $result;
?>