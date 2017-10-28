<?php require_once('../model/Employee.php') ?>

<!-- model to display dialog -->
<div id="msg_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Select Customer</h3>
            </div>
            <div class="modal-body">
                <div id="msg_result">

                    <div class="row ">
                        <div class="col-md-12">
                            <div class="input-group my-search-panel">
                                <div class="input-group-btn search-panel">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <span id="search_concept">Filter by</span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" id="filter_select">
                                        <li><a href="#emp_id" value="emp_id">ID</a></li>
                                        <li><a href="#first_name" value="first_name">First Name</a></li>
                                        <li><a href="#last_name" value="last_name">Last Name</a></li>
                                        <li><a href="#emp_email" value="emp_email">Email</a></li>
                                        <li><a href="#emp_phone" value="emp_phone">Phone</a></li>
                                        <li><a href="#emp_address" value="emp_address">Address</a></li>
                                        <li><a href="#emp_type" value="emp_type">Type</a></li>
                                        <li><a href="#emp_gender" value="emp_gender">Gender</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#all" value="all">Anything</a></li>
                                    </ul>
                                </div>
                                <input type="hidden" name="search_param" value="all" id="search_param">
                                <input type="text" class="form-control" name="x" placeholder="Search employee here..." id="search_text">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 result-table" id="result">
                                <?php
                                // create an object from Employee class
                                $employee = new Employee();
                                $employee_list = $employee->searchEmployeeDetails("*","");
                                echo $employee_list;
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>