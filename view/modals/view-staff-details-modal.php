<!-- modal to view staff data -->
<div id="view_staff_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">View Staff Details
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
                            <input class="form-control" type="text" name="view_emp_first_name" id="view_emp_first_name" maxlength="50" required="" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="view_emp_last_name" id="view_emp_last_name" maxlength="50" required="" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group row">
                        <form>
                            <label for="example-text-input" class="col-md-4 col-form-label clearfix">Gender</label>
                            <div class="col-md-8">
                                <select name="view_emp_gender" id="view_emp_gender" class="form-control" disabled="disabled">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Email</label>
                        <div class="col-md-8">
                            <input class="form-control" type="email"  id="view_emp_email" name="view_emp_email" maxlength="50" required="" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-md-4 col-form-label">Phone Number</label>
                        <div class="col-md-8">
                            <input class="form-control" type="tel" id="view_emp_phone" name="view_emp_phone" maxlength="10" required="" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 control-label">Address</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="5" id="view_emp_address" name="view_emp_address" maxlength="60" required="" disabled="disabled"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Type</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="view_type" id="view_emp_type" maxlength="50" disabled="disabled" required="">
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
