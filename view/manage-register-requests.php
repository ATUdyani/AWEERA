<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/RegisterRequest.php') ?>

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
            var txt = $(this).val().trim();
            dataArray.push(filter);
            dataArray.push(txt);
            var jsonString = JSON.stringify(dataArray);
            if (txt != ''){
                $.ajax({
                    url: "../controller/fetch-register-request-handler.php",
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
                    url: "../controller/fetch-register-request-handler.php",
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

    // load modal to edit customer register data
    $(document).ready(function (){
        $(document).on('click','.edit_data',function(){
            var reg_id = $(this).attr("id");
            $.ajax({
                url:"../controller/fetch-unregistered-customer-handler.php",
                method: "post",
                data: {reg_id:reg_id},
                dataType: "json",
                cache: false,
                success:function (data) {
                    $('#update_first_name').val(data.first_name);
                    $('#update_last_name').val(data.last_name);
                    $('#update_email').val(data.cust_email);
                    $('#update_phone').val(data.cust_phone);
                    $('#update_address').val(data.cust_address);
                    $('#update_id').val(data.reg_id);
                    jQuery.noConflict();
                    $('#add_data_Modal').modal('show');
                }
            });
        });
    });


</script>

<h2>New Register Requests</h2>

<div class="row ">
    <div class="col-md-12">
        <div class="input-group my-search-panel">
            <div class="input-group-btn search-panel">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span id="search_concept">Filter by</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" id="filter_select">
                    <li><a href="#first_name" value="first_name">First Name</a></li>
                    <li><a href="#last_name" value="last_name">Last Name</a></li>
                    <li><a href="#cust_phone" value="cust_phone">Address</a></li>
                    <li><a href="#cust_email" value="cust_email">Email</a></li>
                    <li><a href="#cust_address" value="cust_address">Address</a></li>
                    <li class="divider"></li>
                    <li><a href="#all" value="all">Anything</a></li>
                </ul>
            </div>
            <input type="hidden" name="search_param" value="all" id="search_param">
            <input type="text" class="form-control" name="x" placeholder="Search register requests ..." id="search_text">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 result-table" id="result">
            <?php
            // create an object from RegisterRequest class
            $register_request= new RegisterRequest();
            $request_list = $register_request->searchRegisterRequests("*","");
            echo $request_list;
            ?>
        </div>
    </div>
</div>


<!-- model to handle register requests -->
<div id="add_data_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Handle Register Request</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="update_first_name" id="update_first_name" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="update_last_name" id="update_last_name" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Email/Username</label>
                        <div class="col-md-8">
                            <input class="form-control" type="email"  id="update_email" name="update_email"  maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Phone</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number"  id="update_phone" name="update_phone"  maxlength="12" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 control-label">Address</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="5" id="update_address" name="update_address" maxlength="100" required=""></textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-4 col-form-label clearfix"></label>
                        <div class="col-md-8">
                            <p id="message" style="padding-top:5px;margin-bottom: 0px;"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="update_id" id="update_id" />
                            <input type="button" onclick="onClickAcceptReject('Accepted')" name="accept" id="accept" value="Accept" class="btn btn-success my-lg-button" />
                        </div>
                        <div class="col-md-6">
                            <input type="button" onclick="onClickAcceptReject('Rejected')" name="reject" id="reject" value="Reject" class="btn btn-danger my-lg-button" />
                        </div>
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