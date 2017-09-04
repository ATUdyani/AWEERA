<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Employee.php' ?>
<?php require_once '../model/Beautician.php' ?>


<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 04-Sep-17
 * Time: 4:48 PM
 */

$beautician = new Beautician();
$beautician_names = $beautician -> fetchBeauticianNames($_POST['data']);

echo json_encode($beautician_names);
?>
