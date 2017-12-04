
<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Supplier.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Thilakshika-PC
 * Date: 2017-10-02
 * Time: 3:30 PM
 */
$data = json_decode(stripslashes($_POST['data']));

$supplier = new Supplier();
$supplier -> searchSupplierDetails($data[0],$data[1]);

?>


