<?php session_start() ?>

<?php require_once('../../model/RegisteredCustomer.php') ?>


<h2>Upcoming Appointments</h2>
<br>

<div class="row">
    <div class="col-md-12 result-table" id="result">
        <?php
        // create an object from Appointment class
        $customer = new RegisteredCustomer();
        $appointment_list = $customer->loadUpcomingAppointments($_SESSION['user_reg_id']);
        echo $appointment_list;
        ?>
    </div>
</div>
