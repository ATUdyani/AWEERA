
<?php require_once '../model/Supplier.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 16-Aug-17
 * Time: 11:48 AM
 */

// check whether supplier id is not empty
if (isset($_POST["supplier_id"])){
    $supplier = new Supplier();
    $row = $supplier -> getSupplierData($_POST["supplier_id"]);
    echo json_encode($row);
}
?>