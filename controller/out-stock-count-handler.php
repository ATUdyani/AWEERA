<?php require_once '../model/Database.php' ?>
<?php require_once '../model/StockItem.php' ?>

<?php
    $stock = new StockItem();
    $count = $stock ->countOutStock();
    echo $count
?>
