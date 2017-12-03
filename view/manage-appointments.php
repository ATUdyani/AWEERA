<?php require_once('../model/Appointment.php') ?>
<?php require_once('../model/Beautician.php') ?>

<script type="text/javascript" src="../js/appointment.js"></script>


<h2>Appointments</h2>
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

<?php include('modals/view-staff-details-modal.php'); ?>
<?php include('modals/view-service-details-modal.php'); ?>
<?php include('modals/view-customer-details-modal.php'); ?>
