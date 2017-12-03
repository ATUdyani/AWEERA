<?php
require_once "../model/Gallery.php";
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 02-Dec-17
 * Time: 7:30 PM
 */
$gallery = new Gallery();
$result = $gallery->getImages();
?>

<script src="../js/gallery_handler.js"></script>

<h2>Manage Gallery<div class="request-icon" onclick="newUpload()">
        <a class="btn view-all">New Upload <i class="fa fa-upload" aria-hidden="true"></i></a>
    </div></h2>

<div id="gallery" class="row">
    <h4>High Priority - Home Page Preview</h4>
    <hr>
    <?php
    $count=0;
    $image_list ="";
    while($image=mysqli_fetch_assoc($result) AND $count<6){
        $image_list .="<div class=\"col-md-4 col-xs-6\">
                                <a href='#' onclick='loadEditImageModal(this.id)' id='".$image['path']."'>
                                    <img class=\"img-responsive img-portfolio img-hover\" src='../img/uploads/".$image['path']."' alt=\"\">
                                </a>
                           </div>";
        $count +=1;
    }
    echo $image_list;
    ?>
    <h4>Other</h4>
    <hr>
    <?php
    $count=0;
    $image_list ="";
    mysqli_data_seek($result,6);
    while($image=mysqli_fetch_assoc($result)){
        $image_list .="<div class=\"col-md-3 col-xs-3\">
                                <a href='#' onclick='loadEditImageModal(this.id)' id='".$image['path']."'>
                                    <img class=\"img-responsive img-portfolio img-hover\" src='../img/uploads/".$image['path']."' alt=\"\">
                                </a>
                           </div>";
        $count +=1;
    }
    echo $image_list;
    ?>
</div>

<?php include('modals/message-modal.php'); ?>
<?php include('modals/edit-gallery-modal.php'); ?>
