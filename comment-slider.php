<?php require_once ('model/Comment.php');

    $comment = new Comment();
    $result = $comment ->getComments();
    $comment_array=[];
    for ($index=0;$index<9;$index++){
        $comment_array[$index]= mysqli_fetch_assoc($result);
    }

?>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Comments</h2>
            <div class='col-md-12'>
                <div class="carousel slide media-carousel" id="media">
                    <div class="carousel-inner">
                        <div class="item  active">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="thumbnail" href="#"><img alt="" src="img/panel-default-header2.jpg"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4><?php echo $comment_array[0]['comment'];?></h4>
                                        <p><?php echo $comment_array[0]['service_name']." - ".$comment_array[0]['first_name']." ".$comment_array[0]['last_name'];?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a class="thumbnail" href="#"><img alt="" src="img/panel-default-header2.jpg"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4><?php echo $comment_array[1]['comment'];?></h4>
                                        <p><?php echo $comment_array[1]['service_name']." - ".$comment_array[1]['first_name']." ".$comment_array[1]['last_name'];?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a class="thumbnail" href="#"><img alt="" src="img/panel-default-header2.jpg"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4><?php echo $comment_array[2]['comment'];?></h4>
                                        <p><?php echo $comment_array[2]['service_name']." - ".$comment_array[2]['first_name']." ".$comment_array[2]['last_name'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="thumbnail" href="#"><img alt="" src="img/panel-default-header2.jpg"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4><?php echo $comment_array[3]['comment'];?></h4>
                                        <p><?php echo $comment_array[3]['service_name']." - ".$comment_array[3]['first_name']." ".$comment_array[3]['last_name'];?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a class="thumbnail" href="#"><img alt="" src="img/panel-default-header2.jpg"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4><?php echo $comment_array[4]['comment'];?></h4>
                                        <p><?php echo $comment_array[4]['service_name']." - ".$comment_array[4]['first_name']." ".$comment_array[4]['last_name'];?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a class="thumbnail" href="#"><img alt="" src="img/panel-default-header2.jpg"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4><?php echo $comment_array[5]['comment'];?></h4>
                                        <p><?php echo $comment_array[5]['service_name']." - ".$comment_array[5]['first_name']." ".$comment_array[5]['last_name'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="thumbnail" href="#"><img alt="" src="img/panel-default-header2.jpg"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4><?php echo $comment_array[6]['comment'];?></h4>
                                        <p><?php echo $comment_array[6]['service_name']." - ".$comment_array[6]['first_name']." ".$comment_array[6]['last_name'];?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a class="thumbnail" href="#"><img alt="" src="img/panel-default-header2.jpg"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4><?php echo $comment_array[7]['comment'];?></h4>
                                        <p><?php echo $comment_array[7]['service_name']." - ".$comment_array[7]['first_name']." ".$comment_array[7]['last_name'];?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a class="thumbnail" href="#"><img alt="" src="img/panel-default-header2.jpg"></a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4><?php echo $comment_array[8]['comment'];?></h4>
                                        <p><?php echo $comment_array[8]['service_name']." - ".$comment_array[8]['first_name']." ".$comment_array[8]['last_name'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                    <a data-slide="next" href="#media" class="right carousel-control">›</a>
                </div>
            </div>
        </div>
    </div>



<script>
    $(document).ready(function() {
        $('#media').carousel({
            pause: true,
            interval: false,
        });
    });
</script>