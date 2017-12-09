<!-- model change -->
<div id="change_password_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Change Password</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label top-buffer">Old Password</label>
                        <div class="col-md-4">
                            <input class="form-control" type="password" name="old_password" id="old_password" maxlength="50" required="">
                        </div>
                        <p id="old_password_message" class="col-md-4 top-buffer"></p>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label top-buffer">New Password</label>
                        <div class="col-md-4">
                            <input class="form-control" type="password" name="add_password" id="add_password" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label top-buffer">Confirm New Password</label>
                        <div class="col-md-4">
                            <input class="form-control" type="password" name="add_confirm_password" id="add_confirm_password" maxlength="50" required="">
                            <p id="message" class="col-md-4 top-buffer"></p>
                        </div>
                    </div>

                    <div class="col-md-offset-10">
                        <input type="hidden" name="user_id" id="user_id" />
                        <input type="hidden" name="old_password_loaded" id="old_password_loaded" value='<?php echo $_SESSION['password'];?>'/>
                        <input type="button" onclick="onclickChangePassword()" name="add" id="add" value="Change" class="btn btn-success my-lg-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>