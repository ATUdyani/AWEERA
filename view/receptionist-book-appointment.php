<?php require_once('../model/Database.php');?>
<?php require_once('../model/Service.php');?>

<script type="text/javascript" src="../js/appointment_handler.js"></script>

<h2>Book an Appointment<span><small><?php echo "  - ".$_POST['cust_id']?></small></span></h2>
<br>
<!-- Content Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-4">
                <label><h4>What are you looking for?</h4></p></label>
            </div>
            <div class="col-md-4">
                <input type="hidden" id="cust_id" name="cust_id" value="<?php echo $_POST['cust_id']?>">
                <select name="select_service_type" id="select_service_type" class="form-control" onchange="loadServiceNames(this.value)">
                    <option value="">Select a Service</option>
                    <?php
                    $service = new Service();
                    echo $service->viewAllServiceTypes();
                    ?>
                </select>
            </div>

            <div class="col-md-4">
                <select name="select_service_name" id="select_service_name" class="form-control" onchange="loadBeauticianNames(this.value)" disabled="disabled">
                </select>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-4">
                <label><h4>With whom? (Select Stylist)</h4></p></label>
            </div>
            <div class="col-md-4">
                <select name="select_beautician_name" id="select_beautician_name" class="form-control" disabled="disabled" onchange="enableCalender()">
                </select>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-4">
                <label><h4>When?</h4></p></label>
            </div>
            <div class="col-md-4">
                <form>
                    <input type="date" name="appointment_date" id="appointment_date" class="form-control" disabled="disabled" onchange="loadSlots()">
                </form>
            </div>
            <div class="col-md-4">
                <select name="time_slots" id="time_slots" class="form-control" disabled="disabled">
                </select>
            </div>
        </div>

        <br>
        <br>
        <br>

        <div class="well">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <button id="make_appointment_button" class="btn btn-lg btn-default btn-block" onclick="makeAppointment()">Make Appointment</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#msg_Modal').on('hidden.bs.modal', function () {
        $('#content').load("manage-appointments.php");
    });
</script>
