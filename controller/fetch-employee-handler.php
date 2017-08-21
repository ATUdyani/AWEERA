<?php require_once '../model/Employee.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 16-Aug-17
 * Time: 11:48 AM
 */

// check whether employee id is not empty
if (isset($_POST["emp_id"])){
    $employee = new Employee();
    $row = $employee -> getEmployeeData($_POST["emp_id"]);
    echo json_encode($row);
}
?>