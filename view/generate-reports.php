<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>

<script type="text/javascript" src="../js/check_form.js"></script>
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
</ul>

<div class="tab-content">
    <div class="tab-pane fade active" id="daily_appointments" role="tabpanel">
        <div class="row">
            <div class="main col-md-10">
                <form action="../controller/daily-collection-appointments.php" target="_blank" method="post" class="userform" id="daily_appointments_form">
                    <div class="form-group row">
                        <h4 class="col-md-4">
                            Date
                            <small>
                                <input  class="form-control" type="date"  id="rdate" name="rdate"
                                        value="<?php echo date("Y-m-d");?>">
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

    <div class="tab-pane fade active" id="daily_purchases" role="tabpanel">
        <div class="row">
            <div class="main col-md-10">
                <form action="../controller/daily-collection-purchases.php" target="_blank" method="post" class="userform" id="daily_purchases_form">
                    <div class="form-group row">
                        <h4 class="col-md-4">
                            Date
                            <small>
                                <input  class="form-control" type="date"  id="rdate" name="rdate"
                                        value="<?php echo date("Y-m-d");?>">
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

    <div class="tab-pane fade active" id="daily_total" role="tabpanel">
        <div class="row">
            <div class="main col-md-10">
                <form action="../controller/daily-collection-total.php" target="_blank" method="post" class="userform" id="daily_total_form">
                    <div class="form-group row">
                        <h4 class="col-md-4">
                            Date
                            <small>
                                <input  class="form-control" type="date"  id="rdate" name="rdate"
                                        value="<?php echo date("Y-m-d");?>">
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

</div>



