<!--/**
 * Created by PhpStorm.
 * User: Thilakshika-PC
 * Date: 2017-12-05
 * Time: 3:35 PM
 */
-->

<?php require_once '../controller/functions.php' ?>
<?php require_once '../model/Database.php' ?>
<?php require_once '../model/StockItem.php' ?>

<?php
$db = new Database();
$connection = $db->connect();

$data = json_decode(stripslashes($_POST['data']));
$errors = array();

// checking required fields
if (empty($data[0])){
    $errors[] = 'Brand is required.';
}

if (empty($data[1])){
    $errors[] = 'Stock type is required.';
}

if (empty($data[2])){
    $errors[] = 'Stock count is required.';
}
else{
    if ($data[2]<0){
        $errors[] = 'Stock count cannot be negative.';
    }
}

if (empty($data[3])){
    $errors[] = 'Price is required.';
}
else{
    if ($data[3]<0){
        $errors[] = 'Price cannot be negative.';
    }
}

if (empty($data[5])){
    $errors[] = 'Supplier ID is required.';
}

if (!empty($errors)){
    echo '<h4>There were error(s) on your form.</h4><br>';
    foreach ($errors as $error) {
        echo "<h4>".$error."</h4><br>";
    }
}
else{
    //add a new record
    $stock_brand = mysqli_real_escape_string($connection,$data[0]);
    $type = mysqli_real_escape_string($connection,$data[1]);
    $stock_count = mysqli_real_escape_string($connection,$data[2]);
    $price = mysqli_real_escape_string($connection,$data[3]);
    $description = mysqli_real_escape_string($connection,$data[4]);
    $supplier_id = mysqli_real_escape_string($connection,$data[5]);

    $stock = new StockItem();
    $stock ->setStock($stock_brand,$type,$stock_count,$price,$description,$supplier_id);
    $stock->addStock();

}


?>
