<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/Customer.php') ?>

<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript" src="../js/search_filter_change.js"></script>
<script type="text/javascript" src="../js/customer_handler.js"></script>


<h2>Manage Customers</h2>

<div class="row ">
    <div class="col-md-12">
        <div class="input-group my-search-panel">
            <div class="input-group-btn search-panel">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span id="search_concept">Filter by</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" id="filter_select">
                    <li><a href="#cust_id" value="cust_id">ID</a></li>
                    <li><a href="#first_name" value="first_name">First Name</a></li>
                    <li><a href="#last_name" value="last_name">Last Name</a></li>
                    <li><a href="#cust_phone" value="cust_phone">Phone Number</a></li>
                    <li><a href="#cust_address" value="cust_address">Home Address</a></li>
                    <li><a href="#cust_email" value="cust_email">Email</a></li>
                    <li><a href="#date_joined" value="date_joined">Date Joined</a></li>
                    <li class="divider"></li>
                    <li><a href="#all" value="all">All</a></li>
                </ul>
            </div>
            <input type="hidden" name="search_param" value="all" id="search_param">
            <input type="text" class="form-control" name="x" placeholder="Search customer here..." id="search_text">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 result-table" id="result">
            <?php
            // create an object from Customer class
            $customers= new Customer();
            $customer_list = $customers->viewCustomerDetails("*","");
            echo $customer_list;
            ?>
        </div>
    </div>
</div>
