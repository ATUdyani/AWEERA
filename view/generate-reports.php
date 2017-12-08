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
        <a class="nav-link" data-toggle="tab" href="#add-recep" role="tab" aria-controls="add-recep">Add Receptionist</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-beautician" role="tab" aria-controls="add-beautician">Add Beautician</a>
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
                        <input id="male_radio_button2" name="gender_receptionist" type="radio" name="optradio" value="Male" checked="">Male
                    </div>
                    <div class="col-md-8">
                        <input id="female_radio_button2" name="gender_receptionist" type="radio" name="optradio" value="Female">Female
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
                    <label for="example-text-input" class="col-md-4 col-form-label clearfix">Gender</label>
                    <div class="col-md-8">
                        <input id="male_radio_button3" name="gender_beautician" type="radio" name="optradio" value="Male" checked="">Male
                    </div>
                    <div class="col-md-8">
                        <input id="female_radio_button3" name="gender_beautician" type="radio" name="optradio" value="Female">Female
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



