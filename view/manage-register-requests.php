<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/RegisterRequest.php') ?>


<script type="text/javascript" src="../js/check_form.js"></script>
<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript" src="../js/search_filter_change.js"></script>
<script type="text/javascript" src="../js/register_request_handler.js"></script>


<h2>New Register Requests</h2>

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
                    <li><a href="#cust_phone" value="cust_phone">Address</a></li>
                    <li><a href="#cust_email" value="cust_email">Email</a></li>
                    <li><a href="#cust_address" value="cust_address">Address</a></li>
                    <li class="divider"></li>
                    <li><a href="#all" value="all">Anything</a></li>
                </ul>
            </div>
            <input type="hidden" name="search_param" value="all" id="search_param">
            <input type="text" class="form-control" name="x" placeholder="Search register requests ..." id="search_text">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 result-table" id="result">
            <?php
            // create an object from RegisterRequest class
            $register_request= new RegisterRequest();
            $request_list = $register_request->searchRegisterRequests("*","");
            echo $request_list;
            ?>
        </div>
    </div>
</div>

<?php include('modals/message-modal.php'); ?>
<?php include('modals/view-register-requests-modal.php'); ?>


<script>
    $(function () {
        $('#myTab a:first').tab('show')
    });
</script>