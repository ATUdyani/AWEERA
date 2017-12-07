<!-- model to update data -->
<div id="update_supplier_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Update Supplier Details</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Supplier Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="update_supplier_name" id="update_supplier_name" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-md-4 col-form-label">Phone Number</label>
                        <div class="col-md-8">
                            <input class="form-control" type="tel" id="update_supplier_phone" name="update_supplier_phone" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 control-label">Address</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="5" id="update_supplier_address" name="update_supplier_address" maxlength="60" required=""></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Email</label>
                        <div class="col-md-8">
                            <input class="form-control" type="email"  id="update_supplier_email" name="update_supplier_email" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="col-md-offset-10">
                        <input type="hidden" name="update_supplier_id" id="update_supplier_id" />
                        <input type="button" onclick="onclickUpdateSupplier()" name="update" id="update" value="Update" class="btn btn-success my-lg-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>