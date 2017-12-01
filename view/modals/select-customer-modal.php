<?php require_once('../model/RegisteredCustomer.php') ?>

<script type="text/javascript" src="../js/check_form.js"></script>

<script type="text/javascript" src="../js/loader.js"></script>

<!-- jQuery -->
<script src="../js/jquery.js"></script>


<script>
    // load suitable results on keyup
    $(document).ready(function(){
        $('#search_text').keyup(function (){
            var dataArray =[];
            var filter = document.getElementById("search_param").value;
            var txt = $(this).val().trim();
            dataArray.push(filter);
            dataArray.push(txt);
            var jsonString = JSON.stringify(dataArray);
            if (txt != ''){
                $.ajax({
                    url: "../controller/search-customer-handler.php",
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
                    url: "../controller/search-customer-handler.php",
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

    // load customer appointment book page with cust_id auto loaded
    function loadBookCustomerAppointment(cust_id) {
        $('#select_customer_Modal').modal('hide');
        $('#content').load("receptionist-book-appointment.php",{'cust_id': cust_id});
    }

</script>

<script type="text/javascript" src="../js/search_filter_change.js"></script>


<!-- model to display dialog -->
<div id="select_customer_Modal" class="modal fade text-center">
    <div class="modal-dialog my-large-modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Select Customer</h3>
            </div>
            <div class="modal-body">
                <div id="msg_result_customer" style="margin:2%;">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="input-group my-search-panel">
                                <div class="input-group-btn search-panel">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <span id="search_concept">Filter by</span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" id="filter_select">
                                        <li><a href="#cust_id" value="emp_id">ID</a></li>
                                        <li><a href="#first_name" value="first_name">First Name</a></li>
                                        <li><a href="#last_name" value="last_name">Last Name</a></li>
                                        <li><a href="#cust_email" value="emp_email">Email</a></li>
                                        <li><a href="#cust_phone" value="emp_phone">Phone</a></li>
                                        <li><a href="#cust_address" value="emp_address">Address</a></li>
                                        <li><a href="#cust_type" value="emp_type">Date Joined</a></li>
                                        <li><a href="#cust_gender" value="emp_gender">Gender</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#all" value="all">Anything</a></li>
                                    </ul>
                                </div>
                                <input type="hidden" name="search_param" value="all" id="search_param">
                                <input type="text" class="form-control" name="x" placeholder="Search customer here..." id="search_text">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 result-table table-responsive" id="result">
                                <?php
                                // create an object from Customer class
                                $customer = new RegisteredCustomer();
                                $customer_list = $customer->searchCustomerBookAppointment("*","");
                                echo $customer_list;
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>