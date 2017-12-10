<?php require_once('../model/Appointment.php') ?>
<?php require_once('../model/Beautician.php') ?>
<?php require_once('../model/RegisteredCustomer.php') ?>

<script type="text/javascript" src="../js/appointment_handler.js"></script>
<script type="text/javascript" src="../js/search_filter_change.js"></script>

<h2>Appointments</h2>


<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#schedule-details" role="tab" aria-controls="schedule-details">Schedule</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#book-now-registered" role="tab" aria-controls="book-now">Book Now (Registered)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#book-now-unregistered" role="tab" aria-controls="book-now">Book Now (Walk in Customer)</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade active" id="schedule-details" role="tabpanel">
        <div class="row ">
            <div class="col-md-12">
                <h2><small>
                        <div class="col-md-4 top-buffer">
                            <input class="paragraph-font" id="date_picker" type="date" name="appointment_date" onchange="getAppointments('')"
                                   value="<?php echo date("Y-m-d");?>">
                        </div>
                    </small>

                    <div class="col-md-4 top-buffer">
                        <select name="select_beautician_name" id="select_beautician_name" class="form-control paragraph-font" onchange="getAppointments('')">
                            <?php
                            $beautician = new Beautician();
                            $beautician_names = $beautician -> fetchBeauticianNames("*");
                            echo $beautician_names;
                            ?>
                        </select>
                    </div>

                    <div class="col-md-4 top-buffer">
                        <input type="text" class="form-control paragraph-font" placeholder="Search other details ..." id="search_text_appointment">
                    </div>

                    <div class="request-icon" onclick="getAppointments('all')">
                        <a class="btn view-all">View All   <i class="fa fa-table" aria-hidden="true"></i></a>
                    </div></h2>



                <div class="row">
                    <div class="row ">
                        <div class="col-md-12 result-table  break-words" id="table_results">
                            <?php
                            // create an object from Appointment class
                            $appointment = new Appointment();
                            $appointment_list = $appointment->searchAppointments("*",date("Y-m-d"),"");
                            echo $appointment_list;
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="tab-pane fade active" id="book-now-registered" role="tabpanel">
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
                            <li><a href="#cust_email" value="cust_email">Email</a></li>
                            <li><a href="#cust_phone" value="cust_phone">Phone</a></li>
                            <li><a href="#cust_address" value="cust_address">Address</a></li>
                            <li><a href="#date_joined" value="date_joined">Date Joined</a></li>
                            <li><a href="#cust_gender" value="cust_gender">Gender</a></li>
                            <li class="divider"></li>
                            <li><a href="#all" value="all">Anything</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Search customer here..." id="search_text">
                </div>
            </div>

            <div class="row">
                <div class="result-table col-md-12 break-words" id="result">
                    <?php
                    // create an object from Customer class
                    $customer = new RegisteredCustomer();
                    $customer_list = $customer->searchCustomerBookAppointment("*","");
                    echo $customer_list;
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade active" id="book-now-unregistered" role="tabpanel">
        <div class="form-errors disabled">
            <p id="msg_admin"></p>
        </div>


        <form class="userform" method="post" id="unregistered_cust_form">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="first_name_cust" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="last_name_cust" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <form>
                    <label for="example-text-input" class="col-md-4 col-form-label clearfix">Gender</label>
                    <div class="col-md-8">
                        <label class="col-md-4 control-label" ><input id="male_radio_button" name="gender_cust" type="radio" name="optradio" value="Male" checked="">Male</label>
                        <label class="col-md-4 control-label" ><input id="female_radio_button"  name="gender_cust" type="radio" name="optradio" value="Female">Female</label>
                    </div>
                </form>
            </div>

            <div class="form-group row">
                <label for="example-tel-input" class="col-md-4 col-form-label">Phone Number</label>
                <div class="col-md-8">
                    <input class="form-control" type="tel" id="cust_phone" maxlength="10">
                </div>
            </div>

            <div class="col-md-2 col-md-offset-8">
                <button name="clear" type="button" onclick="resetCustForm()" class="btn btn-primary col-md-2 my-button-action my-lg-button">Clear</button>
            </div>
            <div class="col-md-2">
                <button name="submit" id="button_cust" onclick="checkFormCust()" type="button" value="Unregistered Customer" class="btn btn-primary col-md-2 my-lg-button" method="post">Save</button>
            </div>
        </form>
    </div>

</div>



<?php include('modals/view-staff-details-modal.php'); ?>
<?php include('modals/view-service-details-modal.php'); ?>
<?php include('modals/view-customer-details-modal.php'); ?>
