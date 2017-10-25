<!-- model to view data -->
<div id="view_service_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">View Service Details</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Service Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="view_service_name" id="view_service_name" maxlength="50" required="" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Service Charge</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" name="view_service_charge" id="view_service_charge" maxlength="50" required="" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 control-label">Description</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="5" id="view_service_description" name="view_service_description" maxlength="60" required="" disabled="disabled"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-md-4 col-form-label">Duration (minutes)</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" id="view_service_duration" name="view_service_duration" maxlength="10" required="" disabled="disabled">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Commission Percentage</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" name="view_commission" id="view_commission" maxlength="50" required="" disabled="disabled">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

