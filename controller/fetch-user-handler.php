<?php require_once '../model/Database.php' ?>
<?php require_once '../model/User.php' ?>


<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 09-Sep-17
 * Time: 12:00 AM
 */

$user = new User();
$row = $user ->getUserData($_POST['user_id']);
echo json_encode($row);
?>