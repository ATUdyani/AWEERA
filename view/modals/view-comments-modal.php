<!-- model to handle comments -->
<div id="view_comments_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Handle Comment</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <input type="hidden" id="appointment_id">
                    <div class="form-group row">
                        <label class="col-md-4 control-label">Comment</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="5" id="comment" name="comment" maxlength="100" disabled="disabled" required=""></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="update_id" id="update_id" />
                            <input type="hidden" name="password" id="password" />
                            <input type="button" onclick="commentStatus('1')" name="accept" id="accept" value="OK" class="btn btn-success my-lg-button-success" />
                        </div>
                        <div class="col-md-6">
                            <input type="button" onclick="commentStatus('0')" name="reject" id="reject" value="Review" class="btn btn-danger my-lg-button-danger" />
                        </div>
                    </div>

                </form>
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