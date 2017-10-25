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
                            <input type="hidden" name="password" id="password" />
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