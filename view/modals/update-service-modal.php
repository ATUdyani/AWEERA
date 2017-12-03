<!-- model to update data -->
<div id="add_data_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Update Service Details</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Service Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="update_service_name" id="update_service_name" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Service Charge</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" name="update_service_charge" id="update_service_charge" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 control-label">Description</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="5" id="update_service_description" name="update_service_description" maxlength="60" required=""></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-md-4 col-form-label">Duration (minutes)</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" id="update_service_duration" name="update_service_duration" maxlength="10" required="">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Commission Percentage</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" name="update_commission" id="update_commission" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="col-md-offset-10">
                        <input type="hidden" name="update_service_id" id="update_service_id" />
                        <input type="button" onclick="onclickUpdateService()" name="update" id="update" value="Update" class="btn btn-success my-lg-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
