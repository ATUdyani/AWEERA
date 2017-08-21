<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Employee.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 13-Aug-17
 * Time: 7:19 PM
 */
    $data = json_decode(stripslashes($_POST['data']));

    $employee = new Employee();
    $employee -> searchEmployeeUserDetails($data[0],$data[1]);

?>
