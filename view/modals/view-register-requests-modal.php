<!-- model to handle register requests -->
<div id="view_data_Modal" class="modal fade text-center">
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
                            <input class="form-control" type="text" name="view_first_name" id="view_first_name" maxlength="50" required="" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="view_last_name" id="view_last_name" maxlength="50" required="" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <form>
                            <label for="example-text-input" class="col-md-4 col-form-label clearfix">Gender</label>
                            <div class="col-md-8">
                                <select name="view_gender" id="view_gender" class="form-control" disabled="disabled">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Email/Username</label>
                        <div class="col-md-8">
                            <input class="form-control" type="email"  id="view_email" name="view_email"  maxlength="50" required="" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Phone</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number"  id="view_phone" name="view_phone"  maxlength="12" required="" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 control-label">Address</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="5" id="view_address" name="view_address" maxlength="100" required="" disabled></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="view_id" id="view_id" />
                            <input type="hidden" name="password" id="password" />
                            <input type="button" onclick="onClickAcceptReject('Accepted')" name="accept" id="accept" value="Accept" class="btn btn-success my-lg-button-success" />
                        </div>
                        <div class="col-md-6">
                            <input type="button" onclick="onClickAcceptReject('Rejected')" name="reject" id="reject" value="Reject" class="btn btn-danger my-lg-button-danger" />
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>