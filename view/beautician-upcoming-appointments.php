<?php session_start() ?>

<?php require_once '../model/Beautician.php'; ?>


<h2>Upcoming Appointments</h2>
<br>

<div class="row">
    <div class="col-md-12 result-table" id="result">
        <?php
        // create an object from Appointment class
        $beautician = new Beautician();
        $appointment_list = $beautician->loadUpcomingAppointments($_SESSION['user_reg_id']);
        echo $appointment_list;
        ?>
    </div>
</div>
