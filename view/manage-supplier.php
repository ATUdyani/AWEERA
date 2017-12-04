<!--/**
 * Created by PhpStorm.
 * User: Thilakshika-PC
 * Date: 2017-10-08
 * Time: 9:50 AM
 */-->
<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/Supplier.php') ?>

<script type="text/javascript" src="../js/check_form.js"></script>
<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript" src="../js/search_filter_change.js"></script>
<script type="text/javascript" src="../js/supplier_handler.js"></script>


<h2>Manage Supplier</h2>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#view-details" role="tab" aria-controls="view-details">View Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-supplier" role="tab" aria-controls="add-supplier">Add Supplier</a>
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
                            <li><a href="#supplier_id" value="supplier_id">ID</a></li>
                            <li><a href="#supplier_name" value="supplier_name">Supplier Name</a></li>
                            <li><a href="#supplier_phone" value="supplier_phone">Supplier Phone</a></li>
                            <li><a href="#supplier_address" value="supplier_email">Supplier Address</a></li>
                            <li><a href="#supplier_email" value="supplier_email">Supplier Email</a></li>
                            <li class="divider"></li>
                            <li><a href="#all" value="all">Anything</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Search supplier here..." id="search_text">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 result-table" id="result">
                    <?php
                    // create an object from StockItem class
                    $supplier= new Supplier();
                    $supplier_list = $supplier->viewSupplierDetails("*","");
                    echo $supplier_list;
                    ?>
                </div>
            </div>

        </div>
    </div>

    <div class="tab-pane fade" id="add-supplier" role="tabpanel">

        <div class="form-errors disabled">
            <p id="msg_admin"></p>
        </div>


        <form class="userform" method="post" id="supplier-form">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="supplier_name" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-tel-input" class="col-md-4 col-form-label">Phone Number</label>
                <div class="col-md-8">
                    <input class="form-control" type="tel" id="supplier_phone" maxlength="10">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-8">
                    <textarea class="form-control" type="text" rows="5" id="supplier_address" maxlength="60"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-email-input" class="col-md-4 col-form-label">Email</label>
                <div class="col-md-8">
                    <input class="form-control" type="email"  id="supplier_email" maxlength="50">
                </div>
            </div>

            <div class="col-md-2 col-md-offset-8">
                <button name="clear" type="button" onclick="resetAdminForm()" class="btn btn-primary col-md-2 my-button-action my-lg-button">Clear</button>
            </div>
            <div class="col-md-2">
                <button name="submit" id="add_supplier" onclick="checkFormSupplier()" type="button" value="receptionist" class="btn btn-primary col-md-2 my-lg-button" method="post">Save</button>
            </div>
        </form>
    </div>




</div>

<?php include('modals/update-supplier-modal.php'); ?>

<?php include('modals/message-modal.php'); ?>



