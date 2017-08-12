<?php session_start(); ?>
<?php require_once('../model/database.php') ?>
<?php require_once('../model/service.php') ?>

<!-- jQuery -->
<script src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/loader.js"></script>

<script type="text/javascript">
    function checkFormService() {
        var formArray = [];
        formArray.push(document.getElementById("service_name").value);
        formArray.push(document.getElementById("service_charge").value);
        formArray.push(document.getElementById("description").value);
        formArray.push(document.getElementById("duration").value);
        formArray.push(document.getElementById("commission_percentage").value);
        var jsonString = JSON.stringify(formArray);
        $.ajax({
            url:"../controller/add-service-handler.php", //the page containing php script
            type: "POST", //request type
            data: {data : jsonString},
            cache: false,
            success:function(result){
                document.getElementById("msg_service").innerHTML = result;
            }
        });
    }
</script>

<h2>Manage Service</h2>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#view-details" role="tab" aria-controls="home">View Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-service" role="tab" aria-controls="profile">Add Service</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade active" id="view-details" role="tabpanel">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Service Name</th>
                <th>Service Charge</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Percentage</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // create an object from Service class
            $service = new Service();
            $service_list = $service->loadServiceDetails();
            echo $service_list;
            ?>
            </tbody>
        </table>
    </div>

    <div class="tab-pane fade" id="add-service" role="tabpanel">

        <div class="form-errors disabled">
            <p id="msg_service"></p>
        </div>


        <form class="userform" method="post" id="service_form">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Service Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="service_name" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Service Charge</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="service_charge" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-email-input" class="col-md-4 col-form-label">Description</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="description" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-time-input" class="col-md-4 col-form-label">Duration</label>
                <div class="col-md-8">
                    <input class="form-control" type="number" id="duration" >
                </div>
            </div>


            <div class="form-group row">
                <label for="example-tel-input" class="col-md-4 col-form-label">Percentage</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" id="commission_percentage" maxlength="3">
                </div>
            </div>

            <div>
                <button name="clear" type="button" class="btn btn-primary col-md-1 my-button-action">Clear</button>
                <button name="submit" id="emp_type_button_admin" onclick="checkFormService()" type="button" value="Administrator" class="btn btn-primary col-md-1" method="post">Save</button>
            </div>
        </form>
    </div>

</div>

<script>
    $(function () {
        $('#myTab a:last').tab('show')
    });
</script>

