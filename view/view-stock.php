<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/StockItem.php') ?>

<h2>View Stock Details</h2>

<table class="table table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Brand</th>
      <th>Stock Count</th>
      <th>Type</th>
      <th>Price</th>
      <th>Description</th>
      <th>Supplier ID</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    	// create an object from StockItem class
		$stockitem= new StockItem();
		$stock_list = $stockitem->loadStockDetails();
		echo $stock_list; 
	?>
  </tbody>
</table>