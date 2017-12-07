
<?php require_once '../model/StockItem.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 16-Aug-17
 * Time: 11:48 AM
 */

// check whether stock id is not empty
if (isset($_POST["stock_id"])){
    $stock = new StockItem();
    $row = $stock -> getStockData($_POST["stock_id"]);
    echo json_encode($row);
}
?>