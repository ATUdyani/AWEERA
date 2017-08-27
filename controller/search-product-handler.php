<?php require_once '../model/database.php' ?>
<?php require_once '../model/StockItem.php' ?>

<?php

    $data = json_decode(stripslashes($_POST['data']));
    $stockItem = new StockItem();
    $stockItem -> searchStockPaymentDetails($data[0],$data[1]);

?>