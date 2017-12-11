<?php session_start(); ?>
<?php require_once('../model/database.php') ?>
<?php require_once('../model/stockItem.php') ?>
<?php require_once('../model/Appointment.php') ?>

<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript" src="../js/search_filter_change.js"></script>

<script type="text/javascript" src="../js/payment_handler.js"></script>
<script type="text/javascript" src="../js/stock_payment_handler.js"></script>

<h2>Payment Management</h2>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#appointment-payments" role="tab" aria-controls="appointment-payments">Appointments Payments</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#product-payments" role="tab" aria-controls="product-payments">Product Payments</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade active" id="appointment-payments" role="tabpanel">
        <div class="row ">
            <div class="col-md-12">
                <div class="input-group my-search-panel">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="search_concept">Filter by</span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" id="filter_select">
                            <li><a href="#first_name" value="first_name">First Name</a></li>
                            <li><a href="#last_name" value="last_name">Last Name</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Search name here..." id="search_text">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 result-table" id="appointment_result">
                    <?php
                    // create an object from Appointment class
                    $appointment = new Appointment();
                    $appointment_list = $appointment->viewAppointmentPaymentDetails("*","");
                    echo $appointment_list;
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 hidden" id="appointment_payment">
                    <table class="table table-hover col-md-12" id="payment_table">
                        <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Service Charge</th>
                        </tr>
                        </thead>
                        <tbody class="payment_tbody" id="payment_tbody"></tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 hidden" id="appointment_payment1">
                    <table class="table table-hover col-md-12" id="total_payment_table">
                        <tbody id="subtotal_tbody">
                            <tr>
                                <td>SUB TOTAL</td>
                                <td class="sub" id="sub_total_1">0.00</td>
                                <td><button type="button" onclick="paybycard()" class="btn btn-success btn-sm fa fa-credit-card " value="paybycard"><span> Pay </span></button></td>
                                <td><button type="button" onclick="paybycash()" class="btn btn-success btn-sm fa fa-money" value="paybycash"><span> Pay </span></button></td>
                                <td><button type="button" onclick="payment_cancel()" class="btn btn-danger btn-sm fa fa-times" value="cancel"><span> Cancel </span></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="product-payments" role="tabpanel">
        <div class="row ">
            <div class="col-md-12">
                <div class="input-group my-search-panel">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="search_concept">Filter by</span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" id="filter_select">
                            <li><a href="#stock_id" value="stock_id">Stock Id</a></li>
                            <li><a href="#stock_brand" value="stock_brand">Product Name</a></li>
                            <li><a href="#type" value="type">Product Type</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Search here..." id="search_text">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 result-table" id="product_result">
                <?php
                // create an object from StockItem class
                $stockItem = new StockItem();
                $stockItem_list = $stockItem->stockPayment("*","");
                echo $stockItem_list;
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 hidden" id="product_payment">
                <table class="table table-hover col-md-12" id="product_table">
                    <thead>
                    <tr>
                        <th>Product Brand</th>
                        <th>Product Type</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quty</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody class="product_payment_tbody" id="product_payment_tbody"></tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 hidden" id="product_payment1">
                <table class="table table-hover col-md-12" id="total_payment_table">
                    <tbody id="product_subtotal_tbody">
                    <tr>
                        <td>SUB TOTAL</td>
                        <td class="sub" id="sub_total_1">0.00</td>
                        <td><button onclick="paybycard1()" class="btn btn-success btn-sm fa fa-credit-card " value="paybycard"><span> Pay </span></button></td>
                        <td><button onclick="paybycash1()" class="btn btn-success btn-sm fa fa-money" value="paybycash"><span> Pay </span></button></td>
                        <td><button onclick="payment_cancel1()" class="btn btn-danger btn-sm fa fa-times" value="cancel"><span> Cancel </span></button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('modals/message-modal.php'); ?>


