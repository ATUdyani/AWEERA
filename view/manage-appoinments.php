<?php require_once('../model/Appointment.php') ?>
<?php require_once('../model/Beautician.php') ?>

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



<script type="text/javascript">

    // load modal to view customer details
    function loadCustomerModal(customerDetails){
        customerDetails = customerDetails.split(",");
        $('#cust_id').html(customerDetails[0]);
        $('#first_name').val(customerDetails[1]);
        $('#last_name').val(customerDetails[2]);
        $('#cust_phone').val(customerDetails[3]);
        $('#cust_address').val(customerDetails[4]);
        $('#cust_email').val(customerDetails[5]);
        $('#customer_Modal').modal('show');
    }

    // to change the appointment status to 'accepted' or 'rejected'
    function statusChange(status,appointmentId) {
        $.ajax({
            url:'<?php echo site_url('appointments/updateAppointmentStatus'); ?>',
            method: "post",
            data: {status:status,appointmentId:appointmentId},
            success: function( data ) {
                $('#msg_Modal').modal('show');
                $('#msg_result').html(data);
                $('#content').load("<?php echo base_url();?>index.php/appointments/appointmentRequests");
            }
        });
    }

</script>
