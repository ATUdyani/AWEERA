<div id="view_data_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">View Customer Details
                    <div class="col-md-3">
                        <img src="" id="profile_pic" class="avatar img-circle img-responsive  profile-image" alt="avatar">
                    </div>
                </h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Customer ID</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="view_cust_id" id="view_cust_id" maxlength="50" required="" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="view_first_name" id="view_first_name" maxlength="50" required="" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Last Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="email"  id="view_last_name" name="view_last_name" maxlength="50" required="" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group row">
                        <form>
                            <label for="example-text-input" class="col-md-4 col-form-label clearfix">Gender</label>
                            <div class="col-md-8">
                                <select name="view_cust_gender" id="view_cust_gender" class="form-control" disabled="disabled">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-md-4 col-form-label">Phone Number</label>
                        <div class="col-md-8">
                            <input class="form-control" type="tel" id="view_cust_phone" name="view_cust_phone" maxlength="10" required="" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 control-label">Address</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="5" id="view_cust_address" name="view_cust_address" maxlength="60" required="" disabled="disabled"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Email</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="view_cust_email" id="view_cust_email" maxlength="50" disabled="disabled" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Date Joined</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="view_date_joined" id="view_date_joined" maxlength="50" disabled="disabled" required="">
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
