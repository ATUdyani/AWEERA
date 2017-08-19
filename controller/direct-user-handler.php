<?php session_start() ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 19-Aug-17
 * Time: 9:30 PM
 */

$user_type = $_SESSION['type'];

switch ($user_type){
    case 'Administrator':
        header('Location: ../view/admin-home.php');
        exit;
        break;
}
?>