<?php require_once "model/Gallery.php"; ?>

<link rel="stylesheet" href="css/baguetteBox.min.css">

<?php

/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 02-Dec-17
 * Time: 7:30 PM
 */
$gallery = new Gallery();
$result = $gallery->getImages();
?>

<div id="gallery" class="row">
    <div class="col-lg-12">
        <h2 class="page-header"> Gallery <div class="request-icon" onclick="getAppointments('all')">
                <a href="gallery.php" class="btn view-all">View More   <i class="fa fa-table" aria-hidden="true"></i></a>
            </div></h2>
    </div>

    <div class="tz-gallery">
            <?php
            $count=0;
            $image_list ="";
            while($image=mysqli_fetch_assoc($result) AND $count<6){
                $image_list .="<div class=\"col-sm-6 col-md-4\">
                <a href='img/uploads/".$image['path']."'>
                    <img class=\"img-responsive img-portfolio img-hover\" src='img/uploads/".$image['path']."' alt=\"\">
                </a>
            </div>";
                $count +=1;
            }
            echo $image_list;
            ?>
    </div>
</div>
<!-- /.row -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>