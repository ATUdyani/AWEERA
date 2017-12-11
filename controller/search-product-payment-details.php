<?php require_once '../model/Database.php' ?>
<?php require_once '../model/StockItem.php' ?>

<?php


$data = json_decode(stripslashes($_POST['data']));
$stockitem = new StockItem();
$stockitem -> viewstock($data[0],$data[1]);
?>