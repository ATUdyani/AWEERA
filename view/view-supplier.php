<?php session_start(); ?>
<?php require_once('../model/database.php') ?>
<?php require_once('../model/supplier.php') ?>

<h2>View Supplier Details</h2>

<table class="table table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    	// create an object from StockItem class
		$supplier= new Supplier();
		$supplier_list = $supplier->loadSupplierDetails();
		echo $supplier_list; 
	?>
  </tbody>
</table>