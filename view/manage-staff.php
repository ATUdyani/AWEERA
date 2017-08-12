<?php session_start(); ?>
<?php require_once('../model/database.php') ?>
<?php require_once('../model/employee.php') ?>
<?php require_once('../model/service.php') ?>

<!-- jQuery -->
<script src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/loader.js"></script>

<script type="text/javascript">
    function checkFormAdmin() {
        var formArray = [];
        formArray.push(document.getElementById("first_name_admin").value);
        formArray.push(document.getElementById("last_name_admin").value);
        formArray.push(document.getElementById("emp_email_admin").value);
        formArray.push(document.getElementById("emp_phone_admin").value);
        formArray.push(document.getElementById("emp_address_admin").value);
        formArray.push(document.getElementById("emp_type_button_admin").value);
        formArray.push(document.querySelector('input[name = "gender_admin"]:checked').value);
        var jsonString = JSON.stringify(formArray);
        $.ajax({
            url:"../controller/add-staff-handler.php", //the page containing php script
            type: "POST", //request type
            data: {data : jsonString},
            cache: false,
            success:function(result){
                document.getElementById("msg_admin").innerHTML = result;
            }
        });
    }

    function checkFormReceptionist() {
        var formArray = [];
        formArray.push(document.getElementById("first_name_receptionist").value);
        formArray.push(document.getElementById("last_name_receptionist").value);
        formArray.push(document.getElementById("emp_email_receptionist").value);
        formArray.push(document.getElementById("emp_phone_receptionist").value);
        formArray.push(document.getElementById("emp_address_receptionist").value);
        formArray.push(document.getElementById("emp_type_button_receptionist").value);
        formArray.push(document.querySelector('input[name = "gender_receptionist"]:checked').value);
        var jsonString = JSON.stringify(formArray);
        $.ajax({
            url: "../controller/add-staff-handler.php", //the page containing php script
            type: "POST", //request type
            data: {data: jsonString},
            cache: false,
            success: function (result) {
                document.getElementById("msg_receptionist").innerHTML = result;
            }
        });
    }

    function checkFormBeautician() {
        var formArray = [];
        formArray.push(document.getElementById("first_name_beautician").value);
        formArray.push(document.getElementById("last_name_beautician").value);
        formArray.push(document.getElementById("emp_email_beautician").value);
        formArray.push(document.getElementById("emp_phone_beautician").value);
        formArray.push(document.getElementById("emp_address_beautician").value);
        formArray.push(document.getElementById("emp_type_button_beautician").value);
        formArray.push(document.querySelector('input[name = "gender_beautician"]:checked').value);
        var services = document.getElementsByName('services');
        var serviceArray = [];
        for(var i = 0; i < services.length; i++){
            if(services[i].checked){
                serviceArray.push(services[i].value);
            }
        }
        formArray.push(serviceArray);
        var jsonString = JSON.stringify(formArray);
        $.ajax({
            url: "../controller/add-staff-handler.php", //the page containing php script
            type: "POST", //request type
            data: {data: jsonString},
            cache: false,
            success: function (result) {
                document.getElementById("msg_beautician").innerHTML = result;
            }
        });
    }
</script>

<h2>Manage Staff</h2>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#view-details" role="tab" aria-controls="home">View Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-admin" role="tab" aria-controls="profile">Add Administrator</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-recep" role="tab" aria-controls="messages">Add Receptionist</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-beautician" role="tab" aria-controls="settings">Add Beautician</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade active" id="view-details" role="tabpanel">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Type</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // create an object from Employee class
            $employee = new Employee();
            $employee_list = $employee->loadEmployeeDetails();
            echo $employee_list;
            ?>
            </tbody>
        </table>
    </div>

    <div class="tab-pane fade" id="add-admin" role="tabpanel">

        <div class="form-errors disabled">
            <p id="msg_admin"></p>
        </div>


        <form class="userform" method="post" id="admin_form">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="first_name_admin" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="last_name_admin" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <form>
                    <label for="example-text-input" class="col-md-4 col-form-label clearfix">Gender</label>
                        <div class="col-md-8">
                            <input id="male_radio_button" name="gender_admin" type="radio" name="optradio" value="Male" checked="">Male
                        </div>
                        <div class="col-md-8">
                            <input id="female_radio_button" name="gender_admin" type="radio" name="optradio" value="Female">Female
                        </div>
                </form>
            </div>

            <div class="form-group row">
                <label for="example-email-input" class="col-md-4 col-form-label">Email</label>
                <div class="col-md-8">
                    <input class="form-control" type="email"  id="emp_email_admin" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-tel-input" class="col-md-4 col-form-label">Phone Number</label>
                <div class="col-md-8">
                    <input class="form-control" type="tel" id="emp_phone_admin" maxlength="10">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-8">
                    <textarea class="form-control" type="text" rows="5" id="emp_address_admin" maxlength="60"></textarea>
                </div>
            </div>

            <div>
                <button name="clear" type="button" class="btn btn-primary col-md-1 my-button-action">Clear</button>
                <button name="submit" id="emp_type_button_admin" onclick="checkFormAdmin()" type="button" value="Administrator" class="btn btn-primary col-md-1" method="post">Save</button>
            </div>
        </form>
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
                        <input id="male_radio_button" name="gender_receptionist" type="radio" name="optradio" value="Male" checked="">Male
                    </div>
                    <div class="col-md-8">
                        <input id="female_radio_button" name="gender_receptionist" type="radio" name="optradio" value="Female">Female
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

            <div>
                <button name="clear" type="button" class="btn btn-primary col-md-1 my-button-action">Clear</button>
                <button name="submit" id="emp_type_button_receptionist" onclick="checkFormReceptionist()" type="button" value="Receptionist" class="btn btn-primary col-md-1" method="post">Save</button>
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
                        <input id="male_radio_button" name="gender_beautician" type="radio" name="optradio" value="Male" checked="">Male
                    </div>
                    <div class="col-md-8">
                        <input id="female_radio_button" name="gender_beautician" type="radio" name="optradio" value="Female">Female
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

            <div>
                <button name="clear" type="button" class="btn btn-primary col-md-1 my-button-action">Clear</button>
                <button name="submit" id="emp_type_button_beautician" onclick="checkFormBeautician()" type="button" value="Beautician" class="btn btn-primary col-md-1" method="post">Save</button>
            </div>
        </form>

    </div>
</div>

<script>
    $(function () {
        $('#myTab a:last').tab('show')
    });
</script>

