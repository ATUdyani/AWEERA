<?php require_once "model/Gallery.php"; ?>
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
        <h2 class="page-header"> Gallery </h2>
    </div>
    <?php
        $count=0;
        $image_list ="";
        while($image=mysqli_fetch_assoc($result) AND $count<6){
            $image_list .="<div class=\"col-md-4 col-sm-6\">
                                <a href=\"portfolio-item.html\">
                                    <img class=\"img-responsive img-portfolio img-hover\" src='img/uploads/".$image['path']."' alt=\"\">
                                </a>
                           </div>";
            $count +=1;
        }
        echo $image_list;
    ?>
</div>
<!-- /.row -->
