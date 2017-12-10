<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <img class="img-circle" id="img_logo" src="img/aweera.png">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>

            <!-- Begin # DIV Form -->
            <div id="div-forms" class="my-login-form">

                <!-- Begin # Login Form -->
                <form id="login-form">
                    <div class="modal-body">
                        <div id="div-login-msg">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-login-msg" class="my-msg"><p>Type your email and password.</p></span>
                        </div>
                        <input id="login_username" class="form-control" type="text" placeholder="Email" required>
                        <input id="login_password" class="form-control" type="password" placeholder="Password" required>
                        <div class="checkbox">
                            <label>
                                <!--                                    <input type="checkbox"> Remember me-->
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block my-lg-button">Login</button>
                        </div>
                        <div>
                            <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                            <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                    </div>
                </form>
                <!-- End # Login Form -->

                <!-- Begin | Lost Password Form -->
                <form id="lost-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-lost-msg">
                            <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-lost-msg" class="my-msg"><p>Type your e-mail.</p></span>
                        </div>
                        <input id="lost_email" class="form-control" type="text" placeholder="E-Mail" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block my-lg-button">Send</button>
                        </div>
                        <div>
                            <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                    </div>
                </form>
                <!-- End | Lost Password Form -->

                <!-- Begin | Register Form -->
                <form id="register-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-register-msg">
                            <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-register-msg" class="my-msg"><p>Register an account.</p></span>
                        </div>
                        <input id="first_name" class="form-control" type="text" placeholder="First Name" required>
                        <input id="last_name" class="form-control" type="text" placeholder="Last Name" required>
                        <input id="contact_number" class="form-control" type="text" placeholder="Contact Number" maxlength="12" required>
                        <input id="address" class="form-control" type="text" placeholder="Address" required>
                        <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                        <div class="form-group">
                            <select class="form-control" id="register_gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <input id="register_password" class="form-control" type="password" placeholder="Password" required>
                        <input id="register_cpassword" class="form-control" type="password" placeholder="Confirm Password" required>
                        <p id="message" style="padding-top:5px;margin-bottom: 0px;"></p>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block my-lg-button">Register</button>
                        </div>
                        <div style="padding-bottom:10px;">
                            <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                        </div>
                    </div>
                </form>
                <!-- End | Register Form -->

            </div>
            <!-- End # DIV Form -->
        </div>
    </div>
</div>
<!-- END # MODAL LOGIN -->