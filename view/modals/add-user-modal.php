<!-- model to add user -->
<div id="add_user_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Add User</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="add_first_name" id="add_first_name" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="add_last_name" id="add_last_name" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Type</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="add_type" id="add_emp_type" maxlength="50" disabled="disabled" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Email/Username</label>
                        <div class="col-md-8">
                            <input class="form-control" type="email"  id="add_emp_email" name="add_emp_email" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Password</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="add_password" id="add_password" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Confirm Password</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="add_confirm_password" id="add_confirm_password" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label clearfix"></label>
                        <div class="col-md-8">
                            <p id="message" style="padding-top:5px;margin-bottom: 0px;"></p>
                        </div>
                    </div>

                    <div class="col-md-offset-10">
                        <input type="hidden" name="add_emp_id" id="add_emp_id" />
                        <input type="button" onclick="onclickAddUser()" name="add" id="add" value="Add" class="btn btn-success my-lg-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>