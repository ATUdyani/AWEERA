<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/Service.php') ?>

<!-- jQuery -->
<script type="text/javascript" src="../js/check_form.js"></script>

<script src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript" src="../js/search_filter_change.js"></script>



<script>
    // load suitable results on keyup
    $(document).ready(function(){
        $('#search_text').keyup(function () {
            var dataArray =[];
            var filter = document.getElementById("search_param").value;
            var txt = $(this).val();
            dataArray.push(filter);
            dataArray.push(txt);
            var jsonString = JSON.stringify(dataArray);
            if (txt != ''){
                $.ajax({
                    url: "../controller/search-service-handler.php",
                    method: "post",
                    data:{data:jsonString},
                    cache: false,
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }
            else{
                //$('#result').html('');
                $.ajax({
                    url: "../controller/search-service-handler.php",
                    method: "post",
                    data:{data:jsonString},
                    cache: false,
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }
        });
    });
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
        <div class="row ">
            <div class="col-md-12">
                <div class="input-group my-search-panel">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="search_concept">Filter by</span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" id="filter_select">
                            <li><a href="#service_id" value="service_id">ID</a></li>
                            <li><a href="#service_name" value="service_name">Service Name</a></li>
                            <li><a href="#service_charge" value="service_charge">Service Charge</a></li>
                            <li><a href="#description" value="description">Description</a></li>
                            <li><a href="#duration" value="duration">Duration</a></li>
                            <li><a href="#commission_percentage" value="commission_percentage">Commission Percentage</a></li>
                            <li class="divider"></li>
                            <li><a href="#all" value="all">Anything</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Search employee here..." id="search_text">
                </div>
            </div>
        </div>

        <div class="col-md-12 result-table" id="result">
                <?php
                    $service = new Service();
                    $service_list = $service -> searchServiceDetails("*","");
                    echo $service_list;
                ?>
        </div>
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

            <div class="col-md-2 col-md-offset-8">
                <button name="clear" type="button" class="btn btn-primary col-md-2 my-lg-button my-button-action">Clear</button>
            </div>
            <div class="col-md-2">
                <button name="submit" id="emp_type_button_admin" onclick="checkFormService()" type="button" value="Administrator" class="btn btn-primary col-md-2 my-lg-button" method="post">Save</button>
            </div>
        </form>
    </div>

</div>

<!-- model to update data -->
<div id="add_data_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Update Service Details</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Service Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="update_service_name" id="update_service_name" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Service Charge</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="update_service_charge" id="update_service_charge" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 control-label">Description</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="5" id="update_service_description" name="update_service_description" maxlength="60" required=""></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-md-4 col-form-label">Duration (minutes)</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" id="update_service_duration" name="update_service_duration" maxlength="10" required="">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Commission Percentage</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" name="update_commission" id="update_commission" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="col-md-offset-10">
                        <input type="hidden" name="update_emp_id" id="update_service_id" />
                        <input type="button" onclick="onclickUpdateService()" name="update" id="update" value="Update" class="btn btn-success my-lg-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- model to display dialog -->
<div id="msg_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Message</h3>
                <li class="divider"></li>
            </div>
            <div class="modal-body">
                <div id="msg_result">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#myTab a:first').tab('show')
    });
</script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>