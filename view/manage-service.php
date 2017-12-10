<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/Service.php') ?>

<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript" src="../js/search_filter_change.js"></script>
<script type="text/javascript" src="../js/service_handler.js"></script>
<script type="text/javascript" src="../js/delete_handler.js"></script>

<h2>Manage Service</h2>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#view-details" role="tab" aria-controls="home">View Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-service" role="tab" aria-controls="profile">Add Service</a>
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
                            <li><a href="#service_id" value="service_id">ID</a></li>
                            <li><a href="#service_name" value="service_name">Service Name</a></li>
                            <li><a href="#service_charge" value="service_charge">Service Charge</a></li>
                            <li><a href="#description" value="description">Description</a></li>
                            <li><a href="#duration" value="duration">Duration</a></li>
                            <li><a href="#commission_percentage" value="commission_percentage">Commission Percentage</a></li>
                            <li class="divider"></li>
                            <li><a href="#all" value="all">Anything</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Search service here..." id="search_text">
                </div>
            </div>
        </div>

        <div class="col-md-12 result-table" id="result">
                <?php
                    $service = new Service();
                    $service_list = $service -> searchServiceDetails("*","");
                    echo $service_list;
                ?>
        </div>
    </div>

    <div class="tab-pane fade" id="add-service" role="tabpanel">

        <div class="form-errors disabled">
            <p id="msg_service"></p>
        </div>


        <form class="userform" method="post" id="service_form">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Service Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="service_name" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Service Charge</label>
                <div class="col-md-8">
                    <input class="form-control" type="number"  id="service_charge" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-email-input" class="col-md-4 col-form-label">Description</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="description" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-time-input" class="col-md-4 col-form-label">Duration (minutes)</label>
                <div class="col-md-8">
                    <input class="form-control" type="number" id="duration" >
                </div>
            </div>


            <div class="form-group row">
                <label for="example-tel-input" class="col-md-4 col-form-label">Percentage</label>
                <div class="col-md-8">
                    <input class="form-control" type="number" id="commission_percentage" maxlength="2">
                </div>
            </div>

            <div class="col-md-2 col-md-offset-8">
                <button name="clear" type="reset" class="btn btn-primary col-md-2 my-lg-button my-button-action">Clear</button>
            </div>

            <div class="col-md-2">
                <button name="submit" id="emp_type_button_admin" onclick="checkFormService()" type="button" value="Administrator" class="btn btn-primary col-md-2 my-lg-button" method="post">Save</button>
            </div>
        </form>
    </div>

</div>


<?php include('modals/message-modal.php'); ?>
<?php include('modals/delete-modal.php'); ?>
<?php include('modals/update-message-modal.php'); ?>
<?php include('modals/update-service-modal.php'); ?>
<?php include('modals/update-message-modal.php'); ?>