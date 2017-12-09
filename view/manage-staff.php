<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/Employee.php') ?>
<?php require_once('../model/Service.php') ?>

<script type="text/javascript" src="../js/check_form.js"></script>
<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript" src="../js/search_filter_change.js"></script>
<script type="text/javascript" src="../js/staff_handler.js"></script>

<h2>Manage Staff</h2>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#view-details" role="tab" aria-controls="view-details">View Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-admin" role="tab" aria-controls="add-admin">Add Administrator</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-recep" role="tab" aria-controls="add-recep">Add Receptionist</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-beautician" role="tab" aria-controls="add-beautician">Add Beautician</a>
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
                            <li><a href="#emp_id" value="emp_id">ID</a></li>
                            <li><a href="#first_name" value="first_name">First Name</a></li>
                            <li><a href="#last_name" value="last_name">Last Name</a></li>
                            <li><a href="#emp_email" value="emp_email">Email</a></li>
                            <li><a href="#emp_phone" value="emp_phone">Phone</a></li>
                            <li><a href="#emp_address" value="emp_address">Address</a></li>
                            <li><a href="#emp_type" value="emp_type">Type</a></li>
                            <li><a href="#emp_gender" value="emp_gender">Gender</a></li>
                            <li class="divider"></li>
                            <li><a href="#all" value="all">Anything</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Search employee here..." id="search_text">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 result-table" id="result">
                    <?php
                    // create an object from Employee class
                    $employee = new Employee();
                    $employee_list = $employee->searchEmployeeDetails("*","");
                    echo $employee_list;
                    ?>
                </div>
            </div>

        </div>
    </div>

    <div class="tab-pane fade" id="add-admin" role="tabpanel">
        <div class="form-errors disabled">
            <p id="msg_admin"></p>
        </div>


        <form class="userform" method="post" id="admin_form">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="first_name_admin" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="last_name_admin" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <form>
                    <label for="example-text-input" class="col-md-4 col-form-label clearfix">Gender</label>
                        <div class="col-md-8">
                            <label class="col-md-4 control-label" ><input id="male_radio_button" name="gender_admin" type="radio" name="optradio" value="Male" checked="">Male</label>
                            <label class="col-md-4 control-label" ><input id="female_radio_button"  name="gender_admin" type="radio" name="optradio" value="Female">Female</label>
                        </div>
                </form>
            </div>

            <div class="form-group row">
                <label for="example-email-input" class="col-md-4 col-form-label">Email</label>
                <div class="col-md-8">
                    <input class="form-control" type="email"  id="emp_email_admin" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-tel-input" class="col-md-4 col-form-label">Phone Number</label>
                <div class="col-md-8">
                    <input class="form-control" type="tel" id="emp_phone_admin" maxlength="10">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-8">
                    <textarea class="form-control" type="text" rows="5" id="emp_address_admin" maxlength="60"></textarea>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-8">
                <button name="clear" type="button" onclick="resetAdminForm()" class="btn btn-primary col-md-2 my-button-action my-lg-button">Clear</button>
            </div>
            <div class="col-md-2">
                <button name="submit" id="emp_type_button_admin" onclick="checkFormAdmin()" type="button" value="Administrator" class="btn btn-primary col-md-2 my-lg-button" method="post">Save</button>
            </div>
        </form>
    </div>

    <div class="tab-pane fade" id="add-recep" role="tabpanel">
        <div class="form-errors">
            <p id="msg_receptionist"></p>
        </div>


        <form class="userform" method="post" id="receptionist_form">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="first_name_receptionist" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="last_name_receptionist" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <form>
                    <label for="example-text-input" class="col-md-4 col-form-label clearfix">Gender</label>
                    <div class="col-md-8">
                        <label class="col-md-4 control-label" ><input id="male_radio_button2" name="gender_receptionist" type="radio" name="optradio" value="Male" checked="">Male</label>
                        <label class="col-md-4 control-label" ><input id="female_radio_button2" name="gender_receptionist" type="radio" name="optradio" value="Female">Female</label>
                    </div>
                </form>
            </div>

            <div class="form-group row">
                <label for="example-email-input" class="col-md-4 col-form-label">Email</label>
                <div class="col-md-8">
                    <input class="form-control" type="email"  id="emp_email_receptionist" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-tel-input" class="col-md-4 col-form-label">Phone Number</label>
                <div class="col-md-8">
                    <input class="form-control" type="tel" id="emp_phone_receptionist" maxlength="10">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-8">
                    <textarea class="form-control" type="text" rows="5" id="emp_address_receptionist" maxlength="60"></textarea>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-8">
                <button name="clear" type="button" class="btn btn-primary col-md-2 my-lg-button my-button-action" onclick="resetReceptionistForm()">Clear</button>
            </div>
            <div class="col-md-2">
                <button name="submit" id="emp_type_button_receptionist" onclick="checkFormReceptionist()" type="button" value="Receptionist" class="btn btn-primary col-md-2 my-lg-button" method="post">Save</button>
            </div>
        </form>
    </div>

    <div class="tab-pane fade" id="add-beautician" role="tabpanel">

        <div class="form-errors">
            <p id="msg_beautician"></p>
        </div>


        <form class="userform" method="post" id="receptionist_form">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="first_name_beautician" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="last_name_beautician" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <form>
                    <label for="example-text-input" class="col-md-4 col-form-label">Gender</label>
                    <div class="col-md-8">
                        <label class="col-md-4 control-label" ><input id="male_radio_button3" name="gender_beautician" type="radio" name="optradio" value="Male" checked="">Male</label>
                        <label class="col-md -4 control-label" ><input id="female_radio_button3" name="gender_beautician" type="radio" name="optradio" value="Female">Female</label>
                    </div>
                </form>
            </div>

            <div class="form-group row">
                <label for="example-email-input" class="col-md-4 col-form-label">Email</label>
                <div class="col-md-8">
                    <input class="form-control" type="email"  id="emp_email_beautician" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-tel-input" class="col-md-4 col-form-label">Phone Number</label>
                <div class="col-md-8">
                    <input class="form-control" type="tel" id="emp_phone_beautician" maxlength="10">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-8">
                    <textarea class="form-control" type="text" rows="5" id="emp_address_beautician" maxlength="60"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label">Beautician Type</label>
                <div class="form-check col-md-8">
                    <?php
                    // create an object from Service class
                    $service= new Service();
                    $service_list = $service->loadServiceNames();
                    echo $service_list;
                    ?>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-8">
                <button name="clear" type="button" onclick="resetBeauticianForm()" class="btn btn-primary col-md-2 my-button-action my-lg-button">Clear</button>
            </div>
            <div class="col-md-2">
                <button name="submit" id="emp_type_button_beautician" onclick="checkFormBeautician()" type="button" value="Beautician" class="btn btn-primary col-md-2 my-button-action my-lg-button" method="post">Save</button>
            </div>
        </form>

    </div>
</div>

<?php include('modals/message-modal.php'); ?>
<?php include('modals/update-staff-modal.php'); ?>
<?php include('modals/add-user-modal.php'); ?>
<?php include('modals/update-message-modal.php'); ?>

