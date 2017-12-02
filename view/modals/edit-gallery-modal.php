<!-- model to handle comments -->
<div id="edit_image_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Edit Image</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h4>What do you want to do?</h4>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" id="image_id">
                        <input type="button" onclick="deleteImage()" name="delete" id="delete" value="Delete Image" class="btn btn-danger my-lg-button-danger" />
                    </div>
                    <div class="col-md-6">
                        <input type="button" onclick="setPriority()" name="priority" id="priority" value="Set High Priority" class="btn btn-success my-lg-button-success" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // change comment status
    function commentStatus(status){
        var appointmentId = document.getElementById('appointment_id').value;
        $.ajax({
            url:'../controller/update-comment-status-handler.php',
            type: "POST", //request type
            data: {appointment_id: appointmentId, status : status},
            cache: false,
            success:function(result){
                $('#view_comments_Modal').modal('hide');
                $('#msg_Modal').modal('show');
                $('#msg_result').html(result);
            }
        });
    }

    $('#msg_Modal').on('hidden.bs.modal', function () {
        $('#content').load('manage-comments.php');
    });
</script>