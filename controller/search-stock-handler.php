<?php require_once '../model/Database.php' ?>
<?php require_once '../model/StockItem.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Thilakshika-PC
 * Date: 2017-12-05
 * Time: 3:59 PM
 */
$data = json_decode(stripslashes($_POST['data']));

$stock = new StockItem();
$stock -> searchStockDetails($data[0],$data[1]);

?>
