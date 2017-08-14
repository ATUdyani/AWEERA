<?php require_once '../model/database.php' ?>
<?php require_once '../model/employee.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 13-Aug-17
 * Time: 7:19 PM
 */
    $data = json_decode(stripslashes($_POST['data']));

    $employee = new Employee();
    $employee -> searchEmployeeDetails($data[0],$data[1]);

?>
