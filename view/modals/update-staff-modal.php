<!-- modal to update data -->
<div id="add_data_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Update Staff Details
                    <div class="col-md-3">
                        <img src="" id="profile_pic" class="avatar img-circle profile-image" alt="avatar">
                    </div>
                </h3>
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
                        <form>
                            <label for="example-text-input" class="col-md-4 col-form-label clearfix">Gender</label>
                            <div class="col-md-8">
                                <select name="update_emp_gender" id="update_emp_gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Email</label>
                        <div class="col-md-8">
                            <input class="form-control" type="email"  id="update_emp_email" name="update_emp_email" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-md-4 col-form-label">Phone Number</label>
                        <div class="col-md-8">
                            <input class="form-control" type="tel" id="update_emp_phone" name="update_emp_phone" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 control-label">Address</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="5" id="update_emp_address" name="update_emp_address" maxlength="60" required=""></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Type</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="update_type" id="update_emp_type" maxlength="50" disabled="disabled" required="">
                        </div>
                    </div>

                    <div class="col-md-offset-10">
                        <input type="hidden" name="update_emp_id" id="update_emp_id" />
                        <input type="button" onclick="onclickUpdateEmployee()" name="update" id="update" value="Update" class="btn btn-success my-lg-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>