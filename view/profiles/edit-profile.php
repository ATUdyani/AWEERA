<script type="text/javascript" src="../js/profile_updater.js"></script>
<script type="text/javascript" src="../js/jquery.md5.js"></script>

<?php session_start();?>
    <h2>Edit Profile</h2>

    <div class="row">
        <!-- left column -->
        <div class="col-md-2">
            <div class="text-center">
                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?php echo $_POST['id'];?>">
                    <input type="hidden" id="type" name="type" value="<?php echo $_SESSION['type'];?>">

                    <div id="image_preview">
                        <img id="previewing" src="../img/profiles/<?php echo $_POST['profile_pic'];?>" class="avatar img-circle img-responsive" alt="avatar">
                    </div>
                    <div id="selectImage">
                        <label>Upload a different photo...</label><br/>
                        <input type="file" name="file" id="file" required class="form-control"/>
                        <input type="submit" value="Upload" class="btn btn-primary btn-block my-lg-button" />
                        <input type="button" id="change_password" name="change_password" onclick="loadChangePasswordModal()" class="btn btn-primary" value="Change Password">
                    </div>
                </form>
            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3>Personal info</h3>

            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input id="first_name" name="first_name" class="form-control" type="text" value="<?php echo $_POST['first_name'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input id="last_name" name=last_name" class="form-control" type="text" value="<?php echo $_POST['last_name'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Gender:</label>
                    <div class="radio">
                        <label class="col-lg-3 control-label"><input type="radio" name="gender" value="Male" <?php echo ($_POST['gender']=='Male')?'checked':''?>>Male</label>
                        <label class="col-lg-3 control-label"><input type="radio" name="gender" value="Female" <?php echo ($_POST['gender']=='Female')?'checked':''?>>Female</label>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input id="email" name="email" class="form-control" type="email" value="<?php echo $_POST['email'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Phone Number:</label>
                    <div class="col-lg-8">
                        <input id="phone" name="phone" class="form-control" type="number" value="<?php echo $_POST['phone'];?>" maxlength="10">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Address :</label>
                    <div class="col-md-8">
                        <textarea id="address" name="address" class="form-control" rows="3" id="comment"><?php echo $_POST['address'];?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="button" id="submit" name="submit" onclick="updateProfile()" class="btn btn-primary" value="Save Changes">
                        <input type="button" onclick="location.reload()" class="btn btn-default" value="Cancel">
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php include('../modals/update-message-modal.php'); ?>
<?php include('../modals/message-modal.php'); ?>
<?php include('../modals/change-profile-password-modal.php'); ?>
