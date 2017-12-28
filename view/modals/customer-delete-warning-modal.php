<!-- model to handle comments -->
<div id="warning_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Warning!</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <input type="hidden" id="warning_cust_id">
                    <div class="form-group row">
                        <div id="warning_msg_result">

                        </div>
                    </div>
                    <br>
                    <input type="button" onclick="deleteCustomerRecord('all')" name="delete_all" id="delete_all" value="Cancel the Appointment(s) and delete the Customer" class="btn btn-danger my-lg-button-danger long-btn" />

                    <input type="button" onclick="deleteCustomerRecord('')" name="delete_customer" id="delete_customer" value="Keep the Appointment(s) but delete the Customer" class="btn btn-success my-lg-button-danger long-btn" />

                    <input type="button" onclick="notDeleteRecord()" name="not_delete" id="not_delete" value="Do not delete anything" class="btn btn-success my-lg-button-success long-btn" />

                </form>
            </div>
        </div>
    </div>
</div>
