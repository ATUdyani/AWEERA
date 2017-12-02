<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/User.php') ?>

<link rel="stylesheet" href="../css/upload_image.css" />

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<script src="../js/gallery_handler.js"></script>

<h2>Manage Gallery<div class="request-icon" onclick="editGallery()">
    <a class="btn view-all">Edit Gallery <i class="fa fa-table" aria-hidden="true"></i></a>
</div></h2>

<div class="row">
    <div class="main col-md-4">
        <h4>Upload New Image</h4>
        <hr>
        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
            <div id="image_preview">
                <img id="previewing" src="noimage.png" />
            </div>
            <div id="selectImage">
                <label>Select Your Image</label><br/>
                <input type="file" name="file" id="file" required />
                <input type="submit" value="Upload" class="btn btn-primary btn-lg btn-block my-lg-button" />
            </div>
        </form>
    </div>
    <h4 id='loading' class="col-md-4" >loading..</h4>
    <div id="message" class="col-md-4"></div>
</div>



<?php include('modals/message-modal.php'); ?>
