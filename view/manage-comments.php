<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/Comment.php') ?>

<script type="text/javascript" src="../js/appointment_handler.js"></script>

<script>
    // load modal to handle comment
    $(document).ready(function (){
        $(document).on('click','.edit_data',function(){
            var appointment_id = $(this).attr("id");
            $.ajax({
                url:"../controller/fetch-appointment-data-handler.php",
                method: "post",
                data: {appointment_id:appointment_id},
                dataType: "json",
                cache: false,
                success:function (data) {
                    $('#comment').val(data.comment);
                    $('#appointment_id').val(data.appointment_id);
                    $('#view_comments_Modal').modal('show');
                }
            });
        });
    });
</script>

<h2>Manage Comments</h2>

<div class="row ">
    <div class="row">
        <div class="col-md-12 result-table" id="result">
            <?php
                // create an object from StockItem class
                $comment= new Comment();
                $comment_list = $comment->loadNewComments();
                echo $comment_list;
            ?>
        </div>
    </div>
</div>

<?php include('modals/view-staff-details-modal.php'); ?>
<?php include('modals/view-service-details-modal.php'); ?>
<?php include('modals/view-customer-details-modal.php'); ?>
<?php include('modals/view-comments-modal.php'); ?>
<?php include('modals/message-modal.php'); ?>

