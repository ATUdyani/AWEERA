<?php require_once('../model/Appointment.php') ?>
<?php require_once('../model/Beautician.php') ?>
<?php require_once('../model/RegisteredCustomer.php') ?>

<script type="text/javascript" src="../js/appointment.js"></script>
<script type="text/javascript" src="../js/search_filter_change.js"></script>

<h2>Appointments</h2>


<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#schedule-details" role="tab" aria-controls="schedule-details">Schedule</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#book-now" role="tab" aria-controls="book-now">Book Now</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade active" id="schedule-details" role="tabpanel">
        <div class="row ">
            <div class="col-md-12">
                <h2><small>
                        <input id="date_picker" type="date" name="appointment_date" onchange="getAppointments('')"
                               value="<?php echo date("Y-m-d");?>">
                    </small>

                    <div class="col-md-4 ">
                        <select name="select_beautician_name" id="select_beautician_name" class="form-control" onchange="getAppointments()">
                            <?php
                            $beautician = new Beautician();
                            $beautician_names = $beautician -> fetchBeauticianNames("*");
                            echo $beautician_names;
                            ?>
                        </select>
                    </div>


                    <div class="request-icon" onclick="getAppointments('all')">
                        <a class="btn view-all">View All   <i class="fa fa-table" aria-hidden="true"></i></a>
                    </div></h2>



                <div class="row">
                    <div class="row ">
                        <div class="col-md-12 result-table" id="table_results">
                            <table class="table table-hover col-md-12">
                                <?php
                                // create an object from Appointment class
                                $appointment = new Appointment();
                                $appointment_list = $appointment->searchAppointmentDetails(date("Y-m-d"),"*");
                                echo $appointment_list;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="tab-pane fade active" id="book-now" role="tabpanel">
        <div class="row ">
            <div class="col-md-12">
                <div class="input-group my-search-panel">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="search_concept">Filter by</span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" id="filter_select">
                            <li><a href="#cust_id" value="emp_id">ID</a></li>
                            <li><a href="#first_name" value="first_name">First Name</a></li>
                            <li><a href="#last_name" value="last_name">Last Name</a></li>
                            <li><a href="#cust_email" value="emp_email">Email</a></li>
                            <li><a href="#cust_phone" value="emp_phone">Phone</a></li>
                            <li><a href="#cust_address" value="emp_address">Address</a></li>
                            <li><a href="#cust_type" value="emp_type">Date Joined</a></li>
                            <li><a href="#cust_gender" value="emp_gender">Gender</a></li>
                            <li class="divider"></li>
                            <li><a href="#all" value="all">Anything</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Search customer here..." id="search_text">
                </div>
            </div>

            <div class="row">
                <div class="result-table col-md-12 " id="result">
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

</div>



<?php include('modals/view-staff-details-modal.php'); ?>
<?php include('modals/view-service-details-modal.php'); ?>
<?php include('modals/view-customer-details-modal.php'); ?>
