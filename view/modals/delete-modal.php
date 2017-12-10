<!-- model to handle comments -->
<div id="delete_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Delete</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <input type="hidden" id="appointment_id">
                    <div class="form-group row">
                        <h4 class="col-md-12 control-label">Are you sure you want to delete?</h4>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="record_id" id="record_id" />
                            <input type="hidden" name="table_name" id="table_name" />
                            <input type="button" onclick="deleteRecord()" name="accept" id="yes" value="Yes" class="btn btn-danger my-lg-button-danger" />
                        </div>
                        <div class="col-md-6">
                            <input type="button" onclick="notDeleteRecord()" name="no" id="no" value="No" class="btn btn-success my-lg-button-success" />
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
