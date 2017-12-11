<?php require_once('../model/Supplier.php') ?>

<!-- model to update data -->
<div id="update_stock_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Update Stock Details</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Brand</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="update_stock_brand" id="update_stock_brand" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-md-4 col-form-label">Type</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" id="update_type" name="update_type" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-md-4 col-form-label">Count</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" id="update_stock_count" name="update_stock_count" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-md-4 col-form-label">Price</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" id="update_price" name="update_price" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 control-label">Description</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="5" id="update_description" name="update_description" maxlength="60" required=""></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-tel-input" class="col-md-4 col-form-label">Supplier</label>
                        <div class="col-md-8 ">
                            <select name="update_supplier_id" id="update_supplier_id" class="form-control" onchange="getAppointments()">
                                <?php
                                $supplier = new Supplier();
                                $supplier_names = $supplier -> fetchSupplierNames();
                                echo $supplier_names;
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-offset-10">
                        <input type="hidden" name="update_stock_id" id="update_stock_id" />
                        <input type="button" onclick="onclickUpdateStock()" name="update" id="update" value="Update" class="btn btn-success my-lg-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>