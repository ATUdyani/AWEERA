<!--/**
 * Created by PhpStorm.
 * User: Thilakshika-PC
 * Date: 2017-12-05
 * Time: 12:00 PM
 */-->
<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/StockItem.php') ?>
<?php require_once('../model/Supplier.php') ?>

<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript" src="../js/search_filter_change.js"></script>
<script type="text/javascript" src="../js/stock_handler.js"></script>
<script type="text/javascript" src="../js/delete_handler.js"></script>


<h2>Manage Stock</h2>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#view-details" role="tab" aria-controls="view-details">View Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-supplier" role="tab" aria-controls="add-supplier">Add New Stock</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade active" id="view-details" role="tabpanel">
        <div class="row ">
            <div class="col-md-12">
                <div class="input-group my-search-panel">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="search_concept">Filter by</span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" id="filter_select">
                            <li><a href="#stock_id" value="stock_id">ID</a></li>
                            <li><a href="#stock_brand" value="stock_brand">Stock Brand</a></li>
                            <li><a href="#type" value="type">Type</a></li>
                            <li><a href="#stock_count" value="stock_count">Stock Count</a></li>
                            <li><a href="#price" value="price">Price</a></li>
                            <li><a href="#description" value="description">Description</a></li>
                            <li><a href="#supplier_id" value="supplier_id">Supplier ID</a></li>
                            <li class="divider"></li>
                            <li><a href="#all" value="all">Anything</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Search stock here..." id="search_text">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 result-table" id="result">
                    <?php
                    // create an object from StockItem class
                    $stock_item= new StockItem();
                    $stock_list = $stock_item->searchStockDetails("*","");
                    echo $stock_list;
                    ?>
                </div>
            </div>

        </div>
    </div>

    <div class="tab-pane fade" id="add-supplier" role="tabpanel">

        <div class="form-errors disabled">
            <p id="msg_admin"></p>
        </div>

        <form class="userform" method="post" id="stock-form">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Brand</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="stock_brand" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-tel-input" class="col-md-4 col-form-label">Type</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" rows="1" id="type" maxlength="60">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Stock Count</label>
                <div class="col-md-8">
                    <input class="form-control" type="number" rows="1" id="stock_count" maxlength="60">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-email-input" class="col-md-4 col-form-label">Price</label>
                <div class="col-md-8">
                    <input class="form-control" type="number"  id="price" maxlength="10">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Description</label>
                <div class="col-md-8">
                    <textarea class="form-control" type="text" rows="5" id="description" maxlength="60"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class ="col-md-4 control-label">Suppiler ID</label>
                <div class="col-md-8 ">
                    <select name="supplier_id" id="supplier_id" class="form-control" onchange="getAppointments()">
                        <?php
                        $supplier = new Supplier();
                        $supplier_names = $supplier -> fetchSupplierNames();
                        echo $supplier_names;
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-8">
                <button name="clear" type="button" onclick="resetAdminForm()" class="btn btn-primary col-md-2 my-button-action my-lg-button">Clear</button>
            </div>
            <div class="col-md-2">
                <button name="submit" id="add_stock" onclick="checkFormStock()" type="button" value="receptionist" class="btn btn-primary col-md-2 my-lg-button" method="post">Save</button>
            </div>
        </form>
    </div>




</div>

<?php include('modals/update-stock-modal.php'); ?>
<?php include('modals/delete-modal.php'); ?>
<?php include('modals/message-modal.php'); ?>
<?php include('modals/update-message-modal.php'); ?>



