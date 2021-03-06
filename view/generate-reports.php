<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/Beautician.php') ?>

<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript" src="../js/report_handler.js"></script>

<h2>Reports</h2>


<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#daily_appointments" role="tab" aria-controls="daily_appointments">Daily Collection (Appointments)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#daily_purchases" role="tab" aria-controls="add-admin">Daily Collection (Purchases)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#daily_total" role="tab" aria-controls="add-recep">Daily Collection (Total)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#period-collection-report" role="tab" aria-controls="add-recep">Collection Report for a Peroid</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#daily_beautician_commissions" role="tab" aria-controls="daily_beautician_commissions">Daily Beautician Commissions</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade active" id="daily_appointments" role="tabpanel">
        <div class="row">
            <div class="main col-md-10">
                <form action="../controller/daily-collection-appointments.php" target="_blank" method="post" class="userform" id="daily_appointments_form">
                    <div class="form-group row top-buffer-hard">
                        <div class="col-md-4">
                            <label><h4>Select the Date</h4></p></label>
                        </div>
                        <div class="col-md-4">
                            <input  class="form-control" type="date"  id="rdate" name="rdate"
                                    value="<?php echo date("Y-m-d");?>">
                        </div>
                    </div>
                    <div class="col-md-3 top-buffer-hard">
                        <input name="submit" type="submit" value="Print" class="btn btn-primary col-md-2 my-button-action my-lg-button"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="daily_purchases" role="tabpanel">
        <div class="row">
            <div class="main col-md-10">
                <form action="../controller/daily-collection-purchases.php" target="_blank" method="post" class="userform" id="daily_purchases_form">
                    <div class="form-group row top-buffer-hard">
                        <div class="col-md-4">
                            <label><h4>Select the Period</h4></p></label>
                        </div>
                        <div class="col-md-4">
                            <input  class="form-control" type="date"  id="rdate" name="rdate"
                                    value="<?php echo date("Y-m-d");?>">
                        </div>
                    </div>
                    <div class="col-md-3 top-buffer-hard">
                        <input name="submit" type="submit" value="Print" class="btn btn-primary col-md-2 my-button-action my-lg-button"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="daily_total" role="tabpanel">
        <div class="row">
            <div class="main col-md-10">
                <form action="../controller/daily-collection-total.php" target="_blank" method="post" class="userform" id="daily_total_form">
                    <div class="form-group row top-buffer-hard">
                        <div class="col-md-4">
                            <label><h4>Select the Date</h4></p></label>
                        </div>
                        <div class="col-md-4">
                            <input  class="form-control" type="date"  id="rdate" name="rdate"
                                    value="<?php echo date("Y-m-d");?>">
                        </div>
                    </div>
                    <div class="col-md-3 top-buffer-hard">
                        <input name="submit" type="submit" value="Print" class="btn btn-primary col-md-2 my-button-action my-lg-button"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="tab-pane fade" id="period-collection-report" role="tabpanel">
        <div class="row">
            <div class="main col-md-10">
                <form action="../controller/period-collection-report.php" target="_blank" method="post" class="userform" id="monthly_collection_form">

                    <div class="form-group row top-buffer-hard">
                        <div class="col-md-4">
                            <label><h4>Select the Date</h4></p></label>
                        </div>
                        <div class="col-md-4">
                            <label>From</label>
                            <input  class="form-control" type="date"  id="fromdate" name="fromdate"
                                    value="<?php echo date("Y-m-d");?>">
                        </div>
                        <div class="col-md-4">
                            <label>To</label>
                            <input  class="form-control" type="date"  id="todate" name="todate"
                                    value="<?php echo date("Y-m-d");?>">
                        </div>
                    </div>

                    <div class="col-md-3 top-buffer-hard">
                        <input name="submit" type="submit" value="Print" class="btn btn-primary col-md-2 my-button-action my-lg-button"></input>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div class="tab-pane fade" id="daily_beautician_commissions" role="tabpanel">
        <div class="row">
            <div class="main col-md-10">
                <form action="../controller/daily-commission-beautician.php" target="_blank" method="post" class="userform" id="monthly_commissions_form">
                    <div class="form-group row top-buffer-hard">
                        <div class="col-md-4">
                            <label><h4>Select a Beautician and Date</h4></p></label>
                        </div>
                        <div class="col-md-4">
                            <select name="select_beautician_name" id="select_beautician_name" class="form-control paragraph-font" onchange="getAppointments('')">
                                <?php
                                $beautician = new Beautician();
                                $beautician_names = $beautician -> fetchBeauticianNamesReport("*");
                                echo $beautician_names;
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input  class="form-control" type="date"  id="rdate" name="rdate"
                                    value="<?php echo date("Y-m-d");?>">
                        </div>
                    </div>

                    <div class="col-md-3 top-buffer-hard">
                        <input name="submit" type="submit" value="Print" class="btn btn-primary col-md-2 my-button-action my-lg-button"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>


   <!-- <div class="tab-pane fade" id="daily_commissions" role="tabpanel">
        <div class="row">
            <div class="main col-md-10">
                <form action="../controller/daily-commissions.php" target="_blank" method="post" class="userform" id="daily_commissions_form">
                    <div class="form-group row">
                        <h4 class="col-md-4">
                            Select a Beautician
                            
                            <small>
                                <input  class="form-control" type="date"  id="rdate" name="rdate"
                                        value="<?php /*echo date("m-Y");*/?>">
                            </small>
                            <br>
                            Select Date
                            <hr>
                            <small>
                                <input  class="form-control" type="date"  id="rdate" name="rdate"
                                        value="<?php /*echo date("m-Y");*/?>">
                            </small>
                        </h4>
                    </div>

                    <div class="col-md-4">
                        <input name="submit" type="submit" value="Print" class="btn btn-primary col-md-2 my-button-action my-lg-button"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="monthly_commissions" role="tabpanel">
        <div class="row">
            <div class="main col-md-10">
                <form action="../controller/monthly-commissions.php" target="_blank" method="post" class="userform" id="monthly_commissions_form">
                    <div class="form-group row">
                        <h4 class="col-md-4">
                            Select Employee
                            
                            <small>
                                <input  class="form-control" type="date"  id="rdate" name="rdate"
                                        value="<?php /*echo month("m-Y");*/?>">
                            </small>
                            <br>
                            Select Month
                            <hr>
                            <small>
                                <input  class="form-control" type="date"  id="rdate" name="rdate"
                                        value="<?php /*echo month("m-Y");*/?>">
                            </small>
                        </h4>
                    </div>

                    <div class="col-md-4">
                        <input name="submit" type="submit" value="Print" class="btn btn-primary col-md-2 my-button-action my-lg-button"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="tab-pane fade" id="customer_history" role="tabpanel">
        <div class="row">
            <div class="main col-md-10">
                <form action="../controller/customer-history.php" target="_blank" method="post" class="userform" id="customer_history_form">
                    <div class="form-group row">
                        <h4 class="col-md-4">
                            Select Customer
                            
                            <small>
                                <input  class="form-control" type="month"  id="rdate" name="rdate"
                                        value="<?php /*echo month("m-Y");*/?>">
                            </small>
                        </h4>
                    </div>

                    <div class="col-md-4">
                        <input name="submit" type="submit" value="Print" class="btn btn-primary col-md-2 my-button-action my-lg-button"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>-->
</div>
